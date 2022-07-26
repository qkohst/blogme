<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiskusiMateri extends Model
{
    protected $fillable = [
        'user_id',
        'materi_silabus_id',
        'pertanyaan',
        'uraian_pertanyaan',
        'status',
    ];

    // LANJUT KE FILTER 

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['materi'] ?? false, function ($query, $materi) {
            return $query->where('materi_silabus_id', $materi);
        });
    }

    public function materi_silabuses()
    {
        return $this->belongsTo('App\MateriSilabus', 'materi_silabus_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function kata_kunci_diskusis()
    {
        return $this->hasMany('App\KataKunciDiskusi');
    }
}
