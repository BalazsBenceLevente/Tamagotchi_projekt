<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animals')->insert([
            ["animaltype"=>"Macska","animalimg"=>"macska.jpg"],
            ["animaltype"=>"Kutya","animalimg"=>"kutya.jpg"],
        ]);
    }
}