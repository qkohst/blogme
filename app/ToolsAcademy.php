<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToolsAcademy extends Model
{
    protected $fillable = [
        'tools_id',
        'academies_id',
    ];

    public function tools()
    {
        return $this->belongsTo('App\Tools');
    }

    public function academies()
    {
        return $this->belongsTo('App\Academy');
    }
}
