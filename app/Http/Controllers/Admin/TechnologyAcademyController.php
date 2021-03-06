<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TechnologyAcademyController extends Controller
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
            'nama_teknologi' => 'required|min:3|max:255',
            'icon' => 'required|min:5|max:100',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $technology = new Technology([
                'nama_teknologi' => $request->nama_teknologi,
                'icon' => $request->icon,
            ]);
            $technology->save();
            return redirect('admin/academy')->with('toast_success', 'Berhasil disimpan.');
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
            $technology = Technology::findorfail($id);
            $technology->delete();
            return back()->with('toast_success', 'Berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('toast_error', 'Data tidak dapat dihapus.');
        }
    }
}
