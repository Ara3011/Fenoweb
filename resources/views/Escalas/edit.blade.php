@extends('Template.headerf')
@section('content')

    <form action={{url('/escalas/'.$escala->id_bbch)}} method="POST">
        {{csrf_field()}}
        {{method_field('PATCH')}}

        <div class="row card-bodyy">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <center><strong>Nombre de escala:</strong>
                        <input type="text" name="descripcion" class="form-catalogo" placeholder="Escalas"
                               value="{{$escala->descripcion}}"></center>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success" value="Editar">Actualizar escala</button>
            </div>
        </div>
    </form>
    <br>
@endsection

