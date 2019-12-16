@extends('plantilla_admin.plantilla_admin')

@section('contenido')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/city.jpg') }}')">
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="site-section text-center">
        <h2 class="title elemento-4">Lista de Usuarios</h2>
        <div class="team">
        	<div class="row">
                <div class="form-group">
                    <a href=" {{route('users.create')}} " class="btn btn-primary btn-round">Nuevo Usuario</a>
                </div>
        		<table class="table">
        			<thead>
        				<tr>
        					<th class="text-center">Usuario</th>
        					<th class="text-center">Email</th>
                            <th class="text-center">Telefono</th>
                            <th class="text-center">Genero</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Creacion</th>
                            <th class="text-right">Modificacion</th>
                             <th class="text-right">Opciones</th>
        				</tr>
        			</thead>
        			<tbody>
        				@foreach( $users as $user)
        				<tr>
        					<td>{{ $user->username}}</td>
        					<td>{{ $user->email}}</td>
                            <td class="text-center">{{ $user->phone}}</td>
                            <td class="text-center">{{$user->sex}} </td>
                            <td class="text-center">{{ $user->admin}}</td>
                            <td class="text-center">{{ $user->created_at}}</td>
                            <td class="text-center">{{ $user->update_at}}</td>
        					<td class="text-right">
                                <form method="post" action="{{route('users.destroy',$user->id)}}">
                                    @csrf
                                    <a href="" rel="tooltip" title="ver detalles" class="btn btn-info btn-sm btn-xs btn-block"> <i class="fa fa-info"></i></a>

                                    <a href="{{route('users.edit',$user->id)}} " rel="tooltip" title="Editar producto" class="btn btn-success btn-sm btn-xs btn-block"> <i class="fa fa-edit"></i></a>

                                    <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-success btn-sm btn-xs btn-block"><i class="fa fa-times"></i></button>
                                </form>

        					</td>
        				</tr>
        				@endforeach
        			</tbody>
        		</table>
                {{$users->links()}}
        	</div>
      	</div><!-- end team -->
      </div><!-- end section -->
    </div>
  </div>
  @endsection