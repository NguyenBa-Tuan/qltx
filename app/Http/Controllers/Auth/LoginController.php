<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (!Auth::check()) return view('auth.login');
        else return redirect()->back();
    }

    public function login(Request $request)
    {
        $check_login = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        if ($check_login) {
            if (Auth::user()->role == 0) return redirect()->route('brand.index');
            else return redirect()->route('index');
        } else return back()->with('error', 'Invalid User or Password!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function showRegisterForm()
    {
        if (!Auth::check()) return view('auth.register');
        else return redirect()->back();
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()) return redirect()->route('register')->withErrors($validator->errors());

        $auth = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => '1'
        ]);

        Auth::login($auth);
        return redirect()->route('index');
    }
}
