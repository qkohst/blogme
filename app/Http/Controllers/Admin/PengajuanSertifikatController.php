<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\JawabanKuisPeserta;
use App\JawabanSubmissionPeserta;
use App\KuisMateri;
use App\MateriSilabus;
use App\NotifikasiAdmin;
use App\NotifikasiMember;
use App\RiwayatBelajar;
use App\SertifikatPesertaAcademy;
use App\SilabusAcademy;
use App\SubmissionMateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengajuanSertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pengajuan Sertifikat';
        NotifikasiAdmin::where('url', '/admin/pengajuan-sertifikat')->update(['status' => '1']);
        $data_notifikasi = NotifikasiAdmin::where('status', '0')->orderBy('id', 'desc')->get();

        $data_pengajuan_sertifikat = SertifikatPesertaAcademy::where('status', 'waiting')->orderBy('id', 'desc')->get();
        return view('admin.pengajuan-sertifikat.index', compact(
            'title',
            'data_notifikasi',
            'data_pengajuan_sertifikat'
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
        $title2 = 'Pengajuan Sertifikat';
        $title = 'Riwayat Belajar Siswa';
        $data_notifikasi = NotifikasiAdmin::where('status', '0')->orderBy('id', 'desc')->get();

        $pengajuan_sertifikat = SertifikatPesertaAcademy::findorfail($id);
        $data_silabus_kelas = SilabusAcademy::where('academy_id', $pengajuan_sertifikat->peserta_academies->academy_id)->get();
        foreach ($data_silabus_kelas as $silabus) {
            $silabus->materi_silabuses = MateriSilabus::where('silabus_academy_id', $silabus->id)->get();

            foreach ($silabus->materi_silabuses as $materi) {
                $riwayat_belajar = RiwayatBelajar::where('materi_silabus_id', $materi->id)->where('user_id', $pengajuan_sertifikat->peserta_academies->user_id)->first();
                $materi->lama_belajar = $riwayat_belajar->updated_at->diffInSeconds($riwayat_belajar->created_at);

                // Nilai Kuis 
                if ($materi->tipe_materi == 3) {
                    $data_id_kuis = KuisMateri::where('materi_silabus_id', $materi->id)->get('id');

                    $materi->nilai_kuis = JawabanKuisPeserta::where('peserta_academy_id', $pengajuan_sertifikat->peserta_academy_id)->whereIn('kuis_materi_id', $data_id_kuis)->sum('poin');

                    // Nilai Submission 
                } elseif ($materi->tipe_materi == 4) {
                    $submission = SubmissionMateri::where('materi_silabus_id', $materi->id)->first();
                    $materi->nilai_submission = JawabanSubmissionPeserta::where('peserta_academy_id', $pengajuan_sertifikat->peserta_academy_id)->where('submission_materi_id', $submission->id)->first();
                }
            }
        }

        return view('admin.pengajuan-sertifikat.show', compact(
            'title',
            'title2',
            'data_notifikasi',
            'pengajuan_sertifikat',
            'data_silabus_kelas',
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
        $pengajuan_sertifikat = SertifikatPesertaAcademy::findorfail($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);

        if ($request->status == 'approved') {
            $validator = Validator::make($request->all(), [
                'file_sertifikat' => "required|mimes:pdf|max:10000"
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'catatan_verifikasi' => 'required|max:255',
            ]);
        }

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {

            if ($request->status == 'approved') {

                $file_sertifikat = $request->file('file_sertifikat');
                $nama_file = time() . '.' . $file_sertifikat->getClientOriginalExtension();
                $file_sertifikat->move('file-sertifikat/', $nama_file);

                $data = [
                    'status' => $request->status,
                    'file_sertifikat' => $request->nama_file,
                    'catatan_verifikasi' => $request->catatan_verifikasi,
                ];
                $pengajuan_sertifikat->update($data);

                $notifikasi = new NotifikasiMember([
                    'to_user_id' => $pengajuan_sertifikat->peserta_academies->user_id,
                    'judul' => 'Pengajuan sertifikat disetujui',
                    'url' => '/file-sertifikat/' . $pengajuan_sertifikat->peserta_academy_id,
                    'status' => '0',
                ]);
                $notifikasi->save();
            } else {
                $data = [
                    'status' => $request->status,
                    'catatan_verifikasi' => $request->catatan_verifikasi,
                ];
                $pengajuan_sertifikat->update($data);
                $notifikasi = new NotifikasiMember([
                    'to_user_id' => $pengajuan_sertifikat->peserta_academies->user_id,
                    'judul' => 'Pengajuan sertifikat ditolak',
                    'url' => '/file-sertifikat/' . $pengajuan_sertifikat->peserta_academy_id,
                    'status' => '0',
                ]);
                $notifikasi->save();
            }

            return back()->with('toast_success', 'Berhasil disimpan.');
        }
    }
}
