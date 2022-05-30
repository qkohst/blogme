<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnologyAcademy extends Model
{
    protected $fillable = [
        'technology_id',
        'academy_id',
    ];

    public function technologies()
    {
        return $this->belongsTo('App\Technology', 'technology_id');
    }

    public function academies()
    {
        return $this->belongsTo('App\Academy', 'academy_id');
    }
}
