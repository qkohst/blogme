<?php

namespace App\Http\Controllers\Member;

use App\Academy;
use App\ArtikelMateri;
use App\Http\Controllers\Controller;
use App\JawabanKuisPeserta;
use App\JawabanSubmissionPeserta;
use App\KuisMateri;
use App\MateriSilabus;
use App\NotifikasiAdmin;
use App\NotifikasiMember;
use App\PesertaAcademy;
use App\RiwayatBelajar;
use App\SertifikatPesertaAcademy;
use App\SilabusAcademy;
use App\SubmissionMateri;
use App\TestimoniAcademy;
use App\VidioMateri;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ModulAcademyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $academy = Academy::findorfail($id);
        $materi = MateriSilabus::findorfail(request('materi'));
        $title = $materi->judul_materi;
        $title2 = $academy->nama_kelas;

        // Check progress belajar user 
        if (is_null(request('from'))) {
            $chek_riwayat_belajar = RiwayatBelajar::where('materi_silabus_id', $materi->id)->where('user_id', Auth::user()->id)->first();
            if (is_null($chek_riwayat_belajar)) {
                $riwayat_belajar = new RiwayatBelajar([
                    'user_id' => Auth::user()->id,
                    'materi_silabus_id' => $materi->id,
                    'status' => 'on progress',
                ]);
                $riwayat_belajar->save();
            }
        } else {
            $materi_sebelumnya = RiwayatBelajar::where('materi_silabus_id', request('from'))->where('user_id', Auth::user()->id)->first();
            $update_status = [
                'status' => 'complete'
            ];
            $materi_sebelumnya->update($update_status);

            $check_materi_sekarang = RiwayatBelajar::where('materi_silabus_id', $materi->id)->where('user_id', Auth::user()->id)->first();
            if (is_null($check_materi_sekarang)) {
                $riwayat_belajar = new RiwayatBelajar([
                    'user_id' => Auth::user()->id,
                    'materi_silabus_id' => $materi->id,
                    'status' => 'on progress',
                ]);
                $riwayat_belajar->save();
            }
        }


        // previous
        $previous_materi = MateriSilabus::where('silabus_academy_id', $materi->silabus_academy_id)->where('id', '<', $materi->id)->max('id');
        if ($previous_materi == null) {
            $previous_silabus = SilabusAcademy::where('academy_id', $id)->where('id', '<', $materi->silabus_academy_id)->max('id');
            if ($previous_silabus == null) {
                $previous = null;
            } else {
                $previous = MateriSilabus::where('silabus_academy_id', $previous_silabus)->max('id');
            }
        } else {
            $previous = $previous_materi;
        }

        // Next
        $next_materi = MateriSilabus::where('silabus_academy_id', $materi->silabus_academy_id)->where('id', '>', $materi->id)->min('id');
        if ($next_materi == null) {
            $next_silabus = SilabusAcademy::where('academy_id', $id)->where('id', '>', $materi->silabus_academy_id)->min('id');
            if ($next_silabus == null) {
                $next = null;
            } else {
                $next = MateriSilabus::where('silabus_academy_id', $next_silabus)->min('id');
            }
        } else {
            $next = $next_materi;
        }

        $silabus_academies = SilabusAcademy::where('academy_id', $id)->get();
        foreach ($silabus_academies as $silabus) {
            $silabus->materi_silabuses = MateriSilabus::where('silabus_academy_id', $silabus->id)->get();

            foreach ($silabus->materi_silabuses as $materi_silabuses) {
                $riwayat_belajar = RiwayatBelajar::where('materi_silabus_id', $materi_silabuses->id)->where('user_id', Auth::user()->id)->first();
                if (is_null($riwayat_belajar)) {
                    $materi_silabuses->status_belajar = null;
                } else {
                    $materi_silabuses->status_belajar = $riwayat_belajar->status;
                }
            }
        }

        $peserta = PesertaAcademy::where('academy_id', $id)->where('user_id', Auth::user()->id)->first();


        if ($materi->tipe_materi == 1) {
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();

            $artikel = ArtikelMateri::where('materi_silabus_id', $materi->id)->first();
            return view('academy.materi.artikel', compact(
                'title',
                'title2',
                'data_notifikasi',
                'academy',
                'silabus_academies',
                'materi',
                'artikel',
                'peserta',
                'previous',
                'next'
            ));
        } elseif ($materi->tipe_materi == 2) {
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();

            $vidio = VidioMateri::where('materi_silabus_id', $materi->id)->first();
            return view('academy.materi.vidio', compact(
                'title',
                'title2',
                'data_notifikasi',
                'academy',
                'silabus_academies',
                'materi',
                'vidio',
                'peserta',
                'previous',
                'next'
            ));
        } elseif ($materi->tipe_materi == 3) {
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();

            $data_kuis = KuisMateri::where('materi_silabus_id', $materi->id)->get();
            foreach ($data_kuis as $kuis) {
                $kuis->jawaban = JawabanKuisPeserta::where('peserta_academy_id', $peserta->id)->where('kuis_materi_id', $kuis->id)->first();
            }
            $jumlah_jawab = JawabanKuisPeserta::where('peserta_academy_id', $peserta->id)->count();
            return view('academy.materi.kuis', compact(
                'title',
                'title2',
                'data_notifikasi',
                'academy',
                'silabus_academies',
                'materi',
                'data_kuis',
                'jumlah_jawab',
                'peserta',
                'previous',
                'next'
            ));
        } elseif ($materi->tipe_materi == 4) {
            // Update Notifikasi
            $notifikasi = NotifikasiMember::where('url', '/member/academy/class/' . $materi->silabus_academies->academy_id . '?materi=' . $materi->id)->where('status', '0')->orderBy('id', 'desc')->first();

            if (!is_null($notifikasi)) {
                $notifikasi->update([
                    'status' => '1',
                ]);
            }
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();

            $submission = SubmissionMateri::where('materi_silabus_id', $materi->id)->first();
            $jawab_submission = JawabanSubmissionPeserta::where('peserta_academy_id', $peserta->id)->where('submission_materi_id', $submission->id)->first();
            return view('academy.materi.submission', compact(
                'title',
                'title2',
                'data_notifikasi',
                'academy',
                'silabus_academies',
                'materi',
                'submission',
                'jawab_submission',
                'peserta',
                'previous',
                'next'
            ));
        }
    }

    public function kirim_jawaban(Request $request)
    {
        for ($count = 0; $count < count($request->kuis_materi_id); $count++) {
            $kuis = KuisMateri::findorfail($request->kuis_materi_id[$count]);
            if ($kuis->kunci_jawaban == $request->jawaban[$request->kuis_materi_id[$count]]) {
                $poin = $kuis->poin;
            } else {
                $poin = 0;
            }
            $data = array(
                'peserta_academy_id'  => $request->peserta_academy_id,
                'kuis_materi_id'  => $request->kuis_materi_id[$count],
                'jawaban'  => $request->jawaban[$request->kuis_materi_id[$count]],
                'poin' => $poin,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            );
            $store_data[] = $data;
        }
        JawabanKuisPeserta::insert($store_data);
        return back()->with('toast_success', 'Jawaban berhasil dikirim.');
    }

    public function kirim_submission(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'peserta_academy_id' => 'required',
            'submission_materi_id' => 'required',
            'link_jawaban' => 'required|max:255|unique:jawaban_submission_pesertas',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $submission = new JawabanSubmissionPeserta([
                'peserta_academy_id' => $request->peserta_academy_id,
                'submission_materi_id' => $request->submission_materi_id,
                'link_jawaban' => $request->link_jawaban,
                'deskripsi' => $request->deskripsi,
                'status' => 'waiting'
            ]);
            $submission->save();

            $notifikasi = new NotifikasiAdmin([
                'user_id' => Auth::user()->id,
                'judul' => 'Submission Kelas Baru',
                'url' => '/admin/submission',
                'status' => '0',
            ]);
            $notifikasi->save();

            return back()->with('toast_success', 'Berhasil dikirim.');
        }
    }

    public function kirim_ulang_submission(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'link_jawaban' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $submission = JawabanSubmissionPeserta::findorfail($request->id);

            $data = [
                'link_jawaban' => $request->link_jawaban,
                'deskripsi' => $request->deskripsi,
                'status' => 'waiting'
            ];
            $submission->update($data);

            $notifikasi = new NotifikasiAdmin([
                'user_id' => Auth::user()->id,
                'judul' => 'Submission Kelas Baru',
                'url' => '/admin/submission',
                'status' => '0',
            ]);
            $notifikasi->save();

            return back()->with('toast_success', 'Berhasil dikirim.');
        }
    }

    public function selesai_kelas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'academy_id' => 'required',
            'testimoni' => 'required|min:50',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $peserta_academy = PesertaAcademy::where('academy_id', $request->academy_id)->where('user_id', Auth::user()->id)->first();
            $peserta_academy->update([
                'status' => 'finish',
            ]);

            $testimoni = new TestimoniAcademy([
                'academy_id' => $request->academy_id,
                'peserta_academy_id' => $peserta_academy->id,
                'testimoni' => $request->testimoni,
            ]);
            $testimoni->save();

            $pengajuan_sertifikat = new SertifikatPesertaAcademy([
                'peserta_academy_id' => $peserta_academy->id,
                'status' => 'waiting'
            ]);
            $pengajuan_sertifikat->save();

            $notifikasi = new NotifikasiAdmin([
                'user_id' => Auth::user()->id,
                'judul' => 'Pengajuan Sertifikat Kelas',
                'url' => '/admin/pengajuan-sertifikat',
                'status' => '0',
            ]);
            $notifikasi->save();

            return back()->with('toast_success', 'Berhasil dikirim.');
        }
    }
}
