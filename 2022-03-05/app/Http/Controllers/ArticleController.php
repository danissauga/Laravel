<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        $types = Type::all();
        return view('article.index',['articles'=>$articles, 'types'=>$types]);  
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
        $article = new Article;
        $article->title = $request->article_title;
        $article->type_id = $request->article_type_id;
        $article->description = $request->article_description;

        $article->save();

        $article_array = array(
            'successMessage' => "Article stored succesfuly",
            'articleId' => $article->id,
            'articleTypeId' => $article->type_id,
            'articleTitle' => $article->title,
            'articleDescription' => $article->description,
        );

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
        $article->title = $request->article_title;
        $article->description = $request->article_description;
        $article->type_id = $request->article_type_id;
        $article->save();

        $article_array = array(
            'successMessage' => "Article". $article->title ." updated succesfuly",
            'articleId' => $article->id,
            'articleTypeId' => $article->type_id,
            'articleTypeTitle' => $article->articleHasType->title,
            'articleTitle' => $article->title,
            'articleDescription' => $article->description,
        );
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
}
