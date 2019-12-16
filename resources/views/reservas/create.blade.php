@extends('plantilla_admin.plantilla_admin')
@section('contenido')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('precio.index') }}">Ver {{ $title_page }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear {{ $title_page }}</li>
  </ol>
</nav>
</div>
<form method="POST" action="{{ route('precio.store') }}">
@csrf


<div class="container">

  @if (session('datos'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('datos') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  @if (session('cancelar'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('cancelar') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif


                <div class="row">
                   
                    <div class="col-md-9 register-right">
                 
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                
                                <h3 class="register-heading">Crear {{ $title_page }}</h3>
                                                            
                                <div class="row register-form">

                                    <div class="col-md-6">                                        

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="temporada_alta" name="temporada_alta" placeholder="Precio temporada alta" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                           <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                                </div>
                                            <input type="text" class="form-control" id="temporada_baja" name="temporada_baja" placeholder="Precio temporada baja" required="">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                                                       
                                    <button type="submit" class="redondo btn btn-info"><i class="fas fa-save"></i> Guardar</button>
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
