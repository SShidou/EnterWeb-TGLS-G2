@extends('layouts.app')

@section('content')
<h1>Login</h1>
<form method="POST" action="{{ route('login') }}" class="form-alt">
    @csrf

    <div class="row">
        <label><i class="fa fa-envelope icon"></i> {{ __('Email Address') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <br>

    <div class="row">
        <label><i class="fa fa-lock icon"></i> {{ __('Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <br>

    <div class="form-check">
        <label class="form-check-label" for="remember">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>{{ __('Remember Me') }}
        </label>
    </div>
    <em>Oh hey, make sure not to violate our terms of service (below)</em>
    <hr>
    <button type="submit" class="btn btn-info">
        {{ __('Login') }}
    </button>
</form>
<style>
    body {
        background-image: url('https://mcdn.wallpapersafari.com/medium/2/87/l2ktwA.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }
</style>
@endsection