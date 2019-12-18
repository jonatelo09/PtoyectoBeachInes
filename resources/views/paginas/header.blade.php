<div>
	<nav class="menu">
	  <nav class="navbar navbar-expand-xs navbar-expand-md  navbar-dark" >
		    <a class="navbar-brand" href="{{ route ('inicio')}}">BEACH HOTEL INES</a>
		       <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar1">
		        <span class="navbar-toggler-icon"></span>
		        </button>
		    <div class="collapse navbar-collapse" id="navbar1">

		        <ul class="navbar-nav ml-auto">

		            <li class="nav-item active">
		            	<a class="nav-link" href="{{ route ('inicio')}}">INICIO</a>
		            </li>
		           	<li class="nav-item dropdown">
		                <a href="#" id="menu" data-toggle="dropdown" class="nav-link dropdown-toggle">BEACH HOTEL INES</a>
		                <ul class="dropdown-menu">
		                    <li class="dropdown-item ">
									<a class="fondo" href="{{ route ('habitaciones')}}">HABITACIONES</a>
		                    </li>

		                    <div class="dropdown-divider"></div>

		                    <li class="dropdown-item ">
		                        <a class="fondo" href="{{ route ('departamentos')}}">DEPARTAMENTOS</a>
		                    </li>

		                    <div class="dropdown-divider"></div>

		                    <li class="dropdown-item ">
		                        <a class="fondo" href="{{ route ('suites')}}">SUITES</a>
		                    </li>

		                    <div class="dropdown-divider"></div>

		                    <li class="dropdown-item ">
		                        <a class="fondo" href="{{ route ('bungalows')}}">BUNGALOWS</a>
		                    </li>

		                    <div class="dropdown-divider"></div>

		                    <li class="dropdown-item ">
		                        <a class="fondo" href="{{ route ('restaurante')}}">RESTAURANTE</a>
		                    </li>

		                    <div class="dropdown-divider"></div>

		                    <li class="dropdown-item">
		                        <a class="fondo" href="{{ route ('servicios')}}">SERVICIOS</a>
		                    </li>
		                </ul>
		            </li>
            		<li class="nav-item">
                		<a class="nav-link" href="{{ route ('galeria')}}">GALERIA</a>
            		</li>
            		<li class="nav-item">
                		<a class="nav-link" href="{{ route ('ubicacion')}}">UBICACIÓN</a>
            		</li>
            		<li class="nav-item">
                		<a class="nav-link" href="{{ route ('puerto_escondido')}}">PUERTO ESCONDIDO</a>
            		</li>
            		<li class="nav-item">
                		<a class="nav-link" href="{{ route ('contacto')}}">CONTACTO</a>
            		</li>
            		@if (Auth::Check() && Auth::user()->admin == 1)
            		<li class="nav-item">
                		<a class="nav-link" href="{{ route('products')}}">ADMIN</a>
            		</li>
            		@endif
            		@if(Auth::Check() && Auth::user()->admin == 0)
					<li class="nav-item">
                		<a class="nav-link" href="{{ route('reservas')}}">RESERVAS</a>
            		</li>
            		@endif

					@if( Auth::guest() )
                        <li class="nav-item">
	                		<a class="nav-link 	botoninicio " href="{{ route ('login')}}"> INICIAR SESIÓN</a>
	            		</li>
					@else
						{{--<li class="nav-item">
		            		<form  method="POST" action=" {{ route('logout') }} ">
			                {{ csrf_field() }}
			                <button class="nav-link  logout"> CERRAR SESIÓN</button>
                            </form>
                        </li>--}}
                        <li class="nav-item dropdown estilo">
			              <a class=" dropdown-toggle estilo" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 30px">
			                @auth
			                  {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
			                @endauth
			              </a>
			              <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
			              <a class="btn btn-sm text-white" href=" {{route('reservas')}} ">Carrito de Reservas</a>
			              <a class="btn btn-sm text-white" href=" {{route('reservasAprobadasuser')}} ">Reservas Realizadas</a>
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
	            	@endif

		        </ul>
		    </div>
	  </nav>
	</nav>
</div>