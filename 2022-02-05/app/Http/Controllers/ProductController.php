<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PaginationSetting;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $productCategories= ProductCategory::orderBy('title', 'asc')->get();
        $sortCollumn = $request->sortCollumn;
        $sortOrder = $request->sortOrder;
        $paginate = $request->paginateSetting;
        $paginationSettings = PaginationSetting::all();


        if (empty($sortCollumn) || empty($sortOrder)) {
            $products = $products = Product::paginate($paginate);
        } else {

            if($sortCollumn == "category_id") {
                $sortBool = true;
                if ($sortOrder == "asc") {
                    $sortBool = false;
                }
                $products = Product::get()->sortBy(function($query){
                    return $query->getProductCategory->title;
                    },SORT_REGULAR,$sortBool)->all();
            }
            $products = Product::orderBy($sortCollumn, $sortOrder)->paginate($paginate);
            //$products = $products = Product::all();
        }
        
        return view('product.index',['products' => $products, 'sortCollumn' => $sortCollumn, 'sortOrder' => $sortOrder, 'productCategories'=>$productCategories, 'paginationSettings'=>$paginationSettings, 'paginateSetting'=>$paginate ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = ProductCategory::all();
        return view('product.create', ['productCategories'=>$productCategories ]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $product = new Product;
        $product->title = $request->product_title;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->category_id = $request->product_category;
        $product->image_url = $request->product_image;

        $product->save();
        $products = Product::all();
        return view('product.index', ['products'=>$products]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        $productCategories = ProductCategory::all();
        
        return view('product.edit', ['product' => $product, 'productCategories'=>$productCategories ]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->title = $request->product_title;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->category_id = $request->product_category;
        $product->image_url = $request->product_image;

        $product->save();
        $products = Product::all();
        return view('product.index', ['products'=>$products]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();  
        return redirect()->route('product.index')->with('success_message','Record removed success!'); 
    }

   public function categoryfilter(Request $request)
    {
        // $author_id = $request->author_id;
        // $books = Book::where('author_id', '=', $author_id)->get();
        // return view('book.bookfilter', ['books' => $books]);
       // dd($request->author_id);
        $category_id = $request->category_id;
        $products = Product::where('category_id', '=' , $category_id)->get();
        return view('product.categoryfilter', ['products' =>$products]);


    }

}
