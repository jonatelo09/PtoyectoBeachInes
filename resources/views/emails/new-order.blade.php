<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nueva Reserva</title>
</head>
<body>
	<p>Se ha realizado una nueva Reserva!</p>
	<p>Estos son los datos de cliente</p>
	<ul class="table-active">
		<li>
			<strong>Nombre: </strong>
			{{ $user->username }}
		</li>
		<li>
			<strong>E-mail:</strong>
			{{ $user->email }}
		</li>
		<li>
			<strong>Phone:</strong>
			{{ $user->phone }}
		</li>

		<li>
			<strong>Fecha de reserva:</strong>
			{{ $cart->oreder_date }}
		</li>
		<li>
			<strong>Direccion:</strong>
			{{$user->address}}
		</li>
	</ul>
	<hr>
	<p>Detalles de la Reserva:</p>
	<ul>
		@foreach ($cart->details as $detail)
		<li>
			{{ $detail->product->name }} x {{ $detail->quantity}} ($ {{ $detail->quantity * $detail->product->price }} )
		</li>
		@endforeach
	</ul>
	<p>
		<strong>Importe a pagar: </strong> {{ $cart->total }}
	</p>
	<hr>
	<p>
		<a href=" {{url('/admin/orders/'.$cart->id)}} ">Haz clic aquí</a>
		para más información sobre este pedido.
	</p>
</body>
</html>