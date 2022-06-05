<?php

namespace App\Http\Controllers\Member;

use App\DataPribadiUser;
use App\Http\Controllers\Controller;
use App\NotifikasiMember;
use App\ProfilUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class SettingsProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = request('pages');
        $user = User::findorfail(Auth::user()->id);
        if ($pages == 'profile') {
            $title = 'Profil Pengguna';
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();

            $profile = ProfilUser::where('user_id', $user->id)->first();
            return view('member.settings.profile', compact(
                'title',
                'data_notifikasi',
                'user',
                'profile'
            ));
        } elseif ($pages == 'personal') {
            $title = 'Data Pribadi';
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();

            $data_pribadi = DataPribadiUser::where('user_id', $user->id)->first();
            return view('member.settings.personal', compact(
                'title',
                'data_notifikasi',
                'user',
                'data_pribadi'
            ));
        } elseif ($pages == 'account') {
            $title = 'Ganti Password';
            $data_notifikasi = NotifikasiMember::where('to_user_id', Auth::user()->id)->where('status', '0')->orderBy('id', 'desc')->get();

            return view('member.settings.account', compact(
                'title',
                'data_notifikasi'
            ));
        }
    }


    public function profile(Request $request)
    {
        $user = User::findorfail(Auth::user()->id);
        $request->validate([
            'nama_lengkap' => 'required|min:3|max:100',
            'headline' => 'max:255',
            'tentang_saya' => 'max:500',
            'username' => 'required|unique:users,username,' . $user->id,
            'foto_profil' => 'max:500000',
        ]);

        if ($request->hasFile('foto_profil')) {
            $foto_profil = $request->file('foto_profil');
            $nama_file = time() . '.' . $foto_profil->getClientOriginalExtension();
            $foto_profil->move('avatar/', $nama_file);
            $data_user = [
                'avatar' => $nama_file,
                'username' => $request->username,
            ];
            if ($user->avatar != 'default.png') {
                unlink(public_path() . '/avatar/' . $user->avatar);
            }
        } else {
            $data_user = [
                'username' => $request->username,
            ];
        }
        $user->update($data_user);

        // perbarui atau simpan data profile 

        $profile = ProfilUser::where('user_id', $user->id)->first();
        if (is_null($profile)) {
            $profile_user = new ProfilUser([
                'user_id' => $user->id,
                'nama_lengkap' => $request->nama_lengkap,
                'headline' => $request->headline,
                'tentang_saya' => $request->tentang_saya,
            ]);
            $profile_user->save();
        } else {
            $data_profile = [
                'nama_lengkap' => $request->nama_lengkap,
                'headline' => $request->headline,
                'tentang_saya' => $request->tentang_saya,
            ];
            $profile->update($data_profile);
        }
        return back()->with('toast_success', 'Berhasil diperbarui.');
    }

    public function personal(Request $request)
    {
        $user = User::findorfail(Auth::user()->id);
        $request->validate([
            'nomor_telepon' => 'required|numeric|digits_between:10,12',
            'kota_domisili' => 'required|min:3|max:50',
            'tempat_lahir' => 'required|min:3|max:50',
            'tanggal_lahir' => 'required|date|before:today',
            'pendidikan_terakhir' => 'required|min:3|max:50',
            'pekerjaan' => 'max:50',
            'institusi_tempat_bekerja' => 'max:100',
        ]);

        $data_pribadi = DataPribadiUser::where('user_id', $user->id)->first();
        if (is_null($data_pribadi)) {
            $data_pribadi = new DataPribadiUser([
                'user_id' => $user->id,
                'nomor_telepon' => $request->nomor_telepon,
                'kota_domisili' => $request->kota_domisili,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'pekerjaan' => $request->pekerjaan,
                'institusi_tempat_bekerja' => $request->institusi_tempat_bekerja,
            ]);
            $data_pribadi->save();
        } else {
            $update_data = [
                'nomor_telepon' => $request->nomor_telepon,
                'kota_domisili' => $request->kota_domisili,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'pekerjaan' => $request->pekerjaan,
                'institusi_tempat_bekerja' => $request->institusi_tempat_bekerja,
            ];
            $data_pribadi->update($update_data);
        }
        return back()->with('toast_success', 'Berhasil diperbarui.');
    }
}
