<?php
session_start();
include('../models/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contenido = $_POST['contenido'];
    $user_id = $_SESSION['user_id'];
    $user_type = $_SESSION['tipo_usuario'];

    // Verificar si el usuario tiene un alias si no es docente
    if ($user_type != 'docente' && empty($_SESSION['alias'])) {
        echo "Debes tener un alias para comentar.";
        exit();
    }

    $query = "INSERT INTO mensajes (user_id, contenido) VALUES (?, ?)";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("is", $user_id, $contenido);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
        exit();
    }
    
    // Redireccionar de vuelta al foro después de insertar el comentario
    header('Location: ../views/foro.php');
    exit();
} else {
    // Redirigir si el método de solicitud no es POST
    header('Location: ../views/foro.php');
    exit();
}
?>
