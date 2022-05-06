<?php

namespace App\Http\Controllers\Admin;

use App\Fasilitas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FasilitasAcademyController extends Controller
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
        $title = 'Tambah Fasilitas';
        return view('admin.academy.fasilitas.create', compact(
            'title',
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
        $validator = Validator::make($request->all(), [
            'nama_fasilitas' => 'required|min:3|max:50|unique:fasilitas,nama_fasilitas',
            'icon' => 'required|min:5|max:100',
            'deskripsi' => 'required|min:10|max:255',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $fasilitas = new Fasilitas([
                'nama_fasilitas' => $request->nama_fasilitas,
                'icon' => $request->icon,
                'deskripsi' => $request->deskripsi,
            ]);
            $fasilitas->save();
            return redirect('admin/academy')->with('toast_success', 'Berhasil disimpan.');
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
    public function edit($id)
    {
        $title = 'Edit Fasilitas';
        $fasilitas = Fasilitas::findorfail($id);
        return view('admin.academy.fasilitas.edit', compact(
            'title',
            'fasilitas'
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
        $fasilitas = Fasilitas::findorfail($id);
        $validator = Validator::make($request->all(), [
            'icon' => 'required|min:5|max:100',
            'deskripsi' => 'required|min:10|max:255',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $data = [
                'icon' => $request->icon,
                'deskripsi' => $request->deskripsi,
            ];
            $fasilitas->update($data);
            return redirect('admin/academy')->with('toast_success', 'Berhasil diedit.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $fasilitas = Fasilitas::findorfail($id);
            $fasilitas->delete();
            return back()->with('toast_success', 'Berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('toast_error', 'Data tidak dapat dihapus.');
        }
    }
}
