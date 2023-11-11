@extends('layouts.appLay')

@section('title', 'Page-Admin-Create')

@section('content') 
  
  <div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="#">หน้าหลัก</a>
                    </li>
                    <li class="breadcrumb-item active"> ข้อมูลผู้ใช้งาน </li>
                </ol>
            </div>
            <h4 class="page-title"> ข้อมูลผู้ใช้งาน </h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4> ฟอร์มบันทึกข้อมูลผู้ใช้งาน </h4>

                @if(session('success'))
                <div class="alert alert-success text-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <form class="row" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6 form-group">
                        <label for="name">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control @error('name') parsley-error  @enderror" name="name" placeholder="ชื่อ-นามสกุล" value="{{ old('name') }}">
                        @error('name')
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required"> {{ $message }} </li>
                        </ul>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="email">อีเมล์</label>
                        <input type="email" class="form-control @error('email') parsley-error  @enderror" name="email" placeholder="อีเมล์" value="{{ old('email') }}">
                        @error('email')
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required"> {{ $message }} </li>
                        </ul>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="department_id">แผนก</label>
                        <select class="form-control @error('department_id') parsley-error  @enderror" name="department_id">
                            <option value="">เลือก</option>
                            @if(isset($department) && count($department)>0)
                            @foreach($department as $row)
                            <option (!empty(old('email')))? "selected" : "" value="{{ $row->id }}"> {{ $row->departments_name }} </option>
                            @endforeach
                            @endif
                        </select>
                        @error('department_id')
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required"> {{ $message }} </li>
                        </ul>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="password">รหัสผ่าน</label>
                        <input type="password" class="form-control @error('password') parsley-error  @enderror" name="password" placeholder="รหัสผ่าน" value="{{ old('password') }}">
                        @error('password')
                        <ul class="parsley-errors-list filled">
                            <li class="parsley-required"> {{ $message }} </li>
                        </ul>
                        @enderror
                    </div>

                    <div class="col-md-3" id="show-dis-images_name">
                        <div class="form-group">
                            <label>รูปแสดงผล </label> 
                            <div class="mt-2 img-file-upload-1">
                                <div class="box-image-no" style="background: #ddd;border-radius: 50%; width: 100px; height: 100px;"> </div>
                            </div> 
                            <div class="mt-1 mb-1"> Size image 690 × 690 px 2MB. </div>
                            <input id="images_name" type="file" class="@error('images_name') parsley-error @enderror" name="images_name" value="{{ old('images_name') }}" autocomplete="images_name" autofocus>
                            @error('images_name')
                            <ul class="parsley-errors-list filled">
                                <li class="parsley-required">{{ $message }}</li>
                            </ul>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')


@endpush
