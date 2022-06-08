<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\JawabanSubmissionPeserta;
use App\NotifikasiAdmin;
use App\NotifikasiMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JawabanSubmissionPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Submission Kelas';
        NotifikasiAdmin::where('url', '/admin/submission')->update(['status' => '1']);
        $data_notifikasi = NotifikasiAdmin::where('status', '0')->orderBy('id', 'desc')->get();

        $data_submission = JawabanSubmissionPeserta::where('status', 'waiting')->orderBy('id', 'desc')->get();
        return view('admin.submission-academy.index', compact(
            'title',
            'data_notifikasi',
            'data_submission'
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
        $jawaban_submission = JawabanSubmissionPeserta::findorfail($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'catatan' => 'required',
        ]);
        if ($request->status == 'approved') {
            $validator = Validator::make($request->all(), [
                'nilai' => 'required|numeric|min:0|max:100',
            ]);
        }
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $data = [
                'status' => $request->status,
                'poin' => $request->nilai,
                'catatan_verifikasi' => $request->catatan,
            ];
            $jawaban_submission->update($data);

            $notifikasi = new NotifikasiMember([
                'to_user_id' => $jawaban_submission->peserta_academies->user_id,
                'judul' => $jawaban_submission->submission_materis->materi_silabuses->judul_materi . ' telah diverifikasi',
                'url' => '/member/academy/class/' . $jawaban_submission->submission_materis->materi_silabuses->silabus_academies->academy_id . '?materi=' . $jawaban_submission->submission_materis->materi_silabuses->id,
                'status' => '0',
            ]);
            $notifikasi->save();

            return back()->with('toast_success', 'Berhasil disimpan.');
        }
    }
}
