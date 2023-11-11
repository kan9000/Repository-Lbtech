<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\blog_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class BlogController extends Controller
{
    
    public function index(){
        // dd(" users index");
        $data = blog::where('status', 1)->get();
        return view('blog.index', compact('data'));

    }

    public function add(){
        // dd(" users index");
        $types = blog_type::all();

        return view('blog.add', compact('types'));

    }

    public function edit($id){
        // dd(" users index");
        $data = blog::find($id);
        $types = blog_type::all();
        return view('blog.edit',  compact('data', 'types'));

    }

    public function SaveBlog(Request $request)
    { 
        
        $validate = [
            'type_id' => 'required',
            'title' => 'required',
            'title_sub' => 'required', 
            'link_youtube' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
 
            'status' => 'required',
        ];

        if (isset($request->images) && !empty($request->images)) {
            $validate['images'] =  'required|image|mimes:jpg,png,jpeg|max:5120'; // 5MB
        }

        if (isset($request->file_pdf_name) && !empty($request->file_pdf_name)) {
            $validate['file_pdf_name'] = 'required|mimes:pdf|max:5120'; // 5MB
            // csv,txt,xlx,xls,pdf
        }
        
        request()->validate($validate);

        // dd($request);

        #########################
        ##### UPLOADE FILE  #####
        ######################### 
        $fileName = null;
        if($request->file('images')){
            if(!empty($request->file('images'))){
                $uploade_location = 'blogs/images/';   
                $file = $request->file('images');
                $file_gen = hexdec(uniqid());
                $file_ext = strtolower($file->getClientOriginalExtension()); 
                $fileName = $file_gen.'.'.$file_ext;
                $file->move($uploade_location, $fileName); 
            } 
        } 

        #############################
        ##### UPLOADE FILE  PDF #####
        ############################# 
        $fileName_pdf = null;
        if($request->file('file_pdf_name')){
            if(!empty($request->file('file_pdf_name'))){
                $uploade_location_pdf = 'blogs/pdf/';   
                $file_pdf = $request->file('file_pdf_name');
                $file_gen_pdf = hexdec(uniqid());
                $file_ext_pdf = strtolower($file_pdf->getClientOriginalExtension()); 
                $fileName_pdf = $file_gen_pdf.'.'.$file_ext_pdf;
                $file_pdf->move($uploade_location_pdf, $fileName_pdf); 
            } 
        } 

        // บันทึกข้อมูลลง db
        $input = $request->all();
        $input['images'] = $fileName;
        $input['file_pdf_name'] = $fileName_pdf;
        $input['user_id'] = auth()->user()->id;
        $input['status']  = ($request->status==true)? true : false;
        $data = blog::create($input);
        if($data){
            return redirect()->route('blog.index')->with('success', 'บันทึกข้อมูลสำเร็จ.');
        }  else {
            return back()->with('error', 'มีข้อผิดผลาด.');
        }
        // dd($request);
    }

    public function UpdateBlog(Request $request)
    {
        $validate = [
            'title' => 'required',
            'title_sub' => 'required', 
            'link_youtube' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
 
            'status' => 'required',
        ];

        if (isset($request->images) && !empty($request->images)) {
            $validate['images'] =  'required|image|mimes:jpg,png,jpeg|max:5120'; // 5MB
        }

        if (isset($request->file_pdf_name) && !empty($request->file_pdf_name)) {
            $validate['file_pdf_name'] = 'required|mimes:pdf|max:5120'; // 5MB
            // csv,txt,xlx,xls,pdf
        }
        request()->validate($validate);

        // ค้นหา id และเก็บชื่อไฟล์รูปเดิมก่อนแก้ไข
        $blog = blog::find($request->id); 
        $fileName = $blog->images;

        #########################
        ##### UPLOADE FILE  #####
        ######################### 
        if($request->file('images')){
            if(!empty($request->file('images'))){
                $uploade_location = 'blogs/images/';
                
                // เช็คว่าชื่อไฟล์เก่ามีหรือไม่ ถ้ามีให้ลบไฟล์รูปเดิม
                if(isset($fileName) && !empty($fileName)){
                    @unlink($uploade_location.$fileName);
                }

                $file = $request->file('images');
                $file_gen = hexdec(uniqid());
                $file_ext = strtolower($file->getClientOriginalExtension()); 
                $fileName = $file_gen.'.'.$file_ext;
                $file->move($uploade_location, $fileName); 
            } 
        } 
        
        
        
        #############################
        ##### UPLOADE FILE  PDF #####
        ############################# 
        
        // ค้นหา id และเก็บชื่อไฟล์ pdf เดิมก่อนแก้ไข
        // $blog = blog::find($request->id); 
        $fileName_pdf = $blog->file_pdf_name;

        if($request->file('file_pdf_name')){
            if(!empty($request->file('file_pdf_name'))){
                $uploade_location_pdf = 'blogs/pdf/';  
                
                // เช็คว่าชื่อไฟล์เก่ามีหรือไม่ ถ้ามีให้ลบไฟล์รูปเดิม
                if(isset($fileName_pdf) && !empty($fileName_pdf)){
                    @unlink($uploade_location_pdf.$fileName_pdf);
                }

                $file_pdf = $request->file('file_pdf_name');
                $file_gen_pdf = hexdec(uniqid());
                $file_ext_pdf = strtolower($file_pdf->getClientOriginalExtension()); 
                $fileName_pdf = $file_gen_pdf.'.'.$file_ext_pdf;
                $file_pdf->move($uploade_location_pdf, $fileName_pdf); 
            } 
        } 
    // แก้ไขข้อมูล

    $blog = blog::find($request->id); 
    if(isset($blog)){
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $input['images'] = $fileName;
        $input['file_pdf_name'] = $fileName_pdf;
        $input['status']  = ($request->status==true)? true : false; 
        
        $blog->update($input);
        if($blog){
            return redirect()->route('blog.index')->with('success', 'แก้ไขข้อมูลสำเร็จ.');
        }  else {
            return back()->with('error', 'มีข้อผิดผลาด.');
        }
    }
        dd($request);
    }

######### ลบข้อมูล #############

    public function DeleteBlog(Request $request)
    {
        $blog = blog::find($request->id); 

        $fileName = $blog->images;
        $uploade_location = 'blogs/images/';
        if (isset($fileName) && !empty($fileName)) {
            @unlink($uploade_location . $fileName);
        }

        $fileName_pdf = $blog->file_pdf_name;
        $uploade_location_pdf = 'blogs/pdf/';
        // เช็คว่าชื่อไฟล์เก่ามีหรือไม่ ถ้ามีให้ลบไฟล์รูปเดิม
        if(isset($fileName_pdf) && !empty($fileName_pdf)){
            @unlink($uploade_location_pdf.$fileName_pdf);
        }

        $blog->delete();
        if($blog){
            return redirect()->route('blog.index')->with('success', 'ลบข้อมูลสำเร็จ.');
        }  else {
            return back()->with('error', 'มีข้อผิดผลาด.');
        }
    }

}
