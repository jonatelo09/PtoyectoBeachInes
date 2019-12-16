@extends('layouts.principal')

@section('title','Bienvenido a '. config('app.name'))
@section('content')
      @include('includes.slider')
      <div class="site-section">
          <div class="container">
            <h1>Beach Hotel Ines</h1>
              <br>
              <br>
              <p>
                Beach Hotel Ines es uno de los hoteles situado en la famosa playa de Zicatela (Puerto Escondido, Oaxaca, México) Se encuentra ubicado en Calle del Morro s/n, Playa Zicatela, 71986 Puerto Escondido, Oaxaca, México., y posee un amplio aparcamiento de automóviles, es un exclusivo Hotel que ofrece descanso y goce en la zona mas intensa de esta ciudad el cual se caracteriza por sus intensas olas, durante su visita tendrá una experiencia única, disfrutando de unas vistas impresionantes a lo largo del día, relajándose, tomando sol en nuestras playas.
              </p>
              <p>
                En Beach Hotel Ines apostamos por la conservación y la puesta del patrimonio y la cultura de los edificios de todo nuestro hotel, se destaca por ser antiguo,  rustico,  tradicional, limpio y cómodo. La integración de lo antiguo y de lo nuevo es una de nuestras señas de identidad. Los amplios espacios de esta bonita morada mediterránea ofrecen también el servicio de restaurante con menú internacional incluido la mejor carne de Puerto Escondido en una espléndida terraza al aire libre, donde es posible disfrutar de muchos días de sol con temperaturas agradables, hasta en el invierno.
                </p>
                <p>
                Si busca paz y tranquilidad después de un paseo por las calles del centro o un día de playa, el Beach Hotel Ines de Puerto Escondido le ofrece alojamiento para todo tipo de necesidad y presupuesto de nuestros huéspedes. Desde cabañas, bungalows, cuartos dobles hasta apartamentos y suites con jacuzzi.
              </p>
          </div>
          <div style="background-color:black; padding:50px 0; ">
            <div class="container" style="color:#fff;">
             <h4 style=" text-align:center; color:#fff; ">Tenemos lo necesario para hacerte sentir en casa</h4>

             <br>
              <div class="row">
                <div class="col-sm-4">
                  <ul  style="list-style:none;">

                    <li><i class="fas fa-swimming-pool" style="font-size:2em;"></i>   Alberca </li>
                  </ul>
                </div>
                <div class="col-sm-4">
                  <ul  style="list-style:none;">

                    <li><i class="fas fa-hotel" style="font-size:2em;"></i>   Habitaciones familiares </li>
                  </ul>
                </div>
                <div class="col-sm-4">
                  <ul  style="list-style:none;" >

                    <li><i class="fas fa-glass-martini-alt"  style="font-size:2em;"></i>   Bar  </li>
                  </ul>
                </div>
                <div class="col-sm-4">
                  <ul  style="list-style:none;">

                    <li><i class="fas fa-utensils" style="font-size:2em;"></i>   Restaurante  </li>
                  </ul>
                </div>
                <div class="col-sm-4">
                  <ul  style="list-style:none;">

                    <li><i class="fas fa-swimmer" style="font-size:2em;"></i>   Camastros de playa </li>
                  </ul>
                </div>
                <div class="col-sm-4">
                  <ul  style="list-style:none;">

                    <li><i class="fas fa-wifi" style="font-size:2em;"></i>   Wifi </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="site-section bg-black" id="services-section">
        <div class="container">
          <div class="row mb-5">
            <div class="col-12 text-center">
              <h3 class="section-sub-title text-white">Nuestras Categorias</h3>
              <h2 class="section-title mb-3 text-white">Visita Nuestras Categorias</h2>
            </div>
          </div>
          <div class="row align-items-stretch">
              @foreach($categories as $categoria)
              <div class="col-md-4 mb-5 mb-md-0">
                <div class="product-item">
                  <a href="{{url('/categories-dos/'.$categoria->id) }}">
                    <figure>
                      <img src="{{ url('images/categories/'.$categoria->image) }}" alt="Image" class="img-fluid" style="width: 250px; height: 250px;">
                    </figure>
                  </a>
                  <div>
                    <h3><a class="text-danger text-uppercase" href="{{url('/categories-dos/'.$categoria->id) }}"> {{$categoria->name_cat}}</a></h3>
                    <p>{{$categoria->description}} </p>
                  </div>
                </div>
              </div>
              @endforeach
          </div>
        </div>
      </div>
      @if(auth()->User())
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-center" id="exampleModalLongTitle">¿Cómo Calificarias este Servicio?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="form-group" id="rating-ability-wrapper">
                <label class="control-label" for="rating">
                <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
                <span class="field-label-info"></span>
                <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                </label>
                <h2 class="bold rating-header" style="">
                <span class="selected-rating">0</span><small> / 5</small>
                </h2>
                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                    <i class="fa fa-star" aria-hidden="true"></i>
                </button>
                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                    <i class="fa fa-star" aria-hidden="true"></i>
                </button>
                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                    <i class="fa fa-star" aria-hidden="true"></i>
                </button>
                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                    <i class="fa fa-star" aria-hidden="true"></i>
                </button>
                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                    <i class="fa fa-star" aria-hidden="true"></i>
                </button>
              </div>

            </div>
            <div class="modal-footer">
              <button type="subtmit" class="btn btn-primary">Enviar</button>
            </div>
          </div>
        </div>
      </div>
      @endif
      <div class="site-section mt-4 bg-black" id="about-section">
        <div class="container">
          <div class="row align-items-lg-center">
            <div class="col-md-8 mb-5 mb-lg-0 position-relative">
              <img src="{{asset('img/1.jpg')}}" class="img-fluid" alt="Image">
              <div class="experience">
                <span class="year">Empresa Confiable</span>
                <span class="caption">Más de 50 años en el mercado</span>
              </div>
            </div>
            <div class="col-md-3 ml-auto">
              <h3 class="section-sub-title"></h3>
              <h2 class="section-title mb-3 text-white">Nosotros</h2>
              <p class="mb-4">HOTEL BEACH INES.</p>
              <!-- <p><a href="#" class="btn btn-black btn-black--hover rounded-0">Learn More</a></p> -->
            </div>
          </div>
        </div>
      </div>
      @guest
      <div class="site-section bg-light border-bottom" id="contact-section">
        <div class="container">
          <div class="row mb-5">
            <div class="col-12 text-center">
              <h3 class="section-sub-title">Formulario de Contacto</h3>
              <h2 class="section-title mb-3"></h2>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-7 mb-5">


              <form method="POST" action="{{route('mensaje') }}" class="p-5 bg-white contact-form">
                @csrf
                <h2 class="h4 text-black text-center mb-5">Escribe tus Datos</h2>

                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="fname">Nombre Completo</label>
                    <input type="text" id="fname" name="nameFull" class="form-control rounded-0">
                  </div>
                  <!--<div class="col-md-6">
                    <label class="text-black" for="lname">Apellido</label>
                    <input type="text" id="lname" class="form-control rounded-0">
                  </div>-->
                </div>

                <div class="row form-group">

                  <div class="col-md-12">
                    <label class="text-black" for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control rounded-0">
                  </div>
                </div>

                <div class="row form-group">

                  <div class="col-md-12">
                    <label class="text-black" for="phone">Telefono</label>
                    <input type="tel" id="phone" name="phone" class="form-control rounded-0">
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="oficio">Mensaje</label>
                    <textarea id="oficio" name="oficio" cols="30" rows="7" class="form-control rounded-0" placeholder="Escribe tu mensaje..."></textarea>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <input type="submit" value="Enviar" class="btn btn-primary btn-block rounded-3 py-3 px-4">
                  </div>
                </div>
              </form>
            </div>

          </div>

        </div>
      </div>
      @endguest
@endsection
@section('scripts')
  <script src=" {{asset('/js/typeahead.bundle.min.js')}} "></script>
  <script >
      $(function(){
          //
          var products = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            // `states` is an array of state names defined in "The Basics"
            prefetch: {
              url: '{{ url('/products/json') }}',
              cache: false
            }
          });
          //inicializar typeahead sobre nuestro input de búsqueda
          $('#search').typeahead({
              hint: true,
              highlight: true,
              minLength: 1
          },{
              name: 'products',
              source: products
          });
      });
  </script>
@endsection