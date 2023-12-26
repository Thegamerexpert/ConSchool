<?php
session_start();
include 'db.php'; // Asegúrate de que la ruta al archivo db.php sea correcta

// Realiza una consulta para obtener los eventos
$sql = "SELECT * FROM eventos ORDER BY fechaEvento, horaEvento";
$result = mysqli_query($conn, $sql);

$eventos = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $eventos[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="../CSS/stylesres.css">
    <!-- Incluye aquí cualquier otro archivo CSS o JS que necesites -->
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
            <h2>Agenda de Eventos</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nombre del Evento</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($eventos as $evento): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($evento['nombreEvento']); ?></td>
                        <td><?php echo htmlspecialchars($evento['descripcion']); ?></td>
                        <td><?php echo htmlspecialchars($evento['fechaEvento']); ?></td>
                        <td><?php echo htmlspecialchars($evento['horaEvento']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if (count($eventos) === 0): ?>
                    <tr>
                        <td colspan="4">No hay eventos programados.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
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
