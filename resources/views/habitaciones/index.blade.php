@extends('plantilla_admin.plantilla_admin')
@section('contenido')
<div class="container">

  <br>
      <h1 class="text-center">Habitaciones</h1>

  <br>
   <div class="container-fluid ">
          @if ( session('datos'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('datos')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif


          @if ( session('cancelar'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('cancelar')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
    </div>



<div class="container">
<div class="row float-right">
    <a href="{{ route('products.create') }}" class="btn btn-info btncolorblanco"><i class="fas fa-hotel"></i> Agregar una Habitacion</a>
</div>
</div>
<br>
<br>
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
<div class="table-responsive">
 {{--  {{$habitacion->render()}} --}}
<table class="table text-center table-hover" style="background: #FFF;">
      <thead class="thead-dark">
        <tr>
          <th scope="col">NOMBRE</th>
          <th scope="col">CATEGORIA</th>
          <th scope="col">PRECIO</th>

          <th scope="col">DESCRIPCIÓN</th>
          <th scope="col">INCLUYE</th>
          <th scope="col" colspan="2">Acción</th>
        </tr>
      </thead>
      <tbody>
      @foreach($habitacion as  $hab)
      <?php
$des = json_decode($hab->descripcion, true);
$inc = json_decode($hab->incluye, true);
?>
                                            <tr>
                                              <td>{{ $hab->name }}</td>

                                              <td>{{ $hab->nomCategoria }}</td>

                                              <td>$ <?php echo number_format($hab->temprecio); ?></td>

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

                                                <td>
                                                <a href="{{route('products.edit',$habitacion->id)}}" class="btn btn-success" title="Editar" >
                                                    <i class="fa fa-edit"></i>
                                                  </a>

                                                  <a href="" class="btn btn-danger" title="Eliminar" >
                                                    <i class="fa fa-trash-alt"></i>
                                                  </a>

                                                  <a href="" class="btn btn-secondary " title="Ver">
                                                    <i class="fas fa-eye"></i>
                                                  </a>
                                                </td>

                                            </tr>

                                             @endforeach
                                              </tbody>
                                            </table>
                                            {{$habitacion->render()}}

</div>

</div>

@endsection
