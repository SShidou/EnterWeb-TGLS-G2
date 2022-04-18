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
                    <div><span class="w3-tag w3-margin-bottom">News</span>
                        <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">IT</span>
                        <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">BA</span>
                        <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">GD</span>
                        <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Other</span>
                        <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Academic</span>
                        <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Test1</span>
                    </div><!-- News, Design, IT, BA, Subjects, Programming, Others-->
                </div>
            </div>
            <hr>
            <!-- Left Post entry - Post example -->
            <div class="w3-card-4 w3-margin w3-white">
                <img src="https://www.w3schools.com/w3images/woods.jpg" alt="Nature" style="width:100%">
                <div class="w3-container">
                    <h5><b>PYTHON 3.10.2 RELEASED (Post example)</b></h5>
                    <label>Tag: <span class="w3-tag">News</span>
                        <span class="w3-tag w3-light-grey w3-small">Programming</span></label><br>
                    <span class="w3-opacity"><i>8 hours ago, by</i> user</span>
                </div>

                <div class="w3-container">
                    <h6>New Python update version 3.10.2 is now officially on services</h6>
                    <h6>Look like P.G.Salgado has provided us a new python update, the changing feature highlights include:</h6>
                    <li>Parenthesized context managers - support and simplized 'context managers'</li>
                    <li>Better error messages - including 'SyntaxError', 'IndentationErrors', printing 'AttributeErrors',
                        'NameErrors',</li>
                    <li>Structural Pattern Matching - 'match' and 'case' statements</li>
                    <li>Optional EncodingWarning and encoding="locale" option</li>
                    <li>New Features Related to Type Hints - 'typing' module changing</li>
                    <li>Removed special methods might raise TypeError</li>
                    <li>Changes in the Python API</li>
                    <a href="https://docs.python.org/3.10/whatsnew/3.10.html">Official information & Full changelog</a></br>
                    <a href="https://docs.python.org/3.10/whatsnew/changelog.html#changelog">Python 3.10 vs 3.9</a>
                    <div class="w3-row">
                        <div class="w3-row">
                            <div class="w3-col m8 s12">
                                <button class="btn1">READ MORE »</button>
                            </div>
                            <div class="w3-col m4">
                                <div class="w3-padding w3-right"><span>24 <i class="fa fa-eye"></i></span> |
                                    <span>4 <i class="fa fa-thumbs-up"></i></span> | <span>3 <i class="fa fa-commenting"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Left Post entry - Real Post - Latest Post -->
            @foreach($post as $posts)
            <div class="w3-card-4 w3-margin w3-white">
                <!-- <iframe src="" alt="" style="width:100%"></iframe> -->
                <div class="w3-container">
                    <br>
                    <label>Tag: <span class="w3-tag">News</span>
                        <span class="w3-tag w3-light-grey w3-small">Category: {{ $posts->category->catename }}</span></label><br>
                    <span class="w3-opacity"><i>{{ $posts->created_at->diffForHumans() }}, by </i> {{ $posts->author }}</span>
                </div>
                <div class="w3-container">
                    <h6>{{ $posts->content }}</h6>
                    <div class="w3-row">
                        <div class="w3-row">
                            <div class="w3-col m8 s12">
                                <a href="{{ __('/post') }}/{{ $posts->id }}"><button class="btn-a2">View this post »</button></a>
                            </div>
                            <div class="w3-col m4">
                                <div class="w3-padding w3-right"><span>? <i class="fa fa-eye"></i></span> |
                                    <span>{{ $posts->likes->count() }} <i class="fa fa-thumbs-up"></i></span> |
                                    <span>{{ $posts->comments->count() }} <i class="fa fa-commenting"></i></span>
                                </div>
                            </div>
                        </div>
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
            <hr>
            <!-- End Post -->
        </div>
        <!-- Right Post entry -->
        <div class="w3-col l4">
            <!--Most Popular Ideas, Most Viewed, Latest Ideas and Comments-->
            <div class="w3-card w3-margin">
                <div class="w3-container bg-lightgrey">
                    <h4>Most Viewed Posts (under construction)</h4>
                </div>
                {{-- <!-- @php
                $cmt = \App\Models\Comment::where('user_id', $cmt->user_id)
                ->orderBy('created_at', 'DESC')
                ->paginate(3);
                @endphp
                @foreach($cmt as $cmts)
                <ul class="w3-ul w3-hoverable w3-white">
                    <li class="w3-padding-16">
                        <span class="w3-large">{{ $cmts->writer }}</span> |
                        <span>? <i class="fa fa-eye"></i></span><br>
                        <span class="w3-small">{{ $cmts->comment }}</span>
                    </li>
                </ul>
                @endforeach --> --}}
                <ul class="w3-ul w3-hoverable w3-white">
                    <li class="w3-padding-16">
                        <img src="#" alt="" class="w3-left w3-margin-right" style="width:40px">
                        <span class="w3-large">author</span>|
                        <span>? <i class="fa fa-eye"></i></span><br>
                        <span class="w3-small">Post Title</span>
                    </li>
                    <li class="w3-padding-16">
                        <span class="w3-large">author</span> |
                        <span>? <i class="fa fa-eye"></i></span><br>
                        <span class="w3-small">Post Title</span>
                    </li>
                </ul>
            </div>
            <hr>
        </div>
        <hr>
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