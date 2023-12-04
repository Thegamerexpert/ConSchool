<?php
require("../connection.php");
include_once("../../modelo/entidades/usuario.php");



// Obtener las credenciales proporcionadas por el formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Realizar la verificación de las credenciales en la base de datos
$query = "SELECT `idUsuario`, `Nombre`, `Apellidos`, `contraseña`, `tipo`, `id_centro`, `cursoActual` FROM Usuario WHERE Nombre = '$username' AND contraseña = '$password'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) >= 1) {
    $row = mysqli_fetch_assoc($result);
    $userType = $row['tipo'];
    $userID = $row['idUsuario'];

    // Iniciar la sesión
    session_start();

    // Almacenar la información del usuario en la sesión
    $_SESSION['userData'] = Usuario::create($row['idUsuario'],$row['Nombre'], $row['Apellidos'], 
    $row['tipo'], $row['id_centro'],$row['cursoActual']);

    // Redireccionar según el tipo de usuario
    switch ($_SESSION['userData']->getTipoUsuario()) {
        case 'alumno':
            header("Location: ../../pages/alumno/index.php");
            break;
        case 'profesor':
            header("Location: ../../pages/profesor/index.php");
            break;

        case 'administracion':
            header("Location: ../../pages/directivo/index.php");
            break;
        default:
            // Tipo de usuario desconocido
            header("Location: login.php?error=1");
            break;
    }
} else {
    // Credenciales incorrectas
    header("Location: ../../index.php?ER=2");
}

// Cerrar la conexión a la base de datos
mysqli_close($con);
