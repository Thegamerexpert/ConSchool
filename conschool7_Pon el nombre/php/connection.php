<?php 
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conschool";

// Crear conexión
$con = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$con) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
    exit();
}
?>