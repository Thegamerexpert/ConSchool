<?php
session_start();
include_once("../back/connection2.php"); // Incluye la conexión a la base de datos

$idAlumno = $_POST['alumno'];
$idAsignatura = $_POST['asignatura'];

// Consulta para obtener las notas del alumno en la asignatura seleccionada
$query = "SELECT idNota, calificacion FROM nota WHERE idUsuario = '$idAlumno' AND idAsignatura = '$idAsignatura'";
$resultado = mysqli_query($conn, $query);

// Consulta para obtener el nombre del alumno
$queryAlumno = "SELECT Nombre, Apellidos FROM usuario WHERE idUsuario = '$idAlumno'";
$resultadoAlumno = mysqli_query($conn, $queryAlumno);
$alumno = mysqli_fetch_assoc($resultadoAlumno);

// Consulta para obtener el nombre de la asignatura
$queryAsignatura = "SELECT Nombre FROM asignatura WHERE idAsignatura = '$idAsignatura'";
$resultadoAsignatura = mysqli_query($conn, $queryAsignatura);
$asignatura = mysqli_fetch_assoc($resultadoAsignatura);
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
        <h2 class="sepa izq">Editar Nota</h2>
    <p class="sepa izq">Alumno: <?php echo htmlspecialchars($alumno['Nombre']) . " " . htmlspecialchars($alumno['Apellidos']); ?></p>
    <p class="sepa izq">Asignatura: <?php echo htmlspecialchars($asignatura['Nombre']); ?></p>
        <?php
            // Mostrar formulario para editar notas
            echo "<form action='actualizarNotas1.php'class='sepa izq' method='post'>";
            while ($nota = mysqli_fetch_assoc($resultado)) {
                echo "<div>";
                echo "<label for='nota-{$nota['idNota']}'>Nota:</label>";
                echo "<input type='number' id='nota-{$nota['idNota']}' name='nota-{$nota['idNota']}' value='{$nota['calificacion']}'>";
                echo "</div>";
            }
            echo "<button type='submit' class='sepa'>Actualizar Notas</button>";
            echo "</form>";
    ?>
        </div>

    </div>
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
mysqli_close($conn);
?>
</body>
</html>