@extends('plantilla_admin.plantilla_admin')
@section('contenido')

<div class="container py-5">
	<h1>Deseas eliminar el registro del Usuario  {{ $users->nombre }}  ? </h1>

	

	<form action="{{ route('user.destroy', $users->id) }}" method="POST">
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


