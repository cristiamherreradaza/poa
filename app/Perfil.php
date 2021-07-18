<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model
{
    protected $table = 'Perfiles';
    use SoftDeletes;

    protected $fillable = [
        'nombre', 
        'descripcion', 
        'estado'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
