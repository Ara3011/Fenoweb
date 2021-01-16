@extends('Template.headerf')
@section('content')

    <form action={{url('/familias/'.$familia->id_familia)}} method="POST" >
        {{csrf_field()}}
        {{method_field('PATCH')}}

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group">
                    <strong>Nombre de familia:</strong>
                    <input type="text" name="descripcion" class="form-control" placeholder="Familia" value="{{$familia->descripcion}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center" >
                <button type="submit" class="btn btn-success" value="Editar">Actualizar familia</button>
            </div>
        </div>

    </form>
@endsection

