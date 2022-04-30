<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return back()->with('toast_error', 'Password incorrect.');
            } else {
                return redirect('dashboard')->with('toast_success', 'Login success.');
            }
        }
    }

    public function register_page()
    {
        $title = 'Register';
        return view('auth.register', compact(
            'title',
        ));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect('/');
    }
}
