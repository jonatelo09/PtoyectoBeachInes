@extends('plantilla_gral.plantilla_gral')


 @section('contenido')
<div class="container">
	 <h1>Contacto</h1>
  <hr>
   <div class="container-fluid ">
          @if ( session('datos'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('datos')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

    </div>
	<div class="row">	
	      <div class="col-sm-4">
		
				<h3>Llamanos o escribenos</h3>


				<p><i class="fas fa-map-marker-alt"></i>   Av. Del Morro, Playa Zicatela, 71986 Puerto Escondido, Oax.</p>
      			<p><i class="fas fa-phone-alt"></i> 954-582-0416 | 954-582-0792</p>
      			<p><i class="fas fa-envelope"></i>  info@hotelines.com</p>
	      </div>


		<div class="col-sm-8">
   

			
		    <form method="POST" action=" {{ route('contacto') }} ">
                @csrf
			       <div class="form-row">
                   <div class="form-group col-md-6">
                         <label for="nombre">Nombre Completo:</label>
                         <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre completo" >
                         {!! $errors->first('nombre','<small style="color: #e60000;">:message</small> <br>') !!}
                    </div>
                    <div class="form-group col-md-6">
                          <label for="email">Correo Electronico:</label>
                          <input  name="email" type="email" class="form-control" id="email" placeholder="Ingrese su correo Electronico" >
                          {!! $errors->first('email','<small style="color: #e60000;">:message</small> <br>') !!}
                    </div>
              </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                          <label for="asunto">Asunto:</label>
                          <input name="asunto" type="text" class="form-control" id="asunto" placeholder="Ingrese su asunto" >
                        {!! $errors->first('asunto','<small style="color: #e60000;">:message</small> <br>') !!}
                    </div>
                     
                    <div class="form-group col-md-6">
                         <label for="telefono">Teléfono:</label>
                         <input name="telefono" type="telefono" class="form-control" id="telefono" placeholder="Ingrese su teléfono" >
                         {!! $errors->first('telefono','<small style="color: #e60000;">:message</small> <br>') !!}
                    </div>
                </div>
               

               <div class="form-group">
						    <label for="comentarios">Comentarios:</label>
						     <textarea  name="comentarios" class="form-control" id="comentarios" rows="5" ></textarea>
                 {!! $errors->first('comentarios','<small style="color: #e60000;">:message</small> <br>')!!}

                </div>

                <div class="form-group">	
		                    <div class="col-sm-12 ">
		                     <button class="btn btn-dark btn-lg btn-block" type="submit">Enviar</button>
		                     </div>
		        </div>
            </form>

        </div>
              
              

		 
		    
		

        </div>
      
</div>
 
@endsection