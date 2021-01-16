@extends('Template.headerf')
@section('content')

    <form action={{url('/escalas/'.$escala->id_bbch)}} method="POST" >
        {{csrf_field()}}
        {{method_field('PATCH')}}

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre de escala:</strong>
                    <input type="text" name="descripcion" class="form-control" placeholder="Escalas" value="{{$escala->descripcion}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success" value="Editar">Actualizar escala</button>
            </div>
        </div>

    </form>
@endsection

