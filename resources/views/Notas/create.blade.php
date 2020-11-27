@extends('Template.headfoot')
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/notas" method="POST" >
        @csrf

        <div class="row ">
            <div class="col-xs-12 col-sm-12 col-md-12"style="left: 600px">
                <div class="form-group card card-body" style="width: 800px; right: 220px">
                    <strong>Día Juliano:</strong>
                    <input type="text" name="dia_juliano" class="form-control" placeholder="2014323">
                    <strong>Observadores:</strong><br>
                    <select name="id_observador" id="id_observador">
                        <option value="" disabled selected>Seleccione un observador</option>
                        @foreach($observadores as $observador)
                            <option value={{$observador->id_observador}}>{{$observador->nombre}}</option>
                        @endforeach
                    </select>
                    <strong>Hallazgos:</strong><br>
                    <textarea name="hallazgos" id="hallazgos" cols="30" rows="5"></textarea><br>
                    <strong>Temperatura máxima:</strong>
                    <input type="number" name="temperatura_maxima" class="form-control" placeholder="">
                    <strong>Temperatura minima:</strong>
                    <input type="number" name="temperatura_minima" class="form-control" placeholder="">
                    <strong>Precipitación:</strong><br>
                    <input type="number" name="precipitacion" class="form-control" placeholder="">
                    <strong>Intensidad Fenofase:</strong><br>
                    <input type="number" name="intensidad_fenofase" class="form-control" placeholder="">
                    <strong>Individuos:</strong><br>
                    <select name="id_individuo" id="id_individuo">
                        <option value="" disabled selected>Seleccione una especie</option>
                        @foreach($individuos as $individuo)
                            <option value={{$individuo->id_individuo}}>{{$individuo->nombre_comun}}</option>
                        @endforeach
                    </select>
                    <strong>Sitios:</strong><br>
                    <select name="id_sitio" id="id_sitio">
                        <option value="" disabled selected>Seleccione un sitio</option>
                    @foreach($sitios as $sitio)
                        <option value={{$sitio->id_sitio}}>{{$sitio->sitio}}</option>
                    @endforeach
                    </select>
                    <strong>Fenofases:</strong><br>
                    <select name="id_fenofase" id="id_fenofase">
                        <option value="" disabled selected>Seleccione una fenofase</option>
                        @foreach($fenofases as $fenofase)
                            <option value={{$fenofase->id_fenofase}}>{{$fenofase->fenofase}}</option>
                        @endforeach
                    </select>
                    <strong>Climas:</strong><br>
                    <select name="id_clima" id="id_clima">
                        <option value="" disabled selected>Seleccione un clima</option>
                        @foreach($climas as $clima)
                            <option value={{$clima->id_clima}}>{{$clima->clima}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center"style="left: 250px;">
                <button type="submit" class="btn btn-success"style="width: 200px;" >Crear</button>
            </div>
        </div>

    </form>
@endsection
