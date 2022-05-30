<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToolsAcademy extends Model
{
    protected $fillable = [
        'tools_id',
        'academy_id',
    ];

    public function tools()
    {
        return $this->belongsTo('App\Tools', 'tools_id');
    }

    public function academies()
    {
        return $this->belongsTo('App\Academy', 'academy_id');
    }
}
