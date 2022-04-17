@extends('layouts.app')

@section('content')
<h1>Create User</h1>
<form method="POST" action="{{ route('register') }}" class="form-alt">
    @csrf

    <div class="row">
        <!-- <i class="fa fa-user icon"></i> -->
        <input id="name" type="text" class="@error('name') is-invalid @enderror"
         placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div><br>

    <div class="row">
        <input id="name" type="text" class="@error('username') is-invalid @enderror"
         placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
        @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div><br>

    <div class="row">
        <input id="phonenumber" type="text" class="@error('phonenumber') is-invalid @enderror"
         placeholder="Phone No." name="phonenumber" value="{{ old('phonenumber') }}" required autocomplete="phonenumber" autofocus>
        @error('phonenumber')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div><br> <!--change to dept -->

    <div class="row">
        <!-- <i class="fa fa-envelope icon"></i> -->
        <input id="email" type="email" class="@error('email') is-invalid @enderror"
         placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div><br>

    <div class="row">
        <!-- <i class="fa fa-lock icon"></i> -->
        <input id="password" type="password" class="@error('password') is-invalid @enderror"
         placeholder="Password" name="password" required autocomplete="new-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div><br>
    <div class="row">
        <!-- <i class="fa fa-chain icon"></i> -->
        <input id="password-confirm" type="password" class="form-control"
         placeholder="Retype password" name="password_confirmation" required autocomplete="new-password">
    </div><br>
    <div>
        <select id="role" name="role" class="field" aria-label="Default select example">
            <option selected>Select a Role</option>
            <option value="1">Admin</option>
            <option value="2">QA Manager</option>
            <option value="3">QA Coordinator</option>
            <option value="4">Staff</option>
        </select>
        @error('role')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <br>
    <em>Oh hey, make sure not to violate our terms of service (below)</em>
    <hr>
    <button type="submit" class="btn btn-info">
        {{ __('Register') }}
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