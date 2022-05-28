<?php

namespace App\Http\Middleware;

use App\MateriSilabus;
use App\PesertaAcademy;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckTipePembaca
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
        if ($materi->tipe_pembaca == 'Semua Orang') {
            return $next($request);
        } else {
            $peserta = PesertaAcademy::where('academies_id', $materi->silabus_academies->academies_id)->where('users_id', Auth::user()->id)->first();
            if (is_null($peserta)) {
                return redirect('member/academy/class/' . $materi->silabus_academies->academies_id . '/register')->with('toast_warning', 'Anda belum terdaftar pada kelas ini.');
            } elseif ($peserta->status == 'approved') {
                return $next($request);
            } else {
                return redirect('member/orders?pages=waiting')->with('toast_warning', 'Selesaikan pembayaran untuk melanjutkan.');
            }
        }
    }
}
