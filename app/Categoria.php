<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre', 
        'estado',
        'deleted_at'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
