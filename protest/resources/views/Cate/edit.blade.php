@extends('layouts.app')
@section('content')
<h1>Update Post Tag</h1>
<hr>
<form action="{{ __('/category/update/') }}{{ $category->id }}" enctype="multipart/form-data" method="post" class="form-alt">
    @csrf
    @method('PUT')
    <div>
        <input id="catename" type="text" class="form-control @error('catename') is-invalid @enderror" 
            placeholder="Tag name" name="catename" value="{{ old('catename') ?? $category->catename }}" required autocomplete="catename" autofocus>
        @error('catename')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div><br>
    @if(Auth()->user()->role == 1)
    <div>
        <label for="closure_date"><i class="fa fa-clock-o icon"></i> Closure date</label>
        <input id="closure_date" type="date" class="form-control @error('closure_date') is-invalid @enderror"
         name="closure_date" value="{{ old('closure_date') }}" required autocomplete="closure_date" autofocus>
        @error('closure_date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    @endif
    <br>
    <em>Still..Make it short, please!</em>
    <hr>
    <button type="submit" class="btn btn-info">
        {{ __('Edit') }}
    </button>
</form>
@endsection