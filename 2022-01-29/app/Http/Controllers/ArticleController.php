<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleImage;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
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
        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articleImages = ArticleImage::all(); 
        return view('article.create', ['articleimages'=>$articleImages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $article = new Article;
        $article->title = $request->article_title;
        $article->excerpt = $request->article_excerpt;
        $article->description = $request->article_description;
        $article->author = $request->article_author;
        $article->image_id = $request->article_image;

        $article->save();
        return redirect()->route('article.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show',['article'=>$article]);         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {   
        $articleImages = ArticleImage::all(); 
        return view('article.edit',['article'=> $article, 'articleImages'=>$articleImages]);                       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->title = $request->article_title;
        $article->excerpt = $request->article_excerpt;
        $article->description = $request->article_description;
        $article->author = $request->article_author;
        $article->image_id = $request->article_image;

        $article->save();
        return redirect()->route('article.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $articleimages = $article->getAllArticleImages;

        if (count($articleimages) != 0) {
            return redirect()->route('article.index')->with('error_message','Delete is not possible because company has clients');
        }

        $article->delete();
            return redirect()->route('article.index')->with('success_message','Record removed success!');
    
    }
}
