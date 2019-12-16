@extends('plantilla_admin.plantilla_admin')
@section('contenido')

<form method="POST" action="{{ route('user.update',$users->id) }}">
@method('PUT')
@csrf

<div class="container">

                <div class="row">

                    <div class="col-md-12 register-right">

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <h3 class="register-heading">{{ $title_page }}</h3>

                                <div class="row register-form">

                                    <div class="col-md-6">

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $users->nombre }}" required="">


                                            </div>
                                             {!! $errors->first('nombre','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                        </div>

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-user-edit text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $users->apellidos }}" required="">


                                            </div>
                                             {!! $errors->first('apellidos','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                        </div>

                                        <div class="input-group form-group" style="background: #fff;">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-venus-mars text-info"></i></span>
                                            </div>


                                         @if ($users->sexo=='Masculino')
                                             @php($hombre='checked')
                                             @php($mujer='')
                                             @else
                                             @php($hombre='')
                                             @php($mujer='checked')

                                         @endif
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline">
                                                    <input type="radio" name="sexo" value="Masculino" {{ $hombre }}>
                                                    <span> Masculino </span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="sexo" value="Femenino" {{ $mujer }}>
                                                    <span>Femenino </span>
                                                </label>
                                            </div>
                                        </div>



                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-address-book text-info"></i></div>
                                            </div>
                                            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $users->direccion }}" required="">
                                            </div>

                                            {!! $errors->first('direccion','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}

                                    </div>


                                    <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-phone text-info"></i></div>
                                                </div>
                                            <input class="form-control" type="number" name="telefono" value="{{ $users->telefono }}" id="telefono">
                                            </div>

                                            {!! $errors->first('telefono','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                    </div>

                                    <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa  fa-at text-info"></i></div>
                                                </div>
                                             <input type="email" name="email" class="form-control" value="{{ $users->email }}" />
                                            </div>
                                             {!! $errors->first('email','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                    </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa  fa-at text-info"></i></div>
                                                </div>
                                             <input type="email" name="email" class="form-control" value="{{ $users->email }}" />
                                            </div>
                                             {!! $errors->first('email','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                        </div>
                                      <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-key text-info"></i></div>
                                                </div>
                                             <input id="password" type="password" name="password" class="form-control"  value="{{ $users->password }}" />
                                            </div>
                                             {!! $errors->first('password','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                        </div>
                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-key text-info"></i></div>
                                                </div>
                                             <input id="password-confirm" type="password" name="password_confirmation" class="form-control" value="{{ $users->password }}" />
                                            </div>
                                             {!! $errors->first('password_confirmation','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                        </div>
                                   <div class="input-group form-group" style="background: #fff;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-clock text-info"></i></span>
                                    </div>




                                     @if ($users->turno=='Matutino')
                                         @php($matutino='checked')
                                         @php($vespertino='')
                                         @php($ninguno='')
                                         @elseif($users->turno=='Vespertino')
                                         @php($matutino='')
                                         @php($vespertino='checked')
                                         @php($ninguno='')
                                    @else
                                         @php($matutino='')
                                         @php($vespertino='')
                                         @php($ninguno='checked')

                                     @endif
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline">
                                                    <input type="radio" name="turno" value="Matutino" {{ $matutino }}>
                                                    <span> Matutino </span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="turno" value="Vespertino" {{ $vespertino }}>
                                                    <span>Vespertino </span>
                                                </label>
                                                 <label class="radio inline">
                                                    <input type="radio" name="turno" value="Ninguno" {{ $ninguno }}>
                                                    <span>Ninguno </span>
                                                </label>
                                            </div>
                                        </div>
                                </div>
                                <div class="input-group form-group" style="background: #fff;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-handshake text-info"></i></span>
                                    </div>

                                     @if ($users->rol=='Administrador')
                                         @php($administrador='checked')
                                         @php($cliente='')
                                         @else

                                         @php($administrador='')
                                         @php($cliente='checked')

                                     @endif
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline">
                                                    <input type="radio" name="rol" value="Administrador" {{ $administrador }}>
                                                    <span> Administrador </span>
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="rol" value="Cliente" {{ $cliente }}>
                                                    <span>Cliente </span>
                                                </label>
                                            </div>
                                        </div>
                                </div>







                            <button type="submit" class="redondo btn btn-info"><i class="fas fa-save"></i>Actualizar</button>
                                    <a href="{{ route('cancelaru') }}" class="redondo btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>




                                    </div>
                            </div>

                        </div>
                    </div>
                </div>

</div>
</form>
@endsection
