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
           <div class="table-responsive">


                <table class="table text-center table-hover"style="background: #FFF;">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Servicios</th>
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

          

                                    <button type="submit" rel="tooltip" title="Activar" class="btn btn-success btn-sm btn-xs btn-block"><i class="fa fa-plus"></i> Activar</button>
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

