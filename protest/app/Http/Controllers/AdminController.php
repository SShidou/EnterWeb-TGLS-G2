<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(User $user){
        $users = User::Where('id', '<>', 1)->get();

        return view('Admin.index', [
            'user' => $users
        ]);
    }
}
