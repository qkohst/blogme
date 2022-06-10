<?php

namespace App\Http\Controllers;

use App\NotifikasiMember;
use App\SertifikatPesertaAcademy;
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
        if ($sertifikat->status != 'approved') {

            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();

            $title2 = $sertifikat->peserta_academies->academies->nama_kelas;
            $title = 'Sertifikat Academy';
            return view('academy.sertifikat.not-generate', compact(
                'title',
                'title2',
                'data_notifikasi',
                'sertifikat',
            ));
        } else {
            // Page View Sertifikat 
            return back()->with('toast_success', 'Sertifikat sudah terbit.');
        }
    }
}
