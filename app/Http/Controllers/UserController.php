<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        // dd(" users index");
        return view('users.index');

    }

    public function add(){
        // dd(" users create");
        return view('users.add');
        
    }

    public function edit($id = null){
        // dd(" users edit");
        return view('users.edit', compact('id'));
        
    }
}
