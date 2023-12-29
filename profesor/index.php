<?php
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit;
}

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

//mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConSchool</title>
    <link rel="stylesheet" href="../CSS/stylesres.css">
    <!-- Aquí van tus otros enlaces a CSS o JS -->
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
            <p class="tituloPestanya">Portal del profesor</p>

			<div class="panel">
				<p class="tituloPanel">Mis Cursos</p>
				<br>
				
				<p class="contenidoPanel"><a href="gestionCursos1.php">Primero</a></p>
				<br>
				<p class="contenidoPanel"><a href="gestion_curso2.php">Segundo</a></p>
				<br>
				<p class="contenidoPanel"><a href="gestion_curso3.php">Tercero</a></p>
				<br>
				
			</div>

			<div class="panel">
				<p class="tituloPanel">Gestión de Notas</p>
				<br>
				
				<p class="contenidoPanel"><a href="gestionNotas1.php">Primero</a></p>
				<br>
				<p class="contenidoPanel"><a href="gestionNotas2.php">Segundo</a></p>
				<br>
				<p class="contenidoPanel"><a href="gestionNotas3.php">Tercero</a></p>
				<br>
				
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

            <!-- Panel de Mensajes -->
            <div class="panel">
                <p class="tituloPanel">Mensajes</p>
                <?php foreach ($ultimosMensajes as $mensaje): ?>
                    <p class="contenidoPanel"><?php echo htmlspecialchars($mensaje['textoMensaje']); ?></p>
                <?php endforeach; ?>
            </div>

            <!-- Panel de Eventos -->
            <div class="panel">
                <p class="tituloPanel">Eventos</p>
                <?php foreach ($proximosEventos as $evento): ?>
                    <p class="contenidoPanel"><?php echo htmlspecialchars($evento); ?></p>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
<?php
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
