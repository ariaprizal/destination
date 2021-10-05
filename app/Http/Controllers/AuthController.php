<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }


    public function register()
    {
        return view('auth.register');
    }


    public function store(Request $request)
    {
        // dd($request);
        $validate = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => 'required | confirmed | min:6'
        ]);

        $validate['password'] = bcrypt($request->password);

        User::create($validate);

        return redirect('profile')->with('message', 'Account Was Created');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $remember_me = $request->has('remember') ? true : false;

        
        if (Auth::attempt($credentials, $remember_me)) {
            $request->session()->regenerate();
            return redirect()->intended('profile');
        }

        return back()->with('error', 'Login Failed');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}


