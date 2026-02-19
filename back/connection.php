<?php

// Configuración de la conexión a la base de datos
$servername = "localhost:3307";
$username = "conschool";
$password = "conschool";
$dbname = "studio_conschool";

// Crear conexión
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
  die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

// Iniciar la sesión
session_start();
?>