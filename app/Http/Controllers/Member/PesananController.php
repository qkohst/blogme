<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\NotifikasiAdmin;
use App\PesertaAcademy;
use App\RekeningBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = request('pages');
        if ($pages == 'waiting') {
            $title = 'Menunggu Pembayaran';
            $pesanan_kelas = PesertaAcademy::where('user_id', Auth::user()->id)->where('status', 'waiting')->where('bukti_transfer', null)->orderBy('id', 'desc')->get();
            return view('member.orders.waiting', compact(
                'title',
                'pesanan_kelas'
            ));
        } elseif ($pages == 'process') {
            $title = 'Menunggu Proses Verifikasi';
            $pesanan_kelas = PesertaAcademy::where('user_id', Auth::user()->id)->where('status', 'waiting')->where('bukti_transfer', '!=', null)->orderBy('id', 'desc')->get();
            return view('member.orders.process', compact(
                'title',
                'pesanan_kelas'
            ));
        } elseif ($pages == 'rejected') {
            $title = 'Pesanan Ditolak';
            $pesanan_kelas = PesertaAcademy::where('user_id', Auth::user()->id)->where('status', 'rejected')->orderBy('id', 'desc')->get();
            return view('member.orders.rejected', compact(
                'title',
                'pesanan_kelas'
            ));
        } elseif ($pages == 'approved') {
            $title = 'Pesanan Selesai';
            $pesanan_kelas = PesertaAcademy::where('user_id', Auth::user()->id)->where('status', 'approved')->orderBy('id', 'desc')->get();
            return view('member.orders.approved', compact(
                'title',
                'pesanan_kelas'
            ));
        } elseif ($pages == 'banks') {
            $title = 'Informasi Pembayaran';
            $banks = RekeningBank::all();
            return view('member.orders.banks', compact(
                'title',
                'banks'
            ));
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
        $peserta = PesertaAcademy::findorfail($id);
        $validator = Validator::make($request->all(), [
            'bukti_transfer' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $bukti_transfer = $request->file('bukti_transfer');
            $nama_file = time() . '.' . $bukti_transfer->getClientOriginalExtension();
            $bukti_transfer->move('bukti_transfer/', $nama_file);
            $data = [
                'bukti_transfer' => $nama_file,
                'status' => 'waiting',
                'catatan_verifikasi' => null,
            ];
            if (!is_null($peserta->bukti_transfer)) {
                unlink(public_path() . '/bukti_transfer/' . $peserta->bukti_transfer);
            }
            $peserta->update($data);

            // Add Notifikasi Admin 
            $notifikasi = new NotifikasiAdmin([
                'user_id' => Auth::user()->id,
                'judul' => 'Pendaftaran Peserta Baru',
                'url' => 'admin/peserta',
                'status' => '0',
            ]);
            $notifikasi->save();

            return redirect('/member/orders?pages=process')->with('toast_success', 'Berhasil diupload.');
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
            $peserta = PesertaAcademy::findorfail($id);
            $peserta->delete();
            return back()->with('toast_success', 'Berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('toast_error', 'Data tidak dapat dihapus.');
        }
    }
}
