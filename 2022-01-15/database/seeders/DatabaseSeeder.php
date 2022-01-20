<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Company;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //Client::factory()->count(30)->create();
        //Company::factory()->count(30)->create();
        $this->call([
            
            CompanySeeder::class,
            ClientSeeder::class
        ]);
    }
}
