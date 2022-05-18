<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_page()
    {
        $title = 'Login';
        return view('auth.login', compact(
            'title',
        ));
    }

    public function login_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns|exists:users',
            'password' => 'required|min:6',
        ]);
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return back()->with('toast_error', 'Password salah.');
        } else {
            return redirect('dashboard')->with('toast_success', 'Login success.');
        }
    }

    public function register_page()
    {
        $title = 'Register';
        return view('auth.register', compact(
            'title',
        ));
    }

    public function register_post(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:20',
            'confirm_password' => 'required|same:password',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 2,
            'avatar' => 'default.png'
        ]);
        $user->save();
        return redirect('login')->with('toast_success', 'Registrasi berhasil, silahkan Login !');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect('/');
    }
}
