<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Iniciar Sesi&oacute;n</title>
	<link rel="stylesheet" href="<?= BASE_URL() ?>css/main.css">
</head>
<body>
	<div class="form_login">
		<form action="" method="POST">
			<span>Iniciar Sesi&oacute;n</span>
			<hr>
			<label for="user">Usuario / email:</label>
			<input type="text" name="user" id="user_login" placeholder="username / user@example.com" required>
			<label for="pass">Contrase&ntilde;a:</label>
			<input type="password" name="pass" id="pass_login" placeholder="**********" required>
			<div class="login_error hidden">
				<span>Datos incorrectos</span>
			</div>
			<div class="login_options">
				<div class="register">
					<span>No tengo cuenta.</span>
					<a href="register">Registrarse</a>
				</div>
				<input type="submit" name="acces" value="Acceder">
			</div>
		</form>
	</div>

	<footer>
		<cite>Administraci&oacute;n de proyectos tecnol&oacute;gicos.</cite>
	</footer>
</body>
</html>