<?php

namespace App\Http\Controllers;

use App\NotifikasiAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        if (Auth::user()->role == 1) {
            $data_notifikasi = NotifikasiAdmin::where('status', '0')->orderBy('id', 'desc')->get();
            return view('dashboard', compact(
                'title',
                'data_notifikasi'
            ));
        } else {
            return redirect('/');
        }
    }
}
