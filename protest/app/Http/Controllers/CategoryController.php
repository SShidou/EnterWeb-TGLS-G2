<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function index(Category $category){
        $category = Category::all();
        return view('Cate.catelist', compact('category'));
    }
    public function create(Category $category){
        return view('Cate.cate');
    }
    public function store()
    {
        $data = request()->validate([
            'catename' => 'required',
        ]);
        $date = Carbon::tomorrow();
        Category::Create([
            'catename' => $data['catename'],
            'closure_date' => $date,
        ]);
        return redirect()->route('cate.list');
    }
    // cmt edit [4]
    public function update(Category $category)
    {
        if(auth()->user()->role == 1)
        {
            $data = request()->validate([
                'catename' => 'required',
                'closure_date' => 'required',
            ]);
            $cdate = $data['closure_date'];
            $date = Carbon::createFromFormat('Y-m-d', $cdate);
            $category -> Update([
                'catename' => $data['catename'],
                'closure_date' => $date,
            ]);
            return redirect()->route('cate.list');
        }
        elseif(auth()->user()->role == 2)
        {
            $data = request()->validate([
                'catename' => 'required',
            ]);
            $category -> Update([
                'catename' => $data['catename']
            ]);
            return redirect()->route('cate.list');
        }
    }

    public function destroy($id)
    {
        $cate = Category::find($id);
        $delete = $cate->delete();

        if ($delete == 1) {
            return redirect('/category/list')->with('message', 'Category Deleted');
        }
        else{
            return back()->with('message', 'You can not delete this');
        }
    }

    public function edit(Category $category)
    {
            return view('Cate.edit',    compact('category'));
    }



}
