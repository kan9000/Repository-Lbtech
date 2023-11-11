<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>คลังปัญญา- @yield('title')</title>
  <!-- shortcut icon -->
  <link rel="icon" href="{{ asset('favicon.jpg') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('favicon.jpg') }}" type="image/x-icon">

  <!-- App css -->
  <link href="{{ asset('template/Admin/vertical/dist/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
  <link href="{{ asset('template/Admin/vertical/dist/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('template/Admin/vertical/dist/assets/css/app.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />
  <link href="{{ asset('template/Admin/vertical/dist/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

  <style>
    #wrapper {
        overflow: auto;
    }
</style>
</head>

<body> 

  <div id="wrapper">
    <div class="navbar-custom">
        @guest
        @else
        <ul class="list-unstyled topnav-menu float-right mb-0 d-flex align-items-center">

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light d-flex justify-content-center align-items-center" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    @if(isset(Auth::user()->images_name) && !empty(Auth::user()->images_name))
                    <div class="rounded-circle" style="background: url({{ asset('/images/salesperson').'/'.Auth::user()->images_name }}); 
                    width: 32px; height: 32px;background-size: cover; background-position: center;"> </div>
                    @endif
                    <span class="pro-user-name ml-1">
                        {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0"> ยินดีต้อนรับเข้าสู่ระบบ </h6>
                    </div>

                    <div class="dropdown-divider"></div>
                    
                    <a href="#" class="dropdown-item notify-item" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <i class="fe-log-out"></i>
                        <span>ออกจากระบบ</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        @endguest

        <div class="logo-box d-flex align-items-center justify-content-center">
            <a href="#" class="logo text-center">
                <span class="logo-lg">
                    <img src="{{ asset('favicon.jpg') }}" height="40">
                </span>
                <span class="logo-sm">
                    <img class="rounded-circle" src="{{ asset('favicon.jpg') }}" width="40" height="40">
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>
        </ul>
    </div>

    <div class="left-side-menu">
        <div class="slimscroll-menu">
            <div id="sidebar-menu">
                <ul class="metismenu" id="side-menu">
                    <li class="menu-title"> เมนู</li>
                    <li>
                      <a href="">
                        <i class="fe-users"></i>
                        <span> จัดการผู้ใช้งาน </span>
                    </a>
                    </li>
                    <li>
                        <a href="{{ route('blogs.type.index')}}">
                          <i class="fe-users"></i>
                          <span> จัดการประเภท Blog</span>
                      </a>
                      </li>
                    <li>
                      <a href="{{ route('blog.index')}}">
                        <i class="fe-users"></i>
                        <span> จัดการ Blog</span>
                    </a>
                    </li>
                    
          
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="content-page">
        <div class="content">
            @if(session("success"))
                <div class="alert alert-success text-success mt-2" role="alert" style="background: #ecffeb;">
                    <i class="icon-check"></i> {{session("success")}}
                </div>
                @endif
                @if(session("error"))
                <div class="alert alert-danger text-danger mt-2" role="alert">
                    <i class="icon-check"></i> {{session("error")}}
                </div>
                @endif
            @yield('content')
        </div>
        <footer class="footer">
            <div class="row">
                <div class="col-md-12">
                    {{ date('Y')}} &copy; {{ config('app.name', 'Project Name') }}
                </div>
            </div>
        </footer>
    </div> 
</div>

  <script src="{{ asset('template/Admin/vertical/dist/assets/js/vendor.min.js') }}"></script>
  <script src="{{ asset('template/Admin/vertical/dist/assets/js/app.min.js') }}"></script>
  @stack('scripts')
  {{-- ใช้ confirm การลบ --}}
  <script>
    $(".delete-confirm").click(function() {
        if (!confirm("ยืนยันการลบข้อมูลหรือไม : การลบข้อมูลจะไม่สามารถนำข้อมูลกลับได้ !")) {
            return false;
        }
    });
</script>

</body>

</html>