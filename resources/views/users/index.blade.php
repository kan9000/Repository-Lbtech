@extends('layouts.adminLay')

@section('title', 'Admin-index')

@section('content') 
       
    <h1> รายชื่อผู้ใช้งาน </h1>

    <a href="{{ route('users.add')}}"> เพิ่มข้อมูลผู้ใช้งาน </a>
    <br>
    
@endsection

@push('scripts')


@endpush