<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partida extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'nombre',
        'depende',
        'gestion',
        'codigo',
        'estado',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
