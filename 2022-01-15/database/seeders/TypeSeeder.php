<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name' => 'Mažoji bendrija',
            'short_name' => 'MB',
            'description' => 'Ribotos atsakomybės' 
        ]);
        DB::table('types')->insert([
            'name' => 'UAB',
            'short_name' => 'Uždara akcinė bendrija',
            'description' => 'Ribotos atsakomybės' 
        ]);
        DB::table('types')->insert([
            'name' => 'IĮ',
            'short_name' => 'Indviduali įmonė',
            'description' => 'Neribota atsakomybė' 
        ]);
        DB::table('types')->insert([
            'name' => 'Akcinė bendrija',
            'short_name' => 'AB',
            'description' => 'Ribotos atsakomybės' 
        ]);
    }
}
