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

	<?php include "menu_alumno.html"?>

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

			<p class="tituloPestanya">Asignaturas - Alumno</p>

			<div class="panel">

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
				      <td id="asignatura1">Lengua castellana y literatura</td>
				      <td><a href="">...</a></td>
				    </tr>
				    <tr>
				      <td id="asignatura2">Ciencias Sociales</td>
				      <td><a href="">...</a></td>
				    </tr>
				    <tr>
				      <td id="asignatura3">Matemáticas</td>
				      <td><a href="">...</a></td>
				    </tr>
				    <tr>
				      <td id="asignatura4">Educación física</td>
				      <td><a href="">...</a></td>
				    </tr>
				    <tr>
				      <td id="asignatura5">Dibujo técnico</td>
				      <td><a href="">...</a></td>
				    </tr>
				  </tbody>
				</table>
				


			</div>

			<div class="panel">

				<p class="tituloPanel">Finalizadas</p>
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
				      <td><!-- Colocar las asignaturas una vez tengan nota--></td>
				      <td id="nota1"></td>
				    </tr>
				    <tr>
				      <td><!-- Colocar las asignaturas una vez tengan nota--></td>
				      <td id="nota2"></td>
				    </tr>
				    <tr>
				      <td><!-- Colocar las asignaturas una vez tengan nota--></td>
				      <td id="nota3"></td>
				    </tr>
				    <tr>
				      <td><!-- Colocar las asignaturas una vez tengan nota--></td>
				      <td id="nota4"></td>
				    </tr>
				    <tr>
				      <td><!-- Colocar las asignaturas una vez tengan nota--></td>
				      <td id="nota5"></td>
				    </tr>
				  </tbody>
				</table>

			</div>


		</div>



	</div>

	<!--RETOCAR LA FRANJA AZUL EN PRÓXIMOS ENTREGABLES -->
<script>

	

</script>

</body>
</html>