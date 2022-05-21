<?php

namespace App\Http\Controllers\Admin;

use App\ArtikelMateri;
use App\Http\Controllers\Controller;
use App\MateriSilabus;
use App\SilabusAcademy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArtikelMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul_materi' => 'required|min:5|max:100',
            'tipe_pembaca' => 'required|in:Semua Orang,Member',
            'isi_materi' => 'required|min:50',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {

            // Add data to table materi_silabuses
            $materi = new MateriSilabus([
                'silabus_academies_id' => $id,
                'tipe_materi' => 1,
                'tipe_pembaca' => $request->tipe_pembaca,
                'judul_materi' => $request->judul_materi,
            ]);
            $materi->save();

            // Add data to table artikel_materies
            $artikel = new ArtikelMateri([
                'materi_silabuses_id' => $materi->id,
                'isi_materi' => $request->isi_materi,
            ]);
            $artikel->save();
            return redirect('admin/academy/' . $materi->silabus_academies->academies->id . '/silabus/' . $materi->silabus_academies->id)->with('toast_success', 'Berhasil disimpan.');
        }
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
        $materi = MateriSilabus::findorfail($artikel);
        $artikel = ArtikelMateri::where('materi_silabuses_id', $materi->id)->first();
        return view('admin.academy.materi.show_artikel', compact(
            'title',
            'title2',
            'title3',
            'title4',
            'materi',
            'artikel',
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
        $materi = MateriSilabus::findorfail($artikel);
        $artikel = ArtikelMateri::where('materi_silabuses_id', $materi->id)->first();
        return view('admin.academy.materi.edit_artikel', compact(
            'title',
            'title2',
            'title3',
            'title4',
            'materi',
            'artikel',
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
        $validator = Validator::make($request->all(), [
            'tipe_pembaca' => 'required|in:Semua Orang,Member',
            'isi_materi' => 'required|min:50',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $materi = MateriSilabus::findorfail($artikel);
            $artikel = ArtikelMateri::where('materi_silabuses_id', $materi->id)->first();

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
