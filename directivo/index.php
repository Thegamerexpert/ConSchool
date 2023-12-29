<?php session_start(); 
include 'db.php'; // Asegúrate de que la ruta al archivo db.php sea correcta

include_once("../back/connection.php");

$userID = $_SESSION['userID'];

// Consulta para los últimos mensajes
$sqlMensajes = "SELECT textoMensaje, fechaHoraEnvio FROM mensajes WHERE idDestinatario = '$userID' ORDER BY fechaHoraEnvio DESC LIMIT 5";
$resultMensajes = mysqli_query($con, $sqlMensajes);
$ultimosMensajes = [];
if ($resultMensajes) {
    while ($row = mysqli_fetch_assoc($resultMensajes)) {
        $ultimosMensajes[] = $row;
    }
}



// Consulta para los eventos
$sqlEventos = "SELECT nombreEvento FROM eventos ORDER BY fechaEvento LIMIT 5";
$resultEventos = mysqli_query($con, $sqlEventos);
$proximosEventos = [];
if ($resultEventos) {
    while ($row = mysqli_fetch_assoc($resultEventos)) {
        $proximosEventos[] = $row['nombreEvento'];
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ConSchool</title>
	<link rel="stylesheet" href="../CSS/stylesres.css">

	<!-- Google Font Link for Icons -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="../JS/script.js" defer></script>

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
			<p>Curso: <span id="cursoActual">Curso actual</span></p>
			<br>
			<p>Número de centro: <span id="centro">Centro</span></p>
		</div>

		<div class="colContenido">

			<p class="tituloPestanya">Portal de dirección</p>

			<div class="panel">

				<p class="tituloPanel"><a href="altaUsuarios.php">Dar de alta Usuarios</a></p>
				<br>
				<p class="contenidoPanel"><a href="altaAlumno.php">Alumnos</a></p>
				<br>
				<p class="contenidoPanel"><a href="altaProfesor.php">Profesores</a></p>
				<br>
				<p class="contenidoPanel"><a href="">Administrativos</a></p>
				<br>
				

			</div>

			<div class="panel">
			
				<p class="tituloPanel">Gestion cursos</p>
				<br>
				<p class="contenidoPanel"><a href="altaCurso.php">Añadir Asignaturas</a></p>
				<br>
				
				

			</div>

			<div class="panel">

			<p class="tituloPanel">Mensajes</p>
                <?php foreach ($ultimosMensajes as $mensaje): ?>
                    <p class="contenidoPanel"><?php echo htmlspecialchars($mensaje['textoMensaje']); ?></p>
                <?php endforeach; ?>
				

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
                <?php foreach ($proximosEventos as $evento): ?>
                    <p class="contenidoPanel"><?php echo htmlspecialchars($evento); ?></p>
                <?php endforeach; ?>
				</br>
			<p class="contenidoPanel"><a href="listarEventos.php">Gestión eventos</a></p>
			</div>

		</div>



	</div>

	<script>
		renderCalendar();
	</script>

</body>
<?php 
$userID = $_SESSION['userID'];

// Realiza una consulta SQL para obtener los datos personales del usuario
$query2 = "SELECT Nombre, Apellidos, cursoActual, id_centro FROM Usuario WHERE idUsuario = '$userID'";
$result2 = mysqli_query($conn, $query2);

// Verifica si se encontraron resultados
if (mysqli_num_rows($result2) > 0) {
 // Procesa y muestra los datos aquí
 while ($row = mysqli_fetch_assoc($result2)) {
     $nombre = $row['Nombre'];
     $apellidos = $row['Apellidos'];
     $curso = $row['cursoActual'];
     $centro = $row['id_centro'];
    // Asigna los datos a los elementos HTML utilizando PHP
    echo '<script>';
    echo 'document.getElementById("nombre").innerHTML = "' . $nombre . '";';
    echo 'document.getElementById("apellidos").innerHTML = "' . $apellidos . '";';
    echo 'document.getElementById("cursoActual").innerHTML = "' . $curso . '";';
    echo 'document.getElementById("centro").innerHTML = "' . $centro . '";';
    echo '</script>';
} }else {
 
}

$conn->close();
?>
</html>