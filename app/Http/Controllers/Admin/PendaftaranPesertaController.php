<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\NotifikasiAdmin;
use App\PesertaAcademy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PendaftaranPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pendaftaran Peserta Kelas';
        NotifikasiAdmin::where('url', 'admin/peserta')->update(['status' => '1']);
        $data_notifikasi = NotifikasiAdmin::where('status', '0')->orderBy('id', 'desc')->get();

        $peserta_academy = PesertaAcademy::where('bukti_transfer', '!=', null)->where('status', 'waiting')->orderBy('id', 'desc')->get();
        return view('admin.peserta-academy.index', compact(
            'title',
            'data_notifikasi',
            'peserta_academy'
        ));
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
        $peserta_academy = PesertaAcademy::findorfail($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'catatan' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $data = [
                'status' => $request->status,
                'catatan_verifikasi' => $request->catatan,
            ];
            $peserta_academy->update($data);
            return back()->with('toast_success', 'Berhasil disimpan.');
        }
    }
}
