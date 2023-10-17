<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "conschool";
$password = "Templarius_14";
$dbname = "conschool";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
    //die("Error de conexión");
}
?>