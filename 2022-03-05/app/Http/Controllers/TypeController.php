<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Article;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $types = Type::sortable()->get();
        return view('type.index',['types'=>$types]);                    
    }

    public function indexAjax() {

        $types = Type::sortable()->get();

        $types_array = array(
            'types' => $types
        );
        $json_response =response()->json($types_array);
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
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        //
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAjax(Request $request)
    {
        $type = new Type;
        $type->title = $request->type_title;
        $type->description = $request->type_description;

        $type->save();

        $type_array = array(
            'successMessage' => "Type stored succesfuly",
            'typeId' => $type->id,
            'typeTitle' => $type->title,
            'typeDescription' => $type->description,
        );

        //
        $json_response =response()->json($type_array); //javascript masyva
        return $json_response;
    }


   
 /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function showAjax(Type $type)
    {
        $type_array = array(
            'successMessage' => "Type retrieved succesfuly",
            'typeId' => $type->id,
            'typeTitle' => $type->title,
            'typeDescription' => $type->description,
        );
        $json_response =response()->json($type_array);
        return $json_response;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
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
    public function update(UpdateTypeRequest $request, Type $type)
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
    public function updateAjax(Request $request, Type $type)
    {
        $type->title = $request->type_title;
        $type->description = $request->type_description;

        $type->save();

        $type_array = array(
            'successMessage' => "Type updated succesfuly",
            'typeId' => $type->id,
            'typeName' => $type->title,
            'typeDescription' => $type->description,
        );
        $json_response = response()->json($type_array);
        return $json_response;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroyAjax(Type $type)
    {
        $articles_count = count($type->typeHasArticles);
    
        if ($articles_count == 0) {
            $type->delete();
            $feedback_array = array(
                'successMessage' => "Type deleted successfuly". $type->id,
            );
        } else {

            $feedback_array = array(
                'errorMessage' => "Type has acticle and can`t by delete". $type->id,
            );    
        }

        $json_response =response()->json($feedback_array);
        return $json_response;
    }
    public function searchAjax(Request $request) {

        $searchValue = $request->searchValue;
        
        if ($searchValue == '') {
            $types = Type::all();
        } 
        else {
        $types = Type::query()
        ->where('title', 'like', "%{$searchValue}%")
        ->orWhere('description', 'like', "%{$searchValue}%")
        ->get();
        }

        if(count($types) > 0) {
            $types_array = array(
                'types' => $types
            );
        } else {
            $types_array = array(
                'errorMessage' => 'No types found'
            );
        }

        $json_response =response()->json($types_array);
        return $json_response;

    }
}
