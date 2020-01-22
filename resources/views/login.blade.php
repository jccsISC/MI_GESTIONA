<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>Login | Gestiona</title>
</head>
<body>
	
	<form method="POST" action="{{route('login')}}" class="contenedor">
		@csrf
		<div class="container">
			<h1>GESTIONA</h1>
			<hr>
			<div class="divInputs">
				<input type="text" placeholder="Ingresa tu usuario" name="user" required>
				
				<input type="password" placeholder="Ingresa tu contraseña" name="psw" required>
			</div>
		
			<button type="submit" class="registerbtn">Iniciar Sesión</button>
		</div>
	</form>
</body>
</html>