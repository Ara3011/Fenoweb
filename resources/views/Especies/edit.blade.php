@extends('Template.headerf')
@section('content')

    <form action={{url('/especies/'.$especie->id_especie)}} method="POST">
        {{csrf_field()}}
        {{method_field('PATCH')}}

        <div class="row card-bodyy">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <center><strong>Nombre de especie:</strong>
                        <input type="text" name="descripcion" class="form-catalogo" placeholder="Especie"
                               value="{{$especie->descripcion}}"></center>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success" value="Editar">Actualizar especie</button>
            </div>
        </div>
<div><br></div>
    </form>
@endsection

