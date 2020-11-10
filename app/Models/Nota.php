<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nota extends Model
{
    use SoftDeletes;

    protected $table='notas';
    protected $primaryKey = 'id_nota';
    protected $fillable = [
        'dia_juliano', 'hallazgos', 'temperatura_maxima','temperatura_minima',
        'precipitacion','intensidad_fenofase', 'id_observador','id_individuo','id_sitio','id_fenofase','id_clima',
    ];

    public function getResponses()//Obtener
    {
        return $this->hasMany(Response::class);
    }
}
