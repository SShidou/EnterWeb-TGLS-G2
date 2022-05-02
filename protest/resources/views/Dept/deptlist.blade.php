@extends('layouts.app')
@section('content')
<h2>Department Management</h2>
<div style="text-align:center">
    <button class="btn-a4"><a href="{{ route('admin') }}">Manage User</a></button>
    <button class="btn-a4"><a href="{{ route('post.list') }}">Manage Post</a></button>
    <button class="btn-a4"><a href="#">Manage Comment</a></button>
    <button class="btn-a4"><a href="{{ route('cate.list') }}">Manage Post Tag</a></button><br><br>
    <button class="btn-a3">
        <a href="{{ route('register') }}">Add Department</a>
    </button>
</div>
<hr>
<div class="container-md" style="overflow-x:auto;">
    <div class="col-md-8">
        <table class="table table-hover table-dark" style="text-align: center;">
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
                    {{-- <!-- <td>
                        <a href="{{ __('/register/') }}{{ $users->id }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <a>
                            <form action="{{ route('user.delete', $users->id) }}" method="post" class="default">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-none"><i class="fa fa-trash"></i></button>
                            </form>
                        </a>
                    </td> --> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<style>
    hr {
        opacity: 0
    }
</style>
@endsection