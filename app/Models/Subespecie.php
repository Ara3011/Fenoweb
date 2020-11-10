<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subespecie extends Model
{
    use SoftDeletes;

    protected $table='subespecies';
    protected $primaryKey = 'id_subespecie';
    protected $fillable = [
        'descripcion','id_especie'
    ];

    public function getResponses()//Obtener
    {
        return $this->hasMany(Response::class);
    }
}
