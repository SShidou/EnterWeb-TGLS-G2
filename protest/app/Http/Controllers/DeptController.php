<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Carbon;

class DeptController extends Controller
{
    public function index(Department $dept){
        $dept = Department::all();
        return view('Dept.deptlist', compact('dept'));
    }
    public function create(Department $dept){
        return view('Dept.create');
    }
    
    public function store()
    {
        $data = request()->validate([
            'deptname' => 'required',
        ]);
        $date = Carbon::now();
        Department::Create([
            'deptname' => $data['deptname'],
        ]);
        return redirect()->route('deptlist');
    }

    public function edit(Department $dept)
    {
        return view('Dept.edit', compact('dept'));
    }

    public function update(Department $dept)
    {
        if(auth()->user()->role == 1 || auth()->user()->role == 2)
        {
            $data = request()->validate([
                'deptname' => 'required',
            ]);
            $dept -> Update([
                'deptname' => $data['deptname'],
            ]);
            return redirect()->route('deptlist');
        }
    }

    public function destroy($id)
    {
        $dept = Department::find($id);
        $delete = $dept->delete();

        if ($delete == 1) {
            return redirect('/dept/list')->with('message', 'Department Deleted');
        }
        else{
            return back()->with('message', 'You can not delete this');
        }
    }
}