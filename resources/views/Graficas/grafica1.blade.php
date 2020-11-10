@extends('Graficas.inicio')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8"><h3>
                    Gráficos
                </h3>
            </div>
            <div class="row justify-content-center">
                <div class="col 8">
                    <div class="card">
                        <div class="card-body">
                            <h1>{{ $chart->container() }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("scripts")
    {{ $chart->script() }}
@endsection

