@extends('client.layouts.master')
@section('title', 'Login')

@section('content')
<div class="page-header">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Login
                    </li>
                </ol>
            </div>
        </nav>

        <h1>Login</h1>
    </div>
</div>


<div class="container login-container">

    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="d-flex justify-content-center align-items-center">
                <div style="width: 30%">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-1">
                            <label for="login-email">
                                Email
                                <span class="required">*</span>
                            </label>
                            <input type="email" class="form-input form-wide" id="login-email" name="email" value="{{ old('email') }}" required />

                            @error('email')
                            <div class="text-danger fst-italic">
                                <span class="required">*</span>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div>
                            <label for="login-password">
                                Password
                                <span class="required">*</span>
                            </label>
                            <input type="password" class="form-input form-wide @error('password') is-invalid @enderror" id="login-password" name="password" value="{{ old('password') }}" required />

                            @error('password')
                            <div class="text-danger fst-italic">
                                <span class="required">*</span>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <h6 class="heading-middle-border left right">Or</h6>

                        <div class="d-flex justify-content-center">
                            <div class="gap-1">
                                <a href="#" class="btn btn-primary btn-md">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-md">
                                    <i class="fab fa-gofore"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-md">
                                    <i class="fab fa-github"></i>
                                </a>
                            </div>
                        </div>

                        <div class="form-footer">
                            <div class="custom-control custom-checkbox mb-0">
                                <input type="checkbox" name="remember" {{ old('remember ') ? 'checked' : '' }} class="custom-control-input" id="lost-password" />
                                <label class="custom-control-label mb-0" for="lost-password">Remember
                                    me</label>
                            </div>

                            <a href="{{ route('password.request') }}" class="forget-password text-dark form-footer-right">
                                Forgot Password?
                            </a>
                        </div>


                        <div class="mb-3">
                            <a href="{{ route('register') }}" class="text-black-50 fs-3">Register</a>
                        </div>

                        <button type="submit" class="btn btn-dark btn-md w-100">
                            LOGIN
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
