@extends('layouts.app')

@section('content')
<div class="w3-content" style="max-width:1400px">
    <header class="w3-container w3-center">
        <h1>Posting page</h1>
        <div class="w3-center">Hi user, what would you like to do? Total post: {{ $post->Total() }}</div><br>
        <button class="btn-a4"><a href="{{ route('create') }}">New post</a></button> |
        <button class="btn-a4"><a href="{{ route('post.list') }}">Edit or Delete post</a></button>
        @if(session()->has('message'))
        <br>
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
    </header>
    <div class="w3-row">
        <!-- Post entries -->
        <div class="w3-col l8 s12">
            <!-- Labels / tags -->
            <div class="w3-card w3-margin">
                <div class="w3-container bg-lightgrey">
                    <h4>Post Tag</h4>
                </div>
                <div class="w3-container w3-white">
                    <div><span class="w3-tag w3-black w3-margin-bottom">News</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">IT</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">BA</span>
                        <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Design</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Subject</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Gaming</span>
                    </div><!-- News, Design, IT, BA, Subjects, Programming, Others-->
                </div>
            </div>
            <hr>
            <!-- Left Post entry -->
            <div class="w3-card-4 w3-margin w3-white">
                <div class="w3-container">
                    <h5><b>Title description</b></h5>
                    <label>Tag: <span class="w3-tag">News</span>
                        <span class="w3-tag w3-light-grey w3-small">Programming</span></label><br>
                    <label class="w3-opacity"><i>58 mins ago, by</i> user</label>
                </div>
                <div class="w3-container">
                    <div>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod
                        placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non
                        congue ullam corper. Praesent tincidunt sed
                        tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non
                        fringilla.</div>
                    <hr>
                    <div></div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="w3-col m4">
                            <div><span>24 <i class="fa fa-eye"></i></span> |
                                <span>4 <i class="fa fa-thumbs-up"></i></span> / <span>2 <i class="fa fa-thumbs-o-down"></i></span> |
                                <span>3 <i class="fa fa-commenting"></i></span>
                            </div>
                        </div>
                        <div class="comment-input"> <input type="text" class="form-control" size="60" value="commenting...">
                            <div class="fonts"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="comments">
                        <div class="d-flex flex-row mb-2">
                            <span class="name">Daniel Frozer</span><br>
                            <small class="comment-text">I like this alot! thanks alot</small>
                            <div class="d-flex flex-row align-items-center status"> <small>0 Likes</small> <small>Reply</small>
                                <small>18 mins</small>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex flex-row mb-2">
                            <span class="name">Elizabeth goodmen</span><br>
                            <small class="comment-text">Thanks for sharing!</small>
                            <div class="d-flex flex-row align-items-center status"> <small>0 Likes</small> <small>Reply</small>
                                <small>8 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <hr>
    </div>
</div>
        <div class="container">

            @foreach($post as $posts)

            <div class="col-md-6 offset-md-3 border border-5 pt-2 pb-2">
                <div class="row pt-2">
                    <div class="col-md-8 offset-md-2">
                        <div class="d-flex">
                            <div>
                                <img src="https://bit.ly/3uomW1Q" alt="" class="rounded-circle" style="max-width: 50px">
                            </div>
                            <div class="d-flex">
                                <h3 class="text-danger fw-bold ps-2 pt-2">
                                    <a href="">
                                        <span class="text-danger">{{ $posts->author }}</span>
                                    </a>
                                </h3>
                                <p class="ps-3">{{ $posts->created_at->diffForHumans() }}</p>
                                {{-- <span>{{ $posts-> created_at }}</span>--}}
                            </div>
                        </div>
                        <div class="fst-italic d-flex">
                            <p>Category: {{ $posts->category->catename }}</p>
                        </div>
                        <div class="fs-5">
                            <p>{{ $posts->content }}</p>
                        </div>
                        <a href="{{ __('/post') }}/{{ $posts->id }}"><button class="btn btn-outline-warning"> Click to view all idea</button></a>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="pt-3">
                        {{ $post->links() }}
                    </div>
                </div>
            </div>

        </div>



        <style>
            hr {
                opacity: 0
            }
            .bg-lightgrey {
                background-color: lightgrey;
            }

            .ellipsis {
                color: #008080
            }

            .ellipsis i {
                margin-top: 3px;
                cursor: pointer
            }

            .icons i {
                font-size: 25px
            }

            .name {
                font-weight: 600
            }

            .comment-text {
                font-size: 12px
            }

            .status small {
                margin-right: 10px;
                color: blue
            }

            .comment-input {
                position: relative
            }

            .fonts {
                position: absolute;
                right: 13px;
                top: 8px;
                color: #008080
            }

            .form-control:focus {
                color: #495057;
                background-color: #fff;
                border-color: #8bbafe;
                outline: 0;
                box-shadow: none
            }
        </style>
        @endsection