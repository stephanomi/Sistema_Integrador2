<?php
// Iniciar la sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Incluir el archivo de conexión a la base de datos
include_once('../models/db_connect.php');

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: ../views/login.php');
    exit;
}

// Verificar si el formulario fue enviado por método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario de denuncia
$nombre_completo = $_POST['nombre_completo'];
$edad = $_POST['edad'];
$grado_escolar = $_POST['grado_escolar'];
$escuela = $_POST['escuela'];
$fecha_hora = date("Y-m-d H:i:s");
$descripcion = $_POST['descripcion'];
$tipo_acoso = $_POST['tipo_acoso'];
$impacto_victima = ucfirst(strtolower($_POST['impacto_victima'])); // Convertir primera letra a mayúscula

// Consulta SQL para insertar la denuncia
$query = "INSERT INTO denuncias (nombre_completo, edad, grado_escolar, escuela, fecha_hora, descripcion, tipo_acoso, impacto_victima)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

// Preparar la consulta
if ($stmt = $conn->prepare($query)) {
    // Vincular parámetros
    $stmt->bind_param("sissssss", $nombre_completo, $edad, $grado_escolar, $escuela, $fecha_hora, $descripcion, $tipo_acoso, $impacto_victima);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Insertar una notificación para el panel administrativo
        $mensaje_notificacion = "Nueva denuncia recibida: $descripcion";
        $query_notif = "INSERT INTO notificaciones (mensaje) VALUES (?)";

        // Preparar y ejecutar la consulta de notificación
        if ($stmt_notif = $conn->prepare($query_notif)) {
            $stmt_notif->bind_param("s", $mensaje_notificacion);
            $stmt_notif->execute();
            $stmt_notif->close();
        } else {
            echo "Error al preparar la consulta de notificación: " . $conn->error;
        }

        // Redireccionar a la página de confirmación después de la inserción exitosa
        header('Location: ../views/confirmacion.php');
        exit;
    } else {
        echo "Error al ejecutar la consulta de denuncia: " . $stmt->error;
    }

    // Cerrar la consulta preparada
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta de denuncia: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
} else {
    // Redireccionar si el formulario no fue enviado por POST
    header('Location: ../views/formulario_denuncias.php');
    exit;
}
?>
