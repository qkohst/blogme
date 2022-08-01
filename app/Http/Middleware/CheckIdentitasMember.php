<?php

namespace App\Http\Middleware;

use App\DataPribadiUser;
use App\ProfilUser;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIdentitasMember
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
        $profil_user = ProfilUser::where('user_id', $request->user()->id)->first();
        $data_pribadi_user = DataPribadiUser::where('user_id', $request->user()->id)->first();
        if ($profil_user != null && $data_pribadi_user != null) {
            return $next($request);
        }
        return redirect('/settings?pages=profile')->with('toast_warning', 'Lengkapi profil dan data pribadi anda untuk melanjutkan.');
    }
}
