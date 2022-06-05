<?php

namespace App\Http\Controllers;

use App\Academy;
use App\FasilitasAcademy;
use App\Kategory;
use App\MateriSilabus;
use App\NotifikasiMember;
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
        if (Auth::check()) {
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();
        } else {
            $data_notifikasi = null;
        }
        $kategories = Kategory::where('status', 'on')->get();
        $academies = Academy::where('status', 'on')->filter(request(['kategories', 'jenis_kelas', 'level', 'search']))->orderBy('created_at', 'desc')->paginate(6);

        if (request('kategories')) {
            $kategori = Kategory::findorfail(request('kategories'));
        } else {
            $kategori = null;
        }

        return view('academy.class', compact(
            'title',
            'data_notifikasi',
            'kategories',
            'academies',
            'kategori'
        ));
    }

    public function register($id)
    {
        $academy = Academy::findorfail($id);
        $check_peserta = PesertaAcademy::where('academy_id', $academy->id)->where('user_id', Auth::user()->id)->first();
        if (is_null($check_peserta)) {
            $title = 'Daftar Kelas';
            $title2 = $academy->nama_kelas;
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();

            $durasi_belajar = SilabusAcademy::where('academy_id', $academy->id)->sum('waktu_belajar');
            $technologies_academies = TechnologyAcademy::where('academy_id', $academy->id)->get();
            $fasilitas_academies = FasilitasAcademy::where('academy_id', $academy->id)->get();

            return view('academy.register', compact(
                'title',
                'title2',
                'data_notifikasi',
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
                'academy_id' => $academy->id,
                'user_id' => Auth::user()->id,
                'bukti_transfer' => null,
                'status' => 'approved'
            ]);
            $peserta->save();
            return redirect('academy/class/' . $academy->id)->with('toast_success', 'Registrasi berhasil, selamat belajar !');
        } else {
            $peserta = new PesertaAcademy([
                'academy_id' => $academy->id,
                'user_id' => Auth::user()->id,
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
        if (Auth::check()) {
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();
        } else {
            $data_notifikasi = null;
        }
        $kategories = Kategory::where('status', 'on')->get();

        $id_silabus = SilabusAcademy::where('academy_id', $academy->id)->get('id');
        $id_materi = MateriSilabus::whereIn('silabus_academy_id', $id_silabus)->get('id');
        if (Auth::check()) {
            $check_peserta = PesertaAcademy::where('academy_id', $academy->id)->where('user_id', Auth::user()->id)->where('status', 'approved')->first();
            $riwayat_belajar_terakhir = RiwayatBelajar::whereIn('materi_silabus_id', $id_materi)->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        } else {
            $riwayat_belajar_terakhir = null;
            $check_peserta = null;
        }

        return view('academy.show', compact(
            'title',
            'data_notifikasi',
            'academy',
            'kategories',
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
