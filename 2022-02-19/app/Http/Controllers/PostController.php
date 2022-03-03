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
        //alpha_num -> tik raides ir skaiciai, nepripazysta tarpu
        //alpha_dash -> tikrina tik raides ir skaicius bet priima _ ir -, nepripazysta tarpu
        //numeric", // 1 1.5 2.6 -1 -25 0
        //integer - , 0, +
        // nauralusis skaicius apsaugomas  gt:0
        // nauralusis skaicius apsaugomas  gte:0 daugiau arba lygu 0
        // nauralusis skaicius apsaugomas lt les then
        // nauralusis skaicius apsaugomas lte les then re equal
        //date - tikrina ar data
        //date_equals - ar data lygi 
        //berore -> data yra pries nurodyta
        //berore_or_equal -> data yra pries nurodyta arba lygi jai
        //after -> ar data yra po nurodytos
        //after_or_equal -> ar data yra po nurodytos arba lygi jai

        //telefono tikrinimas
        //+370 652 97772
        //865297772 - integer, kiek skaiciu

        // "postPhone" => "required|regex:/^(86|\+3706)\d{7}\",

        $request->validate([
            "postTitle" => "required|min:10|max:50|alpha",
            "postContent" => "required",
            "postNumber" => "required",
            "postNumberTest" => "required|gt:postNumber",
            "postDateFrom" => "required|date|date_equals:postDateTo",
            "postDateTo" => "required|date",
            "postPhone" => ['required', 'regex:/(86|\+3706)\d{7}/'],
        ]);

        $post = new Post;
        $post->title = $request->postTitle;
        $post->postContent = $request->postContent;
        
        if($request->addNewCategory){
            $category = new Category;
            $category->title = $request->newCategory;
            $category->description = $request->newCategoryDescription;
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
        return view('post.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $statuses = Status::all();
        return view('post.edit',['post' => $post, 'categories' => $categories, 'statuses' => $statuses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->postTitle;
        $post->postContent = $request->postContent;
        
        if($request->addNewCategory){
            $category = new Category;
            $category->title = $request->newCategory;
            $category->description = $request->newCategoryDescription;
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete(); 
        return redirect()->route('post.index');   
    } 
    public function ajaxcreate()
    {   
        $categories = Category::all();
        $statuses = Status::all();
        return view('post.ajaxcreate',['categories' => $categories,'statuses' => $statuses]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function ajaxstore(Request $request)
    {
        

        $post = new Post;
        $post->title = $request->postTitle;
        $post->postContent = $request->postContent;
        $post->category_id = $request->category;
        $post->save();

        $post_array = array(
            'success'=>'Post cretet succesfuly!',
            'postTitle'=>$request->postTitle,
            'postContent'=>$request->postTitle,
            'category'=>$request->category
        );
        //return redirect()->route('post.index');
        return response()->json($post_array); 

    }

}
