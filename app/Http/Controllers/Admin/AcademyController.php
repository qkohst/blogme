<?php

namespace App\Http\Controllers\Admin;

use App\Academy;
use App\Fasilitas;
use App\FasilitasAcademy;
use App\Http\Controllers\Controller;
use App\Kategory;
use App\MateriSilabus;
use App\SilabusAcademy;
use App\Technology;
use App\TechnologyAcademy;
use App\Tools;
use App\ToolsAcademy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AcademyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Academy';
        $academies = Academy::orderBy('created_at', 'desc')->get();
        foreach ($academies as $academy) {
            $academy->count_silabus = SilabusAcademy::where('academies_id', $academy->id)->count();
        }

        $kategories = Kategory::all();
        $data_fasilitas = Fasilitas::all();
        $tools = Tools::all();
        $technologies = Technology::all();
        return view('admin.academy.index', compact(
            'title',
            'academies',
            'kategories',
            'data_fasilitas',
            'tools',
            'technologies',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Kelas';
        $title2 = 'Academy';
        $kategories = Kategory::where('status', 'on')->get();
        $data_fasilitas = Fasilitas::all();
        $tools = Tools::all();
        $technologies = Technology::all();
        return view('admin.academy.create', compact(
            'title',
            'title2',
            'kategories',
            'data_fasilitas',
            'tools',
            'technologies'
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
        $request->validate([
            'nama_kelas' => 'required|min:3|max:100|unique:academies,nama_kelas',
            'gambar' => 'required',
            'kategori' => 'required',
            'jenis_kelas' => 'required',
            'level' => 'required|in:Dasar,Pemula,Menengah,Mahir,Profesional',
            'fasilitas_kelas'    => 'required|array|min:3',
            'deskripsi' => 'required|min:50',
            'minimum_ram' => 'required|min:3|max:100',
            'minimum_layar' => 'required|min:3|max:100',
            'minimum_sistem_operasi' => 'required|min:3|max:100',
            'minimum_processor' => 'required|min:3|max:100',
            'tools' => 'required|array|min:2',
            'teknologi' => 'required|array|min:1',
        ]);

        if($request->jenis_kelas == 'Berbayar'){
            $request->validate([
                'biaya' => 'required|numeric|min:5000',
            ]);
        }

        $gambar = $request->file('gambar');
        $nama_file = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->move('admin-assets/img/academies/', $nama_file);

        $academy = new Academy([
            'kategories_id' => $request->kategori,
            'nama_kelas' => $request->nama_kelas,
            'gambar' => $nama_file,
            'level' => $request->level,
            'deskripsi' => $request->deskripsi,
            'minimum_ram' => $request->minimum_ram,
            'minimum_layar' => $request->minimum_layar,
            'minimum_sistem_operasi' => $request->minimum_sistem_operasi,
            'minimum_processor' => $request->minimum_processor,
            'status' => 'off',
            'jenis_kelas' => $request->jenis_kelas,
            'biaya' => $request->biaya,
        ]);
        $academy->save();

        // Add data to table fasilitas academies
        for ($count_fasilitas = 0; $count_fasilitas < count($request->fasilitas_kelas); $count_fasilitas++) {
            $data_fasilitas = array(
                'fasilitas_id' => $request->fasilitas_kelas[$count_fasilitas],
                'academies_id'  => $academy->id,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            );
            $insert_data_fasilitas[] = $data_fasilitas;
        }
        FasilitasAcademy::insert($insert_data_fasilitas);

        // Add data to table tools academies
        for ($count_tools = 0; $count_tools < count($request->tools); $count_tools++) {
            $data_tools = array(
                'tools_id' => $request->tools[$count_tools],
                'academies_id'  => $academy->id,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            );
            $insert_data_tools[] = $data_tools;
        }
        ToolsAcademy::insert($insert_data_tools);

        // Add data to table technology academies
        for ($count_technology = 0; $count_technology < count($request->teknologi); $count_technology++) {
            $data_teknologi = array(
                'technologies_id' => $request->teknologi[$count_technology],
                'academies_id'  => $academy->id,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            );
            $insert_data_teknologi[] = $data_teknologi;
        }
        TechnologyAcademy::insert($insert_data_teknologi);

        return redirect('admin/academy')->with('toast_success', 'Berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Kelas';
        $title2 = 'Academy';
        $academy = Academy::findorfail($id);
        $fasilitas_academies = FasilitasAcademy::where('academies_id', $academy->id)->get();
        $tools_academies = ToolsAcademy::where('academies_id', $academy->id)->get();
        $technologies_academies = TechnologyAcademy::where('academies_id', $academy->id)->get();

        $silabus_academies = SilabusAcademy::where('academies_id', $academy->id)->get();
        foreach ($silabus_academies as $silabus) {
            $silabus->count_artikel = MateriSilabus::where('silabus_academies_id', $silabus->id)->where('tipe_materi', 1)->count();
            $silabus->count_vidio = MateriSilabus::where('silabus_academies_id', $silabus->id)->where('tipe_materi', 2)->count();
            $silabus->count_kuis = MateriSilabus::where('silabus_academies_id', $silabus->id)->where('tipe_materi', 3)->count();
            $silabus->count_submission = MateriSilabus::where('silabus_academies_id', $silabus->id)->where('tipe_materi', 4)->count();
        }

        $durasi_belajar = SilabusAcademy::where('academies_id', $academy->id)->sum('waktu_belajar');
        return view('admin.academy.show', compact(
            'title',
            'title2',
            'academy',
            'fasilitas_academies',
            'tools_academies',
            'technologies_academies',
            'silabus_academies',
            'durasi_belajar'
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
        $title = 'Edit Kelas';
        $title2 = 'Detail';
        $title3 = 'Academy';
        $academy = Academy::findorfail($id);
        $fasilitas_academies = FasilitasAcademy::where('academies_id', $academy->id)->get();
        $tools_academies = ToolsAcademy::where('academies_id', $academy->id)->get();
        $technologies_academies = TechnologyAcademy::where('academies_id', $academy->id)->get();

        $kategories = Kategory::where('status', 'on')->get();
        return view('admin.academy.edit', compact(
            'title',
            'title2',
            'title3',
            'academy',
            'fasilitas_academies',
            'kategories',
            'tools_academies',
            'technologies_academies'
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
        $academy = Academy::findorfail($id);
        $request->validate([
            'kategori' => 'required',
            'jenis_kelas' => 'required',
            'level' => 'required|in:Dasar,Pemula,Menengah,Mahir,Profesional',
            'deskripsi' => 'required|min:50',
            'minimum_ram' => 'required|min:3|max:100',
            'minimum_layar' => 'required|min:3|max:100',
            'minimum_sistem_operasi' => 'required|min:3|max:100',
            'minimum_processor' => 'required|min:3|max:100',
        ]);

        if($request->jenis_kelas == 'Berbayar'){
            $request->validate([
                'biaya' => 'required|numeric|min:5000',
            ]);
            $biaya = $request->biaya;
        }else{
            $biaya = null;
        }

        if ($request->status == 'on') {
            $check_status = 'on';
        } else {
            $check_status = 'off';
        }

        $data = [
            'level' => $request->level,
            'kategori' => $request->kategori,
            'jenis_kelas' => $request->jenis_kelas,
            'deskripsi' => $request->deskripsi,
            'minimum_ram' => $request->minimum_ram,
            'minimum_layar' => $request->minimum_layar,
            'minimum_sistem_operasi' => $request->minimum_sistem_operasi,
            'minimum_processor' => $request->minimum_processor,
            'status' => $check_status,
            'biaya' => $biaya,
        ];
        $academy->update($data);
        return redirect('admin/academy/' . $academy->id)->with('toast_success', 'Berhasil diedit.');
        
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
            $academy = Academy::findorfail($id);
            unlink(public_path() . '/admin-assets/img/academies/' . $academy->gambar);
            $academy->delete();
            return back()->with('toast_success', 'Berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('toast_error', 'Data tidak dapat dihapus.');
        }
    }
}
