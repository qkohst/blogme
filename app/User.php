<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'role', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profil_users()
    {
        return $this->hasOne('App\ProfilUser');
    }

    public function data_pribadi_users()
    {
        return $this->hasOne('App\DataPribadiUser');
    }

    public function riwayat_belajars()
    {
        return $this->hasMany('App\RiwayatBelajar');
    }

    public function diskusi_academies()
    {
        return $this->hasMany('App\DiskusiAcademy');
    }

    public function peserta_academies()
    {
        return $this->hasMany('App\PesertaAcademy');
    }

    public function notifikasi_admins()
    {
        return $this->hasMany('App\NotifikasiAdmin');
    }

    public function notifikasi_members()
    {
        return $this->hasMany('App\NotifikasiMember');
    }

    public function laporan_materis()
    {
        return $this->hasMany('App\LaporanMateri');
    }

    public function diskusi_materis()
    {
        return $this->hasMany('App\DiskusiMateri');
    }
}
