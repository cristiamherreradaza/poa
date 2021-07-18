<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 
        'nombre', 
        'descripcion', 
        'imagen', 
        'fecha_inicio', 
        'fecha_fin', 
        'tipo', 
        'estado',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function asistencias()
    {
        return $this->hasMany('App\Asistencia');
    }

}
