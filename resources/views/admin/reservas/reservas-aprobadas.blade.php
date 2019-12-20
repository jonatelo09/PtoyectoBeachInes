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
              <div class="table-responsive">
                <table class="table text-center table-hover"style="background: #FFF;">
                   <thead class="thead-dark">
                        <tr>
                            <th class="text-center">Folio</th>
                            <th class="text-center">Habitación</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Fecha Entrada</th>
                            <th class="text-center">Fecha Salida</th>
                            <th class="text-center">Usuario</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Telefono</th>
                            <th class="text-center">Estatus</th>
                            <th class="text-center">Opciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($habitacion as  $hab)
                        <tr>
                            <td class="text-center"> {{ $hab->folio_reserva}} </td>
                            <td class="text-center">{{ $hab->name}}</td>
                            <td class="text-center">{{ $hab->temprecio}}</td>
                            <td class="text-center">{{ $hab->entry_date}}</td>
                            <td class="text-center">{{ $hab->departure_date}}</td>
                            <td class="text-center"> {{ $hab->username}}</td>
                            <td class="text-center"> {{$hab->email}} </td>
                            <td class="text-center"> {{$hab->phone}} </td>
                            <td class="text-center"> {{$hab->status}} </td>
                            <td class="td-actions text-right">
                                <form method="post" action="#">
                                    @csrf
                                    
                                    <a href=" {{route('print',$hab->id)}} " rel="tooltip" title="Imprimir" class="btn btn-info btn-sm btn-xs"> <i class="fa fa-info" target="_blank"></i>   Imprimir</a>


                                    {{-- <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-success btn-sm btn-block"><i class="fa fa-times text-left"></i> Desactivar</button> --}}
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

