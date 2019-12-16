@extends('plantilla_admin.plantilla_admin')
@section('contenido')

<form method="POST" action="{{ route('user.store') }}">
@csrf


<div class="container">

                <div class="row">
                   
                    <div class="col-md-12 register-right">
                 
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                
                                <h3 class="register-heading"> Crear {{ $title_page }}</h3>
                                                            
                                <div class="row register-form">

                                    <div class="col-md-6">                                        

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del usuario" required="" autocomplete="">


                                            </div>
                                             {!! $errors->first('nombre','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                        </div>

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-user-edit text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos del usuario" required="" autocomplete="">


                                            </div>
                                             {!! $errors->first('apellidos','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                        </div>

                                        <div class="input-group form-group" style="background: #fff;">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-venus-mars text-info"></i></span>
                                        </div>

                                        <div class="maxl">
                                        <label class="radio inline"> 
                                            <input type="radio" name="sexo" id="sexo" required autocomplete="sexo" autofocus value="Masculino" checked style="margin-left: 30px; margin-top: 12px;">
                                            <span> Masculino </span> 
                                        </label>
                                        <label class="radio inline"> 
                                            <input type="radio" name="sexo" id="sexo" required autocomplete="sexo" autofocus value="Femenino" style="margin-left: 40px;">
                                            <span> Femenino </span> 
                                        </label>
                                        </div>

                                        </div>

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-address-book text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required="">
                                            </div>

                                            {!! $errors->first('direccion','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}

                                        </div>


                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-phone text-info"></i></div>
                                                </div>
                                            <input class="form-control" type="number" name="telefono" placeholder="Teléfono" id="telefono">
                                            </div>

                                            {!! $errors->first('telefono','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}


                                        </div>

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa  fa-at text-info"></i></div>
                                                </div>
                                             <input type="email" name="email" class="form-control" placeholder="Email" value="" />
                                            </div>
                                             {!! $errors->first('email','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-key text-info"></i></div>
                                                </div>
                                             <input id="password" type="password" name="password" class="form-control" placeholder="Contraseña" value="" />
                                            </div>
                                             {!! $errors->first('password','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                        </div>

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-key text-info"></i></div>
                                                </div>
                                             <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Contraseña" value="" />
                                            </div>
                                             {!! $errors->first('password_confirmation','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                        </div>

                                   <div class="input-group form-group" style="background: #fff;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-clock text-info"></i></span>
                                    </div>

                                    <div class="maxl">
                                        <label class="radio inline"> 
                                            <input type="radio" name="turno" id="turno" required autocomplete="turno" autofocus value="Matutino" checked style="margin-left: 35px; margin-top: 12px;">
                                            <span>Matutino </span> 
                                        </label>
                                        <label class="radio inline"> 
                                            <input type="radio" name="turno" id="turno" required autocomplete="turno" autofocus value="Vespertino" style="margin-left: 45px;">
                                            <span>Vespertino </span> 
                                        </label>
                                        <label class="radio inline"> 
                                            <input type="radio" name="turno" id="turno" required autocomplete="turno" autofocus value="Ninguno" style="margin-left: 55px;">
                                            <span>Ninguno </span> 
                                        </label>
                                    </div>
                                    {!! $errors->first('turno','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}


                                </div>
                                <div class="input-group form-group" style="background: #fff;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-handshake text-info"></i></span>
                                    </div>

                                    <div class="maxl">
                                        <label class="radio inline"> 
                                            <input type="radio" name="rol" id="rol" required autocomplete="sexo" autofocus value="Administrador" checked style="margin-left: 30px; margin-top: 12px;">
                                            <span> Administrador </span> 
                                        </label>
                                        <label class="radio inline"> 
                                            <input type="radio" name="rol" id="rol" required autocomplete="sexo" autofocus value="Cliente" style="margin-left: 40px;">
                                            <span>Cliente </span> 
                                        </label>
                                    </div>

                                </div>

                                 <button type="submit" class="redondo btn btn-info"><i class="fas fa-save"></i> Guardar</button>
                                    <a href="{{ route('cancelaru') }}" class="redondo btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>

                                        



                                                                       
                                    
                                </div>
                               
                                    </div>
                            </div>
                       
                        </div>
                    </div>
                </div>

</div>
</form>
@endsection
