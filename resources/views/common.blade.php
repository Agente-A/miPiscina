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
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                  {{-- Direcccional al index --}}
                  
                  <li class="nav-item active">
                      <a class="nav-link text-white" href="/">Inicio <span class="sr-only">(current)</span></a>
                  </li>

                  {{-- Direccionar al login --}}
      
                  <li class="nav-item">
                      <a class="nav-link text-white" href="logIn">Iniciar Sesción</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-item nav-link text-white" href="/piscina/administrar">Administrar Piscinas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-item nav-link text-white" href="monitorear_piscinas.html">Monitorear Piscinas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-item nav-link text-white" href="quienes_somos.html">Quienes Somos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-item nav-link text-white" href="lista_ayuda.html">Lista de Ayuda</a>
                  </li>
          </div>
      </nav>
      <br>
    <main>
      @yield('main')
    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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