<?php
session_start();

// Verifica si el ID del usuario está en la sesión
if (!isset($_SESSION['userID'])) {
    // Redirige al usuario a la página de inicio de sesión si no está autenticado
    header("Location: ../index.php");
    exit;
}

// Incluye el archivo de conexión a la base de datos
include_once("../back/connection2.php");

$idRemitente = $_SESSION['userID']; // Obtén el ID del usuario de la sesión
$idDestinatario = $_POST['destinatario'] ?? null; // Obtén el destinatario del formulario o null si no está definido
$textoMensaje = $_POST['mensaje'] ?? ''; // Obtén el mensaje del formulario o una cadena vacía si no está definido
$fechaHoraEnvio = date("Y-m-d H:i:s"); // La fecha y hora actual

// Prepara la consulta SQL para insertar el mensaje
$sql = "INSERT INTO mensajes (idRemitente, idDestinatario, textoMensaje, fechaHoraEnvio, leido) VALUES (?, ?, ?, ?, false)";
$stmt = $conn->prepare($sql);

// Vincula los parámetros y ejecuta la consulta
$stmt->bind_param("iiss", $idRemitente, $idDestinatario, $textoMensaje, $fechaHoraEnvio);

if ($stmt->execute()) {
    header("Location: mensaje.php");
} else {
    echo "Error al enviar el mensaje: " . $stmt->error;
}

// Cierra la declaración y la conexión
$stmt->close();
$conn->close();
?>
