<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\NotifikasiMember;
use App\PesertaAcademy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = request('pages');
        $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();
        $user = User::findorfail(Auth::user()->id);

        $data_peserta = PesertaAcademy::where('user_id', Auth::user()->id)->whereIn('status', ['approved', 'finish'])->get();
        if ($pages == 'tentang-saya') {
            $title = 'Tentang Saya';
            return view('member.profile.tentang-saya', compact(
                'title',
                'data_notifikasi',
                'user',
                'data_peserta',
            ));
        } elseif ($pages == 'academy') {
            $title = 'Kelas Saya';
            return view('member.profile.academy', compact(
                'title',
                'data_notifikasi',
                'user',
                'data_peserta',
            ));
        }
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
        //
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
