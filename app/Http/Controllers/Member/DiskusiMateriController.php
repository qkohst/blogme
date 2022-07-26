<?php

namespace App\Http\Controllers\Member;

use App\Academy;
use App\Http\Controllers\Controller;
use App\MateriSilabus;
use App\NotifikasiMember;
use App\PesertaAcademy;
use App\SilabusAcademy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiskusiMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $academy = Academy::findorfail($id);
        
        $title = 'Diskusi Kelas';
        $title2 = $academy->nama_kelas;

        $peserta = PesertaAcademy::where('academy_id', $id)->where('user_id', Auth::user()->id)->first();
        $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();

        $silabus_academies = SilabusAcademy::where('academy_id', $id)->get();
        foreach ($silabus_academies as $silabus) {
            $silabus->materi_silabuses = MateriSilabus::where('silabus_academy_id', $silabus->id)->get();
        }

        return view('academy.discussions.index', compact(
            'title',
            'title2',
            'data_notifikasi',
            'academy',
            'silabus_academies',
            'peserta'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $academy = Academy::findorfail($id);
        $title = 'Buat Diskusi Baru';
        $title2 = 'Diskusi Kelas';
        $title3 = $academy->nama_kelas;
        $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();

        $silabus_academy_id = SilabusAcademy::where('academy_id', $id)->get('id');
        $materi_silabuses = MateriSilabus::whereIn('silabus_academy_id', $silabus_academy_id)->get();

        return view('academy.discussions.create', compact(
            'title',
            'title2',
            'title3',
            'data_notifikasi',
            'academy',
            'materi_silabuses',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
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
