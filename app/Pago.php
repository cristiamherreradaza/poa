<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 
        'monto', 
        'nmes', 
        'mes', 
        'gestion', 
        'fecha_pago', 
        'tipo', 
        'estado',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
