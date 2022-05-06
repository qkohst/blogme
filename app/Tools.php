<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tools extends Model
{
    protected $fillable = [
        'nama_tool',
        'icon',
    ];

    public function tools_academies()
    {
        return $this->hasMany('App\ToolsAcademy');
    }
}
