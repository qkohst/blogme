<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MateriSilabus;
use App\SubmissionMateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubmissionMateriController extends Controller
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
            'deskripsi' => 'required|min:50',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $materi_terakhir = MateriSilabus::where('silabus_academies_id', $id)->orderBy('nomor_urut', 'desc')->first();
            if ($materi_terakhir == null) {
                $nomor_urut = 1;
            } else {
                $nomor_urut = $materi_terakhir->nomor_urut++;
            }

            // Add data to table materi_silabuses
            $materi = new MateriSilabus([
                'silabus_academies_id' => $id,
                'tipe_materi' => 4,
                'nomor_urut' => $nomor_urut,
                'tipe_pembaca' => $request->tipe_pembaca,
                'judul_materi' => $request->judul_materi,
            ]);
            $materi->save();

            // Add data to table artikel_materies
            $submission = new SubmissionMateri([
                'materi_silabuses_id' => $materi->id,
                'isi_materi' => $request->deskripsi,
            ]);
            $submission->save();
            return redirect('admin/academy/' . $materi->silabus_academies->academies->id . '/silabus/' . $materi->silabus_academies->id)->with('toast_success', 'Berhasil disimpan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $submission)
    {
        $title = 'Detail Submission';
        $title2 = 'Materi';
        $title3 = 'Detail Kelas';
        $title4 = 'Academy';
        $materi = MateriSilabus::findorfail($submission);
        $submission = SubmissionMateri::where('materi_silabuses_id', $materi->id)->first();
        return view('admin.academy.materi.show_submission', compact(
            'title',
            'title2',
            'title3',
            'title4',
            'materi',
            'submission',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $submission)
    {
        $title = 'Edit Submission';
        $title2 = 'Materi';
        $title3 = 'Detail Kelas';
        $title4 = 'Academy';
        $materi = MateriSilabus::findorfail($submission);
        $submission = SubmissionMateri::where('materi_silabuses_id', $materi->id)->first();
        return view('admin.academy.materi.edit_submission', compact(
            'title',
            'title2',
            'title3',
            'title4',
            'materi',
            'submission',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $submission)
    {
        $validator = Validator::make($request->all(), [
            'tipe_pembaca' => 'required|in:Semua Orang,Member',
            'deskripsi' => 'required|min:50',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $materi = MateriSilabus::findorfail($submission);
            $submission = SubmissionMateri::where('materi_silabuses_id', $materi->id)->first();

            // Update Data Materi
            $data_materi = [
                'tipe_pembaca' => $request->tipe_pembaca,
            ];
            $materi->update($data_materi);
            // Update Data submission
            $data_submission = [
                'isi_materi' => $request->deskripsi,
            ];
            $submission->update($data_submission);

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
