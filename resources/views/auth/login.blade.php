@extends('layouts.authLay')

@section('title', 'Page Login')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card">

            <div class="card-body">
                <div class="mb-2 text-center">
                    <img src="{{ asset('/favicon.jpg') }}" alt="" width="70">
                    <p class="mt-2"> คลังปัญญาวิทยาลัยเทคนิคลพบุรี </p>
                </div>
                @if(session("error"))
                <div class="alert alert-danger text-danger mt-2" role="alert">
                    <i class="icon-check"></i> {{session("error")}}
                </div>
                @endif
                <form method="POST" action="{{ route('check.login')}}">
                    @csrf 
                    <div class="row mb-2">

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="อีเมล">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-2">

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                            name="password" required autocomplete="current-password" placeholder="รหัสผ่าน">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('จดจำฉัน') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('เข้าสู่ระบบ') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection