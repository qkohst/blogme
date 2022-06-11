<?php

namespace App\Http\Controllers;

use App\NotifikasiMember;
use App\SertifikatPesertaAcademy;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SertifikatAcademyController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sertifikat = SertifikatPesertaAcademy::where('peserta_academy_id', $id)->first();
        // Update Notifikasi
        $notifikasi = NotifikasiMember::where('url', '/file-sertifikat' . '/' . $sertifikat->peserta_academy_id)->where('status', '0')->orderBy('id', 'desc')->first();
        if (!is_null($notifikasi)) {
            $notifikasi->update([
                'status' => '1',
            ]);
        }
        
        if ($sertifikat->status != 'approved') {
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();
            $title2 = $sertifikat->peserta_academies->academies->nama_kelas;
            $title = 'Sertifikat Academy';
            return view('academy.sertifikat.not-approved', compact(
                'title',
                'title2',
                'data_notifikasi',
                'sertifikat',
            ));
        } else {
            return redirect('/file-sertifikat/1654957925.pdf');
        }
    }
}
