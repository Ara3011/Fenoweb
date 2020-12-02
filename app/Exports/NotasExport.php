<?php

namespace App\Exports;

use App\Models\Nota;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class NotasExport implements FromCollection,  WithHeadings
{
    use Exportable;
    public function collection()
    {

            $datos = Nota::join('observadores','observadores.id_observador','=','notas.id_observador')
                ->join('individuos','individuos.id_individuo','=','notas.id_individuo')
                ->join('generos','generos.id_genero','=','individuos.id_genero')
                ->join('subespecies','subespecies.id_subespecie','=','individuos.id_subespecie')
                ->join('especies','especies.id_especie','=','subespecies.id_especie')
                ->join('escalas_bbch','escalas_bbch.id_bbch','=','individuos.id_bbch')
                ->join('sitios','sitios.id_sitio','=','notas.id_sitio')
                ->join('municipios','municipios.id_municipio','=','sitios.id_municipio')
                ->join('estados','estados.id_estado','=','municipios.id_estado')
                ->join('fenofases','fenofases.id_fenofase','=','notas.id_fenofase')
                ->join('familias','familias.id_familia','=','individuos.id_familia')
                ->selectRaw('notas.fecha as fecha')
                ->selectRaw('notas.dia_juliano as dia_juliano')
                ->selectRaw('observadores.nom as observador')
                ->selectRaw('individuos.nombre_comun as nombre_comun')
                ->selectRaw('familias.descripcion as familia')
                ->selectRaw('generos.descripcion as genero')
                ->selectRaw('especies.descripcion as especie')
                ->selectRaw('subespecies.descripcion as subespecies')
                ->selectRaw('escalas_bbch.descripcion as escala_bbch')
                ->selectRaw('sitios.nombre as sitio')
                ->selectRaw('sitios.comunidad as comunidad')
                ->selectRaw('municipios.nombre as municipio')
                ->selectRaw('estados.nombre as estado')
                ->selectRaw('sitios.latitud as latitud')
                ->selectRaw('sitios.longitud as longitud')
                ->selectRaw('sitios.altitud as altitud')
                ->selectRaw('fenofases.descrip_fenofase as fenofase')
                ->selectRaw('notas.intensidad_fenofase as int_feno')
                ->selectRaw('notas.precipitacion as precipitacion')
                ->selectRaw('notas.temperatura_minima as temperatura_minima')
                ->selectRaw('notas.temperatura_maxima as temperatura_maxima')
                ->selectRaw('notas.hallazgos as nota')
                ->get();
return $datos;

    }
    public function headings():array{
        return [
            'Fecha',
            'Día_juliano',
            'Observador',
            'Nombre_comun',
            'Familia',
            'Genero',
            'Especie',
            'Subespecie',
            'Escala_BBCH',
            'Sitio',
            'Comunidad',
            'Municipio',
            'Estado',
            'Latitud',
            'Longitud',
            'Altitud',
            'fenofase',
            'intensidad_Fenofase',
            'precipitación',
            'Temperatura_minima',
            'Temperatura_maxima',
            'Hallazgo',

        ];
    }
}

