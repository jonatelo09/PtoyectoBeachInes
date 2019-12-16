@extends('plantilla_admin.plantilla_admin')
@section('contenido')

<form method="POST" action="{{ route('user.show',$users->id) }}">
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
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $users->nombre }}" required="" disabled="true">


                                            </div>
                                            
                                        </div>

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-user-edit text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $users->apellidos }}" required="" disabled="true">


                                            </div>
                                             
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
                                                    <input type="radio" name="sexo" value="Masculino" {{ $hombre }} disabled="true">
                                                    <span> Masculino </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="sexo" value="Femenino" {{ $mujer }} disabled="true">
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
                                            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $users->direccion }}" required="" disabled="true">
                                            </div>

                                       

                                        </div>


                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-phone text-info"></i></div>
                                                </div>
                                            <input class="form-control" type="number" name="telefono" value="{{ $users->telefono }}" disabled="true" id="telefono">
                                            </div>

                                          

                                        </div>

                                        

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa  fa-at text-info"></i></div>
                                                </div>
                                             <input type="email" name="email" class="form-control" value="{{ $users->email }}" disabled="true" />
                                            </div>
                                             
                                        </div>
                                        
                                       <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-calendar-day text-info"></i></div>
                                                </div>
                                             <input id="password" type="text" name="password" class="form-control"  value="{{ $users->created_at}}" disabled="true" />
                                            </div>
                                            
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
                                        <div class="form-group" >
                                            <div class="maxl"  >
                                                <label class="radio inline"> 
                                                    <input type="radio" name="turno" value="Matutino" {{ $matutino }} disabled="true">
                                                    <span> Matutino </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="turno" value="Vespertino" {{ $vespertino }} disabled="true">
                                                    <span>Vespertino </span> 
                                                </label>
                                                 <label class="radio inline"> 
                                                    <input type="radio" name="turno" value="Ninguno" {{ $ninguno }} disabled="true">
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
                                                    <input type="radio" name="rol" value="Administrador" {{ $administrador }} disabled="true">
                                                    <span> Administrador </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="rol" value="Cliente" {{ $cliente }} disabled="true">
                                                    <span>Cliente </span> 
                                                </label>
                                            </div>
                                        </div>


                                </div>

                                        



                                                                       
                                    
                                
                                 <a href="{{ route('user.edit',$users->id) }}" class=" redondo btn btn-success">
                                    <i class="fa fa-edit"></i> Editar</a>

                                    <a href="{{ route('regresaru') }}" class="redondo btn btn-info"><i class="fas fa-undo"></i> Regresar</a>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                </div>

</div>
</form>
@endsection
