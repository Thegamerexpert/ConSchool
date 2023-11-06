<?php session_start();?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ConSchool</title>
	<!--<link rel="stylesheet" href="../CSS/styles1.css">-->
	<link rel="stylesheet" href="../CSS/stylesres.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- Google Font Link for Icons -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="../JS/script.js" defer></script>
	<script src="../JS/datosPersonales.js"></script>

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
			<p>Curso: <span id="cursoActual">Curso actual</span></p>
			<br>
			<p>Número de centro: <span id="centro">Centro</span></p>
		</div>

		<div class="colContenido">

			<p class="tituloPestanya">Portal del alumno</p>

			<div class="panel">

				<p class="tituloPanel">Asignaturas</p>
				<br>
				<p class="contenidoPanel"><a href="" id="asignatura1">Lengua castellana y literatura</a></p>
				<br>
				<p class="contenidoPanel"><a href="" id="asignatura2">Ciencias Sociales</a></p>
				<br>
				<p class="contenidoPanel"><a href="" id="asignatura3">Matemáticas</a></p>
				<br>
				<p class="contenidoPanel"><a href="" id="asignatura4">Educación física</a></p>
				<br>
				<p class="contenidoPanel"><a href="" id="asignatura5">Dibujo técnico</a></p>
				

			</div>

			<div class="panel">

				<p class="tituloPanel">Foros activos</p>
				<br>
				<p class="contenidoPanel"><a href="" id="foro1">Tutoría</a></p>
				<p id="contenidof1"></p>
				<br>
				<p class="contenidoPanel"><a href="" id="foro2">Consulta a tus profesores</a></p>
				<p id="contenidof2"></p>
				<br>
				<p class="contenidoPanel"><a href="" id="foro3">Exámenes</a></p>
				<p id="contenidof3"></p>
				<br>

			</div>

			<div class="panel">

				<p class="tituloPanel">Mensajes</p>
				<br>
				<p class="contenidoPanel">0 <a href="" id="mensajes">mensajes</a> no leídos</p>
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
				<p class="contenidoPanel"><a href="" id="evento1">Evento 1</a></p>
				<br>
				<p class="contenidoPanel"><a href="" id="evento2">Evento 2</a></p>
				<br>
				<p class="contenidoPanel"><a href="" id="evento3">Evento 3</a></p>
				<br>
				<p class="contenidoPanel"><a href="" id="evento4">Evento 4</a></p>

			</div>

		</div>



	</div>

	<script>
		//renderCalendar();

		
	</script>
<?php
// Verifica si el usuario está autenticado
if (!isset($_SESSION['userID'])) {
    // Redirige al usuario a la página de inicio de sesión si no está autenticado
    header("Location: login.php");
    exit;
}

// Conecta a la base de datos (esto podría estar en un archivo de configuración separado)
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "conschool";
$con = mysqli_connect($servername, $username, $password, $dbname);

// Verifica la conexión
if (!$con) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

// Obtén el ID del usuario de la sesión
$userID = $_SESSION['userID'];

// Realiza una consulta SQL para obtener los datos personales del usuario
$query = "SELECT Nombre, Apellidos, cursoActual, id_centro FROM Usuario WHERE idUsuario = '$userID'";
$result = mysqli_query($con, $query);

// Verifica si se encontraron resultados
if (mysqli_num_rows($result) > 0) {
    // Procesa y muestra los datos aquí
    while ($row = mysqli_fetch_assoc($result)) {
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
    // No se encontraron resultados, maneja el caso apropiadamente
}

// Realiza una consulta SQL para obtener las asignaturas del usuario
$queryAsignaturas = "SELECT Nombre FROM asignatura WHERE Curso = 'Primero'";
$resultAsignaturas = mysqli_query($con, $queryAsignaturas);

// Verifica si se encontraron resultados
if (mysqli_num_rows($resultAsignaturas) > 0) {
    $contador = 1; // Inicializa un contador para los IDs de asignaturas
    while ($rowAsignaturas = mysqli_fetch_assoc($resultAsignaturas)) {
        // Asigna los nombres de las asignaturas a los elementos HTML
        $nombreAsignatura = $rowAsignaturas['Nombre'];
        echo '<script>';
        echo 'document.getElementById("asignatura' . $contador . '").innerHTML = "' . $nombreAsignatura . '";';
        echo '</script>';
        $contador++; // Incrementa el contador para el próximo ID de asignatura
    }
} else {
    // No se encontraron asignaturas, maneja el caso apropiadamente
}

$sql = "SELECT contenidoRespuesta, fechaCreacion FROM respuestasf1 ORDER BY fechaCreacion DESC LIMIT 1";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Existe al menos un mensaje
    $row = $result->fetch_assoc();
    $mensaje = $row["contenidoRespuesta"];
    $hora = $row["fechaCreacion"];
} else {
    // No se encontraron mensajes
    $mensaje = "No hay mensajes disponibles.";
    $hora = "";
}

$sql2 = "SELECT contenidoRespuesta, fechaCreacion FROM respuestasf2 ORDER BY fechaCreacion DESC LIMIT 1";
$result = $con->query($sql2);

if ($result->num_rows > 0) {
    // Existe al menos un mensaje
    $row = $result->fetch_assoc();
    $mensaje2 = $row["contenidoRespuesta"];
    $hora2 = $row["fechaCreacion"];
} else {
    // No se encontraron mensajes
    $mensaje2 = "No hay mensajes disponibles.";
    $hora2 = "";
}

$sql3 = "SELECT contenidoRespuesta, fechaCreacion FROM respuestasf3 ORDER BY fechaCreacion DESC LIMIT 1";
$result = $con->query($sql3);

if ($result->num_rows > 0) {
    // Existe al menos un mensaje
    $row = $result->fetch_assoc();
    $mensaje3 = $row["contenidoRespuesta"];
    $hora3 = $row["fechaCreacion"];
} else {
    // No se encontraron mensajes
    $mensaje3 = "No hay mensajes disponibles.";
    $hora3 = "";
}
// Cierra la conexión a la base de datos
mysqli_close($con);
?>
<script>
// Asigna los datos a los elementos HTML utilizando JavaScript
var mensajeElement = document.getElementById("contenidof1");


mensajeElement.textContent = "Ultimo mensaje: <?php echo $mensaje; ?>"+" a las <?php echo $hora; ?>" ;

var mensajeElement2 = document.getElementById("contenidof2");


mensajeElement2.textContent = "Ultimo mensaje: <?php echo $mensaje2; ?>"+" a las <?php echo $hora2; ?>" ;

var mensajeElement3 = document.getElementById("contenidof3");


mensajeElement3.textContent = "Ultimo mensaje: <?php echo $mensaje3; ?>"+" a las <?php echo $hora3; ?>" ;

</script>
</body>
</html>