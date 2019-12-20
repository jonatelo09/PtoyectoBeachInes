@extends('plantilla_admin.plantilla_admin')

@section('contenido')
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="col-md-12">
           
                <h3>BEACH HOTEL INES REGISTRO DE USUARIOS</h3>
            
            <div class="card-body">
                <form method="POST" action="{{route('users.store')}} ">
                    @csrf
                    <div class="container register">
                        <div class="row">
                            <div class="col-12 col-md-12 col-sm-12">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user text-info"></i></span>
                                            </div>
                                            <input id="nombre" type="text" placeholder="Usuario" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user-edit text-info"></i></span>
                                            </div>
                                            <input id="apellidos" type="text" placeholder="Nombre" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                            @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="input-group form-group" style="background: #fff;" >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-venus-mars text-info"></i></span>
                                            </div>

                                            <div class="maxl">
                                                <label class="radio inline">
                                                    <input type="radio" name="sex" id="sexo" required autocomplete="sexo" autofocus value="Masculino" checked style="margin-left: 30px; margin-top: 12px;">
                                                    <span> Masculino </span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="sex" id="sexo" required autocomplete="sexo" autofocus value="Femenino" style="margin-left: 40px;">
                                                    <span>Femenino </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-address-book text-info"></i></span>
                                            </div>
                                            <input id="direccion" type="text" placeholder="Dirección" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-phone text-info"></i></span>
                                            </div>
                                            <input id="telefono" type="text" placeholder="Telefono o Celular" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user-edit text-info"></i></span>
                                            </div>
                                            <input id="apellidos" type="text" placeholder="Lastname" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-at text-info"></i></span>
                                            </div>
                                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-key text-info"></i></span>
                                            </div>

                                            <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-key text-info"></i></span>
                                            </div>
                                            <input id="password-confirm" type="password" placeholder="Confirmar Contraseña" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-key text-info"></i></span>
                                            </div>

                                            <select class="form-control" name="admin" id="admin" required>
                                                <option disabled selected>Seleccion un Rol</option>
                                                <option value="1">Admin</option>
                                                <option value="0">Cliente</option>
                                            </select>

                                            @error('admin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div  align="center">
                                            <div class="col-md-6" align="center">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Registrar') }}
                                                </button>
                                                <a class="btn btn-secondary" href="{{route('users')}}">Cancelar</a>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection