<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert([
            'departments_name'  => "เทคโนโลยีธุรกิจดิจิทัล",
            'departments_detail' => "รายละเอียดเทคโนโลยีธุรกิจดิจิทัล....",
            
        ]);
    }
}
