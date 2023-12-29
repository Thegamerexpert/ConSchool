<?php
session_start();
include_once("../back/connection2.php"); // Incluye la conexión a la base de datos

// Obtener alumnos y asignaturas de la base de datos
$alumnos = mysqli_query($conn, "SELECT idUsuario, Nombre, Apellidos FROM usuario WHERE tipo = 'alumno' AND cursoActual = 'Primero'");
$asignaturas = mysqli_query($conn, "SELECT idAsignatura, Nombre FROM asignatura WHERE Curso = 'Primero'");


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
        <h2>Todas las Notas de Primero</h2>
        <table>
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Asignatura</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $queryTodasNotas = "SELECT u.Nombre AS NombreAlumno, u.Apellidos AS ApellidosAlumno, a.Nombre AS NombreAsignatura, n.calificacion FROM nota n
                                    JOIN usuario u ON n.idUsuario = u.idUsuario
                                    JOIN asignatura a ON n.idAsignatura = a.idAsignatura
                                    WHERE u.cursoActual = 'Primero' AND u.tipo = 'alumno'";
                $resultadoTodasNotas = mysqli_query($conn, $queryTodasNotas);
                while ($fila = mysqli_fetch_assoc($resultadoTodasNotas)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($fila['NombreAlumno']) . " " . htmlspecialchars($fila['ApellidosAlumno']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['NombreAsignatura']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['calificacion']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <h1>Edicion de notas</h1>
        <form action="mostrarNotas1.php" method="post">
            <!-- Lista desplegable para seleccionar el Alumno -->
            <label for="alumno">Selecciona un Alumno:</label>
            <select name="alumno" id="alumno">
                <?php while ($alumno = mysqli_fetch_assoc($alumnos)) {
                    echo "<option value='{$alumno['idUsuario']}'>{$alumno['Nombre']} {$alumno['Apellidos']}</option>";
                } ?>
            </select>

            <!-- Lista desplegable para seleccionar la Asignatura -->
            <label for="asignatura">Selecciona una Asignatura:</label>
            <select name="asignatura" id="asignatura">
                <?php while ($asignatura = mysqli_fetch_assoc($asignaturas)) {
                    echo "<option value='{$asignatura['idAsignatura']}'>{$asignatura['Nombre']}</option>";
                } ?>
            </select>

            <button type="submit">Mostrar Notas</button>
        </form>
            
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
