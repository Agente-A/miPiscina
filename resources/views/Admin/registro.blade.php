@extends('common')

@section('page_title') Registro @endsection

@section('main')

    <div class="container">
        <div class="row">
            {{-- Imagen 1 --}}
            <div class="d-sm-none d-none d-md-block col-md-4">
                <img src="{{ asset('/assets/images/piscina1.jpg') }}" class="img-fluid">
            </div>

            {{-- Formulario --}}
            <div class="col-md-4">
                <h3>registro de administrador </h3>
                <form method="POST" action="{{ url('/admin/') }}">
                    {{ csrf_field() }}
                      <fieldset class="form-group">
                        <div class="form-row">
                            <div class="form-group col-lg">
                              <label for="nom" class="">Nombre:</label>
                              <input type="text" class="form-control" name="nom" id="nom" placeholder="Pedro" value="{{ old('nom') }}">
                              @if ($errors->has('pass'))
                                <small id="helpNom" class="form-text text-danger">{{ $errors->first('nom') }}</small>
                              @endif
                            </div>
                            <div class="form-group col-lg">
                              <label for="ap">Apellido</label>
                              <input type="text" class="form-control" name="ap" id="ap" aria-describedby="helpAp" placeholder="Perez" value="{{ old('ap') }}">
                              @if ($errors->has('pass'))
                              <small id="helpAp" class="form-text text-danger">{{ $errors->first('ap') }}</small>
                              @endif
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="email">Correo Electrónico:</label>
                          <input type="email" class="form-control" name="email" id="email" aria-describedby="helpEmail" placeholder="ejemplo@correo.cl" value="{{ old('email') }}">
                          @if ($errors->has('email'))
                            <p class="form-text text-muted">
                                <ul class="list-unstyled">
                                    @foreach ($errors->get('email') as $item)
                                        <li><small id="helpNom" class="form-text text-danger">{{ $item }}</small></li>
                                    @endforeach
                                </ul>
                            </p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="pass">Contraseña:</label>
                          <input type="password" class="form-control" name="pass" id="pass" placeholder="unacontrasena#12" value="{{ old('pass') }}">
                          @if ($errors->has('pass'))
                            <small id="helpPass" class="form-text text-danger">{{ $errors->first('pass') }}</small>
                          @endif
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-9">
                              <label for="calle">Calle:</label>
                              <input type="text" class="form-control" name="calle" id="calle" aria-describedby="helpCalle" placeholder="una calle" value="{{ old('calle') }}">
                              <small id="helpCalle" class="form-text text-muted">*Opcional</small>
                            </div>
                            <div class="form-group col-lg">
                              <label for="num">Número</label>
                              <input type="number" class="form-control" name="num" id="num" aria-describedby="helpNum" placeholder="1234" value="{{ old('num') }}">
                              <small id="helpNum" class="form-text text-muted">*Opcional</small>
                            </div>
                        </div>  
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

            {{-- Imagen 2 --}}
            <div class="d-sm-none d-none d-md-block col-md-4">
                <img src="{{ asset('/assets/images/piscina2.jpg') }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
            </div>

        </div>
    </div>
@endsection