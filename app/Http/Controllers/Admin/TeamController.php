<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Team;
use Faker\Core\File;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Tim Kami';
        $teams = Team::all();
        return view('admin.team.index', compact(
            'title',
            'teams'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Tim';
        $title2 = 'Tim Kami';
        return view('admin.team.create', compact(
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

        $request->validate([
            'nama_lengkap' => 'required|min:3|max:50',
            'email' => 'required|email:dns|min:5|max:50',
            'posisi' => 'required|min:3|max:50',
            'mulai_bekerja' => 'required|date',
            'deskripsi' => 'required|min:20|max:255',
            'foto_profil' => 'required',
            'twitter' => 'required|url|min:10|max:255',
            'facebook' => 'required|url|min:10|max:255',
            'instagram' => 'required|url|min:10|max:255',
            'linkedin' => 'required|url|min:10|max:255',
        ]);

        $foto_profil = $request->file('foto_profil');
        $nama_file = time() . '.' . $foto_profil->getClientOriginalExtension();
        $foto_profil->move('admin-assets/img/teams/', $nama_file);

        $team = new Team([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'posisi' => $request->posisi,
            'mulai_bekerja' => $request->mulai_bekerja,
            'deskripsi' => $request->deskripsi,
            'foto_profil' => $nama_file,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        ]);
        $team->save();
        return redirect('admin/team')->with('toast_success', 'Berhasil disimpan.');
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
        $title = 'Edit Identitas Tim';
        $title2 = 'Tim Kami';
        $team = Team::findorfail($id);
        return view('admin.team.edit', compact(
            'title',
            'title2',
            'team'
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
        $team = Team::findorfail($id);
        $request->validate([
            'email' => 'required|email:dns|min:5|max:50',
            'posisi' => 'required|min:3|max:50',
            'mulai_bekerja' => 'required|date',
            'deskripsi' => 'required|min:20|max:255',
            'twitter' => 'required|url|min:10|max:255',
            'facebook' => 'required|url|min:10|max:255',
            'instagram' => 'required|url|min:10|max:255',
            'linkedin' => 'required|url|min:10|max:255',
        ]);
        $data = [
            'email' => $request->email,
            'posisi' => $request->posisi,
            'mulai_bekerja' => $request->mulai_bekerja,
            'deskripsi' => $request->deskripsi,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        ];
        $team->update($data);
        return redirect('admin/team')->with('toast_success', 'Berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::findorfail($id);
        unlink(public_path() . '/admin-assets/img/teams/' . $team->foto_profil);
        $team->delete();
        return back()->with('toast_success', 'Berhasil dihapus.');
    }
}
