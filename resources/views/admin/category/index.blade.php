@extends('plantilla_admin.plantilla_admin')

@section('contenido')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/city.jpg') }}')">
</div>
  <div class="main main-raised">
    <div class="container">
      <div class="site-section text-center">
        <h2 class="title elemento-4">Categorias Disponibles</h2>
        <div class="team">
        	<div class="row">
        		<div class="form-group">
                    <a href=" {{url('/admin/category/create')}} " class="btn btn-primary btn-round">Nueva Categoria</a>
                </div>
        		<table class="table">
        			<thead>
        				<tr>
        					<th class="text-center">Nombre</th>
        					<th class="">Description</th>
                            <th class="text-right">Opciones</th>
        				</tr>
        			</thead>
        			<tbody>
        				@foreach( $categories as $categori)
        				<tr>
        					<td class="text-uppercase">{{ $categori->name_cat}}</td>
        					<td>{{ $categori->description}}</td>
        					<td class="td-actions">
								<form method="post" action="{{url('/admin/category/'.$categori->id.'/delete')}}">
									@csrf
        							<a href="{{url('/admin/category/'.$categori->id.'/edit')}}" rel="tooltip" title="Editar producto" class="btn btn-success btn-sm btn-block"><i class="fa fa-edit"></i></a>

									<button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-sm btn-block"><i class="fa fa-times"></i></button>
								</form>

        					</td>
        				</tr>
        				@endforeach
        			</tbody>
        		</table>
                {{$categories->links()}}
        	</div>
      	</div><!-- end team -->
      </div><!-- end section -->
    </div>
  </div>
  @endsection