@extends('Template.headerf')
@section('content')

    <form action={{url('/climas/'.$clima->id_clima)}} method="POST" >
        {{csrf_field()}}
        {{method_field('PATCH')}}

        <div class="row card-bodyy">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                   <center> <strong>Nombre del clima:</strong>
                    <input type="text" name="descripcion" class="form-catalogo" placeholder="Clima" value="{{$clima->descripcion}}"></center>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success" value="Editar">Actualizar clima</button>
            </div>
        </div>
<div><br></div>
    </form>
@endsection

