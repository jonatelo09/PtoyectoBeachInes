@extends('plantilla_admin.plantilla_admin')
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

									<input type="text" class="form-control datepicker entrada" autocomplete="off" placeholder="Entrada" name="fecha_ingreso"  required>

									<div class="input-group-append">

										<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>

									</div>

								</div>

							 	<div class="col-6 col-md-3 input-group pl-1">

									<input type="text" class="form-control datepicker salida" autocomplete="off" placeholder="Salida" name="departure_date"   readonly required>

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
			<p>Código de la Reserva:</p>
				<h4 class="colorTitulos"><strong class="codigoReserva"><?php echo codigoAleatorio($chars, 9); ?></strong></h4>

				<input type="hidden" name="id_habitacion" value="{{$hab->id_habitacion}}">
				<div class="form-group">
				  <label>Ingreso 14:00 pm:</label>
				  <input type="date" class="form-control" value="{{ $date_inicio }}" readonly>
				</div>

				<div class="form-group">
				  <label>Salida 12:00 pm:</label>
				  <input type="date" class="form-control" value="{{ $date_final }}"  readonly>
				</div>

				<div class="form-group">
				  <label>Habitación:</label>
				  <input type="text" class="form-control" value="{{  $hab->nombre }}" readonly>
				</div>

				@if(is_array($des))
		 			@foreach($des as $key => $desc)
				 	<div class="form-group">

				  <p>{{ $desc["descrip"] }}</p>
				  <label>{{ $desc["can_p"] }}</label>

				</div>
					@endforeach
		        @endif



				<div class="col-12 col-lg-6 col-xl-7 text-center text-lg-left">

						<h4 class="precioReserva">$<span><?php echo number_format($diasDiferencia * $hab->temprecio); ?>MXN</span></h4>

					</div>

					<div class="col-12 col-lg-6 col-xl-5">

						<a href="<?php //echo $ruta;?>perfil"
						class="pagarReserva"
						idHabitacion="<?php //echo $reservas[$indice]["id_h"]; ?>"
						imgHabitacion="<?php //echo $servidor.$galeria[0]; ?>"
						infoHabitacion="Habitación <?php //echo $reservas[$indice]["tipo"]." ".$reservas[$indice]["estilo"]; ?>"
						pagoReserva="<?php //echo ($precioContinental*$dias);?>"
						codigoReserva=""
						fechaIngreso="<?php //echo $_POST["fecha-ingreso"];?>"
						fechaSalida="<?php //echo $_POST["fecha-salida"];?>"
						plan="Plan Continental"
						personas="2">
						{{-- <button type="button" class="btn btn-dark btn-block">PAGAR RESERVA</button> --}}
						</a>

					</div>

					<div class="form-group">
				  		<button type="button" class="btn  btn-block" style="background:#800040; color:#fff;">PAGAR RESERVA</button>

					</div>



		</div>

		 @endif
         @endif

	</div>

</div>


@endsection