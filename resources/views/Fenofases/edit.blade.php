@extends('Template.headerf')
@section('content')

    <form action={{url('/fenofases/'.$fenofase->id_fenofase)}} method="POST">
        {{csrf_field()}}
        {{method_field('PATCH')}}

        <div class="row card-bodyy">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <center><strong>Nombre de fenofase:</strong>
                        <input type="text" name="descrip_fenofase" class="form-catalogo" placeholder="Fenofase"
                               value="{{$fenofase->descrip_fenofase}}"></center>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success" value="Editar">Actualizar fenofase</button>
            </div>
        </div>
    </form>
    <br>
@endsection

