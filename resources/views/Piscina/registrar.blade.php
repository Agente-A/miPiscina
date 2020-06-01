@extends('common')

@section('page_title')
    Registrar Piscina
@endsection

@section('main')
<div class="row justify-content-center">
    <div class="col-md-7">
        <h1 class="display-4 text-center">Registrar Piscina</h1>
        <br>
        <hr class="bg-info">
        <br> 
        {{-- Formulario de registro --}}
        
        <form method="POST" action="{{ url('/piscina/') }}">
            {{ csrf_field() }}
              <fieldset class="form-group">
                <div class="form-row">
                    <div class="form-group col-md">
                      <label for="nom" class="">Nombre Piscina:</label>
                      <input type="text" class="form-control" name="nom" id="nom" placeholder="Piscina XYZ" value="{{ old('nom') }}">
                      @if ($errors->has('nom'))
                        <small id="helpNom" class="form-text text-danger">{{ $errors->first('nom') }}</small>
                      @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="tamano">Tamaño (En Litros):</label>
                      <input type="number" class="form-control" name="tamano" id="sensor" aria-describedby="helpCalle" placeholder="1234" value="{{ old('calle') }}">
                      @if ($errors->has('tamano'))
                        <small id="helpTamano" class="form-text text-danger">{{ $errors->first('tamano') }}</small>
                      @endif
                    </div>
                    <div class="form-group col-md">
                      <label for="num">N° de Sensor</label>
                      <input type="number" class="form-control" name="sensor" id="sensor" aria-describedby="helpNum" placeholder="1234" value="{{ old('num') }}">
                      @if ($errors->has('sensor'))
                        <small id="helpSensor" class="form-text text-danger">{{ $errors->first('sensor') }}</small>
                      @endif
                    </div>
                </div>  
                <br>
                <div class="row justify-content-center">
                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Registrarse</button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection