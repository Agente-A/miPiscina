@extends('common')

@section('page_title') Bienvenido! :D @endsection
@section('main')
<!--<link rel="stylesheet" href="{{ asset('assets/css/Piscina/administrar.css') }}" type="text/css">-->
@section('meta')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
<script src = "{{ asset('assets/js/jquery-3.5.1.min.js') }}">
</script>

<script>
  $(document).ready(function(){
    var table = $('#data');
    table.hide();
    replaceTable();

    setInterval(replaceTable, 60*1000)

    function replaceTable(){

        $.ajaxSetup({

            headers: {
    
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    
            }
    
        });
    
        $.ajax({
            url:"{{ route('ajax.index') }}",
            type:'POST',   
            data: {'id':"{{ $piscina->ID_PISCINA }}"},         
            success:function(data){
                table.fadeOut("fast");
                table.html(data);
                table.fadeIn("fast");
            },
            error:function(jqXHR, textStatus, errorThrown){
                console.log("Error: "+textStatus + " " + errorThrown);
            }
        });
    }
});
</script>

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

    <div class="row" id="data">
      
  </div>
@endsection