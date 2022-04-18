@extends('layouts.app')
@section('content')
<h1>Post Commenting</h1>
@if(Auth::User()->id == $post->user_id)
<div style="text-align:center">
    <button class="btn-a4"><a href="{{ ('/post/edit/') }}{{ $post->id }}">Edit Your Post</a></button>
</div>
@endif
<br>
<div class="container">
    <div class="row g-3 p-5">
        <div class="col-md-4 offset-md-1 bg-alt">
            <div class="border border-2">
                <div class="d-flex comment-text">Published:<div style="color:blue;">{{ $post->created_at->diffForHumans() }}</div>/ by: <div style="color:green;">{{ $post->author }}</div>
                </div>
            </div>
            <medium class="col-md-4">Post content: <br> <small class="comment-text">{{ $post->content }}</small></medium>
            <div class="border border-2 p-3">
                <h4>Commenting...</h4>
                <div class="mb-3">
                    <form action="{{ route('comment.store', $post->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="writer">Author:</label>
                            <select id="writer" name="writer" class="field" aria-label="Default select example">
                                <option value="{{ __('anonymous') }}">No Name</option>
                                <option value="{{ Auth::user()->username }}">{{ Auth::user()->username }}</option>
                            </select>
                            <div class="pt-2">
                                <textarea name="comment" class="form-control" rows="3" autofocus></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Comment</button>
                    </form>
                </div>
            </div>
            <div class="pt-md-2">
                <div class="border border-3 p-md-2">
                    @php
                    $comment = \App\Models\Comment::where('post_id', $post->id)
                    ->orderBy('created_at', 'DESC')
                    ->paginate(3);
                    @endphp
                    <div class="d-flex justify-content-center pt-md-3">
                        @if($post->likeBy(auth()->user()))
                        <form action="{{ route('post.likes', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">Unlike</button>
                        </form>
                        @elseif($post->dislikeBy(auth()->user()))
                        <form action="{{ route('post.dislikes', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">Undislike</button>
                        </form>
                        @else
                        <form action="{{ route('post.likes', $post->id) }}" method="post" class="pe-md-2 pb-md-2">
                            @csrf
                            <button type="submit" class="btn btn-info"><i class="fa fa-thumbs-up"></i></button>
                        </form>
                        <form action="{{ route('post.dislikes', $post->id) }}" method="post" class="pe-md-2 pb-md-2">
                            @csrf
                            <button type="submit" class="btn btn-dark"><i class="fa fa-thumbs-down"></i></button>
                        </form>
                        @endif
                    </div>
                    <div class="d-flex">
                        <span class="p-md-2">{{ $post->comments->count() }} <i class="fa fa-commenting"></i></span>
                        <span class="p-md-2">{{ $post->likes->count() }} {{ Str::plural('likes', $post
                                -> likes->count()) }}</span>
                        <span class="p-md-2">{{ $post->dislikes->count() }} {{ Str::plural('dislikes', $post
                                -> dislikes->count()) }}</span>
                    </div>
                    <hr style="opacity: .2;">
                    @foreach($comment as $cmt)
                    <div class="border boder-2 p-md-1">
                        <p1 class="fw-bold"><a href="">{{ $cmt->writer }}</a></p1> <br>
                        <small class="comment-text">{{ $cmt->comment }}</small> <br>
                    </div>
                    @endforeach
                    <div class="col-12 d-flex justify-content-center">
                        <div class="ps-2">
                            {{ $comment->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 offset-md-1">
            <iframe src="/storage/{{ $post->file }}" alt="" height="600" class="w-100">
            </iframe>
        </div>
    </div>
</div>
<style>
    hr {
        opacity: 0
    }
    textarea {
        resize: vertical
    }

    .bg-alt {
        background: linear-gradient(aliceblue, lightgrey)
    }

    .icons i {
        font-size: 25px
    }

    .name {
        font-weight: 600
    }

    .comment-text {
        font-size: 12px;
        word-wrap: break-word
    }

    .status small {
        margin-right: 10px;
        color: blue
    }
</style>
@endsection