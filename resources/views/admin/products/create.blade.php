@extends('layouts.app')

@section('title', 'Registro de productos')

@section('body-class', 'product-page')

@section('content')
<div class="main main-raised">
  <div class="container">
      <div class="section">
        <h2 class="title text-center">Registrar nuevo producto</h2>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form method="post" action=" {{ url('/admin/products') }} ">
          @csrf
          <div class="row">
            <div class="col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Nombre del producto</label>
              <input type="text" class="form-control" name="name" value="{{old('name')}}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Precio del producto</label>
              <input type="number" class="form-control" name="price" value="{{old('price')}}">
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Descripcion corta del producto</label>
                <input type="text" class="form-control" name="description" value="{{old('description')}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="control-label">Categoria de productos</label>
                <select class="form-control" name="category_id">
                  <option value="0">General</option>
                  @foreach ($categories as $category)
                  <option value=" {{$category->id}} "> {{$category->name}} </option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
              <textarea class="form-control" placeholder="Descripcion extensa del producto" rows="5" name="long_description">{{old('long_description')}}</textarea>

              <button class="btn btn-primary">Registrar Producto</button>
              <a href="{{ url('/admin/products')}}" class="btn btn-default">Cancelar</a>

        </form>
      </div>
    </div>
</div>
@endsection
