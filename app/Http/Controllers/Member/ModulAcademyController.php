<?php

namespace App\Http\Controllers\Member;

use App\Academy;
use App\ArtikelMateri;
use App\Http\Controllers\Controller;
use App\KuisMateri;
use App\MateriSilabus;
use App\NotifikasiMember;
use App\RiwayatBelajar;
use App\SilabusAcademy;
use App\SubmissionMateri;
use App\VidioMateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                'previous',
                'next'
            ));
        } elseif ($materi->tipe_materi == 3) {
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();

            $data_kuis = KuisMateri::where('materi_silabus_id', $materi->id)->get();
            return view('academy.materi.kuis', compact(
                'title',
                'title2',
                'data_notifikasi',
                'academy',
                'silabus_academies',
                'materi',
                'data_kuis',
                'previous',
                'next'
            ));
        } elseif ($materi->tipe_materi == 4) {
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();

            $submission = SubmissionMateri::where('materi_silabus_id', $materi->id)->first();
            return view('academy.materi.submission', compact(
                'title',
                'title2',
                'data_notifikasi',
                'academy',
                'silabus_academies',
                'materi',
                'submission',
                'previous',
                'next'
            ));
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
