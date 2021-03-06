<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use App\Http\Controllers\Controller;
use App\NotifikasiAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'FAQ';
        $data_notifikasi = NotifikasiAdmin::where('status', '0')->orderBy('id', 'desc')->get();

        $faqs = Faq::all();
        return view('admin.faq.index', compact(
            'title',
            'data_notifikasi',
            'faqs'
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
            'pertanyaan' => 'required|min:10|max:255',
            'jawaban' => 'required|min:10',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $faq = new Faq([
                'pertanyaan' => $request->pertanyaan,
                'jawaban' => $request->jawaban,
            ]);
            $faq->save();
            return redirect('admin/faq')->with('toast_success', 'Berhasil disimpan.');
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
        $faq = Faq::findorfail($id);
        $validator = Validator::make($request->all(), [
            'jawaban' => 'required|min:10',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $data = [
                'jawaban' => $request->jawaban,
            ];
            $faq->update($data);
            return redirect('admin/faq')->with('toast_success', 'Berhasil diedit.');
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
        $faq = Faq::findorfail($id);
        $faq->delete();
        return back()->with('toast_success', 'Berhasil dihapus.');
    }
}
