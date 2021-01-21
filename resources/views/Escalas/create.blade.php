@extends('Template.headerf')
@section('content')


    <form action="/escalas" method="POST">
        @csrf

        <div class="row card-bodyy">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <center><strong><a class="text-danger">*</a>Nombre de escala:</strong>
                        <input type="text" name="descripcion" class="form-catalogo" placeholder="Escalas"></center>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Crear escala</button>
            </div>
        </div>
    </form>
    <br>
@endsection
