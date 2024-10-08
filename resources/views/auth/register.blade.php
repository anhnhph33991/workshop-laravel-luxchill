@extends('client.layouts.master')
@section('title', 'Register')

@section('content')
<div class="page-header">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Register
                    </li>
                </ol>
            </div>
        </nav>

        <h1>Register</h1>
    </div>
</div>


<div class="container login-container">
    <div class="col-lg-12 mx-auto">
        <div class="d-flex justify-content-center align-items-center">
            <div style="width: 30%">
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div>
                        <label>
                            Name
                            <span class="required">*</span>
                        </label>
                        <input type="text" class="form-input form-wide" name="name" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="text-danger fst-italic">
                            <span class="required">*</span>
                            {{ $message }}
                        </div>
                        @enderror

                    </div>


                    <div>
                        <label for="register-email">
                            Email address
                            <span class="required">*</span>
                        </label>
                        <input type="email" name="email" class="form-input form-wide" id="register-email" value="{{ old('email') }}" required />
                        @error('email')
                        <div class="text-danger fst-italic">
                            <span class="required">*</span>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label for="register-password">
                            Password
                            <span class="required">*</span>
                        </label>
                        <input type="password" name="password" class="form-input form-wide" id="register-password" value="{{ old('password') }}" required />
                        @error('password')
                        <div class="text-danger fst-italic">
                            <span class="required">*</span>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-footer mb-2">
                        <button type="submit" class="btn btn-dark btn-md w-100 mr-0">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
