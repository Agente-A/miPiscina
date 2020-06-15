@extends('common')

@section('page_title') Bienvenido! :D @endsection

@section('main')
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-10">
                <h1 class="display-3">{{ $title }}</h1>
            </div>
            @if (session('admin'))
                <div class="col-md-2 align-self-end">
                    <a href="{{ route('piscina.create') }}" class="btn btn-success">Registrar Piscina</a>
                </div>
            @endif
        </div>
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
                            case '4':
                                $status = "bg-info";
                                break;
                        }
                    @endphp
                    <div class="col-md-4 mt-2">
                        <div class="card text-center text-light {{$status}}">
                            <img class="card-img-top" src="holder.js/100x180/" alt="">
                            <div class="card-body">
                                <h4 class="card-title">{{ $piscina->NOMBRE }}</h4>
                                <p class="card-text">{{ $piscina->condicion->CONDICION }}</p>
                                <a class="btn btn-info btn-outline-dark text-white mt-1" href="{{ route('piscina.show',$piscina->ID_PISCINA) }}">Mediciones</a>
                                
                                @if (session('admin'))
                                    <a class="btn btn-info btn-outline-dark text-white mt-1" href="{{ route('piscina.edit',$piscina->ID_PISCINA) }}">Modificar</a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-outline-dark btn-md text-light mt-1" data-toggle="modal" data-target="#confirmacion-{{$piscina->ID_PISCINA}}">
                                    Eliminar
                                    </button>
         
                                    <!-- Modal -->
                                    <div class="modal fade" id="confirmacion-{{$piscina->ID_PISCINA}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-danger">¿Está seguro de eliminar esta piscina?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body text-dark">
                                                    La piscina {{ $piscina->NOMBRE }} será eliminara. una vez eliminada, no será posible recuperar los datos
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <form action="{{ route('Piscina.destroy', $piscina->ID_PISCINA) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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