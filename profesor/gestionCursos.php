<?php
// Iniciar sesión y conexión a la base de datos
include_once("../back/connection.php");

// Funciones para obtener los datos necesarios
function obtenerAlumnosPorCurso($curso) {
    global $con;
    $query = "SELECT Nombre, Apellidos FROM usuario WHERE tipo = 'alumno' AND cursoActual = '$curso'";
    return mysqli_query($con, $query);
}

function obtenerAsignaturasPorCurso($curso) {
    global $con;
    $query = "SELECT Nombre FROM asignatura WHERE Curso = '$curso'";
    return mysqli_query($con, $query);
}

function obtenerMaterialesPorAsignatura($asignatura) {
    global $con;
    $query = "SELECT m.nombre, m.descripcion FROM material m INNER JOIN asignatura a ON m.idAsignatura = a.idAsignatura WHERE a.Nombre = '$asignatura'";
    return mysqli_query($con, $query);
}

// Código para manejar la inserción de nuevos materiales (se activa al enviar el formulario)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreMaterial = $_POST['nombre'];
    $descripcionMaterial = $_POST['descripcion'];
    $asignaturaMaterial = $_POST['asignatura'];

    $queryInsert = "INSERT INTO material (nombre, descripcion, idAsignatura) VALUES ('$nombreMaterial', '$descripcionMaterial', (SELECT idAsignatura FROM asignatura WHERE Nombre = '$asignaturaMaterial'))";
    mysqli_query($con, $queryInsert);
}

// Cierra la conexión al final del script
//mysqli_close($con);
?>
