<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\PesertaAcademy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = request('pages');
        if ($pages == 'waiting') {
            $title = 'Menunggu Pembayaran';
            $pesanan_kelas = PesertaAcademy::where('users_id', Auth::user()->id)->where('status', 'waiting')->orderBy('id', 'desc')->get();
            return view('member.orders.waiting', compact(
                'title',
                'pesanan_kelas'
            ));
        } elseif ($pages == 'rejected') {
            $title = 'Dibatalkan';
            return view('member.orders.rejected', compact(
                'title',
            ));
        } elseif ($pages == 'paid') {
            $title = 'Sudah bayar';
            return view('member.orders.paid', compact(
                'title',
            ));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
