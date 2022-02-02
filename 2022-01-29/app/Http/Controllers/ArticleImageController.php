<?php

namespace App\Http\Controllers;

use App\Models\ArticleImage;
use App\Models\Article;
use App\Http\Requests\StoreArticleImageRequest;
use App\Http\Requests\UpdateArticleImageRequest;
use Illuminate\Http\Request;  

class ArticleImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articleimages = ArticleImage::all();
        return view('articleimage.index', ['articleimages' => $articleimages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articleimage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $articleImage = new ArticleImage;
        $articleImage->alt = $request->image_alt;
        $imageName = 'file_'.time().'.'.$request->image_src->extension();
        $request->image_src->move(public_path('images'), $imageName);
        $articleImage->src = $imageName;

        $articleImage->width = $request->image_width;
        $articleImage->height = $request->image_height;
        $articleImage->class = $request->image_class;

        $articleImage->save();

        $articleimages = ArticleImage::all();
        return view('articleimage.index', ['articleimages' => $articleimages]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleImage $articleImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleImage $articleImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleImageRequest  $request
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleImageRequest $request, ArticleImage $articleImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleImage $articleImage)
    {
         $imageName = ArticleImage::select('src')->where('id', $articleImage->id)->first();
         $imagePath = public_path('images').$imageName->src;

        $usedimages = $articleImage->getUsedImages;

        if (count($usedimages) != 0) {
         
            $articleimages = ArticleImage::all();
            return redirect()->route('articleimage.index')->with('error_message','Delete is not possible because image is used');      

        }
        
        if (file_exists($imagePath)) {
                   
            unlink($imagePath);
                ArticleImage::where('id', $articleImage->id)->delete();
        }else{
                ArticleImage::where('id', $articleImage->id)->delete();
            
        }
        $articleimages = ArticleImage::all();
        return redirect()->route('articleimage.index',['articleimages'=> $articleimages])->with('success_message','Record removed success!');
    }
}
