<?php

namespace App\Http\Controllers;

use App\Academy;
use App\FasilitasAcademy;
use App\Kategory;
use App\MateriSilabus;
use App\PesertaAcademy;
use App\RiwayatBelajar;
use App\SilabusAcademy;
use App\TechnologyAcademy;
use App\ToolsAcademy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcademyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Kelas';
        $kategories = Kategory::where('status', 'on')->get();

        $academies = Academy::where('status', 'on')->filter(request(['kategories', 'jenis_kelas', 'level', 'search']))->orderBy('created_at', 'desc')->paginate(6);
        foreach ($academies as $academy) {
            $academy->durasi_belajar = SilabusAcademy::where('academies_id', $academy->id)->sum('waktu_belajar');
        }

        if (request('kategories')) {
            $kategori = Kategory::findorfail(request('kategories'));
        } else {
            $kategori = null;
        }

        return view('academy.class', compact(
            'title',
            'kategories',
            'academies',
            'kategori'
        ));
    }

    public function register($id)
    {
        $academy = Academy::findorfail($id);
        $check_peserta = PesertaAcademy::where('academies_id', $academy->id)->where('users_id', Auth::user()->id)->first();
        if (is_null($check_peserta)) {
            $title = 'Daftar Kelas';
            $title2 = $academy->nama_kelas;
            $durasi_belajar = SilabusAcademy::where('academies_id', $academy->id)->sum('waktu_belajar');
            $technologies_academies = TechnologyAcademy::where('academies_id', $academy->id)->get();
            $fasilitas_academies = FasilitasAcademy::where('academies_id', $academy->id)->get();

            return view('academy.register', compact(
                'title',
                'title2',
                'academy',
                'durasi_belajar',
                'technologies_academies',
                'fasilitas_academies'
            ));
        } elseif ($check_peserta->status == 'waiting') {
            return redirect('member/orders?pages=waiting')->with('toast_warning', 'Selesaikan pesanan anda untuk melanjutkan.');
        } elseif ($check_peserta->status == 'rejected') {
            return redirect('member/orders?pages=rejected')->with('toast_warning', 'Selesaikan pesanan anda untuk melanjutkan.');
        }
    }

    public function store_register(Request $request, $id)
    {
        $academy = Academy::findorfail($id);

        if ($academy->jenis_kelas == 'Gratis') {
            $peserta = new PesertaAcademy([
                'academies_id' => $academy->id,
                'users_id' => Auth::user()->id,
                'bukti_transfer' => null,
                'status' => 'approved'
            ]);
            $peserta->save();
            return redirect('academy/class/' . $academy->id)->with('toast_success', 'Registrasi berhasil, selamat belajar !');
        } else {
            $peserta = new PesertaAcademy([
                'academies_id' => $academy->id,
                'users_id' => Auth::user()->id,
                'bukti_transfer' => null,
                'status' => 'waiting'
            ]);
            $peserta->save();
            return redirect('member/orders?pages=waiting')->with('toast_success', 'Registrasi berhasil, silahkan selesaikan pembayaran !');
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
        $academy = Academy::findorfail($id);
        $title = $academy->nama_kelas;
        $kategories = Kategory::where('status', 'on')->get();
        $durasi_belajar = SilabusAcademy::where('academies_id', $academy->id)->sum('waktu_belajar');
        $fasilitas_academies = FasilitasAcademy::where('academies_id', $academy->id)->get();
        $tools_academies = ToolsAcademy::where('academies_id', $academy->id)->get();
        $technologies_academies = TechnologyAcademy::where('academies_id', $academy->id)->get();

        $silabus_academies = SilabusAcademy::where('academies_id', $academy->id)->get();
        foreach ($silabus_academies as $silabus) {
            $silabus->count_artikel = MateriSilabus::where('silabus_academies_id', $silabus->id)->where('tipe_materi', 1)->count();
            $silabus->count_vidio = MateriSilabus::where('silabus_academies_id', $silabus->id)->where('tipe_materi', 2)->count();
            $silabus->count_kuis = MateriSilabus::where('silabus_academies_id', $silabus->id)->where('tipe_materi', 3)->count();
            $silabus->count_submission = MateriSilabus::where('silabus_academies_id', $silabus->id)->where('tipe_materi', 4)->count();

            $silabus->materi_silabuses = MateriSilabus::where('silabus_academies_id', $silabus->id)->get();
            foreach ($silabus->materi_silabuses as $materi_silabuses) {
                if (Auth::check()) {
                    $riwayat_belajar = RiwayatBelajar::where('materi_silabuses_id', $materi_silabuses->id)->where('users_id', Auth::user()->id)->first();
                } else {
                    $riwayat_belajar = null;
                }

                if (is_null($riwayat_belajar)) {
                    $materi_silabuses->status_belajar = null;
                } else {
                    $materi_silabuses->status_belajar = $riwayat_belajar->status;
                }
            }
        }

        $id_silabus = SilabusAcademy::where('academies_id', $academy->id)->get('id');
        $id_materi = MateriSilabus::whereIn('silabus_academies_id', $id_silabus)->get('id');
        if (Auth::check()) {
            $check_peserta = PesertaAcademy::where('academies_id', $academy->id)->where('users_id', Auth::user()->id)->where('status', 'approved')->first();
            $riwayat_belajar_terakhir = RiwayatBelajar::whereIn('materi_silabuses_id', $id_materi)->where('users_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        } else {
            $riwayat_belajar_terakhir = null;
            $check_peserta = null;
        }

        return view('academy.show', compact(
            'title',
            'academy',
            'kategories',
            'durasi_belajar',
            'fasilitas_academies',
            'tools_academies',
            'technologies_academies',
            'silabus_academies',
            'riwayat_belajar_terakhir',
            'check_peserta'
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
