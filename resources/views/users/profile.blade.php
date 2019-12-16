@extends('plantilla_admin.plantilla_admin')


@section('contenido')
<div class="site-section bg-light">
      <div class="container">
        <div class="bg-white py-4 elemento-3">
        	<div class="row m-lg-4">
        		<h3 class="text-center">Perfil de {{auth()->user()->name}} </h3>
        	</div>
        	<div class="row ml-2">
        		<div class="col-md-7">
	        		<form method="post" action="">
		        		<div class="col-md-auto mb-lg-0 position-relative">
			        		<div class="form-group label-floating">
			                	<label class="control-label">Nombre</label>
			                	<input type="text" class="form-control" name="name" value="{{ auth()->user()->username}} ">
			              	</div>
			        	</div>
			        	<div class="col-md-auto">
			        		<div class="form-group label-floating">
			                	<label class="control-label">Email</label>
			                	<input type="email" class="form-control" name="email" value="{{ auth()->user()->email}} ">
			              	</div>
		        		</div>
		        		<div class="col-md-auto mb-lg-0 position-relative">
			        		<div class="form-group label-floating">
			                	<label class="control-label">Telefono</label>
			                	<input type="tel" class="form-control" name="name" value="{{ auth()->user()->phone}} ">
			              	</div>
			        	</div>
			        	<div class="col-md-auto">
			        		<div class="form-group label-floating">
			                	<label class="control-label" for="address">Dirección</label>
			                	<input type="text" class="form-control" name="address" value="{{ auth()->user()->address}} ">
			              	</div>
		        		</div>
		        		<div class="col-md-auto">
			        		<div class="form-group label-floating">
			                	<label class="control-label">Password</label>
			                	<input id="current_password" type="password" class="form-control" name="email" value="{{ auth()->user()->password}} ">
			              	</div>
		        		</div>
		        		<div class="form-group row ml-3">
		        			<button type="submit" class="btn btn-danger btn-sm">Guardar</button>
		        		</div>
	        		</form>
        		</div>
        		<div class="col-md-4 ml-4">
	        		<div class="card">
	        			<div class="card-body">
	        				<img class="img-fluid" src="{{asset('img/default-avatar.png')}} " style="width: 200px; height: 200px;">
	        			</div>
	        			<div class="card-footer">
	        				<div class="form-group">
	        					<input type="file" name="file" class="form-control">
	        				</div>
	        				<div class="form-group">
	        					<form>
	        						<div class="form-group">
	        							<button type="submit" class="btn btn-warning btn-sm">Subir Imagen</button>
	        						</div>
	        					</form>
	        				</div>
	        			</div>
	        		</div>
        		</div>
	        </div>

        </div>
    </div>
</div>
@endsection