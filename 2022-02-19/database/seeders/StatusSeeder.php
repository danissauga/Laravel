<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'title' => 'Comleted'
        ]);
        DB::table('statuses')->insert([
            'title' => 'On Hold'
        ]);
        DB::table('statuses')->insert([
            'title' => 'Started'
        ]);    
    }
}
