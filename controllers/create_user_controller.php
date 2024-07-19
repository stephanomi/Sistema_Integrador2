<?php
// Incluir el archivo de conexión a la base de datos
include('../models/db_connect.php');

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $numero_celular = $_POST['numero_celular'];
    $correo = $_POST['correo'];
    $escuela = $_POST['escuela'];
    $contraseña = $_POST['contraseña'];
    $confirmar_contraseña = $_POST['confirmar_contraseña'];
    $tipo_usuario = $_POST['tipo_usuario'];

    if ($contraseña !== $confirmar_contraseña) {
        echo "<div style='text-align: center; padding: 20px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; width: 50%; margin: 20px auto;'>
                <p>Las contraseñas no coinciden</p>
                <a href='../views/admin_panel.php' style='display: inline-block; margin-top: 10px; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;'>Volver al Formulario</a>
              </div>";
        exit; // Detener la ejecución del script si las contraseñas no coinciden
    }

    // Verificar si el número de documento ya está registrado
    $query = "SELECT numero_documento FROM usuarios WHERE numero_documento = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $numero_documento);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        // Si el número de documento ya existe
        echo "<div style='text-align: center; padding: 20px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; width: 50%; margin: 20px auto;'>
                <p>El DNI ya está registrado</p>
                <a href='../views/admin_panel.php' style='display: inline-block; margin-top: 10px; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;'>Volver al Formulario</a>
              </div>";
        $stmt->close();
        exit;
    }

    // Consulta SQL para insertar el nuevo usuario
    $query = "INSERT INTO usuarios (tipo_documento, numero_documento, nombres, apellidos, numero_celular, correo, escuela, contraseña, tipo_usuario)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    // Hashear la contraseña antes de guardarla en la base de datos
    $contraseña_hasheada = password_hash($contraseña, PASSWORD_DEFAULT);
    $stmt->bind_param("sssssssss", $tipo_documento, $numero_documento, $nombres, $apellidos, $numero_celular, $correo, $escuela, $contraseña_hasheada, $tipo_usuario);
    $stmt->execute();

    // Mostrar un mensaje de éxito
    echo "<div style='text-align: center; padding: 20px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px; width: 50%; margin: 20px auto;'>
            <p>Usuario registrado con éxito</p>
            <a href='../views/admin_panel.php' style='display: inline-block; margin-top: 10px; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;'>Volver al Formulario</a>
          </div>";

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>
