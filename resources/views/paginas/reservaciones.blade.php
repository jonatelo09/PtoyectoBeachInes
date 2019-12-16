@extends('plantilla_gral.plantilla_gral')


 @section('contenido')
@php
	date_default_timezone_set("America/Mexico_City");
	// $fechaIngreso = new DateTime("2019-11-20");
	// $fechaSalida = new DateTime("2019-20-20");
	// $diff = $fechaIngreso->diff($fechaSalida);
	// $dias = $diff->days;

	// echo $dias;

// 	$fechaEmision = Carbon::parse($req->input('2019-11-20'));
// 	$fechaExpiracion = Carbon::parse($req->input('2019-20-20'));

// 	$diasDiferencia = $fechaExpiracion->diffInDays($fechaEmision);
// echo $diasDiferencia;
 
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
 
// Output: iNCHNGzByPjhApvn7XBD

// echo "<br>";
 
// // Output: 70Fmr9mOlGID7OhtTbyj
// echo generate_string($permitted_chars, 20);
// echo "<br>";
 
// // Output: Jp8iVNhZXhUdSlPi1sMNF7hOfmEWYl2UIMO9YqA4faJmS52iXdtlA3YyCfSlAbLYzjr0mzCWWQ7M8AgqDn2aumHoamsUtjZNhBfU
// echo generate_string($permitted_chars, 100);
 

@endphp
 

<div class="container">
	<div class="row">
		<div class="col-12 col-lg-8 colIzqReservas p-0">
			<!--=====================================
			BLOQUE IZQ
			======================================-->
			

					<h6 class="lead pt-4 pb-2">Puede modificar la fecha de acuerdo a los días disponibles:</h6>

					<form action="{{ route('compararfechares') }}" method="post">
					@csrf
						<input type="hidden" name="id-habitacion" value="<?php //echo $_POST["id-habitacion"]; ?>">

						<input type="hidden" name="ruta" value="<?php //echo $_POST["ruta"]; ?>">

						<div class="container mb-3">

							<div class="row py-2" style="background:red">

								 <div class="col-6 col-md-3 input-group pr-1">
								
									<input type="text" class="form-control datepicker entrada" autocomplete="off" placeholder="Entrada" name="fecha-ingreso" value="<?php //echo $_POST["fecha-ingreso"]; ?>"  required>

									<div class="input-group-append">
										
										<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
									
									</div>

								</div>

							 	<div class="col-6 col-md-3 input-group pl-1">
								
									<input type="text" class="form-control datepicker salida" autocomplete="off" placeholder="Salida" name="fecha-salida"  value="<?php //echo $_POST["fecha-salida"]; ?>" readonly required>

									<div class="input-group-append">
										
										<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
									
									</div>

								</div>



								<div class="col-12 col-md-6 mt-2 mt-lg-0 input-group">
																
									<input type="submit" class="btn btn-block btn-md text-white" value="Ver disponibilidad" style="background:black">										
								</div>

							</div>

						</div>

			</form>
					
					{{-- fin col --}}
		</div>
		<div class="col-12 col-lg-4 colDerReservas">
			<p>Código de la Reserva:</p>
				<h2 class="colorTitulos"><strong class="codigoReserva"><?php echo codigoAleatorio($chars, 9); ?></strong></h2>

				<div class="form-group">
				  <label>Ingreso 3:00 pm:</label>
				  <input type="date" class="form-control" value="<?php //echo $_POST["fecha-ingreso"];?>" readonly>
				</div>

				<div class="form-group">
				  <label>Salida 1:00 pm:</label>
				  <input type="date" class="form-control" value="<?php //echo $_POST["fecha-salida"];?>"  readonly>
				</div>

				<div class="form-group">
				  <label>Habitación:</label>
				  <input type="text" class="form-control" value="Habitación <?php //echo $reservas[$indice]["tipo"]." ".$reservas[$indice]["estilo"]; ?>" readonly>

				 


				</div>

				<div class="form-group">
				  <label>ECantidad de Personas:<small>(Precio sugerido para 2 personas)</small></label>
				  
				</div>
				

				

					<div class="col-12 col-lg-6 col-xl-7 text-center text-lg-left">
						
						<h1 class="precioReserva">$<span> <?php echo number_format($diasDiferencia * 100); ?> MNX. </h1>

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
							<button type="button" class="btn btn-dark btn-lg w-100">PAGAR <br> RESERVA</button>
						</a>

					</div>
			
				
		</div>

	</div>

</div>
	



@endsection