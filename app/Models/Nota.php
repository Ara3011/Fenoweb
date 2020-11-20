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
    public function getCalendarioEspeciesInfo(){
        /*
         [
           {low:Date.parse("2019/03/02"),high:Date.parse("2019/4/3"),name:"28"},
           {low:Date.parse("2019/2/3"), high:Date.parse("2019/5/3"),name:"23"},
           {low:Date.parse("2019/3/3"), high:Date.parse("2019/4/3"),name:"34"},
        ]
         */
        $categorias=array();
        $valores=array();
      return $datos= $this->join('fenofases','fenofases.id_fenofase','=','notas.id_fenofase')
            ->join('individuos','individuos.id_individuo','=','notas.id_individuo')
            ->join('subespecies','subespecies.id_subespecie','=','individuos.id_subespecie')
            ->join('especies','especies.id_especie','=','subespecies.id_especie')
            ->select ("especies.descripcion","fenofases.descrip_fenofase")
            ->selectRaw("min(notas.created_at) as primera_fecha")
            ->selectRaw("max(notas.created_at) as ultima_fecha")
            ->selectRaw("count(*) as resultado")
            ->groupBy("fenofases.descrip_fenofase","especies.descripcion");



           $datos->map(function($item) use (&$categorias,$valores){
                array_push($categorias,$item->descrip_fenofase);
           });

    }
}
