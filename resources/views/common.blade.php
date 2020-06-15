<!doctype html>
<html lang="en">
  <head>
    <title>@yield('page_title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('meta')

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
      {{-- Barra de navegación --}}
      
      <nav class="navbar navbar-expand-sm navbar-light bg-primary">
          <span class="navbar-brand text-white">Mi Piscina Segura</span>
          <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu"
              aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="menu">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="flex-grow: 1">

                  {{-- Direcccional al index --}}
                  
                  <li class="nav-item active">
                      <a class="btn btn-primary" href="/">Inicio <span class="sr-only">(current)</span></a>
                  </li>

                  {{-- Direccionar al login --}}
      
                  <li class="nav-item">

                  </li>
                  <li class="nav-item">
                    <a class="btn btn-primary" href="quienes_somos.html">Quienes Somos</a>
                  </li>
                  <li class="nav-item">
                    <a class="btn btn-primary" href="lista_ayuda.html">Lista de Ayuda</a>
                  </li>
                  <li class="nav-item ml-auto">
                    @if (session('admin'))
                  <a class="btn btn-danger" href="{{ route('admin.logout') }}">Cerrar Sesion</a>
                    @else
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#logIn">
                        Iniciar Sesión
                      </button>
                    @endif
                 </li> 
          </div>
      </nav>
      <br>
      
      @if ($errors->has('msg'))
        <script src = "{{ asset('assets/js/jquery-3.5.1.min.js') }}">
        </script>
        <script>
          $(document).ready(function(){
              $('#logIn').modal('show');
          });
        </script>
      @endif
    
    <!-- Modal Login -->
    <div class="modal fade" id="logIn" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Iniciar Sesion</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          <div class="modal-body">
            <div class="container-fluid">
                <div class="container">
                  <form method="POST" action="{{ url('/admin/login') }}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                      <label for="email" class="col-sm-12 col-form-label">Correo</label>
                      <div class="col-sm-12">
                        <input type="email" class="form-control" name="email" id="email" placeholder="ejemplo@gmail.cl">
                      </div>
                    </div>
                    <fieldset class="form-group row">
                      <label for="password" class="col-sm-12 col-form-label">Contraseña</label>
                      <div class="col-sm-12">
                        <input type="password" class="form-control" name="password" id="password" placeholder="123456789">
                      </div>
                    </fieldset>                
                    @if ($errors->has('msg'))
                        <small id="help" class="form-text text-danger">{{ $errors->first('msg') }}</small>
                      @endif
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="form-group row">
              <div class="col-md-12">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Ingresar</button>
              </div>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>


    <main>
      @yield('main')
    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- {{ asset('assets/js/jquery-3.5.1.min.js') }} --}}
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <footer>
      <div class="container-fluid">
        <div class="row py-5">
            <div class="col-md-4">
                <h3 class="text-center">Lorem, ipsum dolor.</h3>
                <hr>
                <img src="{{ asset('/assets/images/piscina1.jpg') }}" alt="" class="img-fluid rounded">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus recusandae voluptas amet accusantium ipsa est quam harum atque! Aspernatur, officiis.</p>
            </div>
            <div class="col-md-4">
              <h3 class="text-center">Lorem, ipsum dolor.</h3>
              <hr>
              <img src="{{ asset('/assets/images/piscina2.jpg') }}" alt="" class="img-fluid rounded">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus recusandae voluptas amet accusantium ipsa est quam harum atque! Aspernatur, officiis.</p>
          </div>
          <div class="col-md-4">
              <h3 class="text-center">Lorem, ipsum dolor.</h3>
              <hr>
              <img src="{{ asset('/assets/images/piscina3.jpg') }}" alt="" class="img-fluid rounded">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus recusandae voluptas amet accusantium ipsa est quam harum atque! Aspernatur, officiis.</p>
          </div>
        </div>
      </div>
    </footer>
  </body>
  <footer class="bg-dark text-center py-5">
    <a href="#" class="text-white">© Mi Piscina segura. Todos los derechos reservados.</a>
  </footer>
</html>