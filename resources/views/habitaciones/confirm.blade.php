

@extends('plantilla_admin.plantilla_admin')

@section('titulo','Confirme eliminacion')

@section('contenido')

<div class="container py-5">
	<h1>Deseas eliminar el registro de {{ $Habitacion->nombre }} {{ $Habitacion->id_habitacion }}? </h1>

	<form action="{{ route('habitacionesadmin.destroy',$Habitacion->id_habitacion) }}" method="POST">
		@method('DELETE')
	@csrf

	<button type="submit" class="redondo btn btn-danger">
		<i class="fas fa-trash-alt"></i>Eliminar
	</button>
		<a class="redondo btn btn-secondary" href="{{ route('cancelarh') }}">
			<i class="fas fa-ban"></i>Cancelar
		</a>
</form>
</div>


   

@endsection


{{-- {{ $Agenda }} --}}