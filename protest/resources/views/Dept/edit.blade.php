@extends('layouts.app')
@section('content')
<h1>Update Post Tag</h1>
<hr>
<form action="{{ __('/dept/update/') }}{{ $dept->id }}" enctype="multipart/form-data" method="post" class="form-alt">
    @csrf
    @method('PUT')    
    <br>
    @if(Auth()->user()->role == 1 || Auth()->user()->role == 2)
    <div>
        <input id="deptname" type="text" class="form-control @error('deptname') is-invalid @enderror" 
            placeholder="Department name" name="deptname" value="{{ old('deptname') ?? $dept->deptname }}" required autocomplete="deptname" autofocus>
        @error('deptname')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div><br>    
    @endif
    <em>Short one, please!</em>
    <hr>
    <button type="submit" class="btn btn-info">
        {{ __('Edit') }}
    </button>
</form>
@endsection