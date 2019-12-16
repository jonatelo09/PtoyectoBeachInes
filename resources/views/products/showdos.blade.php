@extends('plantilla_gral.plantilla_pay')

@section('contenido')
@if (session('notification'))
<div class="alert alert-success elemento-9" role="alert">
    {{ session('notification') }}
</div>
@endif
<div class="container">
  <br>
  <br>
    <div class="bg-white py-4 mb-4 elemento-3">
      <div class="row mx-4 my-4 product-item-2 align-items-start">
        <div class="col-md-6 mb-5 mb-md-0">
          <img src="{{$product->featured_image_url}}" alt="Image" class="img-fluid" style="width: 550px; height: 450px;">
        </div>
        @foreach($product as  $hab)
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
          <div class="col-md-5 ml-auto product-title-wrap">
          <!-- <span class="number">{{$product->id}}.</span> -->
          <h3 class="text-black mb-4 font-weight-bold">{{$hab->name}} </h3>
          <h5>{{$hab->category->name}}</h5>
          <div class="mb-4">
            <h3 class="text-black font-weight-bold h5">Precio:</h3>
            <div class="price form-inline"><del class="mr-2">$269.00</del><h1>${{$product->price}}</h1> </div>
          </div>
          <p>
          	@if(auth()->check())
          	<a href="#" class="btn btn-danger rounded-5 d-block d-lg-inline-block" data-toggle="modal" data-target="#ModalAddCar">Reservar</a>
            @else
		        <a href="{{url('/login?redirect_to='.url()->current()) }}" class="btn btn-danger rounded-5 d-block d-lg-inline-block">Reservar</a>
            @endif
            <a href="{{url('/home')}}" class="btn btn-black btn-outline-black rounded-0 d-block mb-2 mb-lg-0 d-lg-inline-block">Ver Carrito</a>

          </p>
        </div>
      </div>
      <div class="row mx-4 my-4 product-item-2 align-items-start">
          <div class="col-md-12 col-md-offset-3">
              <div class="profile-tabs">
                  <div class="nav-align-center">
                      <div class="tab-content gallery">
                          <h4>Gallery</h4>
                          <div class="tab-pane active" id="studio">
                              <div class="row">
                                  <div class="col-md-6">
                                      @foreach ($imagesLeft as $image)
                                      <img src=" {{ $image->url }} " class="img-fluid mt-3">
                                      @endforeach
                                  </div>
                                  <div class="col-md-6">
                                      @foreach ($imagesRigth as $image)
                                      <img src=" {{ $image->url }} " class="img-fluid mt-3">
                                      @endforeach
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
              </div>
              <!-- End Profile Tabs -->
          </div>
      </div>
    </div>
    @endforeach
</div>

<!-- Modal Añadir a carrito -->
<div class="modal fade" id="ModalAddCar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-warning" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h5 class="modal-title" id="myModalLabel">Seleccione la fechas.</h5>
            </div>
            <div class="modal-body">
            <form method="post" action=" {{ url('/cart')}} ">
                @csrf
                <input type="hidden" name="product_id" value=" {{ $product->id }} " style="display: none;">
                <input type="hidden" name="folio" value="{{date('d').''.date('m').''.date('y').''.rand()}} " style="display: none;">
                <div class="modal-body">
                  <div class="form-group row">
                    <label class="form-control-label">Fecha Entrada:</label>
                    <input type="date" name="entry_date" class="form-control" required>
                  </div>
                  <div class="form-group row">
                    <label class="form-control-label">Fecha Salida:</label>
                    <input type="date" name="departure_date" class="form-control" required>
                  </div>
                  <div class="form-group row">
                      <div class="col-md-8">
                          <div class="form-group label-floating">
                              <input class="form-check-input" value="1" type="checkbox" name="condition" required>
                              <label class="text-black form-check-label" for="remember">
                                  Aceptar Terminos y Condiciones...
                              </label>
                          </div>
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-md-8">
                          <div class="form-check">
                              <label class="form-control-label">Quieres Facturar?</label>
                              <select class="form-control" id="facturar" name="facturar" required>
                                <option selected>Selecione una opcion</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                              </select>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info btn-simple">Añadir al Carrito</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection