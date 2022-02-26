<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Status;
use App\Models\PaginationSetting;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $categories = Category::sortable()->paginate(5);
        
        return view('category.index',
        ['categories'=>$categories
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $statuses = Status::all();
        return view('category.create',['statuses' => $statuses]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createadvanced()
    {   
        $statuses = Status::all();
        return view('category.createadvanced',['statuses' => $statuses]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $category = new Category;
        $category->title = $request->newCategory;
        $category->description = $request->newCategoryDescription;
        $category->status_id = $request->allStatuses;
        $category->save();

        if($request->addNewPost){
            $count = count($request->postTitle);
            for ($i=0 ; $i<$count; $i++){ 
                $post = new Post;
                $post->title = $request->postTitle[$i];
                $post->postContent = $request->postContent[$i];
                $post->category_id = $category->id;
                $post->save();
            }
        }        
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = Post::where('category_id','=',$category->id)->sortable()->paginate(5);
        return view('category.show',
        ['category'=>$category,
        'posts'=>$posts
        ]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {   
        $statuses = Status::all();
        return view('category.edit',['category'=>$category,'statuses'=>$statuses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request->categoryTitle;
        $category->description = $request->categoryDescription;
        $category->status_id = $request->allStatuses;
        $category->save();

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $categories = $category->categoryHasPosts;
        if (count($categories) != 0) {
            return redirect()->route('category.index')->with('error_message','Delete is not possible because Category has post`s');
        }
        $category->delete();
        return redirect()->route('category.index')->with('success_message','Category removed success!');  
    }
    public function createvalidate(Request $request) {

        $fieldsCount = $request->fieldsCount;
        if (!$fieldsCount) {
            $fieldsCount = 1;
        }
        $statuses = Status::all();
        return view('category.createvalidate',['statuses' => $statuses, 'fieldsCount'=> $fieldsCount]); 

    }
    public function storevalidate(Request $request) {

        $postsCount = $request->postCount;

       // dd($request->postTitle);

       $request->validate([
        "postTitle.*.title" => "required|min:10|max:50|alpha",
        "postContent.*.content" => "required",
        ]);  
     // dd($request->postTitle); 
     return redirect()->route('category.index');

    }
}
