<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
Use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $users = User::all();
        return view('auth.login', compact(['users']));
    }

    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('nip', 'password', 'role'))) {
            return view('role.dashboard');
        }
        return redirect('/login');
    }
}
