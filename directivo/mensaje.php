<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes</title>
    <link rel="stylesheet" href="../CSS/stylesres.css">

    <!-- Google Font Link for Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="../JS/script.js" defer></script>
    <script src="../JS/datosPersonales.js"></script>
</head>
<body>
<?php include "menu_profesor_y_direccion.html"?>

    <div class="contenedor2">
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
    <div class="colContenido containerMen">
        <h2>Enviar Mensaje</h2>
        <form action="enviarMensaje.php" method="post">
            <div class="form-group">
                <label for="destinatario">Destinatario:</label>
                <select name="destinatario" id="destinatario">
                    <?php
                    include 'db.php'; 
                   
                    $sql = "SELECT idUsuario, nombre FROM usuario";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["idUsuario"] . "'>" . $row["nombre"] . "</option>";
                        }
                    } else {
                        echo "<option>No hay usuarios disponibles</option>";
                    }
                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea name="mensaje" id="mensaje" rows="4"></textarea>
            </div>
            <button type="submit">Enviar</button>
        </form>

        
    </div>
    
    
   <?php
   include 'db.php';  // Asegúrate de que la ruta al archivo db.php sea correcta

   // Obtén el ID del usuario de la sesión
   $userID = $_SESSION['userID'];

   // Realiza una consulta SQL para obtener los datos personales del usuario
   $query = "SELECT Nombre, Apellidos, cursoActual, id_centro FROM Usuario WHERE idUsuario = '$userID'";
   $result = mysqli_query($conn, $query);

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

$sqlMensajes = "SELECT * FROM mensajes WHERE idDestinatario = '$userID' ORDER BY fechaHoraEnvio DESC";
$resultMensajes = mysqli_query($conn, $sqlMensajes);

$mensajes = [];
if ($resultMensajes && mysqli_num_rows($resultMensajes) > 0) {
    while ($rowMensaje = mysqli_fetch_assoc($resultMensajes)) {
        $mensajes[] = $rowMensaje;
    }
}

// Cierra la conexión a la base de datos aquí
$conn->close();
   ?>
   <div class="tabla-mensajes">
    <h3>Mensajes Recibidos</h3>
    <table>
        <thead>
            <tr>
                <th>Remitente</th>
                <th>Mensaje</th>
                <th>Fecha/Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mensajes as $mensaje): ?>
            <tr>
                <td><?php echo $mensaje['idRemitente']; // Aquí podrías necesitar buscar el nombre del remitente en la base de datos ?></td>
                <td><?php echo $mensaje['textoMensaje']; ?></td>
                <td><?php echo $mensaje['fechaHoraEnvio']; ?></td>
            </tr>
            <?php endforeach; ?>
            <?php if (count($mensajes) === 0): ?>
            <tr>
                <td colspan="3">No hay mensajes recibidos.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
    </div>
    
   


</body>
</html>
