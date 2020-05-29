@extends('common')

@section('page_title') Bienvenido! :D @endsection

@section('main')
    <div class="jumbotron">
        <h1 class="display-3">{{ $title }}</h1>
        <div class="container">
            <hr>
            <div class="row">
                @forelse ($piscinas as $piscina)
                    @php
                        // determinar el estado de la piscina para aplicar un color a la tarjeta
                        $status = "";
                        switch ($piscina->condicion->ID_CONDICION) {
                            case '1':
                                $status = "bg-danger";
                                break;
                            case '2':
                                $status = "bg-warning";
                                break;
                            case '3':
                                $status = "bg-success";
                                break;
                        }
                    @endphp
                    <div class="col-md-4 mt-2">
                        <div class="card text-center text-light {{$status}}">
                            <img class="card-img-top" src="holder.js/100x180/" alt="">
                            <div class="card-body">
                                <h4 class="card-title">{{ $piscina->NOMBRE }}</h4>
                                <p class="card-text">{{ $piscina->condicion->CONDICION }}</p>
                                <a class="nav-item nav-link text-white" href="{{ route('piscina.show',$piscina->ID_PISCINA) }}">Administrar</a>
                            </div>
                        </div>
                    </div>
                @empty 
                    <h4>No hay piscinas registradas</h4>
                @endforelse    
            </div>
        </div>
    </div>
@endsection