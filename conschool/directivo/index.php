<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ConSchool</title>
	<link rel="stylesheet" href="../CSS/styles.css">

	<!-- Google Font Link for Icons -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="JS/script.js" defer></script>

</head>
<body>
	<?php include "menu_profesor.html"?>

	<div class="contenedor">

		<div class="colDatosPersonales">
			
			<img class="fotoPersonal" src="Media/cara_generica.jpg" alt="Foto personal">

			<p>Nombre</p>
			<br>
			<p>Apellidos</p>
			<br>
			<p>Curso actual</p>
			<br>
			<p>Centro</p>
		</div>

		<div class="colContenido">

			<p class="tituloPestanya">Portal de dirección</p>

			<div class="panel">

				<p class="tituloPanel">Alumnado</p>
				<br>
				<p class="contenidoPanel"><a href="">Infantil</a></p>
				<br>
				<p class="contenidoPanel"><a href="">Primaria</a></p>
				<br>
				<p class="contenidoPanel"><a href="">Secundaria</a></p>
				<br>
				<p class="contenidoPanel"><a href="">Bachillerato</a></p>

			</div>

			<div class="panel">

				<p class="tituloPanel">Profesorado</p>
				<br>
				<p class="contenidoPanel"><a href="">Infantil</a></p>
				<br>
				<p class="contenidoPanel"><a href="">Primaria</a></p>
				<br>
				<p class="contenidoPanel"><a href="">Secundaria</a></p>
				<br>
				<p class="contenidoPanel"><a href="">Bachillerato</a></p>
				<br>

			</div>

			<div class="panel">

				<p class="tituloPanel">Mensajes</p>
				<br>
				<p class="contenidoPanel">0 <a href="">mensajes</a> no leídos</p>
				<!--Integrar en la etiqueta "a", en el href, un enlace a un modal o similar que lleve a una pestaña de mensajes -->

			</div>

			<div class="panelCalendario">

				<p class="tituloPanel">Agenda</p>
				
				<header>
        			<p class="fechaActual"></p>
        				<div class="iconos">
          					<span id="prev" class="material-symbols-rounded">chevron_left</span>
          					<span id="next" class="material-symbols-rounded">chevron_right</span>
        				</div>
      			</header>
      			<div class="calendario">
        			<ul class="semanas">
          				<li>Sun</li>
          				<li>Mon</li>
          				<li>Tue</li>
          				<li>Wed</li>
          				<li>Thu</li>
          				<li>Fri</li>
         				<li>Sat</li>
        			</ul>
        		<ul class="dias"></ul>
      		</div>


			</div>

			<div class="panel">

				<p class="tituloPanel">Eventos</p>
				<br>
				<p class="contenidoPanel"><a href="">Evento 1</a></p>
				<br>
				<p class="contenidoPanel"><a href="">Evento 2</a></p>
				<br>
				<p class="contenidoPanel"><a href="">Evento 3</a></p>
				<br>
				<p class="contenidoPanel"><a href="">Evento 4</a></p>

			</div>

		</div>



	</div>

	<script>
		renderCalendar();
	</script>

</body>
</html>