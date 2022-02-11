<?php

namespace Database\Seeders;

use App\Models\PaginationSetting;
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
        $this->call(
            [
                PaginationSettingSeeder::class,
                ProductCategorySeeder::class,
                ProductSeeder::class,
                ClientSeeder::class
                
            ]);
    }
}
