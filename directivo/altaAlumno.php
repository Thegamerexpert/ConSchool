<?php session_start(); 
include 'db.php'; // Asegúrate de que la ruta al archivo db.php sea correcta

// Consulta para obtener todos los alumnos
$query = "SELECT * FROM usuario WHERE tipo = 'alumno'";
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

		<div class="colContenido">

			<p class="tituloPestanya">Portal de dirección</p>

			<h1>Listado de Alumnos</h1>
    <a href="agregarAlumno.php">Agregar Nuevo Alumno</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <!-- Añadir más columnas si es necesario -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($alumno = mysqli_fetch_assoc($resultado)): ?>
                <tr>
                    <td><?php echo $alumno['idUsuario']; ?></td>
                    <td><?php echo $alumno['Nombre']; ?></td>
                    <td><?php echo $alumno['Apellidos']; ?></td>
                    <!-- Añadir más columnas si es necesario -->
                    <td>
                        <a href="editarAlumno.php?id=<?php echo $alumno['idUsuario']; ?>">Editar</a>
                        <a href="eliminarAlumno.php?id=<?php echo $alumno['idUsuario']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

			

			

			


			
			

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