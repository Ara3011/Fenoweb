@extends('Template.headfoot')
@section('content')

    <form action={{url('/especies/'.$especie->id_especie)}} method="POST" >
        {{csrf_field()}}
        {{method_field('PATCH')}}

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre de especie:</strong>
                    <input type="text" name="descripcion" class="form-control" placeholder="Especie" value="{{$especie->descripcion}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success" value="Editar">Actualizar</button>
            </div>
        </div>

    </form>
@endsection

