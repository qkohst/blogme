<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MateriSilabus;
use App\NotifikasiAdmin;
use App\VidioMateri;
use Illuminate\Http\Request;

class VidioMateriController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'judul_materi' => 'required|min:5|max:100',
            'tipe_pembaca' => 'required|in:Semua Orang,Member',
            'deskripsi_vidio' => 'required|min:10|max:255',
            'embed_vidio' => 'required|min:20'
        ]);

        // Add data to table materi_silabuses
        $materi = new MateriSilabus([
            'silabus_academy_id' => $id,
            'tipe_materi' => 2,
            'tipe_pembaca' => $request->tipe_pembaca,
            'judul_materi' => $request->judul_materi,
        ]);
        $materi->save();

        // Add data to table artikel_materies
        $vidio = new VidioMateri([
            'materi_silabus_id' => $materi->id,
            'deskripsi_vidio' => $request->deskripsi_vidio,
            'embed_vidio' => $request->embed_vidio,
        ]);
        $vidio->save();
        return redirect('admin/academy/' . $materi->silabus_academies->academies->id . '/silabus/' . $materi->silabus_academies->id)->with('toast_success', 'Berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $vidio)
    {
        $title = 'Detail Vidio';
        $title2 = 'Materi';
        $title3 = 'Detail Kelas';
        $title4 = 'Academy';
        $data_notifikasi = NotifikasiAdmin::where('status', '0')->orderBy('id', 'desc')->get();

        $materi = MateriSilabus::findorfail($vidio);
        return view('admin.academy.materi.show_vidio', compact(
            'title',
            'title2',
            'title3',
            'title4',
            'data_notifikasi',
            'materi',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $vidio)
    {
        $title = 'Edit Vidio';
        $title2 = 'Materi';
        $title3 = 'Detail Kelas';
        $title4 = 'Academy';
        $data_notifikasi = NotifikasiAdmin::where('status', '0')->orderBy('id', 'desc')->get();

        $materi = MateriSilabus::findorfail($vidio);
        return view('admin.academy.materi.edit_vidio', compact(
            'title',
            'title2',
            'title3',
            'title4',
            'data_notifikasi',
            'materi',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $vidio)
    {
        $request->validate([
            'tipe_pembaca' => 'required|in:Semua Orang,Member',
            'deskripsi_vidio' => 'required|min:10|max:255',
            'embed_vidio' => 'required|min:20'
        ]);
        $materi = MateriSilabus::findorfail($vidio);
        $vidio = VidioMateri::where('materi_silabus_id', $materi->id)->first();

        // Update Data Materi
        $data_materi = [
            'tipe_pembaca' => $request->tipe_pembaca,
        ];
        $materi->update($data_materi);
        // Update Data Artikel
        $data_vidio = [
            'deskripsi_vidio' => $request->deskripsi_vidio,
            'embed_vidio' => $request->embed_vidio,
        ];
        $vidio->update($data_vidio);

        return redirect('admin/academy/' . $materi->silabus_academies->academies->id . '/silabus/' . $materi->silabus_academies->id)->with('toast_success', 'Berhasil disimpan.');
    }
}
