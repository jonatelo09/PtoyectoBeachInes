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
          <a href="{{ route('user.create') }}" class="btn btn-info "><i class="fas fa-user-plus"></i> Agregar un Usuario</a>
      </div>
    </div>
   <br>
   <br>

  <form method="get" action="{{ route('user.index') }}" autocomplete="off" role="search">
    @csrf
  <div class="form-group">
       <div class="input-group">
          <input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$query}}">
          <span class="input-group-btn">
          <button type="submit" class="btn btn-primary">Buscar</button>
            
          </span>
      </div>
  </div>
</form>

<div class="table-responsive">
<table class="table text-center table-hover"style="background: #FFF;">
                                              <thead class="thead-dark">
                                                <tr>
                                                  <th scope="col">Nombre</th>
                                                  <th scope="col">Apellidos</th>
                                                  <th scope="col">Sexo</th>
                                                  <th scope="col">Dirección</th>
                                                  <th scope="col">Teléfono</th>
                                                  <th scope="col">Email</th>
                                                  <th scope="col">Turno</th>
                                                  <th scope="col">Rol</th>
                                                  <th scope="col">Acción</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              
                                              @foreach ($users as $us)
                                              <tr>


                                              <td>{{ $us->nombre}}</td>
                                              <td>{{ $us->apellidos }}</td>
                                              <td>{{ $us->sexo }}</td>
                                              <td>{{ $us->direccion }}</td>
                                              <td>{{ $us->telefono }}</td>
                                              <td>{{ $us->email }}</td>
                                              <td>{{ $us->turno }}</td>
                                              <td>{{ $us->rol }}</td>
                                              <td>

                                                

                                                <a href="{{ route('user.edit',$us->id) }}" class="btn btn-success " title="Editar">
                                                    <i class="fa fa-edit"></i> 
                                                  </a>

                                                  <a href="{{ route('user.confirm',$us->id) }}" class="btn btn-danger  " title="Eliminar" >
                                                    <i class="fa fa-trash-alt"></i>
                                                  </a>
                                                  <a href="{{ route('user.show', $us->id) }}" class="btn btn-secondary " title="Ver">
                                                    <i class="fas fa-eye"></i> 
                                                  </a>
                                              </td>
                                              </tr>  
                                              @endforeach 

                                                                                     
                                              </tbody>
                                            </table>
                                             {{ $users->render()}}

                                            

</div>
</div>

@endsection
