@extends('plantilla_admin.plantilla_admin')
@section('contenido')


<form method="POST" action="{{ route('precio.store') }}">
@csrf


<div class="container">



                <div class="row">
                   
                    <div class="col-md-12 register-right">
                 
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                
                                <h3 class="register-heading">Crear {{ $title_page }}</h3>
                                                            
                                <div class="row register-form">

                                    <div class="col-md-6">                                        

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-file-invoice-dollar text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="temporada_alta" name="temporada_alta" placeholder="Precio temporada alta" required="" >
                                            </div>
                                             {!! $errors->first('temporada_alta','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}

                                        </div>

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-file-invoice-dollar text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="temporada_baja" name="temporada_baja" placeholder="Precio temporada baja" required="" >
                                            </div>
                                            {!! $errors->first('temporada_baja','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}


                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                                                       
                                    <button type="submit" class="redondo btn btn-info"><i class="fas fa-save"></i>Guardar</button>
                                    <a href="{{ route('cancelarprecio') }}" class="redondo btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                </div>

</div>
</form>
@endsection
