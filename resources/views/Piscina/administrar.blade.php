@extends('common')

@section('page_title') Bienvenido! :D @endsection
@section('main')
<!--<link rel="stylesheet" href="{{ asset('assets/css/Piscina/administrar.css') }}" type="text/css">-->

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
<br><br>
{{-- Tabla de mediciones --}}

    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-bordered table-condensed table-responsive-md table-hover" style="height: 50px; overflow-y: scroll;">
            <thead class="text-center">
              <tr>
                <th>Fecha y Hora</th>
                <th>Cloro</th>
                <th>PH</th>
              </tr>
            </thead>
            <div class="overflow-auto">
              <tbody class="text-center my-tbody">
                @forelse ($mediciones as $md)
                  @php
                    // determinar el estado del cloro para aplicar un color a la fila
                    $stdCloro = "";
                    switch ($md->getEstadoCloro()) {
                        case '1':
                            $stdCloro = "table-danger";
                            break;
                        case '2':
                    }
                    // determinar el estado del cloro para aplicar un color a la fila
                    $stdPh = "";
                    switch ($md->getEstadoPh()) {
                        case '1':
                            $stdPh = "table-danger";
                            break;
                    }
                  @endphp
                  <tr>
                      <td>{{$md->FECHA_Y_HORA}}</td>
                      <td class="{{$stdCloro}}">{{$md->CLORO}}</td>
                      <td class="{{$stdPh}}">{{$md->PH}}</td>
                  </tr>
                @endforeach
              </tbody>      
            </div>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection