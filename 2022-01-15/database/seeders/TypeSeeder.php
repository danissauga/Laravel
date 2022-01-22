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
            'name' => 'Uždara akcinė bendrija',
            'short_name' => 'UAB',
            'description' => 'Ribotos atsakomybės' 
        ]);
        DB::table('types')->insert([
            'name' => 'Indviduali įmonė',
            'short_name' => 'IĮ',
            'description' => 'Neribota atsakomybė' 
        ]);
        DB::table('types')->insert([
            'name' => 'Akcinė bendrija',
            'short_name' => 'AB',
            'description' => 'Ribotos atsakomybės' 
        ]);
    }
}
