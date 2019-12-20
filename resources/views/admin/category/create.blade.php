@extends('plantilla_admin.plantilla_admin')

@section('title', 'Registro de categorias')

@section('body-class', 'product-page')

@section('contenido')
<div class="main main-raised">
  <div class="container">
      <div class="site-section">
        <h2 class="title text-center elemento-4">Registrar nueva categoria</h2>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form method="post" action=" {{ url('/admin/category') }} " enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Nombre de la categoria</label>
                <input type="text" class="form-control text-uppercase" name="name_cat" value="{{old('name_cat')}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group label-floating">
              <label class="control-label">Descripción corta de la categoria</label>
            <input type="text" class="form-control" name="description" value="{{old('description')}}">
            </div>
          </div>
          </div>

              <button class="btn btn-success">Registrar Categoria</button>
              <a href="{{ url('/admin/category')}}" class="btn btn-info">Cancelar</a>
        </form>
      </div>
    </div>
</div>
@endsection