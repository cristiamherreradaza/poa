<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    //

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'evento_id',
        'estado',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function evento()
    {
        return $this->belongsTo('App\Evento', 'evento_id');
    }

}
