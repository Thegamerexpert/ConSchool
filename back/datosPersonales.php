<?php
// Conecta a la base de datos (asegúrate de tener tus credenciales de conexión configuradas)
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "conschool";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

if (isset($_GET['idUsuario'])) {
    $idUsuario = $_GET['idUsuario'];
    
    // Realiza una consulta para obtener los datos que necesitas de Usuario y Asignatura
    $query = "SELECT u.Nombre, u.Apellidos, u.cursoActual, u.centro, a.Nombre AS NombreAsignatura, a.Descripcion AS DescripcionAsignatura
              FROM Usuario u
              LEFT JOIN Asignatura a ON u.id_centro = a.Id_centro
              WHERE u.idUsuario = $idUsuario"
$result = $conn->query($query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Devuelve los datos como una respuesta JSON
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
