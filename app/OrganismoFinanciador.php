<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrganismoFinanciador extends Model
{
    use SoftDeletes;
    protected $table = 'organismo_financiadores';
    
    protected $fillable = [
        'user_id',
        'descripcion',
        'sigla',
        'o_estado',
        'gestion',
        'codigo',
        'fecha',
        'estado',
        'deleted_at',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
