<?php
include_once("./connection.php");

// Obtener las credenciales proporcionadas por el formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Realizar la verificación de las credenciales en la base de datos
$query = "SELECT idUsuario, tipo FROM Usuario WHERE Nombre = '$username' AND contrasena = '$password'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $userType = $row['tipo'];
    $userID = $row['idUsuario'];

    // Almacenar la información del usuario en la sesión
    $_SESSION['userID'] = $userID;
    $_SESSION['userType'] = $userType;

    // Redireccionar según el tipo de usuario
    switch ($userType) {
        case 'alumno':
            header("Location: ../alumno/index.php");
            break;
        case 'profesor':
            header("Location: ../profesor/index.php");
            break;
        
        case 'administracion':
            header("Location: ../directivo/index.php");
            break;
        default:
            // Tipo de usuario desconocido
            header("Location: login.php?error=1");
            break;
    }
} else {
    // Credenciales incorrectas
    header("Location: login.php?error=2");
}

// Cerrar la conexión a la base de datos
mysqli_close($con);
?>
