<?php

namespace App\Http\Controllers\Member;

use App\Academy;
use App\DiskusiMateri;
use App\Http\Controllers\Controller;
use App\KataKunci;
use App\KataKunciDiskusi;
use App\MateriSilabus;
use App\NotifikasiMember;
use App\PesertaAcademy;
use App\SilabusAcademy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiskusiMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $academy = Academy::findorfail($id);

        $title = 'Diskusi Kelas';
        $title2 = $academy->nama_kelas;

        $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();

        $silabus_academies = SilabusAcademy::where('academy_id', $id)->get();
        foreach ($silabus_academies as $silabus) {
            $silabus->materi_silabuses = MateriSilabus::where('silabus_academy_id', $silabus->id)->get();
        }

        $data_diskusi = DiskusiMateri::filter(request(['materi', 'search', 'orderBy', 'keyword']))->orderBy('created_at', 'DESC')->paginate(5);

        $keywords_populer = KataKunci::orderBy('jumlah_digunakan', 'DESC')->limit(10)->get();
        return view('academy.discussions.index', compact(
            'title',
            'title2',
            'data_notifikasi',
            'academy',
            'silabus_academies',
            'data_diskusi',
            'keywords_populer',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $academy = Academy::findorfail($id);
        $title = 'Buat Diskusi Baru';
        $title2 = 'Diskusi Kelas';
        $title3 = $academy->nama_kelas;
        $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();

        $silabus_academy_id = SilabusAcademy::where('academy_id', $id)->get('id');
        $materi_silabuses = MateriSilabus::whereIn('silabus_academy_id', $silabus_academy_id)->get();

        return view('academy.discussions.create', compact(
            'title',
            'title2',
            'title3',
            'data_notifikasi',
            'academy',
            'materi_silabuses',
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
            'pertanyaan' => 'required|min:5|max:255',
            'uraian_pertanyaan' => 'required|min:15',
            'modul' => 'required',
            'kata_kunci' => 'required|min:3',
        ]);

        // Validate Jumlah Kata Kunci 
        $array = explode(',', $request->kata_kunci);
        if (count($array) > 6) {
            return back()->with('toast_error', 'kata kunci maksimal 6 kata.');
        } else {
            // save Diskusi Materi 
            $diskusi = new DiskusiMateri([
                'user_id' => Auth::user()->id,
                'materi_silabus_id' => $request->modul,
                'pertanyaan' => $request->pertanyaan,
                'uraian_pertanyaan' => $request->uraian_pertanyaan,
                'status' => 1
            ]);
            $diskusi->save();

            // Save Kata Kunci 
            for ($i = 0; $i < count($array); $i++) {
                // Check kata kunci 
                $kata_kunci = KataKunci::where('key', $array[$i])->first();

                if (is_null($kata_kunci)) {
                    $kunci = new KataKunci([
                        'key' => $array[$i],
                        'jumlah_digunakan' => 1
                    ]);
                    $kunci->save();

                    $kata_kunci_diskusi = new KataKunciDiskusi([
                        'diskusi_materi_id' => $diskusi->id,
                        'kata_kunci_id' => $kunci->id
                    ]);
                    $kata_kunci_diskusi->save();
                } else {
                    // Update Jumlah penggunaan kata kunci
                    $data = [
                        'jumlah_digunakan' => $kata_kunci->jumlah_digunakan + 1
                    ];
                    $kata_kunci->update($data);

                    $kata_kunci_diskusi = new KataKunciDiskusi([
                        'diskusi_materi_id' => $diskusi->id,
                        'kata_kunci_id' => $kata_kunci->id
                    ]);
                    $kata_kunci_diskusi->save();
                }
            }
            return redirect('/member/academy/class/' . $diskusi->materi_silabuses->silabus_academies->academies->id . '/discussions?materi=' . $diskusi->materi_silabus_id)->with('toast_success', 'Berhasil disimpan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $discussion)
    {
        $academy = Academy::findorfail($id);

        $title = 'Detail Diskusi';
        $title2 = 'Diskusi Kelas';
        $title3 = $academy->nama_kelas;

        $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();
        $diskusi = DiskusiMateri::findorfail($discussion);
        return view('academy.discussions.show', compact(
            'title',
            'title2',
            'title3',
            'academy',
            'data_notifikasi',
            'diskusi',
        ));
       
        // LANJUTKAN TAMPILKAN DATA 
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
