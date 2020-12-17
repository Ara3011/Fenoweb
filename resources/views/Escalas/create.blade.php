@extends('Template.headfoot')
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/escalas" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12" style="left: 600px">
                <div class="form-group">
                    <strong>Nombre de escala:</strong>
                    <input type="text" name="descripcion" class="form-control" placeholder="Escalas">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="left: 600px">
                <button type="submit" class="btn btn-success">Crear</button>
            </div>
        </div>

    </form>
@endsection
