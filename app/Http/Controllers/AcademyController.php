<?php

namespace App\Http\Controllers;

use App\Academy;
use App\FasilitasAcademy;
use App\Kategory;
use App\MateriSilabus;
use App\SilabusAcademy;
use App\Technology;
use App\TechnologyAcademy;
use App\ToolsAcademy;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Semua Kelas';
        $kategories = Kategory::where('status', 'on')->get();
        $academies = Academy::where('status', 'on')->get();
        foreach ($academies as $academy) {
            $academy->durasi_belajar = SilabusAcademy::where('academies_id', $academy->id)->sum('waktu_belajar');
        }

        $technologies = Technology::all();
        return view('academy.all_class', compact(
            'title',
            'kategories',
            'academies',
            'technologies'
        ));
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

        $silabus_academies = SilabusAcademy::where('academies_id', $academy->id)->orderBy('nomor_urut', 'asc')->get();
        foreach ($silabus_academies as $silabus) {
            $silabus->count_artikel = MateriSilabus::where('silabus_academies_id', $silabus->id)->where('tipe_materi', 1)->count();
            $silabus->count_vidio = MateriSilabus::where('silabus_academies_id', $silabus->id)->where('tipe_materi', 2)->count();
            $silabus->count_kuis = MateriSilabus::where('silabus_academies_id', $silabus->id)->where('tipe_materi', 3)->count();
            $silabus->count_submission = MateriSilabus::where('silabus_academies_id', $silabus->id)->where('tipe_materi', 4)->count();

            $silabus->materi_silabuses = MateriSilabus::where('silabus_academies_id', $silabus->id)->orderBy('nomor_urut', 'asc')->get();
        }
        return view('academy.show', compact(
            'title',
            'academy',
            'kategories',
            'durasi_belajar',
            'fasilitas_academies',
            'tools_academies',
            'technologies_academies',
            'silabus_academies'
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

    public function by_kategori($id_kategori)
    {
        $kategori = Kategory::findorfail($id_kategori);
        $title = $kategori->nama_kategori;
        $kategories = Kategory::where('status', 'on')->get();
        $academies = Academy::where('kategories_id', $kategori->id)->where('status', 'on')->get();
        foreach ($academies as $academy) {
            $academy->durasi_belajar = SilabusAcademy::where('academies_id', $academy->id)->sum('waktu_belajar');
        }

        return view('academy.class_by_kategori', compact(
            'title',
            'kategori',
            'kategories',
            'academies'
        ));
    }
}
