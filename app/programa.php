<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class programa extends Model
{
    use SoftDeletes;
    //esta linea  hace protegida a la tabla de la base de datos
    protected $table = 'programas';
    
    protected $fillable = [
        'user_id',
        'numero',
        'nombre',
        'estado',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
