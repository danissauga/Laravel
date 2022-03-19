<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     $imageAPIToken = config('imageapi.api_token'); 
     $csrf = $request->csrf; //apsaugos token(zetonas)
       
         if(isset($csrf) && !empty($csrf) && $csrf == $imageAPIToken) {
            $images = Image::paginate(15);
            return response()->json($images);
        } 
        return response()->json(array(
            'erorr' => 'Authentification failed'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageAPIToken = config('imageapi.api_token'); 
        $csrf = $request->csrf; //apsaugos token(zetonas)
       
         if(isset($csrf) && !empty($csrf) && $csrf == $imageAPIToken) {
            
            $image = new Image();
            $image->title = $request->image_title;
            $image->alt = $request->image_alt;
            $image->url = $request->image_url;
            $image->description = $request->image_description;

            $image->save();

            $image_array = array(
                'successMessage' => "Image stored succesfuly",
                'imageId' => $image->id,
                'imageTitle' => $image->title,
                'imageAlt' => $image->alt,
                'imageUrl' => $image->url,
                'imageDescription' => $image->description,
            );
        $json_response =response()->json($image_array);
        return $json_response;
        } 
        return response()->json(array(
            'erorr' => 'Authentification failed'
        ));
    }
        
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $imageAPIToken = config('imageapi.api_token'); 
        $csrf = $request->csrf; //apsaugos token(zetonas)
       
         if(isset($csrf) && !empty($csrf) && $csrf == $imageAPIToken) {
        $image = Image::find($id);
        return response()->json($image); 
    }
        
        return response()->json(array(
            'erorr' => 'Authentification failed'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imageAPIToken = config('imageapi.api_token'); 
        $csrf = $request->csrf; //apsaugos token(zetonas)
       
         if(isset($csrf) && !empty($csrf) && $csrf == $imageAPIToken) {
            
            $image = Image::find($id);
            $image->title = $request->image_title;
            $image->alt = $request->image_alt;
            $image->url = $request->image_url;
            $image->description = $request->image_description;

            $image->save();

            $image_array = array(
                'successMessage' => "Image stored succesfuly",
                'imageId' => $image->id,
                'imageTitle' => $image->title,
                'imageAlt' => $image->alt,
                'imageUrl' => $image->url,
                'imageDescription' => $image->description,
            );
        $json_response =response()->json($image_array);
        return $json_response;
        } 
        return response()->json(array(
            'erorr' => 'Authentification failed'
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $imageAPIToken = config('imageapi.api_token'); 
        $csrf = $request->csrf; //apsaugos token(zetonas)
       
        if(isset($csrf) && !empty($csrf) && $csrf == $imageAPIToken) {
            $image=Image::find($id);
            $image->delete();

        return response()->json(array(
            'successMessage' => 'Image destroyed'
        ));
    }
    return response()->json(array(
        'erorr' => 'Authentification failed'
    ));
    }
}
