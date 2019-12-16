@extends('plantilla_gral.plantilla_pay')

@section('contenido')
<div class="container">
    <br>
    <br>
    @if (session('notification'))
    <div class="alert alert-success" role="alert">
        {{ session('notification') }}
    </div>
    @endif
    @if(isset($errors) && $errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }} </li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session()->has('success'))
    <div class="alert alert-success">
        <ul>
            @foreach (session()->get('success') as $message)
            <li>{{ $message }} </li>
            @endforeach
        </ul>
    </div>
    @endif
    <ul class="nav nav-pills nav-pills-primary" role="tablist">
        <li class="active">
            <a class="text-danger" href="#dashboard" role="tab" data-toggle="tab">
                <i class="fas fa-user-tie"></i>
                Carrito de reservas
            </a>
        </li>
        <li class="ml-3">
            <a class="text-danger" href="#tasks" role="tab" data-toggle="tab">
                <i class="fas fa-user-tie"></i>
                Reservas realizadas
            </a>
        </li>
    </ul>
    <hr>
    <p>
        <h3 class="title text-center">Tu Carrito de compras contiene:
            {{ auth()->user()->cart->details->count() }} Reservas.</h3>
    </p>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-10 table-active">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th></th>
                        <th class="text-center"></th>
                        <th></th>
                        <th class="text-right">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(auth()->user()->cart->details as $detail)
                    <?php
$des = json_decode($detail->product->descripcion, true);
$inc = json_decode($detail->product->incluye, true);
$img = json_decode($detail->product->img, true);
?>
                    <tr>
                        <td class="text-center">
                        </td>
                        <td>
                            <p class="h3 text-uppercase">{{$detail->product->name}}</p>
                            <div class="row text-black text-uppercase"
                            target="_blank">
                                <div class="col-md-6">
                                    @if(is_array($des))
                                        @foreach($des as $key => $desc)
                                            <p><b>{{ $desc["can_p"] }} | {{ $desc["can_c"] }}</b></p>
                                            <br>
                                            <p class="descripcionhab"> {{ $desc["descrip"] }}</p>
                                        @endforeach
                                    @endif
                                    <p><span class="text-black">Fecha Entrada:</span> {{$detail->entry_date}}
                                    <p><span class="text-black">Fecha Salida:</span> {{$detail->departure_date}} </p>
                                </div>
                                <div class="col-md-6">
                                    @if(is_array($inc))

                                        <h5 >Servicios: </h5></p>
                                        <ul>
                                            <li>
                                                @foreach($inc as $key => $val)

                                                    <i class="<?php echo $val['icono']; ?>"></i>
                                                <span class="text-dark small"><?php echo $val['item']; ?></span>  |
                                                @endforeach
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                             </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><span class="text-black">Folio de Reserva: {{$detail->folio_reserva}} </span></p>
                                    <form method="post" action="{{ url('/cart/'.$detail->id.'/delete') }}">
                                        @csrf
                                        <button type="submit" rel="tooltip" title="Eliminar"
                                            class="btn btn-link btn-sm btn-xs">Eliminar</i>
                                        </button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <p>Cantidad de noches: <span>{{$detail->quantity}} </span></p>
                                </div>
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="col-auto">$ {{$detail->product->price}} </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <p class="alert alert-info">El precio y la disponibilidad de las habitaciones de BeachHotel Ines están sujetos a cambio. </p>
        </div>
        <div class="col-md-2 table-active">
            <div class="">
                <p>({{ auth()->user()->cart->details->count() }} Reservas)</p>
                <p>Subtotal: ${{auth()->user()->cart->total}}</p>
            </div>
            <div class="">
                @if(auth()->user()->cart->details->count() > 0)
                    <a href="{{url('/payments')}} " class="btn btn-block btn-warning btn-round">
                        Proceder al Pago
                    </a>
                @endif

                <!--<form method="post" action=" {{ url('/order')}} ">
                    @csrf
                    <button class="btn btn-primary btn-round">
                        <i class="material-icons">done</i>Relizar pedido
                    </button>
                </form>-->
            </div>
        </div>
    </div>
</div>
@endsection