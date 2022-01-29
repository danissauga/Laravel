<?php

namespace App\Http\Controllers;

use App\Models\ProfileImage;
use App\Http\Requests\StoreProfileImageRequest;
use App\Http\Requests\UpdateProfileImageRequest;
use Illuminate\Http\Request;

class ProfileImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profileImages = ProfileImage::all();
        return view('profileimage.index', ['profileImages' => $profileImages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profileimage.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfileImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profileImage = new ProfileImage;
        $profileImage->alt = $request->image_alt;

        //paveikliuko pavadinimo pasiemimas/sudarynas ikelimas i serveri
        //paveiksliuko vardui time();

       /// print_r($request->image_src->extension());

        $imageName = 'file_'.time().'.'.$request->image_src->extension();

        //print_r($imageName);

        $request->image_src->move(public_path('images'), $imageName);
        $profileImage->src = $imageName;

        $profileImage->width = $request->image_width;
        $profileImage->height = $request->image_height;
        $profileImage->class = $request->image_class;
        
        $profileImage->save();

        return 0;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileImage  $profileImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileImage $profileImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileImage  $profileImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileImage $profileImage)
    {
        return view('profileimage.edit',['profileImage'=> $profileImage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileImageRequest  $request
     * @param  \App\Models\ProfileImage  $profileImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileImage $profileImage)
    {
        
        //paveikliuko pavadinimo pasiemimas/sudarynas ikelimas i serveri
        //paveiksliuko vardui time();
        if ($request->has('image_src')) {
            $imageName = 'file_'.time().'.'.$request->image_src->extension();
            $request->image_src->move(public_path('images') , $imageName);
            $profileImage->src = $imageName;
        }
        $profileImage->alt = $request->image_alt;
        $profileImage->width = $request->image_width;
        $profileImage->height = $request->image_height;
        $profileImage->class = $request->image_class;
        
        $profileImage->update();

        return 0;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileImage  $profileImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileImage $profileImage)
    {
        //
    }
}
