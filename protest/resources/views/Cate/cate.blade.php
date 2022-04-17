@extends('layouts.app')
@section('content')
<h1>Add Post Tag</h1>
<hr>
<form action="{{ __('/category') }}" enctype="multipart/form-data" method="post" class="form-alt">
    @csrf
    <input id="catename" type="text" class="form-control @error('catename') is-invalid @enderror"
        placeholder="Tag name" name="catename" value="{{ old('catename') }}" required autocomplete="catename" autofocus>
    @error('catename')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <br>
    <em>Make it short, please!</em>
    <hr>
    <button type="submit" class="btn btn-info">
        {{ __('Create') }}
    </button>
</form>
@endsection