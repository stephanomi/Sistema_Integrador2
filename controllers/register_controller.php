<?php
include('../models/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $alias = $_POST['alias'];
    $numero_celular = $_POST['numero_celular'];
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
    $escuela = $_POST['escuela'];
    $tipo_usuario = 'alumno'; // Asumimos que por defecto el tipo de usuario es alumno

    $query = "INSERT INTO usuarios (tipo_documento, numero_documento, nombres, apellidos, alias, numero_celular, correo, contraseña, escuela, tipo_usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssssss", $tipo_documento, $numero_documento, $nombres, $apellidos, $alias, $numero_celular, $correo, $contraseña, $escuela, $tipo_usuario);

    if ($stmt->execute()) {
        header('Location: ../views/login.php');
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
