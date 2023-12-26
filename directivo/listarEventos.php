<?php session_start(); 
include 'db.php'; // Incluye la conexión a la base de datos

// Manejar la solicitud POST para agregar un nuevo evento
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreEvento = mysqli_real_escape_string($conn, $_POST['nombreEvento']);
    $descripcionEvento = mysqli_real_escape_string($conn, $_POST['descripcionEvento']);
    $fechaEvento = mysqli_real_escape_string($conn, $_POST['fechaEvento']);

    $queryAgregar = "INSERT INTO eventos (nombreEvento, descripcion, fechaEvento) VALUES ('$nombreEvento', '$descripcionEvento', '$fechaEvento')";
    mysqli_query($conn, $queryAgregar);
}

// Consulta para obtener todos los eventos
$queryListar = "SELECT * FROM eventos";
$resultadoEventos = mysqli_query($conn, $queryListar);
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

			<!-- Formulario para agregar un nuevo evento -->
            <h2>Agregar Nuevo Evento</h2>
            <form action="" method="post">
                Nombre del Evento: <input type="text" name="nombreEvento"><br>
                Descripción: <textarea name="descripcionEvento"></textarea><br>
                Fecha del Evento: <input type="date" name="fechaEvento"><br>
                <input type="submit" value="Agregar Evento">
            </form>

            <!-- Listar todos los eventos existentes -->
            <h2>Listado de Eventos</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($evento = mysqli_fetch_assoc($resultadoEventos)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($evento['nombreEvento']); ?></td>
                            <td><?php echo htmlspecialchars($evento['descripcion']); ?></td>
                            <td><?php echo htmlspecialchars($evento['fechaEvento']); ?></td>
                            <td>
                                <a href="editarEvento.php?idEvento=<?php echo $evento['idEvento']; ?>">Editar</a>
                                <a href="eliminarEvento.php?idEvento=<?php echo $evento['idEvento']; ?>" onclick="return confirm('¿Estás seguro de querer eliminar este evento?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
				

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