<?php

namespace App\Http\Controllers\Member;

use App\BalasDiskusiMateri;
use App\Http\Controllers\Controller;
use App\NotifikasiMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalasDiskusiMateriController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'komentar' => 'required|min:10',
        ]);

        $balas_diskusi = new BalasDiskusiMateri([
            'user_id' => Auth::user()->id,
            'diskusi_materi_id' => $request->diskusi_id,
            'komentar' => $request->komentar,
            'status' => '0'
        ]);
        $balas_diskusi->save();

        // Notifikasi Ke User
        if (Auth::user()->id != $balas_diskusi->diskusi_materis->users->id) {
            $notifikasi = new NotifikasiMember([
                'from_user_id' => Auth::user()->id,
                'to_user_id' => $balas_diskusi->diskusi_materis->users->id,
                'judul' => 'Komentar baru pada diskusi anda',
                'url' => '/member/academy/class/' . $balas_diskusi->diskusi_materis->materi_silabuses->silabus_academies->academy_id . '/discussions/' . $balas_diskusi->diskusi_materis->id,
                'status' => '0'
            ]);
            $notifikasi->save();
        }
        return back()->with('toast_success', 'Berhasil disimpan.');

        // LANJUT KE LIKE BALAS KOMENTAR WITH AJAX
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
