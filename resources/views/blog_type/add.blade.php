@extends('layouts.adminLay')

@section('title', 'Page Blog Create Index')

@section('content')
<div class="card">
    <div class="card-header">
        Page Blog Create index
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('save.blogs.type') }}">
            @csrf
            @include('blog_type.form')
        </form>
    </div>
</div>
@endsection

@push('scripts')
@endpush