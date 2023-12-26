<?php session_start(); 
include 'db.php'; // Asegúrate de que la ruta al archivo db.php sea correcta

// Agregar asignatura
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombreAsignatura'])) {
    $nombreAsignatura = mysqli_real_escape_string($conn, $_POST['nombreAsignatura']);
    $descripcionAsignatura = mysqli_real_escape_string($conn, $_POST['descripcionAsignatura']);
    $cursoAsignatura = mysqli_real_escape_string($conn, $_POST['cursoAsignatura']);

    $query = "INSERT INTO asignatura (Nombre, Descripcion, Curso) VALUES ('$nombreAsignatura', '$descripcionAsignatura', '$cursoAsignatura')";
    mysqli_query($conn, $query);
    header('Location: altaCurso.php');
}

// Listar asignaturas
$query = "SELECT * FROM asignatura";
$resultado = mysqli_query($conn, $query);
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

		<div class="colContenido bajando">

        <section>
                <h2>Listado de Asignaturas</h2>
                <?php
                while ($asignatura = mysqli_fetch_assoc($resultado)) {
                    echo "<p>ID: " . $asignatura['idAsignatura'] . " - Nombre: " . $asignatura['Nombre'] . " - Curso: " . $asignatura['Curso'] . " ";
                    echo "<a href='editarAsignatura.php?idAsignatura=" . $asignatura['idAsignatura'] . "'>Editar</a> | ";
                    echo "<a href='eliminarAsignatura.php?idAsignatura=" . $asignatura['idAsignatura'] . "'>Eliminar</a></p>";
                }
                ?>
            </section>
            <section>
                <h2>Agregar Nueva Asignatura</h2>
                <form action="" method="post">
                    Nombre de la Asignatura: <input type="text" name="nombreAsignatura"><br>
                    Descripción: <textarea name="descripcionAsignatura"></textarea><br>
                    Curso: <input type="text" name="cursoAsignatura"><br>
                    <input type="submit" value="Agregar Asignatura">
                </form>
            </section>

			

			

			


			
			

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