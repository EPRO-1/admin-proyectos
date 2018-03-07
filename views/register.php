<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="form_register">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
			<span>Registrarse</span>
			<hr>
			
			<div class="nombre_completo">
				<label for="user">Nombres:</label>
				<div class="inputs_name">
					<input type="text" name="user_names" id="user_names" placeholder="Nombres">
					<input type="text" name="user_lastnames" id="user_lastnames" placeholder="Apellidos">	
				</div>
			</div>
			
			<label for="user">Usuario:</label>
			<input type="text" name="user" id="user_login" placeholder="username">
			<label for="user">Correo:</label>
			<input type="text" name="user" id="user_login" placeholder="user@example.com">
			<label for="pass">Contrase&ntilde;a:</label>
			<input type="password" name="pass" id="pass_login" placeholder="**********">
			<label for="pass">Repetir contrase&ntilde;a:</label>
			<input type="password" name="pass" id="pass_login" placeholder="**********">
			<div class="register_options">
				<div class="login">
					<span>Ya tengo cuenta.</span>
					<a href="login.php">Iniciar Sesi&oacute;n</a>
				</div>
				<input type="submit" name="register" value="Registro">
			</div>
		</form>
	</div>

	<footer>
		<cite>Administraci&oacute;n de proyectos tecnol&oacute;gicos.</cite>
	</footer>
</body>
</html>