@extends('Template.headfoot')
@section('content')

    <form action={{url('/climas/'.$clima->id_clima)}} method="POST" >
        {{csrf_field()}}
        {{method_field('PATCH')}}

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12"style="left: 600px">
                <div class="form-group">
                    <strong>Nombre del clima:</strong>
                    <input type="text" name="descripcion" class="form-control" placeholder="Clima" value="{{$clima->descripcion}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center"style="left: 600px">
                <button type="submit" class="btn btn-success" value="Editar">Actualizar clima</button>
            </div>
        </div>

    </form>
@endsection

