<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>


   <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link href="{{ asset('hotel/css/login.css') }}" rel="stylesheet" />
</head>
<body background="{{ asset('hotel/imagenes/fondo.jpg') }}">
<div class="container">
   {{--  @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
    <div class="d-flex justify-content-center h-100">

            <div class="card">
                <div class="card-header">
                <h3> INICIO DE SESIÓN</h3>
            </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div  class="input-group form-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text" style="font-size: 20px; color:#800040;"><i class="fas fa-user"></i></span>
                        </div>


                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="usuario" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text" style="font-size: 20px; color:#800040;"><i class="fas fa-key"></i></span>
                        </div>


                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="contraseña" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>



                        <div class="form-group">

                                <button type="submit" class="btn  btn-block" style=" background:#800040; color: white;">
                                    {{ __('Iniciar sesión') }}
                                </button>

                                <a class=" btn btn-link" href="{{ route('register') }}">{{ __('¿Aun no tienes cuenta?') }}
                                </a>


                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif

                        </div>
                    </form>
                </div>
            </div>

    </div>
</div>
</body>
</html>