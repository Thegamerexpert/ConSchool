<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ConSchool</title>
	<link rel="stylesheet" href="../CSS/styles1.css">

	<!-- Google Font Link for Icons -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="JS/script.js" defer></script>

</head>
<body>
	<?php include "menu_profesor_y_direccion.html"?>

	<div class="contenedor">

		<div class="colDatosPersonales">
			
			<img class="fotoPersonal" src="../Media/cara_generica.jpg" alt="Foto personal">

			<p id="nombre">Nombre</p>
			<br>
			<p id="apellidos">Apellidos</p>
			<br>
			<p id="cursoActual">Curso actual</p>
			<br>
			<p id="centro">Centro</p>

		</div>

		<div class="colContenido">

			<p class="tituloPestanya">Asignaturas - Profesor</p>

			<div class="panelAsignaturasProfesor">

				<p class="tituloPanel">En curso</p>
				<br>
				

				<table class="tabla paddingEntreColumnas">
				  <thead>
				    <tr>
				      <th>Asignatura</th>
				      <th>Nota</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <td>Lengua castellana y literatura</td>
				      <td><a href="">...</a></td>
				    </tr>
				    <tr>
				      <td>Ciencias Sociales</td>
				      <td><a href="">...</a></td>
				    </tr>
				    <tr>
				      <td>Matemáticas</td>
				      <td><a href="">...</a></td>
				    </tr>
				    <tr>
				      <td>Educación física</td>
				      <td><a href="">...</a></td>
				    </tr>
				    <tr>
				      <td>Dibujo técnico</td>
				      <td><a href="">...</a></td>
				    </tr>
				  </tbody>
				</table>
				
			<!-- HACER UNA TABLA EDITABLE PARA IR METIENDO NOTAS A DISTINTOS ALUMNOS (alumno/asignatura/nota) -->
			<!-- UN SÓLO PANEL!!! -->

			</div>


		</div>

	</div>

	<script>
		
	</script>

</body>
</html>