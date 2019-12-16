<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mensaje Recibido</title>
</head>
<body>
	
	<p>Recibiste un mensaje de: {{ $msg['nombre'] }} - {{ $msg['email'] }} - {{ $msg['telefono'] }}</p>
	<p><strong>Asunto: </strong>{{ $msg['asunto'] }}</p>
	<p><strong>Contenido: </strong>{{ $msg['comentarios'] }}</p>
</body>
</html>