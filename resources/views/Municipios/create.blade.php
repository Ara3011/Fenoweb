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
    <form action="/municipios" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12"style="left: 600px">
                <div class="form-group card card-body">
                    <strong>Nombre del municipio:</strong><br>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre"><br>
                    <strong>Estado:</strong> <br>
                    <select name="id_estado" id="id_estado">

                        <option value="" disabled selected>Seleccione un estado</option>
                        @foreach($estados as $estado)
                            <option value={{$estado->id}}>{{$estado->estado}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center"style="left: 600px">
                <button type="submit" class="btn btn-success">Crear municipio</button>
            </div>
        </div>

    </form>
@endsection
@section('scripts')
    <script type="text/javascript">
        $("#id_estado",).select2({
        });
    </script>
    @endsection
