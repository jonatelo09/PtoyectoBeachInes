@extends('plantilla_admin.plantilla_admin')

@section('contenido')
<div class="main main-raised">
    <div class="container">
      <div class="site-section">
        <div class="team">
            <h2 class="title">Lista de Habitaciones Inactivas</h2>
            <div class="row">
                <div class="col-md-12 text-center" item="center">
                    <form method="get" action="" autocomplete="off" role="search">
                    @csrf
                      <div class="form-group">
                           <div class="input-group">
                              <input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="">
                              <span class="input-group-btn">
                              <button type="submit" class="btn btn-primary">Buscar</button>
                              </span>
                          </div>
                      </div>
                    </form>
                </div>
            </div>
            <div class="row elemento-4">


                <table class="table table-active table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Incluye</th>
                            <th class="text-center">Categoria</th>
                            <th class="text-right">Precio</th>
                            <th class="text-right">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
@foreach($habitacion as  $hab)
<?php
$des = json_decode($hab->descripcion, true);
$inc = json_decode($hab->incluye, true);
?>
                        <tr>
                            <td class="text-center"> {{ $hab->id}} </td>
                            <td>{{ $hab->name}}</td>
                            @if(is_array($des))
                            <td class="text-justify">
                            @foreach($des as $key => $desc)
                                   {{ $desc["descrip"] }}, {{ $desc["can_p"] }}, {{ $desc["can_c"] }}.
                                 @endforeach
                              </td>
                            @endif
                            @if(is_array($inc))
                                <td class="text-justify">
                                  @foreach($inc as $key => $in)
                                  {{ $in["item"] }},
                                 @endforeach.
                                </td>
                            @endif
                            <td> {{$hab->nomCategoria}} </td>
                            <td class="text-right"> {{ $hab->temprecio}}</td>
                            <td class="td-actions">
                                <form method="post" action="{{route('products.activar',$hab->id)}}">
                                    @csrf

                                    <a href="{{route('products.edit',$hab->id)}}" rel="tooltip" title="Editar producto" class="btn btn-success btn-sm btn-xs btn-block"> <i class="fa fa-edit"></i> Editar </a>

{{--                                   <a href="{{url('/admin/products/'.$product->id.'/images')}}" rel="tooltip" title="Imagenes del Producto" class="btn btn-warning btn-sm btn-xs"> <i class="fa fa-image"></i></a> --}}

                                    <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-success btn-sm btn-xs btn-block"><i class="fa fa-plus"></i> Activar</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{$habitacion->render()}}
            </div>
        </div><!-- end team -->
      </div><!-- end section -->
    </div>
  </div>
  @endsection

