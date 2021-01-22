@extends('Template.headerf')
@section('content')


    <form action="/municipios" method="POST">
        @csrf

        <div class="row card-bodyy">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group card card-body">
                    <center><strong><a class="text-danger">*</a>Nombre del municipio:</strong><br>
                        <input type="text" name="nombre" class="form-catalogo" placeholder="Nombre"><br>
                        <strong><a class="text-danger">*</a>Estado:</strong> <br>
                        <select name="id_estado" id="id_estado">

                            <option value="" disabled selected>Seleccione un estado</option>
                            @foreach($estados as $estado)
                                <option value={{$estado->id}}>{{$estado->estado}}</option>
                            @endforeach
                        </select></center>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Crear municipio</button>
            </div>
        </div>
    </form>
    <br>
@endsection
@section('scripts')
    <script type="text/javascript">
        $("#id_estado",).select2({});
    </script>
@endsection
