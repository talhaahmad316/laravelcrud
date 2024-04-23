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
        $data = $request->all();
        $remember = $request->has('remember');

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withDelete('User not found!');
        }
        // Remmber me setting cookies
        if (isset($data['remember']) && !empty($data['remember'])) {
            setcookie('email', $data['email'], time() + 3600);
            setcookie('password', $data['password'], time() + 3600);
        } else {
            setcookie('email', '');
            setcookie('password', '');
        }

        Auth::login($user);

        return redirect()->route('student.index');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('loginpage');
    }
}
