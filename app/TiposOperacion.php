<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TiposOperacion extends Model
{
    use SoftDeletes;
    protected $table = 'tipos_operaciones';
    
    protected $fillable = [
        'user_id',
        'nombre',
        'estado',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}