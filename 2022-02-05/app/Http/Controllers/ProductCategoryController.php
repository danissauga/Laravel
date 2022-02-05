<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $sortCollumn = $request->sortCollumn;
        $sortOrder = $request->sortOrder;

        $tem_productCategories = ProductCategory::all();
        $select_array = array_keys($tem_productCategories->first()->getAttributes());


        if (empty($sortCollumn) || empty($sortOrder)) {
            $productCategories = ProductCategory::all();
        } else {
            $productCategories = ProductCategory::orderBy($sortCollumn, $sortOrder)->get();
        }


        //$productCategories = ProductCategory::all();
        return view('productcategory.index', ['productCategories'=>$productCategories, 'sortCollumn'=>$sortCollumn, 'sortOrder' => $sortOrder, 'select_array'=>$select_array]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productcategory.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productCategory = new ProductCategory();

        $productCategory->title = $request->productCategory_title;
        $productCategory->description = $request->productCategory_description;

        $productCategory->save();
        $productCategories = ProductCategory::all();
        return view('productcategory.index', ['productCategories'=>$productCategories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('productcategory.edit', ['productCategory' => $productCategory ]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductCategoryRequest  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        $productCategory->title = $request->productCategory_title;
        $productCategory->description = $request->productCategory_description;
        
        $productCategory->save();
        
        $productCategories = ProductCategory::all();
        return view('productcategory.index', ['productCategories'=>$productCategories]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();  
        return redirect()->route('productcategory.index')->with('success_message','Record removed success!'); 
    }
}
