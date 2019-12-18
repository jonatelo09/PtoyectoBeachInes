@extends('plantilla_admin.plantilla_admin')

@section('contenido')
  <div class="main main-raised">
    <div class="container">
      <div class="site-section">
        <div class="team">
            <h2 class="title">Categorias Disponibles</h2>
            <div class="container">
                <a href=" {{url('/admin/category/create')}} " class="btn btn-primary btn-round mt-1 mb-3">Nueva Categoria</a>
            </div>
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
        	<div class="row">
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
        					<td class="td-actions text-right">
								<form method="post" action="{{url('/admin/category/'.$categori->id.'/delete')}}">
									@csrf
        							<a href="{{url('/admin/category/'.$categori->id.'/edit')}}" rel="tooltip" title="Editar producto" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>

									<button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
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