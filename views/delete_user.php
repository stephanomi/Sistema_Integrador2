<?php
include('../models/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Redirigir a la lista de personal administrativo después de eliminar
    header('Location: personal_administrativo.php');
    exit; // Detener la ejecución del script después de la redirección
}
?>
