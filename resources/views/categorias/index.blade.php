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
          <a href="{{ route('categoria.create') }}" class="btn btn-info "><i class="fas fa-list-ol"></i> Agregar una Categoría</a>
      </div>
    </div>
   <br>
   <br>
<div class="table-responsive">
<table class="table text-center table-hover"style="background: #FFF;">
                                              <thead class="thead-dark">
                                                <tr>
                                                  <th scope="col">ID Categoría</th>
                                                  <th scope="col">Nombre</th>
                                                  <th scope="col">Acción</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              
                                              @foreach ($categoria as $cat)
                                              <tr>
                                              
                                              <td>{{ $cat->id_categoria }}</td>
                                              <td>{{ $cat->nombre }}</td>
                                              <td>
                                                <a href="{{ route('categoria.edit',$cat->id_categoria) }}" class="btn btn-success " title="Editar">
                                                    <i class="fa fa-edit"></i> 
                                                  </a>

                                                  <a href="{{ route('categoria.confirm',$cat->id_categoria) }}" class="btn btn-danger disabled " title="Eliminar" >
                                                    <i class="fa fa-trash-alt"></i>
                                                  </a>
                                                  <a href="{{ route('categoria.show',$cat->id_categoria) }}" class="btn btn-secondary " title="Ver">
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
