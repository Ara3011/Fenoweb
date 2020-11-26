<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipio extends Model
{
    use SoftDeletes;

    protected $table='municipios';
    protected $primaryKey = 'id_municipio';
    protected $fillable = [
        'nombre','id_estado'
    ];

    public function getResponses()//Obtener
    {
        return $this->hasMany(Response::class);
    }

    public function estados()
    {
        return $this->belongsTo('App\Models\Estado','id_estado');
    }
}
