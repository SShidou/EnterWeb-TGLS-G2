@extends('layouts.app')
@section('content')
<h2>Post Tag Management</h2>
<div style="text-align:center">
    <button class="btn-a4"><a href="{{ route('post.list') }}">Manage Post</a></button>
    <button class="btn-a4"><a href="#">Manage Comment</a></button>
    <button class="btn-a4"><a href="{{ route('admin') }}">Manage User</a></button>
    <button class="btn-a4"><a href="#">Manage Department</a></button>
    <br><br>
    <button class="btn-a3">
        <a href="{{ route('cate.create') }}">New Post Tag</a>
    </button>
</div>
<hr>
<div class="container-md" style="overflow-x:auto;">
    <div class="col-md-12">
@if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
@if(Auth()->user()->role == 4)
<p>Note so fast, return to home now</p>
@elseif(Auth()->user()->role == 3)      
        <table id="table table-hover table-dark" style="text-align: center;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tag name</th>
                    <th>Closure date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $categories)
                <tr>
                    <td>{{ $categories->id }}</td>
                    <td>{{ $categories->catename }}</td>
                    <td>{{ $categories->closure_date }}</td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <table id="table table-hover table-dark" style="text-align: center;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tag name</th>
                    <th>Closure date</th>
                    <th>Opt1</th>
                    <th>Opt2</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $categories)
                <tr>
                    <td>{{ $categories->id }}</td>
                    <td>{{ $categories->catename }}</td>
                    <td>{{ $categories->closure_date }}</td>
                    <td><a href="{{ ('/category/edit/') }}{{ $categories->id }}"><i class="fa fa-pencil"></i></a></td>
                    <td>
                        <form action="{{ route('cate.deleted', $categories->id) }}" method="post" class="default">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-none"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
<style>
table, tr{
    border-collapse:collapse;
    border-style: double;
    border: 2px solid wheat;
    width: 95%;
    margin-left:auto;
    margin-right:auto;
    text-align: center
}
thead {
    background-color:white;
}
td{
    border: 2px solid lavender;
}
table tr:nth-child(odd){
    background-color:rgba(167, 255, 164, 0.5);
}
table tr:nth-child(even){
    background-color:rgba(173, 216, 230, 0.9);
}
tr:hover {
    background-color: rgba(177, 255, 249, 0.8);
}
tr:nth-child(1){
    background-color:skyblue;
}
hr {
    opacity: 0
}
</style>
@endsection