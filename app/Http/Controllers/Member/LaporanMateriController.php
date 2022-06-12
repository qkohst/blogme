<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\LaporanMateri;
use App\MateriSilabus;
use App\NotifikasiAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LaporanMateriController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'materi_silabus_id' => 'required',
            'tipe' => 'required|in:1,2',
            'deskripsi' => 'required|min:15',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $laporan = new LaporanMateri([
                'user_id' => Auth::user()->id,
                'materi_silabus_id' => $request->materi_silabus_id,
                'tipe' => $request->tipe,
                'deskripsi' => $request->deskripsi,
                'status' => '0',
            ]);
            $laporan->save();

            // Add Notifikasi
            $notifikasi = new NotifikasiAdmin([
                'user_id' => Auth::user()->id,
                'judul' => 'Laporan Materi Baru',
                'url' => '/admin/laporan-materi/' . $laporan->id,
                'status' => '0',
            ]);
            $notifikasi->save();

            return back()->with('toast_success', 'Berhasil dikirim.');
        }
    }
}
