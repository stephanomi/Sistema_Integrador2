<?php
session_start();
include('../models/db_connect.php');

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $contraseña = $_POST['contraseña'];

    $query = "SELECT * FROM usuarios WHERE tipo_documento = ? AND numero_documento = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $tipo_documento, $numero_documento);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($contraseña, $user['contraseña'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['tipo_usuario'] = $user['tipo_usuario'];
        
        // Obtener el nombre de usuario del usuario actualmente autenticado
        $nombre_de_usuario = obtener_nombre_de_usuario($user['id']); // Suponiendo que esta función obtiene el nombre de usuario del ID del usuario

        // Guardar el nombre de usuario en la sesión
        $_SESSION['nombre_de_usuario'] = $nombre_de_usuario;

        if ($user['tipo_usuario'] == 'admin') {
            header('Location: ../views/admin_panel.php');
            exit;
        } elseif ($user['tipo_usuario'] == 'docente') {
            header('Location: ../views/docente_panel.php');
            exit;
        } else {
            header('Location: ../views/index.php');
            exit;
        }
    } else {
        $error_message = "Credenciales incorrectas. Vuelva a intentarlo.";
    }
}

// Función para obtener el nombre de usuario del ID del usuario desde la base de datos
function obtener_nombre_de_usuario($user_id) {
    global $conn;
    $query = "SELECT nombres FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $nombre = $result->fetch_assoc();
    return $nombre['nombres'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Iniciar Sesión</h2>
        <?php if ($error_message): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="tipo_documento" class="form-label">Tipo de Documento:</label>
                <select name="tipo_documento" id="tipo_documento" class="form-select" required>
                    <option value="DNI">DNI</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="numero_documento" class="form-label">Número de Documento:</label>
                <input type="text" name="numero_documento" id="numero_documento" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña:</label>
                <input type="password" name="contraseña" id="contraseña" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
