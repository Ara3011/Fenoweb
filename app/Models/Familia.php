<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Familia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'familias';
    protected $primaryKey ='id_familia';
    protected $fillable = ['descripcion'];

}
