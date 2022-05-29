<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\RekeningBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RekeningBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Rekening Bank';
        $rekening_bank = RekeningBank::all();
        return view('admin.bank.index', compact(
            'title',
            'rekening_bank'
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
        $validator = Validator::make($request->all(), [
            'nama_bank' => 'required|min:2|max:50',
            'nomor_rekening' => 'required|numeric|digits_between:5,15|unique:rekening_banks,nomor_rekening',
            'nama_pemilik' => 'required|min:3|max:50',
            'gambar' => 'required',
        ]);

        if ($request->nama_bank == 'Lainnya') {
            $validator = Validator::make($request->all(), [
                'other_bank' => 'required|min:2|max:50',
            ]);
            $bank = $request->other_bank;
        } else {
            $bank = $request->nama_bank;
        }

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $gambar = $request->file('gambar');
            $nama_file = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('admin-assets/img/rekening_bank/', $nama_file);

            $rekening = new RekeningBank([
                'nama_bank' => $bank,
                'nomor_rekening' => $request->nomor_rekening,
                'nama_pemilik' => $request->nama_pemilik,
                'gambar' => $nama_file,
            ]);
            $rekening->save();
            return back()->with('toast_success', 'Berhasil disimpan.');
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
        $bank = RekeningBank::findorfail($id);
        $validator = Validator::make($request->all(), [
            'nomor_rekening' => 'required|numeric|digits_between:5,15|unique:rekening_banks,nomor_rekening,' . $bank->id,
            'nama_pemilik' => 'required|min:3|max:50',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {

            $data = [
                'nomor_rekening' => $request->nomor_rekening,
                'nama_pemilik' => $request->nama_pemilik,
            ];
            $bank->update($data);
            return back()->with('toast_success', 'Berhasil diedit.');
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
            $bank = RekeningBank::findorfail($id);
            unlink(public_path() . '/admin-assets/img/rekening_bank/' . $bank->gambar);
            $bank->delete();
            return back()->with('toast_success', 'Berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('toast_error', 'Data tidak dapat dihapus.');
        }
    }
}
