@extends('plantilla_admin.plantilla_admin')

@section('contenido')
<div class="main main-raised">
    <div class="container">
      <div class="site-section">
        <div class="team">
            <h2 class="title">{{$title_hab}} </h2>
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
                <table class="table table-active">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Habitacion</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Categoria</th>
                            <th class="text-center">Fecha Entrada</th>
                            <th class="text-right">Fecha Salida</th>
                            <th class="text-right">Factura</th>
                            <th class="text-right">Usuario</th>
                            <th class="text-right">Email</th>
                            <th class="text-right">Telefono</th>
                            <th class="text-right">Status</th>
                            <th class="text-right">Opciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($habitacion as  $hab)
                        <tr>
                            <td class="text-center"> {{ $hab->id}} </td>
                            <td>{{ $hab->name}}</td>
                            <td>{{ $hab->temprecio}}</td>
                            <td> {{$hab->nomCategoria}} </td>
                            <td>{{ $hab->entry_date}}</td>
                            <td>{{ $hab->departure_date}}</td>
                            <td> {{$hab->facturar}} </td>
                            <td> {{$hab->email}} </td>
                            <td class="text-right"> {{ $hab->username}}</td>
                            <td> {{$hab->phone}} </td>
                            <td> {{$hab->status}} </td>
                            <td class="td-actions">
                                <form method="post" action="#">
                                    @csrf
                                    {{--<a href="{{route('print')}} " rel="tooltip" title="Editar producto" class="btn btn-info btn-sm btn-block"> <i class="fa fa-edit"></i> Imprimir</a>--}}

                                    <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-success btn-sm btn-block"><i class="fa fa-times text-left"></i> Desactivar</button>
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

