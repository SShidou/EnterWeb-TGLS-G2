@extends('layouts.app')
@section('content')
<h2>Department Management</h2>
<div style="text-align:center">
    <button class="btn-a4"><a href="{{ route('admin') }}">Manage User</a></button>
    <button class="btn-a4"><a href="{{ route('post.list') }}">Manage Post</a></button>
    <button class="btn-a4"><a href="#">Manage Comment</a></button>
    <button class="btn-a4"><a href="{{ route('cate.list') }}">Manage Post Tag</a></button><br><br>
    <button class="btn-a3">
        <a href="{{ route('dept.create') }}">Add Department</a>
    </button>
</div>
<hr>
<div class="container-md">
    <div class="col-md-6">
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        @if(Auth()->user()->role == 1 || Auth()->user()->role == 2)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Opt1</th>
                    <th>Opt2</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dept as $depts)
                <tr>
                    <td>{{ $depts->id }}</td>
                    <td>{{ $depts->deptname }}</td>
                    <td>
                        <a href="{{ __('/dept/edit/') }}{{ $depts->id }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <a>
                            <form action="{{ route('dept.delete', $depts->id) }}" method="post" class="default">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-none"><i class="fa fa-trash"></i></button>
                            </form>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>Not so fast, return to home now</p>
        @endif
    </div>
</div>
<style>
table, tr{
    border-collapse: collapse;
    border-style: double;
    border: 2px solid white;
    width: 90%;
    margin: auto;
    text-align: center
}
thead {
    background-color: blue
}
td{
    border: 2px solid lavender;
}
table tr:nth-child(even){
    background-color:rgba(167, 255, 164, 0.5);
}
table tr:nth-child(odd){
    background-color:rgba(173, 216, 230, 0.9);
}
tr:hover {
    background-color: rgba(177, 255, 249, 0.8);
}
hr {
    opacity: 0
}
</style>
@endsection