<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sitio extends Model
{
    use SoftDeletes;

    protected $table='sitios';
    protected $primaryKey = 'id_sitio';
    protected $fillable = [
        'nombre', 'comunidad', 'latitud','longitud','altitud','id_municipio',
    ];

    public function getResponses()//Obtener
    {
        return $this->hasMany(Response::class);
    }
}
