@extends('plantilla_gral.plantilla_gral')


 @section('contenido')



<div class="container ">
	       <h1>{!! $title_hab !!} </h1>

	@foreach($habitacion as $key => $value)
 		<div class="row">

            <div class=" col-md-5 col-md-offset-1">

				<?php

$des = json_decode($value["descripcion"], true);
$inc = json_decode($value["incluye"], true);
$img = json_decode($value["img"], true);
//$tam= sizeof($inc);

//$c = array_slice($inc, 0,1);

//dd($tam);
?>


		 		<h1 class="nombrehab text-uppercase">{{ $value["nombre"] }}</h1>
		 		@if(is_array($des))
		 			@foreach($des as $key => $desc)
				 		<p><b>{{ $desc["can_p"] }} | {{ $desc["can_c"] }}</b></p>
				        <p class="descripcionhab">{{ $desc["descrip"] }}</p>
				    @endforeach
		        @endif

		        <p class="preciohab text-uppercase">Precio:  ${{ number_format($value["temprecio"]) }} MXN.</p>
		        {{-- <p class="preciohab">{{ $value["nomCategoria"] }}</p> --}}


		 		@if(is_array($inc))
		 		<h5>Servicios: </h5>
		 			<ul>
			 		  	<li>
			 		@foreach($inc as $key => $value)

			 		    <i class="<?php echo $value['icono']; ?>"></i>
				 	<span class="text-dark small"><?php echo $value['item']; ?></span>  |

				 	@endforeach
				 	 	</li>
				 	</ul>
			 	@endif

                {{-- aqui quite el boton reservar para validar --}}


                            @if(auth()->check())
		            		{{-- <div class="text-center">
							 	<a href="{{ route ('register')}}" class="boton-reserva btn-sm" >
				            		<i class="fas fa-user-tie">  Registrarse</i>
				                </a>
					 	    </div> --}}
					 	    <a href="#" class="btn btn-danger rounded-5 d-block d-lg-inline-block" data-toggle="modal" data-target="#ModalAddCar">Reservar</a>
							@else
						        {{--<div class="text-center">
									 	<a href="{{-- {{ route('reservas.index',$value["id_habitacion"]) }} --}}" class="boton-reserva btn-sm" >
						            		<i class="fas fa-calendar-day">  Reservar</i>
						                </a>
						 	    </div>--}}
						 	    <a href="{{url('/login?redirect_to='.url()->current()) }}" class="btn btn-danger rounded-5 d-block d-lg-inline-block"><span class="icon-cart-plus text-white"></span></a>
			            	@endif
			            	<a href="{{url('/products-dos/'.$product->id) }}" class="btn btn-black btn-outline-black ml-1 rounded-0">Ver Detalles</a>




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




