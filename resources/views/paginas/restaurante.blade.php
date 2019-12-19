@extends('plantilla_gral.plantilla_gral')


 @section('contenido')
<h1>RESTAURANTE BAR</h1>
<hr>
 <div class="container">
 	<div class="row">
 		<div class=" col-md-4 col-sm-6 col-md-offset-1">

 		<br>
		 	<p>
			En nuestro Restaurante Bar podrá disfrutar de nuestros exquisitos platillos a la carta con el sabor único de nuestra cosina mexicana y pasar un rato agradable a temperatura ambiente, con un horario de servicio de 7:30-22:30 horas, ubicado frente a la alberca principal del hotel.
		 	</p>


			<ul>

				<li ><i class="fas fa-check"></i> Platillos nacionales e internacionales.</li>
				<li ><i class="fas fa-check"></i> Bebidas nacionales e internacionales.</li>
			    <li ><i class="fas fa-check"></i> Bar cerca de la piscina.</li>

			</ul>
        </div>
        <div class="col-md-8 col-sm-6 col-md-offset-1">
		    <ul class="galeria">
		        <li><a href="#img1"><img src="{{ asset('/hotel/img/restaurante/ines1.jpg') }}"></a></li>
		    </ul>

		    <div class="modal" id="img1">
		        <div class="imagen">
		            <a href="#img22">&#60;</a>
		            <a href="#img1"><img src="{{ asset('/hotel/img/restaurante/ines2.jpg') }}"></a>
		            <a href="#img2">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>

		    <div class="modal" id="img2">
		        <div class="imagen">
		            <a href="#img1">&#60;</a>
		            <a href="#img2"><img src="{{ asset('/hotel/img/restaurante/ines3.jpg') }}"></a>
		            <a href="#img3">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>

		    <div class="modal" id="img3">
		        <div class="imagen">
		            <a href="#img2">&#60;</a>
		            <a href="#img3"><img src="{{ asset('/hotel/img/restaurante/ines4.jpg') }}"></a>
		            <a href="#img4">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img4">
		        <div class="imagen">
		            <a href="#img3">&#60;</a>
		            <a href="#img4"><img src="{{ asset('/hotel/img/restaurante/ines5.jpg') }}"></a>
		            <a href="#img5">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img5">
		        <div class="imagen">
		            <a href="#img4">&#60;</a>
		            <a href="#img5"><img src="{{ asset('/hotel/img/restaurante/ines6.jpg') }}"></a>
		            <a href="#img6">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img6">
		        <div class="imagen">
		            <a href="#img5">&#60;</a>
		            <a href="#img6"><img src="{{ asset('/hotel/img/restaurante/ines7.jpg') }}"></a>
		            <a href="#img7">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img7">
		        <div class="imagen">
		            <a href="#img6">&#60;</a>
		            <a href="#img7"><img src="{{ asset('/hotel/img/restaurante/ines8.jpg') }}"></a>
		            <a href="#img8">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img8">
		        <div class="imagen">
		            <a href="#img7">&#60;</a>
		            <a href="#img8"><img src="{{ asset('/hotel/img/restaurante/ines9.jpg') }}"></a>
		            <a href="#img9">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img9">
		        <div class="imagen">
		            <a href="#img8">&#60;</a>
		            <a href="#img9"><img src="{{ asset('/hotel/img/restaurante/ines10.jpg') }}"></a>
		            <a href="#img10">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img10">
		        <div class="imagen">
		            <a href="#img9">&#60;</a>
		            <a href="#img10"><img src="{{ asset('/hotel/img/restaurante/ines11.jpg') }}"></a>
		            <a href="#img11">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img11">
		        <div class="imagen">
		            <a href="#img10">&#60;</a>
		            <a href="#img11"><img src="{{ asset('/hotel/img/restaurante/1.jpg') }}"></a>
		            <a href="#img12">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img12">
		        <div class="imagen">
		            <a href="#img11">&#60;</a>
		            <a href="#img12"><img src="{{ asset('/hotel/img/restaurante/2.jpg') }}"></a>
		            <a href="#img13">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img13">
		        <div class="imagen">
		            <a href="#img12">&#60;</a>
		            <a href="#img13"><img src="{{ asset('/hotel/img/restaurante/3.jpg') }}"></a>
		            <a href="#img14">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img14">
		        <div class="imagen">
		            <a href="#img13">&#60;</a>
		            <a href="#img14"><img src="{{ asset('/hotel/img/restaurante/4.jpg') }}"></a>
		            <a href="#img15">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img15">
		        <div class="imagen">
		            <a href="#img14">&#60;</a>
		            <a href="#img15"><img src="{{ asset('/hotel/img/restaurante/5.jpg') }}"></a>
		            <a href="#img16">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img16">
		        <div class="imagen">
		            <a href="#img15">&#60;</a>
		            <a href="#img16"><img src="{{ asset('/hotel/img/restaurante/6.jpg') }}"></a>
		            <a href="#img17">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img17">
		        <div class="imagen">
		            <a href="#img16">&#60;</a>
		            <a href="#img17"><img src="{{ asset('/hotel/img/restaurante/7.jpg') }}"></a>
		            <a href="#img18">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img18">
		        <div class="imagen">
		            <a href="#img17">&#60;</a>
		            <a href="#img18"><img src="{{ asset('/hotel/img/restaurante/8.jpg') }}"></a>
		            <a href="#img19">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img19">
		        <div class="imagen">
		            <a href="#img18">&#60;</a>
		            <a href="#img19"><img src="{{ asset('/hotel/img/restaurante/9.jpg') }}"></a>
		            <a href="#img20">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img20">
		        <div class="imagen">
		            <a href="#img19">&#60;</a>
		            <a href="#img20"><img src="{{ asset('/hotel/img/restaurante/10.jpg') }}"></a>
		            <a href="#img21">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		    <div class="modal" id="img21">
		        <div class="imagen">
		            <a href="#img20">&#60;</a>
		            <a href="#img21"><img src="{{ asset('/hotel/img/restaurante/11.jpg') }}"></a>
		            <a href="#img22">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
		      <div class="modal" id="img22">
		        <div class="imagen">
		            <a href="#img21">&#60;</a>
		            <a href="#img22"><img src="{{ asset('/hotel/img/restaurante/12.jpg') }}"></a>
		            <a href="#img1">></a>
		        </div>
		        <a class="cerrar" href="">X</a>
		    </div>
        </div>



 	   </div>
    </div>

@endsection