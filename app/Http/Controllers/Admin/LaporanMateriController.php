<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\LaporanMateri;
use App\MateriSilabus;
use App\NotifikasiAdmin;
use Illuminate\Http\Request;

class LaporanMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Laporan Materi';
        $data_notifikasi = NotifikasiAdmin::where('status', '0')->orderBy('id', 'desc')->get();
        $data_laporan_materi = LaporanMateri::orderBy('status', 'desc')->orderBy('id', 'desc')->get();
        return view('admin.laporan-materi.index', compact(
            'title',
            'data_notifikasi',
            'data_laporan_materi'
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Laporan';
        $title2 = 'Laporan Materi';
        $laporan = LaporanMateri::findorfail($id);
        $status = [
            'status' => '1'
        ];
        $laporan->update($status);

        NotifikasiAdmin::where('url', '/admin/laporan-materi/' . $id)->update(['status' => '1']);
        $data_notifikasi = NotifikasiAdmin::where('status', '0')->orderBy('id', 'desc')->get();
        return view('admin.laporan-materi.show', compact(
            'title',
            'title2',
            'data_notifikasi',
            'laporan',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laporan = LaporanMateri::findorfail($id);
        $materi = MateriSilabus::findorfail($laporan->materi_silabus_id);

        if ($materi->tipe_materi == 1) {
            return redirect('/admin/silabus/' . $materi->silabus_academy_id . '/artikel' . '/' . $materi->id);
        } elseif ($materi->tipe_materi == 2) {
            return redirect('/admin/silabus/' . $materi->silabus_academy_id . '/vidio' . '/' . $materi->id);
        } elseif ($materi->tipe_materi == 3) {
            return redirect('/admin/silabus/' . $materi->silabus_academy_id . '/kuis' . '/' . $materi->id);
        } elseif ($materi->tipe_materi == 4) {
            return redirect('/admin/silabus/' . $materi->silabus_academy_id . '/submission' . '/' . $materi->id);
        }
    }
}
