<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Individuo extends Model
{
    use SoftDeletes;

    protected $table='individuos';
    protected $primaryKey = 'id_individuo';
    protected $fillable = [
        'nombre_comun', 'uso', 'id_genero','id_subespecie','id_familia','id_bbch'
    ];

    public function getResponses()//Obtener
    {
        return $this->hasMany(Response::class);
    }
    public function getSubEspecie($id){
        return Subespecie::findOrFail($id);
    }

}
