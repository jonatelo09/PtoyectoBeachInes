@extends('plantilla_admin.plantilla_admin')

@section('contenido')
<div class="main main-raised">
  <div class="container">
      <div class="site-section">
        <h2 class="title text-center elemento-4">Actualizar Habitacion</h2>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form method="post" action=" {{ route('products.update',$product->id) }} ">
          @csrf
          <div class="row">

            <div class="col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Nombre de la Habitacion</label>
              <input type="text" class="form-control" name="name" value="{{old('name', $product->name)}}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group label-floating">
                <label class="control-label">Precio</label>
                <input type="number" class="form-control" name="price" value="{{old('price', $product->price)}}" required>
            </div>
          </div>
          </div>
          <div class="row">
            @php
                  $des = json_decode($product->descripcion,true);
                  //dd($des);
              @endphp
              @if(is_array($des))
                   @foreach($des as $key => $desc)
                   
                
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Descripcion</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion"  placeholder="Descripcion" required="" value="{{ $desc["descrip"] }}">
                {!! $errors->first('descripcion','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Cantidad de Personas</label>
                <input type="text" class="form-control" id="cantidad_personas" name="cantidad_personas" required value="{{ $desc["can_p"] }}">
                {!! $errors->first('cantidad_personas','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Cantidad de camas</label>
                <input type="text" class="form-control" id="cantidad_camas" name="cantidad_camas" required value="{{ $desc["can_c"] }}">
                {!! $errors->first('cantidad_camas','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
              </div>
            </div>
               @endforeach
                                                   
            @endif

          </div>
         {{--  <div class="row">
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Categoria de la Habitacion</label>
                <select class="form-control" name="category_id">
                  <option value="0">General</option>
                  @foreach ($categories as $category)
                  <option value=" {{$category->id}} " @if($category->id == old('category_id', $product->category_id)) selected @endif> {{$category->name_cat}} </option>
                  @endforeach
                </select>
              </div>
            </div>
            
          </div> --}}
          <!--<textarea class="form-control" placeholder="Descripcion extensa del producto" rows="5" name="long_description">{{-- {{old('long_description')}} --}}</textarea>-->
         {{--  <label for="incluye">Incluye: Seleccione al menos 1</label>
          <div class="row"> --}}
              {{-- @php
                  $arrayinc = json_decode($product->incluye,true);
                  //dd($arrayinc);
              @endphp
              @foreach($arrayinc as $hab)
                 @php
                    // dd($hab);
                 @endphp
              @endforeach --}}
              {{--  @if ($product->incluye=='Masculino')
               @php($hombre='checked')
               @php($mujer='')
               @else

               @php($hombre='')
               @php($mujer='checked')

              @endif --}}
              {{-- <div class="col-md-6">
                  <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text iconitos"><i class="fas fa-bath text-info"></i></div>
                                  <input type="checkbox" name="incluye[0][item]" value="Jacuzzi">Jacuzzi
                                  <input type="hidden" name="incluye[0][icono]" value="fas fa-bath" style="display: none;">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text iconitos"><i class="fas fa-door-open text-info"></i></div>
                                  <input type="checkbox" name="incluye[1][item]" value="Terraza amplia">Terraza amplia
                                  <input type="hidden" name="incluye[1][icono]" value="fas fa-door-open">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text iconitos"><i class="fas fa-water text-info"></i></div>
                                  <input type="checkbox" name="incluye[2][item]" value="Vista al mar">Vista al mar
                                  <input type="hidden" name="incluye[2][icono]" value="far fa-square">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text iconitos"><i class="fas fa-cube text-info"></i></div>
                                  <input type="checkbox" name="incluye[3][item]" value="Refrigerador">Refrigerador
                                  <input type="hidden" name="incluye[3][icono]" value="fas fa-cube">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text iconitos"><i class="fas fa-tv text-info"></i></div>
                                  <input type="checkbox" name="incluye[4][item]" value="TV por cable">TV por cable
                                  <input type="hidden" name="incluye[4][icono]" value="fas fa-tv">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text iconitos"><i class="fas fa-temperature-low text-info"></i></div>
                                  <input type="checkbox" name="incluye[5][item]" value="AC Aire acondicionado">AC Aire acondicionado
                                  <input type="hidden" name="incluye[5][icono]" value="fas fa-temperature-low">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text iconitos"><i class="fas fa-restroom text-info"></i></div>
                                  <input type="checkbox" name="incluye[6][item]" value="Baño privado">Baño privado
                                  <input type="hidden" name="incluye[6][icono]" value="fas fa-restroom">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                     <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text iconitos"><i class="fas fa-broom text-info"></i></div>
                                  <input type="checkbox" name="incluye[7][item]" value="Aseo">Aseo
                                  <input type="hidden" name="incluye[7][icono]" value="fas fa-broom">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text iconitos"><i class="fas fa-bed text-info"></i></div>
                                  <input type="checkbox" name="incluye[8][item]" value="Ropa de cama">Ropa de cama
                                  <input type="hidden" name="incluye[8][icono]" value="fas fa-bed">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text iconitos"><i class="fas fa-money-bill-wave text-info"></i></div>
                                  <input type="checkbox" name="incluye[9][item]" value="Toallas">Toallas
                                  <input type="hidden" name="incluye[9][icono]" value="fas fa-money-bill-wave">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text iconitos"><i class="fas fa-spray-can text-info"></i></div>
                                  <input type="checkbox" name="incluye[10][item]" value="Artículos de aseo gratis">Artículos de aseo gratis
                                  <input type="hidden" name="incluye[10][icono]" value="fas fa-spray-can">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text iconitos"><i class=" fas fa-lock text-info"></i></div>
                                  <input type="checkbox" name="incluye[11][item]" value="Caja de seguridad">Caja de seguridad
                                  <input type="hidden" name="incluye[11][icono]" value="fas fa-lock ">
                          </div>
                      </div>
                      {!! $errors->first('incluye.0.item','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text iconitos"><i class=" fas fa-shower text-info"></i></div>
                                  <input type="checkbox" name="incluye[12][item]" value="Agua caliente">Agua caliente
                                  <input type="hidden" name="incluye[12][icono]" value="fas fa-shower ">
                          </div>
                      </div>
                     {!! $errors->first('incluye.*','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!} --}}
                 {{--  </div>
              </div>
          </div> --}}
          <div class="row">
            <div class="col-sm-6">
              <button class="btn btn-primary">Actualizar</button>
              <a href="{{route('products') }}" class="btn btn-default">Cancelar</a>
            </div>
          </div>

        </form>
      </div>
    </div>
</div>
@endsection
