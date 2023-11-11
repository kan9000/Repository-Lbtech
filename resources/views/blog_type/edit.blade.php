@extends('layouts.adminLay')

@section('title', 'Page Blog Edit Index')

@section('content')
<div class="card">
    <div class="card-header">
        Page Blog Edit index
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('update.blogs.type') }}">
            @csrf
            <input type="hidden" name="id" value="{{ ($data->id)? $data->id : 0 }}">
            @include('blog_type.form')
        </form>
    </div>
</div>
@endsection

@push('scripts')
@endpush