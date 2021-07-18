<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sector extends Model
{
    protected $table = 'Sectores';
    use SoftDeletes;

    protected $fillable = [
        'padre_id', 
        'nombre', 
        'departamento', 
        'descripcion', 
        'estado',
        'deleted_at'
    ];

    public function padre()
    {
        return $this->belongsTo('App\Sector', 'padre_id');
    }
}
