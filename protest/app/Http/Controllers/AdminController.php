<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(User $user){
        $users = User::Where('id', '<>', 1)->get();

        return view('Admin.index', [
            'user' => $users
        ]);
    }
    
    public function destroy(User $user, $id)
    {
        $user = User::find($id);
        if(Auth::User()->id == 1) {
            $data = User::where('id', $user->id);
            $data->delete();
            return redirect("/admin")->with('message', 'User Deleted');
        }
    }
}
