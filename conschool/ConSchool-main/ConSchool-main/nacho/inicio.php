<?php 
// Al comienzo de cada página restringida
session_start();

// Verificar si la sesión está activa y si los datos requeridos están presentes
if (!isset($_SESSION['username']) || !isset($_SESSION['user_id'])) {
    // Redirigir al usuario de vuelta a la página de inicio de sesión
    header("Location: index.php");
    exit();
}

?>