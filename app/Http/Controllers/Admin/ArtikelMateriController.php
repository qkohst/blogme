<?php

namespace App\Http\Controllers\Admin;

use App\ArtikelMateri;
use App\Http\Controllers\Controller;
use App\MateriSilabus;
use App\NotifikasiAdmin;
use Illuminate\Http\Request;

class ArtikelMateriController extends Controller
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
            'isi_materi' => 'required|min:50',
        ]);

        // Add data to table materi_silabuses
        $materi = new MateriSilabus([
            'silabus_academy_id' => $id,
            'tipe_materi' => 1,
            'tipe_pembaca' => $request->tipe_pembaca,
            'judul_materi' => $request->judul_materi,
        ]);
        $materi->save();

        // Add data to table artikel_materies
        $artikel = new ArtikelMateri([
            'materi_silabus_id' => $materi->id,
            'isi_materi' => $request->isi_materi,
        ]);
        $artikel->save();
        return redirect('admin/academy/' . $materi->silabus_academies->academies->id . '/silabus/' . $materi->silabus_academies->id)->with('toast_success', 'Berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $artikel)
    {
        $title = 'Detail Artikel';
        $title2 = 'Materi';
        $title3 = 'Detail Kelas';
        $title4 = 'Academy';
        $data_notifikasi = NotifikasiAdmin::where('status', '0')->orderBy('id', 'desc')->get();

        $materi = MateriSilabus::findorfail($artikel);
        return view('admin.academy.materi.show_artikel', compact(
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
    public function edit($id, $artikel)
    {
        $title = 'Edit Artikel';
        $title2 = 'Materi';
        $title3 = 'Detail Kelas';
        $title4 = 'Academy';
        $data_notifikasi = NotifikasiAdmin::where('status', '0')->orderBy('id', 'desc')->get();

        $materi = MateriSilabus::findorfail($artikel);
        return view('admin.academy.materi.edit_artikel', compact(
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
    public function update(Request $request, $id, $artikel)
    {
        $request->validate([
            'tipe_pembaca' => 'required|in:Semua Orang,Member',
            'isi_materi' => 'required|min:50',
        ]);

        $materi = MateriSilabus::findorfail($artikel);
        $artikel = ArtikelMateri::where('materi_silabus_id', $materi->id)->first();

        // Update Data Materi
        $data_materi = [
            'tipe_pembaca' => $request->tipe_pembaca,
        ];
        $materi->update($data_materi);
        // Update Data Artikel
        $data_artikel = [
            'isi_materi' => $request->isi_materi,
        ];
        $artikel->update($data_artikel);

        return redirect('admin/academy/' . $materi->silabus_academies->academies->id . '/silabus/' . $materi->silabus_academies->id)->with('toast_success', 'Berhasil disimpan.');
    }
}
