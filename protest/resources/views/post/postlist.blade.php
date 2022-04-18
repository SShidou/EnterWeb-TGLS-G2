@extends('layouts.app')
@section('content')
<h1>Post Management</h1>
<div style="text-align:center">
    <button class="btn-a4"><a href="{{ route('admin') }}">Manage User</a></button>
    <button class="btn-a4"><a href="#">Manage Comment</a></button>
    <button class="btn-a4"><a href="{{ route('cate.list') }}">Manage Post Tag</a></button>
    <button class="btn-a4"><a href="#">Manage Department</a></button><br><br>
</div>
<div class="text-center">Note: click id to view idea</div>
<br>
<div class="container-md" style="overflow-x:auto;">
    <div class="col-md-12">
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        @if(Auth()->user()->role == 3)
        <table class="table table-hover table-dark" style="text-align: center;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tag</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th>File</th>
                    <th>Add date</th>
                    <th>Total liking</th>
                    <th>Cmt</th>
                </tr>
            </thead>
            <tbody>
                @foreach($post as $posts)
                <tr>
                    <td><a href="{{ __('/post') }}/{{ $posts->id }}" class="text-decoration-none">{{ $posts->id }}</a></td>
                    <td>{{ $posts->category->catename }}</td>
                    <td>{{ $posts->author }}</td>
                    <td>{{ $posts->content }}</td>
                    <td>{{ $posts->file }}</td>
                    <td>{{ $posts->created_at }}</td>
                    <td>
                        @php
                        $value = $posts->likes->count() + $posts->dislikes->count();
                        @endphp
                        {{ $value }}
                    </td>
                    <td>{{ $posts->comments->count() }}</td>
                </tr>
                @endforeach
        </table>
        <div class="row">
            <div class="col-12 d-flex justify-content-center pt-3">
                {{ $post->links() }}
            </div>
        </div>
    </div>
</div>
@else
        <table class="table table-hover table-dark" style="text-align: center;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tag</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th>File</th>
                    <th>Add date</th>
                    <th>Total liking</th>
                    <th>Cmt</th>
                    <th>Opt1</th>
                    <th>Opt2</th>
                </tr>
            </thead>
            <tbody>
                @foreach($post as $posts)
                <tr>
                    <td><a href="{{ __('/post') }}/{{ $posts->id }}" class="text-decoration-none">{{ $posts->id }}</a></td>
                    <td>{{ $posts->category->catename }}</td>
                    <td>{{ $posts->author }}</td>
                    <td>{{ $posts->content }}</td>
                    <td>{{ $posts->file }}</td>
                    <td>{{ $posts->created_at }}</td>
                    <td>
                        @php
                        $value = $posts->likes->count() + $posts->dislikes->count();
                        @endphp
                        {{ $value }}
                    </td>
                    <td>{{ $posts->comments->count() }}</td>
                    <td><a href="{{ ('/post/edit/') }}{{ $posts->id }}"><i class="fa fa-pencil"></i></a></td>
                    <td>
                        <form action="{{ route('post.delete', $posts->id) }}" method="post" class="default">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-none"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 d-flex justify-content-center pt-3">
                {{ $post->links() }}
            </div>
        </div>
    </div>
</div>
@endif
@endsection