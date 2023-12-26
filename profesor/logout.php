<?php
// Iniciar la sesión (si no está iniciada)
session_start();

// Destruir todas las variables de sesión
session_destroy();

// Redirigir al usuario a la página de inicio (index.php)
header("Location: ../index.php");
exit;
?>
