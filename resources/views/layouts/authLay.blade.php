<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>คลังปัญญา - @yield('title')</title>

    <!-- shortcut icon -->
    <link rel="icon" href="{{ asset('favicon.jpg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('favicon.jpg') }}" type="image/x-icon">

    <!-- App css --> 
    <link href="{{ asset('template/Admin/vertical/dist/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{ asset('template/Admin/vertical/dist/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/Admin/vertical/dist/assets/css/app.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />
    
</head>

<body>

    <body>
        <main>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
        </main>
        <script src="{{ asset('template/Admin/vertical/dist/assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('template/Admin/vertical/dist/assets/js/app.min.js') }}"></script>
    </body>
    <script>  
    </script> 
</html>