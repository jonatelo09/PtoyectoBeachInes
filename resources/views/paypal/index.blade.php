@extends('plantilla_gral.plantilla_pay')

@section('title', 'App shop | Paypal')

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
    <div class="row justify-content-center mt-lg-5 mt-sm-4">
        <div class="col-md-7 table-active">
            <div class="elemento-7">
                <div class="text-left">
                    <h3>Revisa tu Reserva</h3>
                </div>
                <div class="">
                    <div class="row">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">Información del Cliente</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <label>Nombre del Cliente: <span>{{ auth()->user()->firstname}} {{auth()->user()->lastname}} </span></label><br>
                                        <label>Telefono: <span>{{ auth()->user()->phone}}</span></label><br>
                                        <label>Email: <span>{{ auth()->user()->email}}</span></label>
                                        <label>Direccion: <span>{{ auth()->user()->address}}</span></label>
                                        <p> </p>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>

                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 table-active">
            <div class="elemento-7">
                <div class="text-center"><h4>Paga Tu Reserva</h4></div>
                <hr>
                <div class="">
                    <form action="{{ route('pay') }}" method="POST" id="paymentForm">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4 col-md-5">
                                <label>Cantidad a Pagar:</label>
                                <input
                                    class="form-control"
                                    name="value"
                                    value="{{ auth()->user()->cart->total }}"
                                    required
                                    readonly="readonly"
                                >
                                <!--<small class="form-text text-muted">
                                    Use values with up to two decimal positions, using dot "."
                                </small>-->
                            </div>
                            <div class="col-sm-4 col-md-5">
                                <label>Moneda</label>
                                <select class="custom-select" name="currency" required>
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency->iso }}">
                                            {{ strtoupper($currency->iso) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <div class="col">
                                <label>Selecciona la plataforma de pago de desees:</label>
                                <div class="form-group" id="toggler">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        @foreach ($paymentPlatforms as $paymentPlatform)
                                            <label
                                                class="btn btn-outline-secondary rounded m-2 p-1"
                                                data-target="#{{ $paymentPlatform->name }}Collapse"
                                                data-toggle="collapse"
                                            >
                                                <input
                                                    type="radio"
                                                    name="payment_platform"
                                                    value="{{ $paymentPlatform->id }}"
                                                    required
                                                >
                                                <img class="img-thumbnail" src="{{ asset($paymentPlatform->image) }}" style="width: 100px; height: 50px;">
                                            </label>
                                        @endforeach
                                    </div>
                                    @foreach ($paymentPlatforms as $paymentPlatform)
                                        <div
                                            id="{{ $paymentPlatform->name }}Collapse"
                                            class="collapse"
                                            data-parent="#toggler"
                                        >
                                            @includeIf('components.' . strtolower($paymentPlatform->name) . '-collapse')
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-left mt-3">
                            <button type="submit" id="payButton" class="btn btn-success btn-lg btn-block">Pagar</button>
                        </div>
                        <hr>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
