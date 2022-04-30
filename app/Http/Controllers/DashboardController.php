<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        if (Auth::user()->role == 1) {
            return view('dashboard', compact(
                'title',
            ));
        } else {
            return redirect('/');
        }
    }
}
