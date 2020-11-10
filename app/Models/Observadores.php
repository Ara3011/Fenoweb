<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Observadores extends Model
{
    use SoftDeletes;

    protected $table='observadores';
    protected $primaryKey = 'id_observador';
    protected $fillable = [
        'nom', 'ap', 'am','email','password,','insignias'

    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getResponses()//Obtener
    {
        return $this->hasMany(Response::class);
    }
}
