<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clima extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'climas';
    protected $primaryKey ='id_clima';
    protected $fillable = ['descripcion'];

}
