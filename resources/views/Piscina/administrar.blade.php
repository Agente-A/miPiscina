@extends('common')

@section('page_title') Bienvenido! :D @endsection
@section('main')
{{-- Información de la piscna --}}

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

<div class="container">
    <div class="row">
        <div class="col-md">
            {{$piscina->NOMBRE}}
        </div>
        <div class="col-md">
            Tamaño: {{$piscina->TAMANO}}
        </div>
        <div class="col-md">
            Condición actual: {{$status}}
        </div>
        <div class="col-md">
            Sensor: {{$piscina->raspberry->ID_RASPBERRY}}
        </div>
    </div>
    <br>

{{-- Tabla de mediciones --}}

    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
            <thead class="text-center">
              <tr>
                <th>Fecha y Hora</th>
                <th>Cloro</th>
                <th>PH</th>
              </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($mediciones as $md)
                    <tr>
                        <td>{{$md->FECHA_Y_HORA}}</td>
                        <td>{{$md->CLORO}}</td>
                        <td>{{$md->PH}}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection