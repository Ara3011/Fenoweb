<?php

namespace App\Models;

use App\Response;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Especie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'especies';
    protected $primaryKey ='id_especie';
    protected $fillable = ['descripcion'];
    public function getResponses()
    {
        return $this->hasMany(Response::class);
    }


}


