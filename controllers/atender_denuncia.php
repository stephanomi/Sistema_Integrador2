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

// Verificar si se recibió el ID de la denuncia por GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $denuncia_id = $_GET['id'];

    // Marcar la denuncia como atendida en la base de datos
    $query = "UPDATE denuncias SET atendida = 1 WHERE id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $denuncia_id);
        $stmt->execute();
        $stmt->close();
    }

    // Redireccionar de vuelta a la lista de denuncias
    header('Location: ../views/denuncias_list.php?mensaje=Denuncia atendida exitosamente&tipo=success');
    exit;
} else {
    // Redireccionar si no se recibió el ID de la denuncia
    header('Location: ../views/denuncias_list.php?mensaje=ID de denuncia no proporcionado&tipo=error');
    exit;
}
?>

