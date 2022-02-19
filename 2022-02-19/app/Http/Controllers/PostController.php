<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\PaginationSetting;
use App\Models\Status;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\Pass;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sortCollumn = $request->sort;
        $sortOrder = $request->direction;

        $category = $request->allCategories;
        $allCategories = Category::all();

        $paginate = $request->paginateSetting;

    if (empty($paginate)) {
        $defaultPaginate = PaginationSetting::where('default_value', '=' , 1)->first();
        $paginate = $defaultPaginate->value;
    }
        $paginationSettings = PaginationSetting::where('visible', '=' , 1)->get();

        $tem_post = Post::all();
        $select_array = array_keys($tem_post->first()->getAttributes());

        if (($category == 'all') || (empty($category))) {
            if ($paginate == 'all') {
                $posts = Post::sortable()->get();
            }
            else {
                $posts = Post::sortable()->paginate($paginate);
            }
        }
        else {
            if ($paginate == 'all') {
            $posts = Post::where('category_id','=',$category)
            ->sortable()->get(); }
            else {
                $posts = Post::where('category_id','=',$category)
            ->sortable()->paginate($paginate);
            }
        }
      
        return view('post.index',
        ['posts'=>$posts,
        'select_array'=>$select_array,
        'paginationSettings'=>$paginationSettings,
        'paginateSetting'=>$paginate,
        'allCategories'=> $allCategories,
        'category'=> $category,
        'sort'=>$sortCollumn,
        'direction'=> $sortOrder
    
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $statuses = Status::all();
        return view('post.create',['categories' => $categories,'statuses' => $statuses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;

        $post->title = $request->postTitle;
        $post->postContent = $request->postContent;
        
        //jei checkbox pazymetas, turi buti kuriamas kitas autorius
        if($request->addNewCategory){
            $category = new Category;

            $category->title=$request->newCategory;
            $category->status_id = $request->allStatuses;
            $category->save();

            $post->category_id = $category->id;

        } else {
            $post->category_id = $request->allCategories;
        }

        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
