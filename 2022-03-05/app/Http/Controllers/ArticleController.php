<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator; 

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::sortable()->get();
        $types = Type::all();
        return view('article.index',['articles'=>$articles, 'types'=>$types]);  
    }

    public function indexAjax() {

        $articles = Article::with('articleHasType')->sortable()->get();

        $articles_array = array(
            'articles' => $articles
        );
        $json_response =response()->json($articles_array);
        return $json_response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        //
    }
    public function storeAjax(Request $request)
    {

        $input = [
            'article_title'=> $request->article_title,
            'article_type_id'=> $request->article_type_id,
            'article_description'=> $request->article_description,
        ];

        $rules = [
            'article_title'=> 'required',
            'article_type_id'=> 'required',
            'article_description'=> 'required',
        ];

        $messages = [
            'required' => "This field is required"
        ];


        $validator = Validator::make($input, $rules, $messages); // 3 funckijos argumentas neprivalomas

        //tikrina ar validatorius nepraejo
        if($validator->fails()) {

            $errors = $validator->messages()->get('*'); //pasiima visu ivykusiu klaidu sarasa
            $article_array = array(
                'errorMessage' => "Validator fails",
                'errors' => $errors
            );
        } else {


        $sort = $request->sort;
        $direction = $request->direction;

        $article = new Article;
        $article->title = $request->article_title;
        $article->type_id = $request->article_type_id;
        $article->description = $request->article_description;

        $article->save();

        $articles = Article::with('articleHasType')->sortable([$sort => $direction])->get();

        $article_array = array(
            'successMessage' => "Article stored succesfuly",
            'articleId' => $article->id,
            'articleTypeId' => $article->type_id,
            'articleTitle' => $article->title,
            'articleDescription' => $article->description,
            'articles' => $articles,
        );
    }
        $json_response =response()->json($article_array); 
        return $json_response;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }
  
 /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function showAjax(Article $article)
    {   
        $article_array = array(
                'successMessage' => "Article show succesfuly",
                'articleId' => $article->id,
                'articleTypeTitle' => $article->articleHasType->title,
                'articleTypeId' => $article->type_id,
                'articleTitle' => $article->title,
                'articleDescription' => $article->description,
        );
        $json_response =response()->json($article_array);
        return $json_response;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }
/**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function updateAjax(Request $request, Article $article)
    {

        $input = [
            'input_edit_article_title'=> $request->article_title,
            'input_edit_article_type_id'=> $request->article_type_id,
            'input_edit_article_description'=> $request->article_description,
        ];

        $rules = [
            'input_edit_article_title'=> 'required',
            'input_edit_article_type_id'=> 'required',
            'input_edit_article_description'=> 'required',
        ];

        $messages = [
            'required' => "This field is required"
        ];


        $validator = Validator::make($input, $rules, $messages); // 3 funckijos argumentas neprivalomas

        //tikrina ar validatorius nepraejo
        if($validator->fails()) {

            $errors = $validator->messages()->get('*'); //pasiima visu ivykusiu klaidu sarasa
            $article_array = array(
                'errorMessage' => "Validator fails",
                'errors' => $errors
            );
        } else {

        $article->title = $request->edit_article_title;
        $article->description = $request->edit_article_description;
        $article->type_id = $request->edit_article_type_id;
        $article->save();

        $article_array = array(
            'successMessage' => "Article". $article->title ." updated succesfuly",
            'articleId' => $article->id,
            'articleTypeId' => $article->type_id,
            'articleTypeTitle' => $article->articleHasType->title,
            'articleTitle' => $article->title,
            'articleDescription' => $article->description,
        );
    }

        $json_response = response()->json($article_array);
        return $json_response;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
    public function destroyAjax(Article $article)
    {
        $type_count = count($article->articleHasTypes);
       // dd($type_count);
        if ($type_count == 0) {
            $article->delete();
            $feedback_array = array(
                'successMessage' => "Article deleted successfuly". $article->id,
            );
        } else {

            $feedback_array = array(
                'errorMessage' => "Acticle has type and can`t by delete". $article->id,
            );    
        }

        $json_response =response()->json($feedback_array);
        return $json_response;
    }

    public function searchAjax(Request $request) {

        $searchValue = $request->searchValue;
        
        if ($searchValue == '') {
            $articles = $articles = DB::table('articles')
            ->selectraw('types.title as type_title, articles.*')
            ->join('types','types.id','=','articles.type_id')
            ->get();
        } 
        else {

        $articles = DB::table('articles')
        ->selectraw('types.title as type_title, articles.*')
        ->join('types','types.id','=','articles.type_id')
        ->where('articles.title', 'like', "%{$searchValue}%")
        ->orWhere('articles.description', 'like', "%{$searchValue}%")
        ->orWhere('types.title', 'like', "%{$searchValue}%")
        ->get();

        }

        if(count($articles) > 0) {
            $articles_array = array(
                'articles' => $articles
            );
        } else {
            $articles_array = array(
                'errorMessage' => 'No articles found'
            );
        }

        $json_response =response()->json($articles_array);
        return $json_response;

    }

    public function selectByTypeAjax(Request $request) {

        $selectType = $request->article_type;
        
        if ($selectType == 'all') {
            $articles = DB::table('articles')
            ->selectraw('types.title as type_title, articles.*')
            ->join('types','types.id','=','articles.type_id')
            ->get();
        } 
        else {

        $articles = DB::table('articles')
        ->selectraw('types.title as type_title, articles.*')
        ->join('types','types.id','=','articles.type_id')
        ->where('articles.type_id', '=', $selectType)
        ->get();
        }

        if(count($articles) > 0) {
            $articles_array = array(
                'articles' => $articles
            );
        } else {
            $articles_array = array(
                'errorMessage' => 'No articles found'
            );
        }

        $json_response =response()->json($articles_array);
        return $json_response;

    }


}
