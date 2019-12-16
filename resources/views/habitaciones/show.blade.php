@extends('plantilla_admin.plantilla_admin')
@section('contenido')

<form method="POST" action="{{ route('habitacionesadmin.update',$habitacion->id_habitacion) }}">
@method('PUT')
@csrf


<div class="container">


                <div class="row">

                    <div class="col-md-12 register-right">

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <h3 class="register-heading"> {{ $title_page }}</h3>

                                <div class="row register-form">

                                    <div class="col-md-6">

                                         <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-list-ol text-info"></i></div>
                                                </div>

                                             <select  name="id_categoria" id="id_categoria" class="form-control">
                                                <option class="hidden" selected disabled>Categorias</option>
                                                {{-- @foreach ($habitacion->id_categoria as $categ) --}}
                                                   <option value="{{ $habitacion->id_habitacion }}">{{ $habitacion->id_habitacion }}</option>
                                               {{--  @endforeach --}}
                                            </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-comment-dollar  text-info"></i></div>
                                                </div>
                                             <select  name="id_precio" id="id_precio" class="form-control">
                                                <option class="hidden" selected disabled>Precios Temp. Baja</option>
                                               {{--  @foreach ($precs as $prec)  --}}
                                                    <option value="{{ $habitacion->id_precio }}">{{ $habitacion->id_precio }}</option>
                                                {{-- @endforeach --}}

                                            </select>
                                            </div>
                                        </div>
                                {{-- este para ver como lo hace al ver --}}
                                       {{--  <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-map-marker-alt text-info"></i></div>
                                                </div>

                                                @php($departamento=['Gerencia de TI','Auditoria TI','Contabilidad'])






                                             <select disabled="true" name="departamento" class="form-control">
                                                <option class="hidden" selected disabled>Departamento</option>

                                                @foreach ($departamento as $dep)
                                                   <option @if ($Agenda->departamento==$dep)
                                                   selected
                                                   @endif>{{ $dep }}</option>
                                                @endforeach

                                            </select>
                                            </div>
                                        </div> --}}
{{-- este para ver como lo hace al editar --}}
                                       {{--  <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-map-marker-alt text-info"></i></div>
                                                </div>

                                                @php($departamento=['Gerencia de TI','Auditoria TI','Contabilidad'])






                                             <select  name="departamento" class="form-control">
                                                <option class="hidden" selected disabled>Departamento</option>

                                                @foreach ($departamento as $dep)
                                                   <option @if ($Agenda->departamento==$dep)
                                                   selected
                                                   @endif>{{ $dep }}</option>
                                                @endforeach

                                            </select>
                                            </div>
                                        </div> --}}

                                         <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required="" value="{{ $habitacion->nombre }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="far fa-edit text-info"></i></div>
                                                </div>

                                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" required="">
                                            </div>


                                        </div>

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-user-friends text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="cantidad_personas" name="cantidad_personas" placeholder="Cantidad de Personas" required="">
                                            </div>

                                        </div>

                                         <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-bed text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="cantidad_camas" name="cantidad_camas" placeholder="Cantidad de Camas" required="" value="">
                                            </div>

                                        </div>



                                    </div>
                                    <div class="col-md-6">


                                      <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" required="" value="{{ $habitacion->descripcion}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="incluye" name="incluye" placeholder="Incluye" required="" value="{{ $habitacion->incluye}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-images text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="img" name="img" placeholder="imagen" required="" value="{{ $habitacion->img}}">
                                            </div>
                                        </div>

                                    <a href="{{ route('habitacionesadmin.edit',$habitacion->id_habitacion) }}" class=" redondo btn btn-success">
                                    <i class="fa fa-edit"></i> Editar</a>

                                    <a href="{{ route('regresarh') }}" class="redondo btn btn-info"><i class="fas fa-undo"></i> Regresar</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

</div>
</form>

@endsection