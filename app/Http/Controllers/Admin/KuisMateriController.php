<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\KuisMateri;
use App\MateriSilabus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class KuisMateriController extends Controller
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
            'judul_kuis' => 'required|min:5|max:100',
            'tipe_pembaca' => 'required|in:Semua Orang,Member',
            'soal.*' => 'required|min:10',
            'jawaban_a.*' => 'required|min:2',
            'jawaban_b.*' => 'required|min:2',
            'jawaban_c.*' => 'required|min:2',
            'jawaban_d.*' => 'required|min:2',
            'kunci_jawaban.*' => 'required|in:A,B,C,D',
            'poin.*' => 'required|numeric|digits_between:1,100',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
           
            // Add data to table materi_silabuses
            $materi = new MateriSilabus([
                'silabus_academies_id' => $id,
                'tipe_materi' => 3,
                'tipe_pembaca' => $request->tipe_pembaca,
                'judul_materi' => $request->judul_kuis,
            ]);
            $materi->save();

            // Add data to table kuis_materis
            for ($count = 0; $count < count($request->soal); $count++) {
                $data = array(
                    'materi_silabuses_id' => $materi->id,
                    'soal'  => $request->soal[$count],
                    'jawaban_a'  => $request->jawaban_a[$count],
                    'jawaban_b'  => $request->jawaban_b[$count],
                    'jawaban_c'  => $request->jawaban_c[$count],
                    'jawaban_d'  => $request->jawaban_d[$count],
                    'kunci_jawaban'  => $request->kunci_jawaban[$count],
                    'poin'  => $request->poin[$count],
                    'created_at'  => Carbon::now(),
                    'updated_at'  => Carbon::now(),
                );
                $store_data[] = $data;
            }
            KuisMateri::insert($store_data);
            return redirect('admin/academy/' . $materi->silabus_academies->academies->id . '/silabus/' . $materi->silabus_academies->id)->with('toast_success', 'Berhasil disimpan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $kui)
    {
        $title = 'Detail Kuis';
        $title2 = 'Materi';
        $title3 = 'Detail Kelas';
        $title4 = 'Academy';
        $materi = MateriSilabus::findorfail($kui);
        $data_kuis = KuisMateri::where('materi_silabuses_id', $materi->id)->get();
        return view('admin.academy.materi.show_kuis', compact(
            'title',
            'title2',
            'title3',
            'title4',
            'materi',
            'data_kuis',
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
        $validator = Validator::make($request->all(), [
            'kuis_id' => 'required',
            'soal' => 'required|min:10',
            'jawaban_a' => 'required|min:2',
            'jawaban_b' => 'required|min:2',
            'jawaban_c' => 'required|min:2',
            'jawaban_d' => 'required|min:2',
            'kunci_jawaban' => 'required|in:A,B,C,D',
            'poin' => 'required|numeric|digits_between:1,100',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $kuis = KuisMateri::findorfail($request->kuis_id);
            $data = [
                'soal' => $request->soal,
                'jawaban_a' => $request->jawaban_a,
                'jawaban_b' => $request->jawaban_b,
                'jawaban_c' => $request->jawaban_c,
                'jawaban_d' => $request->jawaban_d,
                'kunci_jawaban' => $request->kunci_jawaban,
                'poin' => $request->poin,
            ];
            $kuis->update($data);
            return back()->with('toast_success', 'Berhasil disimpan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $kuis = KuisMateri::findorfail($request->kuis_id);
            $kuis->delete();
            return back()->with('toast_success', 'Berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('toast_error', 'Data tidak dapat dihapus.');
        }
    }

    public function store_kuis(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'materi_silabuses_id' => 'required',
            'soal' => 'required|min:10',
            'jawaban_a' => 'required|min:2',
            'jawaban_b' => 'required|min:2',
            'jawaban_c' => 'required|min:2',
            'jawaban_d' => 'required|min:2',
            'kunci_jawaban' => 'required|in:A,B,C,D',
            'poin' => 'required|numeric|digits_between:1,100',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $kuis = new KuisMateri([
                'materi_silabuses_id' => $request->materi_silabuses_id,
                'soal' => $request->soal,
                'jawaban_a' => $request->jawaban_a,
                'jawaban_b' => $request->jawaban_b,
                'jawaban_c' => $request->jawaban_c,
                'jawaban_d' => $request->jawaban_d,
                'kunci_jawaban' => $request->kunci_jawaban,
                'poin' => $request->poin,
            ]);
            $kuis->save();
            return back()->with('toast_success', 'Berhasil disimpan.');
        }
    }
}
