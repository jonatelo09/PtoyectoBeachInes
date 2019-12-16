@extends('layouts.principal')

@section('title', 'Listado de Aspitantes')

@section('body-class', 'product-page')

@section('content')
  <div class="main main-raised">
    <div class="container">
      <div class="site-section text-center">
        <h2 class="title elemento-4">Lista de Precios</h2>
        <div class="team">
        	<div class="row">
                <div class="form-group">
                    <a href=" {{route('prices.create')}} " class="btn btn-primary btn-round">Nuevo Precio</a>
                </div>
        		<table class="table">
        			<thead>
        				<tr>
        					<th class="col-md-2 text-center">ID</th>
        					<th class="col-md-5 text-center">Temporada Alta</th>
                            <th class="text-center">Temporada Baja</th>
                            <th class="text-right">Opciones</th>
        				</tr>
        			</thead>
        			<tbody>
        				@foreach( $prices as $price)
        				<tr>
        					<td>{{ $price->id}}</td>
        					<td>{{ $price->temporada_alta}}</td>
                            <td class="text-center">{{ $price->temporada_baja}}</td>
        					<td class="td-actions text-right">
								<form method="post" action="{{route('prices.destroy',$price->id)}}">
									@csrf
                                    <a href="{{route('prices.edit',$price->id)}}" rel="tooltip" title="Editar producto" class="btn btn-success btn-sm btn-xs"> <i class="fa fa-edit"></i></a>

									<button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-sm btn-xs"><i class="fa fa-times"></i></button>
								</form>

        					</td>
        				</tr>
        				@endforeach
        			</tbody>
        		</table>
                {{$prices->links()}}
        	</div>
      	</div><!-- end team -->
      </div><!-- end section -->
    </div>
  </div>
  @endsection