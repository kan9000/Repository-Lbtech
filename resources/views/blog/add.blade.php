@extends('layouts.adminLay')

@section('title', 'Blog-Add')

@section('content') 
    <div class="card">
        <div class="card-header">
            Page Blog Add
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('save.blog') }}" enctype="multipart/form-data">
                @csrf
                @include('blog.form')
                <div class="col-md-12 text-right"> 
                    <hr>
                    <button type="submit" class="btn btn-primary waves-effect width-md waves-light"> บันทึกข้อมูล </button>
                </div>
            </form>
        </div>
    </div>
     
    
@endsection

@push('scripts')
<script>
    $(document).on('change', '#images', function(event) {
        html = '<div class="box-image-no" style="background: #ddd;border-radius: 50%; width: 100px; height: 100px;"> </div>';
        $('.img-file-upload-1').html(html);
        var Images = $('#images');
        if (Images[0].files[0]) {
            url = window.URL.createObjectURL(Images[0].files[0]);
            html = '<div class="box-image-no" style="background: url(' + url + '); background-size: cover; background-position: center;border-radius: 50%; width: 100px; height: 100px;"> </div>';
        }
        $('.img-file-upload-1').html(html);
    });
</script>
@endpush
