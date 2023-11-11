<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BlogImagesSeeder extends Seeder
{ 
    public function run()
    {
        $data = [
            ["blog_id" => 1, "image_name" => "1001.jpg"],
            ["blog_id" => 1, "image_name" => "1002.jpg"],
            ["blog_id" => 1, "image_name" => "1003.jpg"],
            ["blog_id" => 1, "image_name" => "1004.jpg"],
            ["blog_id" => 1, "image_name" => "1005.jpg"],
        ];

        foreach($data as $row){
            DB::table('blog_images')->insert(["blog_id" => $row["blog_id"], "image_name" => $row['image_name']]);
        } 
    }
}
