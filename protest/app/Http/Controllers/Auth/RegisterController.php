<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:30'],
            'username' => ['required', 'string', 'max:30'],
            'role' => ['required', 'integer', 'max:255'],
            'phonenumber'=> ['required', 'string', 'min:8', 'max:14'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'confirmed'],
            // 'dept' => ['required', 'string', 'max:30'],
        ]);

        User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'role' => $data['role'],
            'phonenumber' => $data['phonenumber'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // 'dept' => $data['dept'],
        ]);

        return redirect() -> route('admin');
    }

    public function edit(User $user)
    {
        if(auth()->user()->role == 1){
            return view('Admin.edit', compact('user'));
        }
        else {
            $this -> authorize('update', $user->profile);
            return view('Admin.edit', compact('user'));
        }
    }

    public function update(User $user)
    {
        if(auth()->user()->role == 1) {
            $data = request() -> validate ([
                'name' => ['required', 'string', 'max:30'],
                'role' => [ 'required' ,'integer', 'max:255'],
                'phonenumber'=> ['required', 'string', 'min:8', 'max:14'],
                // 'dept' => ['required', 'string', 'max:30'],
            ]);

            $user-> update($data);
            return redirect() -> route('admin');
        }
        else {
            $data = request() -> validate ([
                'name' => ['required', 'string', 'max:30'],
                'username' => ['required' ,'string', 'max:30'],
                'phonenumber'=> ['required', 'string', 'min:8', 'max:14'],
                'email' => ['required', 'string', 'email', 'max:50'],
                // 'dept' => ['required', 'string', 'max:30'],
            ]);

            $user-> update($data);
            return redirect('/home');
        }
    }

    public function destroy(User $user,Request $request)
    {
        $request->user()->where('id', $user->id)->delete();
        return back();
    }
}
