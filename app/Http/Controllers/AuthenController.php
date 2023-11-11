<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthenController extends Controller
{
    //
    public function index(){
        // dd(" users index");
        return view('auth.login');

    }

    public function CheckLogin(Request $request){
        // dd($request);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]); 

        $credentials = $request->only('email', 'password'); 
        // dd($credentials);
        if (Auth::attempt($credentials)) { 
            return redirect()->route('users.index')->with('success', 'ยินดีต้อนรับเข้าสู่ระบบ.');
        }
        return redirect()->route('login')->with('error', 'รายละเอียดการล็อกอินไม่ถูกต้อง โปรดลองใหม่อีกครั้ง !');
        
    }

    public function logout(Request $request)
    { 
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }

}
