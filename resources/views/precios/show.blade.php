@extends('plantilla_admin.plantilla_admin')
@section('contenido')


<form method="POST" action="{{ route('precio.show',$precio->id_precio) }}">
@method('PUT')
@csrf


<div class="container">




                <div class="row">
                   
                    <div class="col-md-9 register-right">
                 
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                
                                <h3 class="register-heading"> {{ $title_page }}</h3>
                                                            
                                <div class="row register-form">

                                    <div class="col-md-6">                                        

                                         <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-file-invoice-dollar text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="temporada_alta" name="temporada_alta" placeholder="Precio temporada alta" required="" value="{{ $precio->temporada_alta }} " disabled="true">
                                            </div>
                                            {!! $errors->first('temporada_alta','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}

                                        </div>

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-file-invoice-dollar text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="temporada_baja" name="temporada_baja" placeholder="Precio temporada baja" required="" value="{{ $precio->temporada_baja }}" disabled="true">
                                             </div>
                                            {!! $errors->first('temporada_baja','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                           
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                                                       
                                    <a href="{{ route('precio.edit',$precio->id_precio) }}" class=" redondo btn btn-success">
                                    <i class="fa fa-edit"></i> Editar</a>

                                    <a href="{{ route('regresarp') }}" class="redondo btn btn-info"><i class="fas fa-undo"></i> Regresar</a>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                </div>

</div>
</form>
@endsection
