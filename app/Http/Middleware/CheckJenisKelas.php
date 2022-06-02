<?php

namespace App\Http\Middleware;

use App\Academy;
use App\MateriSilabus;
use App\PesertaAcademy;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckJenisKelas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $materi = MateriSilabus::findorfail(request('materi'));
        $academy = Academy::findorfail($materi->silabus_academies->academy_id);
        if ($academy->jenis_kelas == 'Gratis') {
            return $next($request);
        } else {
            $peserta = PesertaAcademy::where('academy_id', $materi->silabus_academies->academy_id)->where('user_id', Auth::user()->id)->first();
            if (is_null($peserta)) {
                return redirect('member/academy/class/' . $materi->silabus_academies->academy_id . '/register')->with('toast_warning', 'Anda belum terdaftar pada kelas ini.');
            } elseif ($peserta->status == 'approved') {
                return $next($request);
            } else {
                return redirect('member/orders?pages=waiting')->with('toast_warning', 'Selesaikan pembayaran untuk melanjutkan.');
            }
        }
    }
}
