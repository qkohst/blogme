<?php

namespace App\Http\Controllers\Admin;

use App\Academy;
use App\Http\Controllers\Controller;
use App\SilabusAcademy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SilabusAcademyController extends Controller
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
    public function create($id)
    {
        $title = 'Tambah Silabus';
        $title2 = 'Detail';
        $title3 = 'Academy';
        $academy = Academy::findorfail($id);
        return view('admin.academy.silabus.create', compact(
            'title',
            'title2',
            'title3',
            'academy',
        ));
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
            'judul_silabus' => 'required|min:5|max:100',
            'nomor_urut' => 'required|numeric|min:1',
            'waktu_belajar' => 'required|numeric|min:5',
            'deskripsi' => 'required|min:15|max:255',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $silabus = new SilabusAcademy([
                'academies_id' => $id,
                'judul_silabus' => $request->judul_silabus,
                'nomor_urut' => $request->nomor_urut,
                'waktu_belajar' => $request->waktu_belajar,
                'deskripsi' => $request->deskripsi,

            ]);
            $silabus->save();
            return redirect('admin/academy/' . $id)->with('toast_success', 'Berhasil disimpan.');
        }
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
    public function edit($id, $silabu)
    {
        $title = 'Edit Silabus';
        $title2 = 'Detail';
        $title3 = 'Academy';
        $silabus = SilabusAcademy::findorfail($silabu);
        return view('admin.academy.silabus..edit', compact(
            'title',
            'title2',
            'title3',
            'silabus',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $silabu)
    {
        $silabus = SilabusAcademy::findorfail($silabu);
        $validator = Validator::make($request->all(), [
            'nomor_urut' => 'required|numeric|min:1',
            'waktu_belajar' => 'required|numeric|min:5',
            'deskripsi' => 'required|min:15|max:255',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $data = [
                'nomor_urut' => $request->nomor_urut,
                'waktu_belajar' => $request->waktu_belajar,
                'deskripsi' => $request->deskripsi,
            ];
            $silabus->update($data);
            return redirect('admin/academy/' . $id)->with('toast_success', 'Berhasil diedit.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $silabu)
    {
        try {
            $silabus = SilabusAcademy::findorfail($silabu);
            $silabus->delete();
            return back()->with('toast_success', 'Berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('toast_error', 'Data tidak dapat dihapus.');
        }
    }
}
