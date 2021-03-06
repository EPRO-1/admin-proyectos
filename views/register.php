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
					<input type="text" name="user_names" id="user_names" placeholder="Nombres" required>
					<input type="text" name="user_lastnames" id="user_lastnames" placeholder="Apellidos" required>	
				</div>
			</div>
			
			<label for="user_user">Usuario:</label>
			<input type="text" name="user_user" id="user_user" placeholder="username" required>
			<label for="user_email">Correo:</label>
			<input type="email" name="user_email" id="user_email" placeholder="user@example.com" required>
			<label for="pass_login">Contrase&ntilde;a:</label>
			<input type="password" name="pass_login" id="pass_login" placeholder="**********" required>
			<label for="pass2_login">Repetir contrase&ntilde;a:</label>
			<input type="password" name="pass2_login" id="pass2_login" placeholder="**********" required>
			<div class="register_error hidden">
				<span id="userExists">El usuario ya existe</span>
				<span id="emailTaken">El correo ya est&aacute; en uso</span>
			</div>
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