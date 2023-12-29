<?php
session_start();
include_once("../back/connection2.php"); // Asegúrate de que la ruta al archivo db.php sea correcta

// Suponiendo que gestionCursos.php tiene las funciones necesarias
include 'gestionCursos.php';

// Obtener datos de alumnos, asignaturas y materiales
$alumnos = obtenerAlumnosPorCurso("Primero");
$asignaturas = obtenerAsignaturasPorCurso("Primero");
$materialesPorAsignatura = []; // Array para almacenar materiales por asignatura

foreach ($asignaturas as $asignatura) {
    $materiales = obtenerMaterialesPorAsignatura($asignatura['Nombre']);
    $materialesPorAsignatura[$asignatura['Nombre']] = $materiales;
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
        <section class="panel">
        <h1 class="textoal">Alumnos Primero</h1>
    <ul >
        <?php foreach ($alumnos as $alumno): ?>
            <li class="textoal"><?php echo htmlspecialchars($alumno['Nombre']) . " " . htmlspecialchars($alumno['Apellidos']); ?></li>
        <?php endforeach; ?>
    </ul>
    </section>

    <!-- Sección de Listado de Asignaturas por Curso -->
    <section class="panel">
    <h1 class="textoal">Asignaturas Primero</h1>
    <ul >
        <?php foreach ($asignaturas as $asignatura): ?>
            <li class="textoal"><?php echo htmlspecialchars($asignatura['Nombre']); ?></li>
        <?php endforeach; ?>
    </ul>
    </section>

    <!-- Sección de Listado de Materiales por Asignatura -->
    <section class="panel">
    <h1 class="textoal">Materiales Primero</h1>
    <?php foreach ($materialesPorAsignatura as $asignatura => $materiales): ?>
        <h3><?php echo htmlspecialchars($asignatura); ?></h3>
        <ul >
            <?php foreach ($materiales as $material): ?>
                <li class="textoal"><?php echo htmlspecialchars($material['nombre']) . ": " . htmlspecialchars($material['descripcion']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
    </section>

    <!-- Sección para Añadir Nuevos Materiales -->
    <section class="panel">
        <h1 class="textoal">Añadir Nuevo Material</h1>
        <form action="gestionCursos.php" method="post">
            <input type="text" name="nombre"  placeholder="Nombre del Material">
            <textarea name="descripcion" placeholder="Descripción del Material"></textarea>
            <input type="text" name="asignatura" placeholder="Asignatura">
            <button type="submit">Añadir Material</button>
        </form>
    </section>
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
