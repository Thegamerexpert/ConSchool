<?php
require("../connection.php");

// Obtener los valores enviados desde el formulario de inicio de sesión
$username = $_POST['username'];
$password = $_POST['password'];

// Consulta SQL para verificar el usuario y contraseña
$sql = "SELECT * FROM Usuario WHERE Nombre = '$username' AND contraseña = '$password'";
$result = $conn->query($sql);

// Verificar si se encontró un resultado
if ($result->num_rows > 0) {
    // El usuario y la contraseña son válidos            
    $row = $result->fetch_object(); //Obten valores por separado
    // codigo_Mensaje ."id_Usuario Usuario Nombre Apellidos Contraseña Tipo_Usuario Centro"    
    echo 200 ."#".$row->idUsuario."#".$row->Nombre. "#".$row->Apellidos. "#".$row->tipo."#".$row->id_centro;    
} else {      
    echo 401 ."#"."Usuario y/o la contraseña incorrectos";    
}

// Cerrar la conexión
$conn->close();
?>