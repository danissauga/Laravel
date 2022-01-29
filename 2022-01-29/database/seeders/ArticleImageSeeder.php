<?php

namespace Database\Seeders;

use App\Models\ArticleImage;
use Illuminate\Database\Seeder;

class ArticleImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleImage::factory()->count(10)->create();      
    }
}
