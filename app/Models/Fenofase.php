<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fenofase extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'fenofases';
    protected $primaryKey ='id_fenofase';
    protected $fillable = ['descrip_fenofase'];

}
