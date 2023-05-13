<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "Templarius_14";
$dbname = "conschool";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los valores enviados desde el formulario de inicio de sesión
$username = $_POST['username'];
$password = $_POST['password'];
$userType = $_POST['user-type'];

// Consulta SQL para verificar el usuario y contraseña
$sql = "SELECT * FROM Usuario WHERE Nombre = '$username' AND contraseña = '$password' AND tipo = '$userType'";
$result = $conn->query($sql);

// Verificar si se encontró un resultado
if ($result->num_rows > 0) {
    // El usuario y la contraseña son válidos
    //echo "Inicio de sesión exitoso";
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $user_id;
    header("Location: ../inicio.php");
} else {
    // El usuario y/o la contraseña son incorrectos
    echo "Usuario y/o contraseña incorrectos";
    header("Location: ../index.php");
}

// Cerrar la conexión
$conn->close();
?>
