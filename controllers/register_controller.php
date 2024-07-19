<?php
session_start();
include_once('../models/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $alias = $_POST['alias'];
    $numero_celular = $_POST['numero_celular'];
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
    $escuela = $_POST['escuela'];
    $tipo_usuario = 'alumno'; // o el tipo de usuario que corresponda

    // Verificar si el DNI o el correo ya existen
    $query = "SELECT * FROM usuarios WHERE numero_documento = ? OR correo = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $numero_documento, $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Si el DNI o el correo ya existen, redirigir al formulario de registro con un mensaje de error
        $_SESSION['error_message'] = "El DNI o correo ya están en uso.";
        header("Location: ../views/register.php");
    } else {
        // Insertar el nuevo usuario en la base de datos
        $query = "INSERT INTO usuarios (tipo_documento, numero_documento, nombres, apellidos, alias, numero_celular, correo, contraseña, escuela, tipo_usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssssssss", $tipo_documento, $numero_documento, $nombres, $apellidos, $alias, $numero_celular, $correo, $contraseña, $escuela, $tipo_usuario);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Registro exitoso. Puedes iniciar sesión.";
            header("Location: ../views/login.php");
        } else {
            $_SESSION['error_message'] = "Hubo un error en el registro. Por favor, inténtalo nuevamente.";
            header("Location: ../views/register.php");
        }
    }

    $stmt->close();
    $conn->close();
}
?>
