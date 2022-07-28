<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    protected $fillable = [
        'kategory_id',
        'nama_kelas',
        'gambar',
        'level',
        'deskripsi',
        'minimum_ram',
        'minimum_layar',
        'minimum_sistem_operasi',
        'minimum_processor',
        'status',
        'jenis_kelas',
        'biaya'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['kategories'] ?? false, function ($query, $kategories) {
            return $query->where('kategory_id', $kategories);
        });

        $query->when($filters['jenis_kelas'] ?? false, function ($query, $jenis_kelas) {
            if ($jenis_kelas != 'Semua Jenis') {
                return $query->where('jenis_kelas', $jenis_kelas);
            }
        });

        $query->when($filters['level'] ?? false, function ($query, $level) {
            return $query->whereIn('level', $level);
        });

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama_kelas', 'like', '%' . $search . '%')
                ->orWhere('deskripsi', 'like', '%' . $search . '%');
        });
    }

    public function kategories()
    {
        return $this->belongsTo('App\Kategory', 'kategory_id');
    }

    public function fasilitas_academies()
    {
        return $this->hasMany('App\FasilitasAcademy');
    }

    public function tools_academies()
    {
        return $this->hasMany('App\ToolsAcademy');
    }

    public function technology_academies()
    {
        return $this->hasMany('App\TechnologyAcademy');
    }

    public function silabus_academies()
    {
        return $this->hasMany('App\SilabusAcademy');
    }

    public function diskusi_academies()
    {
        return $this->hasMany('App\DiskusiAcademy');
    }

    public function peserta_academies()
    {
        return $this->hasMany('App\PesertaAcademy');
    }

    public function testimoni_academies()
    {
        return $this->hasMany('App\TestimoniAcademy');
    }
}
