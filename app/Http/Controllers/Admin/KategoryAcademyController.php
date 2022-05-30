<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoryAcademyController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|min:3|max:100|unique:kategories,nama_kategori',
            'gambar' => 'required',
            'deskripsi' => 'required|min:10|max:255',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $gambar = $request->file('gambar');
            $nama_file = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('admin-assets/img/kategory/', $nama_file);

            $kategory = new Kategory([
                'nama_kategori' => $request->nama_kategori,
                'gambar' => $nama_file,
                'deskripsi' => $request->deskripsi,
                'status' => 'on',
            ]);
            $kategory->save();
            return redirect('admin/academy')->with('toast_success', 'Berhasil disimpan.');
        }
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
        $kategory = Kategory::findorfail($id);
        $validator = Validator::make($request->all(), [
            'deskripsi' => 'required|min:10|max:255',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            if ($request->status == 'on') {
                $check_status = 'on';
            } else {
                $check_status = 'off';
            }

            $data = [
                'deskripsi' => $request->deskripsi,
                'status' => $check_status,
            ];
            $kategory->update($data);
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
            $kategory = Kategory::findorfail($id);
            unlink(public_path() . '/admin-assets/img/kategory/' . $kategory->gambar);
            $kategory->delete();
            return back()->with('toast_success', 'Berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('toast_error', 'Data tidak dapat dihapus.');
        }
    }
}
