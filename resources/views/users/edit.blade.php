@extends('layouts.app')

@section('title', 'Page-Admin-Edit')

@section('content') 
<h1>แก้ไขรายชื่อผู้ใช้งาน</h1>
{{ $id }} <br>
{{-- {{ $name }} <br> --}}
<br>
<a href="{{ route('admin.index')}}">ย้อนกลับ</a>
@endsection

@push('scripts')


@endpush