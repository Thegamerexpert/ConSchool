<?php
include_once("../back/connection2.php"); // Incluye la conexión a la base de datos

foreach ($_POST as $key => $value) {
    if (strpos($key, 'nota-') === 0) {
        $idNota = str_replace('nota-', '', $key);
        $calificacion = $value;

        // Actualiza la nota en la base de datos
        $query = "UPDATE nota SET calificacion = '$calificacion' WHERE idNota = '$idNota'";
        mysqli_query($conn, $query);
    }
}

// Redirecciona de vuelta a la página de gestión de notas
header('Location: gestionNotas2.php');
exit;
?>
