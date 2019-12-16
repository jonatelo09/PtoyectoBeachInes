@extends('plantilla_gral.plantilla_gral')


 @section('contenido')



<div class="container ">
	<h1>{!! $title_hab !!} </h1>

	@foreach($habitacion as  $hab)
 		<div class="row">
            <div class=" col-md-5 col-md-offset-1">
				<?php
$des = json_decode($hab->descripcion, true);
$inc = json_decode($hab->incluye, true);
$img = json_decode($hab->img, true);
//$tam= sizeof($inc);
//$c = array_slice($inc, 0,1);
//dd($tam);
?>
		 		<h1 class="nombrehab text-uppercase">{{ $hab->name }}</h1>
		 		@if(is_array($des))
		 			@foreach($des as $key => $desc)
				 		<p><b>{{ $desc["can_p"] }} | {{ $desc["can_c"] }}</b></p>
				        <p class="descripcionhab">{{ $desc["descrip"] }}</p>
				    @endforeach
		        @endif

		        <p class="preciohab text-uppercase">Precio:  ${{ number_format($hab->temprecio) }} MXN.</p>
		        {{-- <p class="preciohab">{{ $value["nomCategoria"] }}</p> --}}


		 		@if(is_array($inc))
		 		 <h5>Servicios: </h5>
		 			<ul>
			 		  	<li>
			 		@foreach($inc as $key => $val)

			 		    <i class="<?php echo $val['icono']; ?>"></i>
				 	<span class="text-dark small"><?php echo $val['item']; ?></span>  |

				 	@endforeach
				 	 	</li>
				 	</ul>
			 	@endif

			 	{{-- Condición para Registrarse o para reservar en caso de ya estar registrado  --}}
			    			@if(auth()->check())
					 	    {{--<a href="#" class="btn btn-danger rounded-5 d-block d-lg-inline-block" data-toggle="modal" data-target="#ModalAddCar">Reservar</a>
                <a href="{{route('reservar-habitacion')}}" class="btn btn-danger rounded-5 d-block d-lg-inline-block">Reservar</a>--}}
                <form method="GET" action="{{ route('reservar-habitacion') }}" autocomplete="off">
                @csrf
                    <div class="text-center">
                      <input type="hidden" name="id" value="{{$hab->id}}">
                       <button type="submit" class="boton-reserva btn-sm"><i class="fas fa-calendar-day"></i> Reservar</button>
                  </div>
              </form>
							@else
						 	<a href="{{url('/login?redirect_to='.url()->current()) }}" class="btn btn-danger rounded-5 d-block d-lg-inline-block"><i class="fas fa-user-tie">Reservar</i></a>
			            	@endif

			{{-- Fin de la Condición para Registrarse o reservar  --}}



			</div>



	 		<div class="jd-slider col-md-7 sliderHabitaciones">
	 			<hr>

	 			<div class="slide-inner">

			        <ul class="slide-area">
			            @if(is_array($img))
				 			@foreach($img as $key => $image)
			            	  	<li>
									<img src="{{ asset($image) }}" class="img-fluid">
								</li>
							@endforeach
						@else
							<?php //echo "No es un arreglo la ariable enviada"; ?>
				 		@endif
					</ul>

				</div>
				<img src="img/sli" alt="">

				  	  	<a class="prev d-none d-lg-block" href="#">
				            <i class="carousel-control-prev-icon"></i>
				        </a>

				        <a class="next d-none d-lg-block" href="#">
				            <i class="carousel-control-next-icon"></i>
				        </a>

				         <div class="controller d-block d-lg-none">
					        <div class="indicate-area"></div>
					    </div>

	        </div>
		</div>
   		<br>
   		 @endforeach
   		 {{$habitacion->render()}}
</div>
@endsection




