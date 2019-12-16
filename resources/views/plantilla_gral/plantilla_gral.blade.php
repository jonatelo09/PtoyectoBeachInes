<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

          <!-- Bootstrap CSS -->
           <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

           <script src="https://kit.fontawesome.com/3a8f3b3502.js" crossorigin="anonymous"></script>

           <link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/header.css') }}">

           <link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/principal.css') }}">

           <link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/jquery.jdSlider.css') }}">

           <link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/slider.css') }}">

           <link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/footer.css') }}">

           <link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/galeria.css') }}">

           <link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/galeria2.css') }}">

           <link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/bootstrap-datepicker.standalone.min.css') }}">

           <link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/jquery.datetimepicker.css') }}">

           <link rel="stylesheet" type="text/css" href="{{ asset('hotel/css/fullcalendar.min.css') }}">





           <title>{!! $title_page !!} | Beach Hotel Ines</title>

  </head>
  <body>


     @include("paginas/header")
     @include("paginas/slider")


    @yield('contenido')

  <div class="redessociales">
      <div id="facebook"><a href="https://www.facebook.com/hotelines/" target="blank" class="fab fa-facebook"></a></div>

      <div id="twitter"><a href="https://twitter.com/InesHotel" target="nome" class="fab fa-twitter"></a></div>

      <div id="instagram"><a href="https://www.instagram.com/beach_hotel_ines_" target="blank" class="fab fa-instagram"></a></div>

      <div id="youtube"><a href="https://www.youtube.com/channel/UCIK1-Q0ko0HnK_yCd3LedrA" target="blank" class="fab fa-youtube"></a></div>

        <a style="
        display:scroll;
        position:fixed;
        bottom:40px;
        cursor:pointer;
        color: #800040;
        font-size:2.5em;

right:0;" onmouseover="subir()" onmouseout="stopScroll()" href="" title="Ir Arriba"><i class="fas fa-chevron-circle-up"></i></a>






  </div>





   <div class="wrapper">

        <section id="bloque3">



                    <h2 class="d-none d-lg-block" >
                    ¡Visita Beach Hotel Ines !</h2>


        </section>


      </div>


     @include("paginas/footer")

       <script src="{{ asset('https://code.jquery.com/jquery-3.3.1.slim.min.js') }}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
       </script>

      <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js') }}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

      <script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js') }}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




<script>


  function subir() {
window.scrollBy(0,-20); // velocidad subir
scrolldelay = setTimeout('subir()',100); // tiempo
}
function stopScroll() {
clearTimeout(scrolldelay);
}
</script>

      <script  src="{{asset("hotel/js/header.js")}}"> </script>
      <script  src="{{asset("hotel/js/footer.js")}}"> </script>
      <script src="{{ asset('js/galeria.js') }}"></script>
      <script  src="{{asset("hotel/js/jquery.jdSlider-latest.js")}}"> </script>
      <script  src="{{asset("hotel/js/slid.js")}}"> </script>
      <script  src="{{asset("hotel/js/bootstrap-datepicker.min.js")}}"> </script>
       <script  src="{{asset("hotel/js/jquery.datetimepicker.full.min.js")}}"> </script>
       <script  src="{{asset("hotel/js/fullcalendar.min.js")}}"> </script>
       <script  src="{{asset("hotel/js/moment.js")}}"> </script>
       <script  src="{{asset("hotel/js/reserva.js")}}"> </script>


  </body>



</html>