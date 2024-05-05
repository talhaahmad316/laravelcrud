<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function registerpage()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('loginpage');
    }
    public function loginpage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (Auth::attempt($credentials,$remember)) {

            // Remmber me setting cookies
        if ($request->remember) {
            setcookie('email', $credentials['email'], time() + 60 * 60 * 24 * 365);
            setcookie('password', $credentials['password'], time() + 60 * 60 * 24 * 365);
        } else {
            setcookie('email', $credentials['email'], time() - 3600);
            setcookie('password', $credentials['password'], time() - 3600);
        }

            return redirect()->route('student.index');
        }
        
        return redirect()->route('loginpage');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('loginpage');
    }
}
