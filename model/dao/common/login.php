<?php

// Includes
include_once("../../MySql/connection.php");

// Obtener las credenciales proporcionadas por el formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Realizar la verificación de las credenciales en la base de datos
$query = "SELECT idUsuario, Nombre, Apellidos, cursoActual, id_centro, tipo FROM Usuario WHERE Nombre = '$username' AND contraseña = '$password'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $userType = $row['tipo'];
    $userID = $row['idUsuario'];
    $userName = $row['Nombre'];
    $Apellidos = $row['Apellidos'];
    $cursoActual = $row['cursoActual'];
    $id_centro = $row['id_centro'];

    // Almacenar la información del usuario en la sesión Con llamada a una clase
    $_SESSION['userID'] = $userID;
    $_SESSION['userType'] = $userType;
    $_SESSION['userName'] = $userName;
    $_SESSION['Apellidos'] = $Apellidos;
    $_SESSION['cursoActual'] = $cursoActual;
    $_SESSION['id_centro'] = $id_centro;

    // Redireccionar según el tipo de usuario
    switch ($userType) {
        case 'alumno':
            header("Location: ../../../vista/alumno/index.php");
            break;
        case 'profesor':
            header("Location: ../../../vista/profesor/index.php");
            break;
        
        case 'administracion':
            header("Location: ../../../vista/directivo/index.php");
            break;
        default:
            // Tipo de usuario desconocido
            header("Location: login.php?error=1");
            break;
    }
} else {
    // Credenciales incorrectas
    header("Location: ../../../index.php?ER=2");
}

// Cerrar la conexión a la base de datos
mysqli_close($con);

?>