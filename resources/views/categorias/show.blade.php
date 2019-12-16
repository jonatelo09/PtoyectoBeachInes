@extends('plantilla_admin.plantilla_admin')
@section('contenido')

<form method="POST" action="{{ route('categoria.show',$categoria->id_categoria) }}">
@method('PUT')
@csrf


<div class="container">

                <div class="row">
                   
                    <div class="col-md-12 register-right">
                 
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                
                                <h3 class="register-heading"> {{ $title_page }}</h3>
                                                            
                                <div class="row register-form">

                                    <div class="col-md-6">                                        

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fas fa-list-ol text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la Categoría" required="" value="{{ $categoria->nombre }}" disabled="true">
                                            </div>
                                            {!! $errors->first('nombre','<small style="color: #e60000; font-size: 15px;">:message</small> <br>') !!}
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                                                       
                                     <a href="{{ route('categoria.edit',$categoria->id_categoria) }}" class=" redondo btn btn-success">
                                    <i class="fa fa-edit"></i> Editar</a>

                                    <a href="{{ route('regresarc') }}" class="redondo btn btn-info"><i class="fas fa-undo"></i> Regresar</a>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                </div>

</div>
</form>
@endsection
