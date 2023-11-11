<?php

namespace App\Http\Controllers;

use App\Models\blog_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogsTypeController extends Controller
{
    //
    public function index(){
        $data = blog_type::all();

        return view('blog_type.index', compact('data'));
    }

    public function add(){

        return view('blog_type.add');
    }
        
    

    public function edit($id){
        // $data = blog_type::where('id', $id)->first();
        $data = blog_type::find($id);
        return view('blog_type.edit', compact('data'));
    }

    public function SaveBlogsType(Request $request)
    {
        // dd($request);
        // ตรวจสอบความถูกต้องของข้อมูล
        $validate = [
            'name' => 'required|string|max:255', 
        ];   
        request()->validate($validate);

        // รับค่าจากฟอร์มที่ส่งมา 

        // dd($request->all());
        $input = $request->all();
        // $input['name'] = $request->name_th; กรณีที่ชื่อช่องที่ส่งมาตั้งไม่ตรงกับฐานข้อมูล
        // เพิ่มเติม model ที่ตั้งไว้
        $data = blog_type::create($input);

        // กรณีไม่สร้าง model ไว้ สามารถเพิ่มผ่านตารางได้โดยตรง
        // DB::table('blogs_type')->insert($input);

        // แจ้งผลการ insert
        if($data){
            return redirect()->route('blogs.type.index')->with('success', 'บันทึกข้อมูลสำเร็จ.');
        }  else {
            return back()->with('error', 'มีข้อผิดผลาด.');
        }

    }

    public function UpdateBlogsType(Request $request)
    {
         // dd($request);
        // ตรวจสอบความถูกต้องของข้อมูล
        $validate = [
            'id' => 'required',
            'name' => 'required|string|max:255', 
        ];   
        request()->validate($validate);

        // รับค่าจากฟอร์ม
        $input = $request->all();
        // ค้นหาข้อมูลว่ามี id นี้หรือไม่
        $data = blog_type::find($request->id); 
        // สั่งให้อัพเดทในตาราง
        $data->update($input);

        // กรณีไม่สร้าง model ไว้ สามารถเพิ่มผ่านตารางได้โดยตรง
        // DB::table('blog_types')->where('id', $request->id)->update($input);
        // แจ้งผลการ update
        if($data){
            return redirect()->route('blogs.type.edit', [$request->id])->with('success', 'แก้ไขข้อมูลสำเร็จ.');
        }  else {
            return back()->with('error', 'มีข้อผิดผลาด.');
        }
    }

    public function DeleteBlogsType(Request $request)
    {
        if(isset($request->id) && !empty($request->id)){
            $data = blog_type::find($request->id); 
            $data->delete(); 
            if($data){
                return redirect()->route('blogs.type.index')->with('success', 'ลบข้อมูลสำเร็จ.');
            }  else {
                return back()->with('error', 'มีข้อผิดผลาด.');
            }
        }
        
    }   

    
}
