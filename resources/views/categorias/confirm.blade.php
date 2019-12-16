@extends('plantilla_admin.plantilla_admin')
@section('contenido')

<div class="container py-5">
	<h1>Deseas eliminar el registro de la Categoría  {{ $categoria->nombre }}  ? </h1>

	

	<form action="{{ route('categoria.destroy', $categoria->id_categoria) }}" method="POST">
	@method('DELETE')	
	@csrf

	<button type="submit" class="redondo btn btn-danger">
		<i class="fas fa-trash-alt"></i>
	</button>
		<a class="redondo btn btn-secondary" href="{{ route('cancelar') }}">
			<i class="fas fa-ban"></i>
		</a>
</form>
</div>



@endsection


