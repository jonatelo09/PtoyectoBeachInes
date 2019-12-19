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
    <hr>
    <p>
        <h3 class="title text-center">Tienes {{$canti}} Reservas Realizadas:</h3>
    </p>
    <hr>
    <div class="row justify-content-center" id="dashboard">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th></th>
                        <th class="text-center"></th>
                        <th></th>
                        <th class="text-right">Precio</th>
                        <th class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($habitacion as $hab)
                    <?php
$des = json_decode($hab->descripcion, true);
$inc = json_decode($hab->incluye, true);
?>
                    <tr>
                        <td class="text-center">
                        </td>
                        <td>
                            <p class="h3 text-uppercase"></p>
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
                                    <p><span class="text-black">Fecha Entrada:</span> {{$hab->entry_date}}
                                    <p><span class="text-black">Fecha Salida:</span> {{$hab->departure_date}} </p>
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
                                    <p><span class="text-black">Folio de Reserva: {{$hab->folio_reserva}} </span></p>
                                </div>
                                <div class="col-md-6">
                                    <p>Cantidad de noches: <span>{{$hab->quantity}} </span></p>
                                </div>
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="col-auto">
                            ${{number_format($hab->price)}}

                        </td>
                        <td>
                            <p>${{number_format($hab->price * $hab->quantity)}}</p>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <p class="alert alert-info">El precio y la disponibilidad de las habitaciones de Beach Hotel Ines están sujetos a cambios. </p>
        </div>
    </div>
</div>
@endsection