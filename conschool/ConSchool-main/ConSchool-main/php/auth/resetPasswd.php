<?php
require("../connection.php");

// Obtener los valores enviados desde el formulario de inicio de sesión
$idUser = $_POST['idUser'];
$password = $_POST['password'];
$userEmail = $_POST['userEmail'];

// Consulta SQL para verificar el usuario
if ($idUser == null) { //Cuando no haya contenido
    $sql = "SELECT `idUsuario` FROM `usuario` WHERE `Nombre`='$userEmail'";
    $result = $conn->query($sql); //Ejecuta consulta
    // Verificar si se encontró un resultado
    if ($result->num_rows > 0) {
        // El usuario es válidos   
        $row = $result->fetch_object(); 
        echo 200 ."#". $row->idUsuario;
    } else {
        // El usuario y/o la contraseña son incorrectos    
        echo 401 . "#" . "El usuario o correo no existe";
    }
}

//Nueva contraseña
if ($idUser != null) { //Cuando haya contenido
    $sql1 = "UPDATE `usuario` SET `contraseña`='$password' WHERE `idUsuario`='$idUser'";
    $result1 = $conn->query($sql1); //Ejecuta consulta
    // Verificar si se encontró un resultado
    if ($result1 == true) {
        // Contraseña cambiada    
        echo 200, "#". "La contraseña se cambio correctamente";
    } else {
        // Error al cambiar la contraseña    
        echo 401 . "#" . "Error al cambiar la contraseña";
        //echo $conn->error;
    }
}


// Cerrar la conexión
$conn->close();
