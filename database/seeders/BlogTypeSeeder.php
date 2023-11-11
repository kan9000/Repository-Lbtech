<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BlogTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ["name" => "ข่าวประชาสัมพันธ์"], 
            ["name" => "ข่าวกิจกรรม"],  
        ];

        foreach($data as $row){
            DB::table('blog_types')->insert(["name" => $row["name"]]);
        }
    }
}
