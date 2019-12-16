@extends('plantilla_admin.plantilla_admin')
@section('contenido')



<div class="container">

      <br>
      <h1 class="text-center text-uppercase">{{ $title_page }}</h1>

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
        <a href="{{ route('precio.create') }}" class="btn btn-info"><i class="fas fa-file-invoice-dollar"></i> Agregar un Precio</a>
     </div>
    </div>
   <br>
   <br>
<div class="table-responsive">
<table class="table text-center table-hover" style="background: #FFF;">
                                              <thead class="thead-dark">
                                                <tr>
                                                  
                                                  <th scope="col">Temporada Alta</th>
                                                  <th scope="col">Temporada Baja</th>

                                                   <th scope="col" colspan="2">Acción</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              
                                              @foreach ($precio as $pre)
                                              <tr>
                                              
                                              
                                              <td>$  <?php echo number_format($pre->temporada_alta); ?></td>
                                              <td>$ <?php echo number_format( $pre->temporada_baja); ?></td>
                                              <td>
                                                <a href="{{ route('precio.edit',$pre->id_precio) }}" class="btn btn-success" title="Editar">
                                                    <i class="fa fa-edit"></i> 
                                                </a>
                                                
                                                  <a href="{{ route('precio.confirm',$pre->id_precio) }}" class="btn btn-danger disabled" title="Eliminar" >
                                                    <i class="fa fa-trash-alt"></i>
                                                  </a>
                                                  <a href="{{ route('precio.show', $pre->id_precio) }}" class="btn btn-secondary " title="Ver">
                                                    <i class="fas fa-eye"></i> 
                                                  </a>
                                              </td>
                                              </tr>  
                                              @endforeach                                
                                              </tbody>
                                              </table>

                                          

</div>
</div>

@endsection
