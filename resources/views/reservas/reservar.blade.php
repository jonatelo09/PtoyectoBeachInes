@extends('plantilla_gral.plantilla_pay')
@section('contenido')
@php
	date_default_timezone_set("America/Mexico_City");
$chars = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
function codigoAleatorio($input, $length) {
    $input_length = strlen($input);
   $codigo = '';
    for($i = 0; $i < $length; $i++) {
        $rand = $input[mt_rand(0, $input_length - 1)];
       $codigo .= $rand;
    }
    return$codigo;
}
@endphp
<div class="container">
	<h3 class="register-heading text-center">{{ $title_page }}</h3>
	@foreach($habitacion as  $hab)
	<?php $des = json_decode($hab->descripcion, true);?>
	@endforeach
	<div class="row">
		<div class="col-12 col-lg-8 colIzqReservas p-0">
			<!--=====================================
			BLOQUE IZQ
			======================================-->
			<h6 class="lead pt-4 pb-2">Ver disponibilidad:</h6>
			{{-- Validacion disponibilidad --}}
			@if (isset($disponibilidad))
				{{-- expr --}}
	            @if ( $disponibilidad >= 1)
	            	{{-- expr --}}
		            <div class="alert alert-danger alert-dismissible fade show" role="alert">
		              <p>Disculpe las molestias, las fechas del {{ $date_inicio }} al {{ $date_final }} no se encuentran disponibles. Busque nuevas fechas</p>
		              <button type="button" class="close" data-dismiss="alert" aria-label="close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
				@else
		            <div class="alert alert-success alert-dismissible fade show" role="alert">
		              <p>Habitacion Dsiponible del {{ $date_inicio }} al {{ $date_final }}.</p>
		              <button type="button" class="close" data-dismiss="alert" aria-label="close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
	            @endif
            @endif
			{{-- FIN Validacion disponibilidad --}}
			<form action="{{ route('reservar') }}" method="post">
				@csrf
				<input type="hidden" name="id" value="{{$hab->id}}">
				<div class="container mb-3">
					<div class="row py-2" style="background:#fff">
						<div class="col-6 col-md-3 input-group pr-1">
							<input type="text" class="form-control datepicker entrada" autocomplete="off" placeholder="Entrada" id="entry_date" name="entry_date"  required>
							<div class="input-group-append">
								<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
							</div>
						</div>
					 	<div class="col-6 col-md-3 input-group pl-1">
							<input type="text" class="form-control datepicker salida" autocomplete="off" placeholder="Salida" id="departure_date" name="departure_date"   readonly required>
							<div class="input-group-append">
								<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dak"></i></span>
							</div>
						</div>
						<div class="col-12 col-md-6 mt-2 mt-lg-0 input-group">
							<input type="submit" class="btn btn-block btn-md text-white" value="Ver disponibilidad" style="background:#800040">
						</div>
					</div>
				</div>
			</form>
		 	<a href="{{ route('cancelarreserva') }}" class="redondo btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
			{{-- fin col --}}
		</div>

			@if (isset($disponibilidad))
			{{-- expr --}}
		        @if ( $disponibilidad == 0)
					<div class="col-12 col-lg-4 colDerReservas" {{-- style="display:none" --}}>
						<?php $folio = codigoAleatorio($chars, 9);?>
						<form method="post" action="{{route('cart')}}">
							@csrf
						<h4 class="text-center">Datos Generales</h4>
						<div class="form-group">
						<label>Folio de Reserva:</label>
						<input type="text" class="form-control" name="folio" value="{{$folio}} " placeholder="{{$folio}} " readonly>
						</div>
						<input type="hidden" name="product_id" value="{{$hab->id}}" style="display: none;">
						<div class="form-group">
						  <label>Ingreso 14:00 pm:</label>
						  <input type="text" class="form-control" id="entry_date" name="entry_date" value="{{$date_inicio}}" readonly>
						</div>
						<div class="form-group">
						  <label>Salida 12:00 pm:</label>
						  <input type="text" class="form-control" id="departure_date" name="departure_date" value="{{$date_final}}"  readonly>
						</div>
						<div class="form-group">
						  <label>Habitación:</label>
						  <label type="text" class="form-control">{{$hab->name}}</label>
						</div>
						<div class="input-group form-group">
							<label><a data-toggle="modal" href="#modalfactura" data-target=".modalfactura">Facutar</a></label>
							<div class="maxl">
	                            <label class="radio inline">
	                                <input type="radio" name="facturar" id="facturar" required autocomplete="facturaro" autofocus value="NO" checked style="margin-left: 30px; margin-top: 12px;">
	                                <span> NO </span>
	                            </label>
	                            <label class="radio inline">
	                                <input type="radio" name="facturar" id="facturar" required autocomplete="facturaro" autofocus value="SI" style="margin-left: 40px;">
	                                <span>SI </span>
	                            </label>
	                        </div>
						</div>

						@if(is_array($des))
				 			@foreach($des as $key => $desc)
						 	<div class="form-group">
						  <p>{{ $desc["descrip"] }} | {{ $desc["can_p"] }}</p>
						  <label></label>
						  @foreach($habitacion as $precio)
						  <label>Precio por noche:<span class="text-info h5"> ${{number_format($precio->temprecio)}} MXN </span></label>
						  @endforeach
						</div>
							@endforeach
				        @endif
						<div class="form-group">
							<h4 class="precioReserva">$<span><?php echo number_format($diasDiferencia * $hab->temprecio); ?> MXN por {{$diasDiferencia}} Noches</span></h4>
						</div>
						<div class="form-group">
                            <input type="checkbox" class="form-check-inline" name="condition" id="condition" value="1" required>
                            <label><a data-toggle="modal" href="#modalpolitica" data-target=".modalpolitica"class="btn-link">Aceptar termino y condiciones...</a></label>
                        </div>
						<div class="form-group">
							<button type="submit" class="btn  btn-block" style="background:#800040; color:#fff;">AGREGAR AL CARRITO</button>
						</div>
					</form>
					</div>
				@endif
	        @endif
	</div>
</div>
@endsection