@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    @guest

                    <h1>Home - Chưa đăng nhập</h1>

                    @else

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <a href="{{ route('admin.dashboard') }}" class="btn btn-success">{{ __('Dashboard') }}</a>

                    @endguest

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
