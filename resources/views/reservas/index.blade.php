@extends('plantilla_admin.plantilla_admin')
@section('contenido')
<h1>Index - Reservas </h1>
@foreach ($habitacion as $element)
<h1>{{ $element->id_habitacion }} - {{ $element->nombre }}</h1>
<p>${{ number_format($element->temprecio) }} MXN.</p>
<p>${{ number_format($element->temprecio * $element->id_habitacion) }} MXN.</p>
@endforeach

@endsection


