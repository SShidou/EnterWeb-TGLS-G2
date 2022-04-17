@extends('layouts.app')
@section('content')
<h1>Update Post</h1>
<hr>
<form action="{{ __('/post/update/') }}{{ $post->id }}" enctype="multipart/form-data" method="post" class="form-alt">
    @csrf
    @method('PUT')
    @if(session('errors'))
    @foreach($errors as $error)
    <li>{{ $error }}</li>
    @endforeach
    @endif
    <div>
        <label for="author"><i class="fa fa-cog icon"></i> No Name Author?</label><br>
        <select id="author" name="author" class="field" aria-label="Default select example">
            <option value="{{ Auth::user()->username }}">
                {{ Auth::user()->username }}
            </option>
            <option value="{{ __('anonymous') }}">
                Anonymous
            </option>
        </select>
    </div><br>
    <div>
        <label for="category"><i class="fa fa-tags icon"></i> Select tag</label><br>
        <select id="category_id" name="category_id" class="field" aria-label="Default select example">
            @foreach(\App\Models\Category::all() as $category)
            <option value="{{ $category->id }}">
                {{ $category->catename }}
            </option>
            @endforeach
        </select>
    </div><br>
    <div class="row">
        <label for="content"><i class="fa fa-align-justify icon"></i> Post content</label>
        <input id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') ?? $post->content }}" required autocomplete="content" autofocus>
        @error('content')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div><br>
    <div class="row">
        <label for="file"><i class="fa fa-folder icon"></i> Change uploaded file?</label>
        <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" file>
        @error('file')
        <strong>{{ $errors->first('file') }}</strong>
        @enderror
    </div>
    <br>
    <em>Uz...please check your content before publishing, be clear and concise for you and for the others<br>
        Note that, only your user name or anonymous are set as your post author!
    </em>
    <hr>
    <button type="submit" class="btn btn-info">Update Post</button>
</form>
<style>
    hr {
        opacity: 0
    }
</style>
@endsection