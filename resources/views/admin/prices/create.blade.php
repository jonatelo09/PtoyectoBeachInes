@extends('layouts.principal')

@section('title', 'Registro de categorias')

@section('body-class', 'product-page')

@section('content')
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
        <form method="post" action="{{route('prices.store')}}">
          @csrf
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Precio Temporada Alta</label>
                <input type="text" class="form-control" name="temporada_alta" value="{{old('alta')}}">
              </div>
            </div>
            <div class="col-sm-6">
                <label class="control-label">Precio Temporada Baja</label>
                <input type="text" class="form-control" name="temporada_baja" value="{{old('baja')}}">
            </div>
          </div>
              <button class="btn btn-success">Registrar Precio</button>
              <a href="{{ route('prices') }}" class="btn btn-info">Cancelar</a>
        </form>
      </div>
    </div>
</div>
@endsection