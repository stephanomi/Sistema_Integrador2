<?php
include_once('../models/db_connect.php');
session_start();

// Verificar que se envíe por método POST y que haya una sesión activa
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    // Obtener los datos del formulario
    $id_tema = $_POST['id_tema'];
    $id_usuario = $_SESSION['user_id'];
    $comentario = $_POST['comentario'];

    // Obtener el alias del usuario
    $query_usuario = "SELECT alias FROM usuarios WHERE id = ?";
    if ($stmt_usuario = $conn->prepare($query_usuario)) {
        $stmt_usuario->bind_param("i", $id_usuario);
        $stmt_usuario->execute();
        $result_usuario = $stmt_usuario->get_result();
        $usuario = $result_usuario->fetch_assoc();
        $alias = $usuario['alias'];
        $stmt_usuario->close();
    }

    // Insertar el comentario en la base de datos
    $query = "INSERT INTO comentarios_foro (id_tema, id_usuario, comentario, alias) VALUES (?, ?, ?, ?)";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("iiss", $id_tema, $id_usuario, $comentario, $alias);
        if ($stmt->execute()) {
            // Redirigir al usuario de vuelta al tema del foro
            header('Location: ../views/tema_foro.php?id=' . $id_tema);
            exit;
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $conn->close();
} else {
    // Si no se cumple alguna condición, redirigir al foro principal
    header('Location: ../views/foro.php');
    exit;
}
?>

