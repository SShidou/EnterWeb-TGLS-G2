@extends('layouts.app')
@section('content')
<h1>Change My Details</h1>
<br>
<form action="/profile/{{ $user->id }}/update" enctype="multipart/form-data" method="post" class="form-alt">
    @csrf
    @method('PUT')
    <div class="row">
        <label for="titles">Username</label>
        <input id="titles" type="text" class="form-control @error('titles') is-invalid @enderror" name="titles" value="{{ old('titles') ?? $user->profile->titles }}" required autocomplete="titles" autofocus>
        @error('titles')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div><br>
    <div class="row">
        <label for="description">Description</label>
        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}" required autocomplete="description" autofocus>
        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <hr>
    <button type="submit" class="btn btn-success">Save changes</button>
</form>
@endsection