<?php include_once "clases.php" ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ConSchool</title>
	
	<link rel="stylesheet" href="CSS/styles.css">

	<!-- Google Font Link for Icons -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="JS/script.js" defer></script>

</head>
<body>

	<?php include "cabecera.html" ?>

	<div class="contenedor">

		<div class="panelLogin">

			<div class="imagenLoginContenedor">
				<img class="logoLogin" src="Media/logo1_Definitivo.png" alt="Logo ConSchool">
			</div>
			<br>

			<div class="divLogin">

				<form class="formularioLogin" method="post" action="usuario.php">


					<div><label class="titulosLogin">Usuario</div>
					
					<input id="formNombre" type="text" name="nombre" placeholder="Nombre de usuario" required>
					
					<div><label class="titulosLogin">E-mail</div>

					<input id="formMail" type="email" name="correo" placeholder="E-mail" required>

					<div><label class="titulosLogin">Tipo de usuario</div>
						<select name="tipoUsuario" id="tipoUsuario">

							<option value="alumno">Alumno</option>
							<option value="profesor">Profesor</option>
							<option value="directivo">Directivo</option>

						</select>
					
					
					
					<div><label class="titulosLogin">Contraseña</div>
					
					<input id ="formContraseña" type="password" name="password" placeholder="Contraseña" required>
					<br>
					<br>
					<button class="botonLogin" type="submit" value="Entrar">Entrar</button>

				</form>

			</div>
		</div>

	</div>

	<script>
	
	</script>

</body>
</html>