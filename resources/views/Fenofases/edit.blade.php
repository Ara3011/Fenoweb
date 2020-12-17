@extends('Template.headfoot')
@section('content')

    <form action={{url('/fenofases/'.$fenofase->id_fenofase)}} method="POST" >
        {{csrf_field()}}
        {{method_field('PATCH')}}

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12" style="left: 600px">
                <div class="form-group">
                    <strong>Nombre de fenofase:</strong>
                    <input type="text" name="descrip_fenofase" class="form-control" placeholder="Fenofase" value="{{$fenofase->descrip_fenofase}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="left: 600px">
                <button type="submit" class="btn btn-success" value="Editar">Actualizar</button>
            </div>
        </div>

    </form>
@endsection

