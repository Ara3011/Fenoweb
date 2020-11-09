<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Escala extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'escalas_bbch';
    protected $primaryKey ='id_bbch';
    protected $fillable = ['descripcion'];

}
