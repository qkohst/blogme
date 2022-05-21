<?php

namespace App\Http\Controllers\Member;

use App\Academy;
use App\ArtikelMateri;
use App\Http\Controllers\Controller;
use App\KuisMateri;
use App\MateriSilabus;
use App\SilabusAcademy;
use App\SubmissionMateri;
use App\VidioMateri;
use Illuminate\Http\Request;

class ModulAcademyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $silabus_academies = SilabusAcademy::where('academies_id', $id)->get();
        foreach ($silabus_academies as $silabus) {
            $silabus->materi_silabuses = MateriSilabus::where('silabus_academies_id', $silabus->id)->get();
        }

        $academy = Academy::findorfail($id);
        $materi = MateriSilabus::findorfail(request('materi'));
        $title = $materi->judul_materi;
        $title2 = $academy->nama_kelas;

        // previous
        $previous_materi = MateriSilabus::where('silabus_academies_id', $materi->silabus_academies_id)->where('id', '<', $materi->id)->max('id');
        if ($previous_materi == null) {
            $previous_silabus = SilabusAcademy::where('academies_id', $id)->where('id', '<', $materi->silabus_academies_id)->max('id');
            if ($previous_silabus == null) {
                $previous = null;
            } else {
                $previous = MateriSilabus::where('silabus_academies_id', $previous_silabus)->max('id');
            }
        } else {
            $previous = $previous_materi;
        }

        // Next
        $next_materi = MateriSilabus::where('silabus_academies_id', $materi->silabus_academies_id)->where('id', '>', $materi->id)->min('id');
        if ($next_materi == null) {
            $next_silabus = SilabusAcademy::where('academies_id', $id)->where('id', '>', $materi->silabus_academies_id)->min('id');
            if ($next_silabus == null) {
                $next = null;
            } else {
                $next = MateriSilabus::where('silabus_academies_id', $next_silabus)->min('id');
            }
        } else {
            $next = $next_materi;
        }

        if ($materi->tipe_materi == 1) {
            $artikel = ArtikelMateri::where('materi_silabuses_id', $materi->id)->first();
            return view('academy.materi.artikel', compact(
                'title',
                'title2',
                'academy',
                'silabus_academies',
                'materi',
                'artikel',
                'previous',
                'next'
            ));
        } elseif ($materi->tipe_materi == 2) {
            $vidio = VidioMateri::where('materi_silabuses_id', $materi->id)->first();
            return view('academy.materi.vidio', compact(
                'title',
                'title2',
                'academy',
                'silabus_academies',
                'materi',
                'vidio',
                'previous',
                'next'
            ));
        } elseif ($materi->tipe_materi == 3) {
            $data_kuis = KuisMateri::where('materi_silabuses_id', $materi->id)->get();
            return view('academy.materi.kuis', compact(
                'title',
                'title2',
                'academy',
                'silabus_academies',
                'materi',
                'data_kuis',
                'previous',
                'next'
            ));
        } elseif ($materi->tipe_materi == 4) {
            $submission = SubmissionMateri::where('materi_silabuses_id', $materi->id)->first();
            return view('academy.materi.submission', compact(
                'title',
                'title2',
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
