<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
class DifficultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('difficulties')->insert([
            'name' => 'low level'
        ]);
        DB::table('difficulties')->insert([
            'name' => 'middle level'
        ]);
        DB::table('difficulties')->insert([
            'name' => 'higt level'
        ]);
        DB::table('difficulties')->insert([
            'name' => 'wery higt level'
        ]);
    }
}
