@extends('layouts.principal')

@section('title', 'Listado de Aspitantes')

@section('body-class', 'product-page')

@section('content')
  <div class="main main-raised">
    <div class="container">
      <div class="site-section text-center">
        <h2 class="title elemento-4">Mensajes de la Pagina</h2>
        <div class="team">
        	<div class="row">
        		<table class="table">
        			<thead>
        				<tr>
        					<th class="col-md-2 text-center">Nombre</th>
        					<th class="col-md-5 text-center">Email</th>
                            <th class="text-center">Telefono</th>
                            <th class="text-center">Mensaje</th>
                            <th class="text-right">Opciones</th>
        				</tr>
        			</thead>
        			<tbody>
        				@foreach( $aspirantes as $aspirant)
        				<tr>
        					<td>{{ $aspirant->nameFull}}</td>
        					<td>{{ $aspirant->email}}</td>
                            <td class="text-center">{{ $aspirant->phone}}</td>
                            <td class="text-center">{{ $aspirant->oficio}}</td>
        					<td class="td-actions text-right">
								<form method="post" action="{{url('/admin/aspirant/'.$aspirant->id.'/delete')}}">
									@csrf

									<button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-sm btn-xs"><i class="fa fa-times"></i></button>
								</form>

        					</td>
        				</tr>
        				@endforeach
        			</tbody>
        		</table>
                {{$aspirantes->links()}}
        	</div>
      	</div><!-- end team -->
      </div><!-- end section -->
    </div>
  </div>
  @endsection