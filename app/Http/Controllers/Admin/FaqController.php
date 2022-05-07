<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use App\Http\Controllers\Controller;
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
        $faqs = Faq::all();
        return view('admin.faq.index', compact(
            'title',
            'faqs'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah FAQ';
        $title2 = 'FAQ';
        return view('admin.faq.create', compact(
            'title',
            'title2'
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
        $title = 'Edit FAQ';
        $title2 = 'FAQ';
        $faq = Faq::findorfail($id);
        return view('admin.faq.edit', compact(
            'title',
            'title2',
            'faq'
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
