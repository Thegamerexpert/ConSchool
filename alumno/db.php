<?php
$servername = "localhost:3307";  // o tu dirección del servidor
$username = "root";
$password = "";
$dbname = "conschool";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
