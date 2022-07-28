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

    // LANJUT KE FILTER URUTKAN & KEYWORD

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['materi'] ?? false, function ($query, $materi) {
            return $query->where('materi_silabus_id', $materi);
        });

        $query->when($filters['orderBy'] ?? false, function ($query, $orderBy) {
            if ($orderBy == "Terbaru") {
                return $query->orderBy('created_at', 'DESC');
            } elseif ($orderBy == "Terlama") {
                return $query->orderBy('created_at', 'ASC');
            } elseif ($orderBy == "Selesai") {
                return $query->orderBy('status', 'DESC');
            } elseif ($orderBy == "Belum Selesai") {
                return $query->orderBy('status', 'ASC');
            }
        });

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('pertanyaan', 'like', '%' . $search . '%');
        });

        $query->when($filters['keyword'] ?? false, function ($query, $keyword) {
            $kata_kunci = KataKunci::where('key', $keyword)->first();
            $data_diskusi_materi_id = KataKunciDiskusi::where('kata_kunci_id', $kata_kunci->id)->get('diskusi_materi_id');
            return $query->whereIn('id', $data_diskusi_materi_id);
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
