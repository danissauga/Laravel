<?php

namespace Database\Seeders;

use App\Http\Controllers\ImageController;
use App\Models\Image;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Image::factory(10)->create();

        $unsplashAPI = new ImageController;
        $images = $unsplashAPI->loadDataFromApi();

        foreach ($images as $key=>$data) {
            $image = new Image;
            if (empty($data->user->bio)) { $title = $data->user->first_name; } else {$title = $data->user->bio; } 
            $image->title = $title;
            $image->alt = $data->user->name;
            $image->url = $data->urls->regular;
            $image->description = $title;
                        
            $image->save();
        }     
    }
}
