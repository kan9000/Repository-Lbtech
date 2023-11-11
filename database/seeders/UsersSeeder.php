<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{ 
    public function run()
    {
        DB::table('users')->insert([
            'name'  => "Kanchana Noiklin",
            'email' => "kana@lbtech.ac.th",
            'password' => Hash::make('123456'),
        ]);
    }
}
