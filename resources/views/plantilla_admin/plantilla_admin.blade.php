{{-- @auth
{{Auth::user()->nombre}}
@endauth --}}
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <script src="https://kit.fontawesome.com/3a8f3b3502.js" crossorigin="anonymous"></script>

           <link href="{{ asset('hotel/css/estilosadmin.css') }}" rel="stylesheet" />
           <link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/bootstrap-datepicker.standalone.min.css') }}">

           <link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/jquery.datetimepicker.css') }}">

           <link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/fullcalendar.min.css') }}">
           <title>{!! $title_page !!} | Beach Hotel Ines</title>




</head>

<body>

  <div class="d-flex" id="wrapper">

    <div id="page-content-wrapper">

      <nav class="menu">
      <nav class="navbar navbar-expand-lg  border-bottom">
        <button class="btn btn-dark" id="menu-toggle"></button>

       <button class="navbar-toggler btn btn-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown estilo">
              <a href="{{route('inicio')}} " class="dropdown">INICIO</a>
            </li>
            <li class="nav-item dropdown estilo">
              <a class=" dropdown-toggle estilo" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 30px">
                @auth
                  {{ auth()->user()->nombre }} {{ auth()->user()->lastname }}
                @endauth
              </a>
              <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
              <a class="btn btn-sm text-white" href=" {{route('reservas')}} ">Mis Reservas</a>
              <a class="btn btn-sm text-white" href=" {{route('reservasPendientes')}} ">Reservas pendientes de usuarios</a>
              <a class="btn btn-sm text-white" href=" {{route('reservasAprobadas')}} ">Reservas aprobadas de usuarios</a>
              <a class="btn btn-sm text-white" href=" {{route('products')}} ">Habitaciones Activas</a>
              <a class="btn btn-sm text-white" href=" {{route('products.inactiva')}} ">Habitaciones Inactivas</a>
              <a class="btn btn-sm text-white" href=" {{route('categories')}} ">Categorias</a>
              <a class="btn btn-sm text-white" href=" {{route('users')}} ">Usuario</a>


                <form  method="POST" action=" {{ route('logout') }} ">
                {{ csrf_field() }}
                <button class="submit logout">Cerrar <i class="fa fa-power-off" aria-hidden="true"></i></button>
                </form>
                    {{-- <form style="color: blue; text-align: center;" method="POST" action="{{ route('cerrar')}}">
                      {{ csrf_field()}}
                      <button class="submit logout" >Cerrar Sesión  <i class="fa fa-power-off" aria-hidden="true"></i></button>

                    </form> --}}
              </div>
            </li>



          </ul>
        </div>
      </nav>
      </nav>

      <div class="container-fluid">
            @yield('contenido')



            @include("plantilla_admin/footeradmin")
      </div>

    </div>


  </div>



        <script src="{{ asset('https://code.jquery.com/jquery-3.3.1.slim.min.js') }}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>

        <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js') }}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        <script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy') }}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>





       <script  src="{{asset("hotel/js/bootstrap-datepicker.min.js")}}"> </script>
       <script  src="{{asset("hotel/js/jquery.datetimepicker.full.min.js")}}"> </script>
       <script  src="{{asset("hotel/js/fullcalendar.min.js")}}"> </script>
       <script  src="{{asset("hotel/js/moment.js")}}"> </script>
       <script  src="{{asset("hotel/js/reserva.js")}}"> </script>

  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
