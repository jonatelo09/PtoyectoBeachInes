@extends('plantilla_admin.plantilla_admin')
@section('contenido')

<div class="container py-5">
	<h1>Deseas eliminar el registro del Precio con ID {{ $precio->id_precio }}  ? </h1>

	

	<form action="{{ route('precio.destroy', $precio->id_precio) }}" method="POST">
	@method('DELETE')	
	@csrf

	<button type="submit" class="redondo btn btn-danger">
		<i class="fas fa-trash-alt"></i>Eliminar
	</button>
		<a class="redondo btn btn-secondary" href="{{ route('cancelarprecio') }}">
			<i class="fas fa-ban"></i>Cancelar
		</a>
</form>
</div>



@endsection


