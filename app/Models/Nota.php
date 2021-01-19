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
            ->join('sitios','sitios.id_sitio','=','notas.id_sitio')
            ->join('municipios','municipios.id_municipio','=','sitios.id_municipio')
            ->join('estados','estados.id_estado','=','municipios.id_estado')
            ->select ("especies.descripcion","fenofases.descrip_fenofase")
            ->selectRaw("min(notas.fecha) as primera_fecha")
            ->selectRaw("max(notas.fecha) as ultima_fecha")
            ->selectRaw("count(*) as resultado")
            ->groupBy("fenofases.descrip_fenofase","especies.descripcion");
           $datos->map(function($item) use (&$categorias,$valores){
                array_push($categorias,$item->descrip_fenofase);
           });
    }

    public function getDateFenofase($month, $year,$especie,$fenofase)
    {
        return Nota::join('individuos','individuos.id_individuo','=','notas.id_individuo')
            ->join('fenofases','fenofases.id_fenofase','=','notas.id_fenofase')
            ->join('subespecies','subespecies.id_subespecie','=','individuos.id_subespecie')
            ->join('especies','especies.id_especie','=','subespecies.id_especie')
            ->select("especies.descripcion as especie","fenofases.descrip_fenofase as fenofase")
            ->selectRaw("count(*) as observaciones")
            ->selectRaw("min(notas.fecha) as primer_fecha")
            ->selectRaw("max(notas.fecha) as ultima_fecha")
            ->whereMonth('notas.fecha',$month)
            ->whereYear("notas.fecha",$year)
            ->where("especies.descripcion",$especie)
            ->where("fenofases.descrip_fenofase",$fenofase)
            // ->groupBy("especies.descripcion","fenofases.descrip_fenofase","notas.fecha")
            ->orderBy("especie","asc")
            ->orderBy("fenofase","asc")->get();
    }
    public function getDateFenofase2($month, $year,$especie,$fenofase,$buscar_sitio,$buscar_comunidad,
    $buscar_municipio,$buscar_estado)
    {
        return Nota::join('fenofases','fenofases.id_fenofase','=','notas.id_fenofase')
            ->join('individuos','individuos.id_individuo','=','notas.id_individuo')
            ->join('subespecies','subespecies.id_subespecie','=','individuos.id_subespecie')
            ->join('especies','especies.id_especie','=','subespecies.id_especie')
            ->join('sitios','sitios.id_sitio','=','notas.id_sitio')
            ->join('municipios','municipios.id_municipio','=','sitios.id_municipio')
            ->join('estados','estados.id_estado','=','municipios.id_estado')
            ->select("especies.descripcion as especie","fenofases.descrip_fenofase as fenofase")
            ->selectRaw("count(*) as observaciones")
            ->selectRaw("min(notas.fecha) as primer_fecha")
            ->selectRaw("max(notas.fecha) as ultima_fecha")
            ->whereMonth('notas.fecha',$month)
            ->whereYear("notas.fecha",$year)
            ->where("especies.descripcion",$especie)
            ->where("fenofases.descrip_fenofase",$fenofase)
            ->where('sitios.nombre','like','%'.$buscar_sitio.'%')
            ->where('sitios.comunidad','like','%'.$buscar_comunidad.'%')
            ->where('municipios.nombre','like','%'.$buscar_municipio.'%')
            ->where('estados.nombre','like','%'.$buscar_estado.'%')
            // ->groupBy("especies.descripcion","fenofases.descrip_fenofase","notas.fecha")
            ->orderBy("especie","asc")
            ->orderBy("fenofase","asc")->get();
    }
    public function getDateFenofase3($month, $year,$fenofase,$buscar_especie)
    {
        return Nota::join('fenofases','fenofases.id_fenofase','=','notas.id_fenofase')
            ->join('individuos','individuos.id_individuo','=','notas.id_individuo')
            ->join('subespecies','subespecies.id_subespecie','=','individuos.id_subespecie')
            ->join('especies','especies.id_especie','=','subespecies.id_especie')
            ->join('sitios','sitios.id_sitio','=','notas.id_sitio')
            ->join('municipios','municipios.id_municipio','=','sitios.id_municipio')
            ->join('estados','estados.id_estado','=','municipios.id_estado')
            ->select("especies.descripcion as especie","fenofases.descrip_fenofase as fenofase")
            ->selectRaw("count(*) as observaciones")
            ->selectRaw("min(notas.fecha) as primer_fecha")
            ->selectRaw("max(notas.fecha) as ultima_fecha")
            ->whereMonth('notas.fecha',$month)
            ->whereYear("notas.fecha",$year)
            //->where("especies.descripcion",$especie)
            ->where("fenofases.descrip_fenofase",$fenofase)
            ->where('especies.descripcion','like','%'.$buscar_especie.'%')
            // ->groupBy("especies.descripcion","fenofases.descrip_fenofase","notas.fecha")
            ->orderBy("especie","asc")
            ->orderBy("fenofase","asc")->get();
    }
}
