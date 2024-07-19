<?php
session_start();
include('../models/db_connect.php');

if (isset($_SESSION['user_id']) && isset($_GET['message_id'])) {
    $message_id = $_GET['message_id'];
    $user_type = $_SESSION['tipo_usuario'];

    // Solo permitir la eliminación si el usuario es admin o docente
    if ($user_type == 'admin' || $user_type == 'docente') {
        $query = "DELETE FROM mensajes WHERE id = ?";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("i", $message_id);
            $stmt->execute();
            $stmt->close();
        }
    }
}

header('Location: ../views/foro.php');
exit();
?>
