@extends('layouts.app')
@section('content')
<h1>Add a new post</h1>
<hr>
<form action="{{ __('/post') }}" enctype="multipart/form-data" method="post" class="form-alt">
    @csrf
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
                No Name
            </option>
        </select>
    </div><br>

    <div>
        <label for="category"><i class="fa fa-tags icon"></i> {{ __('Category') }}</label><br>
        <select id="category_id" name="category_id" class="field" aria-label="Default select example">
            @php
            $now = Illuminate\Support\Carbon::now()->format('Y-m-d');
            @endphp
            @foreach(\App\Models\Category::all() as $category)
            @if($category->closure_date > $now)
            <option value="{{ $category->id }}">
                {{ $category->catename }} / Closure date: {{ $category->closure_date }}
            </option>
            @endif
            @endforeach
        </select>
    </div><br>

    <div class="row">
        <label for="content"><i class="fa fa-align-justify icon"></i> Post content</label>
        <input id="content" type="text" class="@error('content') is-invalid @enderror" placeholder="Post content" name="content" value="{{ old('content') }}" required autocomplete="content" autofocus>
        @error('content')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div><br>

    <div class="row">
        <label for="file"><i class="fa fa-folder icon"></i> Upload file?</label>
        <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" file>
        @error('file')
        <strong>{{ $errors->first('file') }}</strong>
        @enderror
    </div><br>
    <em>Uz...please check your content before publishing, be clear and concise for you and for the others<br>
        Note that, only your user name or anonymous are set as your post author!
    </em>
    <hr>
    <!-- @ include('views._modal') -->
    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Publish Post
    </button>
    <!-- Modal for Agreeing Terms & Conditions -->
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" 
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Oh hey, before publishing, read this <i class="fa fa-arrow-down"></i></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <h5>- By agreeing to our Terms & Services</h5>
                    <ol>> Be nice to other commentors or get banned!</ol>
                    <ol>> Please do not try to use violate words or files</ol>
                    <ol>> We would also like to have a copy of your post and document for backup-only purposes</ol>
                    <ol>> The Coordinator in relevant department may recheck your post later on</ol>
                <h5>- Any further details should be seen on our Terms and Conditions (full version) below or contact 
                    <a href="#" role="button" class="btn-a1 popover-test"
                        data-bs-content="admin1@test.com">this mail<a><br> <div style="text-align:center;">Enjoy!</div></h5>
                </div>
                <div class="modal-footer">
                    <div class="col-lg-2"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button></div>
                    <div class="col-lg-2"><button type="submit" class="btn btn-primary">Agreed</button></div>
                </div>
            </div>
        </div>
    </div>
</form>
<style>
    .modal-content {
        background: linear-gradient(0.4turn,lightblue, rgba(33, 199, 255, 0.7), rgba(135, 255, 20, 0.5));
    }
    .modal-header {
        background-color: rgba(240, 248, 255, 0.4);
        text-shadow: 1px 1px 2px;
        color: black;
    }
    h5 {
        color: MidnightBlue;
        text-align: left;
        font-weight: 500
    }
    ol {
        list-style-type: none;
        color: indigo;
        text-align: left;
        margin-left: 10px
    }
</style>
@endsection