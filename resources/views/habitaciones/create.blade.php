@extends('plantilla_admin.plantilla_admin')
@section('contenido')


<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
@csrf
<div class="container">
    <div class="row">
        <div class="col-md-12 register-right">
            <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Crear {{ $title_page }}</h3>
                        <div class="row register-form">
                            <div class="row">
                                <div class="col-md-6">
                                 <div class="form-group">
                                   <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-list-ol text-info"></i></div>
                                        </div>
                                     <select  name="category_id" id="category_id"  class="form-control">
                                        <option class="hidden" selected disabled>Categorias</option>
                                        @foreach ($categs as $categ)
                                           <option value="{{ $categ->id}}">{{ $categ->name_cat }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    {!! $errors->first('category_id','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                </div>
                                <div class="form-group">
                                   <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-comment-dollar text-info"></i></div>
                                        </div>
                                        <input type="number" name="price" placeholder="ingresa el precio de la habitacion" class="form-control">

                                    </div>
                                    {!! $errors->first('price','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                </div>
                                <div class="form-group">
                                   <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-hotel text-info"></i></div>
                                        </div>
                                    <input type="text" class="form-control" id="nombre" name="name" placeholder="Nombre de la habitación" required="">
                                    </div>
                                    {!! $errors->first('name','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                </div>
                                <div class="form-group">
                                   <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="far fa-edit text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" required="">
                                    </div>
                                    {!! $errors->first('descripcion','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                </div>
                                <div class="form-group">
                                   <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-user-friends text-info"></i></div>
                                        </div>
                                    <input type="text" class="form-control" id="cantidad_personas" name="cantidad_personas" placeholder="Cantidad de Personas" required="">
                                    </div>
                                    {!! $errors->first('cantidad_personas','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                </div>
                                <div class="form-group">
                                   <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-bed text-info"></i></div>
                                        </div>
                                    <input type="text" class="form-control" id="cantidad_camas" name="cantidad_camas" placeholder="Cantidad de Camas" required="">
                                    </div>
                                    {!! $errors->first('cantidad_camas','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="incluye">Incluye: Seleccione al menos 1</label>
                                <div class="row">
                                    <div class="col-md-6">
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
                                           {{--  {!! $errors->first('incluye.*','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!} --}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-images text-info"></i></div>
                                                </div>
                                            <input accept="image/png,image/gif,image/jpeg" name="file_array[]" type="file" multiple>

                                            </div>
                                             {{-- {!! $errors->first('file_array','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!} --}}
                                    </div>
                                </div>
                                <button type="submit" class="redondo btn btn-info"><i class="fas fa-save"></i> Guardar
                                </button>
                                <a href="{{ route('products') }}" class="redondo btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
