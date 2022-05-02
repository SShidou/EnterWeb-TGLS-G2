@extends('layouts.app')
@section('content')
<h1>Add Department</h1>
<hr>
<form action="{{ __('/dept') }}" enctype="multipart/form-data" method="post" class="form-alt">
    @csrf
    <input id="deptname" type="text" class="form-control @error('deptname') is-invalid @enderror"
        placeholder="Department name" name="deptname" value="{{ old('deptname') }}" required autocomplete="deptname" autofocus>
    @error('deptname')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <br>
    <em>Oh need a new department? Make sure everyone agreed for that!</em>
    <hr>
    <button type="submit" class="btn btn-info">
        {{ __('Create') }}
    </button>
</form>
@endsection