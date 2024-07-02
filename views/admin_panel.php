<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<style>
        .notification {
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            position: relative;
        }
        .notification p {
            margin: 0;
        }
        .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
<?php include('../includes/navbar_admin.php'); ?>
<?php
include_once('../models/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_notification'])) {
    // Eliminar la notificación
    $id = $_POST['delete_notification'];
    $query = "DELETE FROM notificaciones WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Consultar las notificaciones
$query = "SELECT * FROM notificaciones ORDER BY fecha DESC LIMIT 10";
$result = $conn->query($query);

// Mostrar las notificaciones
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='notification'>";
        echo "<p>" . $row['mensaje'] . "</p>";
        echo "<form method='post'>";
        echo "<button type='submit' name='delete_notification' value='" . $row['id'] . "' class='delete-btn'>X</button>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "<p>No hay nuevas notificaciones.</p>";
}

$conn->close();
?>

    <div class="container mt-1">
        <!-- Formulario para crear usuarios -->
        <h2>Crear nuevo Usuario Administrativo</h2>
        <form action="../controllers/create_user_controller.php" method="POST">
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
                <label for="nombres" class="form-label">Nombres:</label>
                <input type="text" name="nombres" id="nombres" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="numero_celular" class="form-label">N° celular:</label>
                <input type="tel" name="numero_celular" id="numero_celular" class="form-control">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico:</label>
                <input type="email" name="correo" id="correo" class="form-control">
            </div>
            <div class="mb-3">
                <label for="escuela" class="form-label">Escuela:</label>
                <input type="text" name="escuela" id="escuela" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña:</label>
                <input type="password" name="contraseña" id="contraseña" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="confirmar_contraseña" class="form-label">Confirmar Contraseña:</label>
                <input type="password" name="confirmar_contraseña" id="confirmar_contraseña" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tipo_usuario" class="form-label">Tipo de Usuario:</label>
                <select name="tipo_usuario" id="tipo_usuario" class="form-select" required>
                    <option value="admin">Admin</option>
                    <option value="docente">Docente</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </form>
    </div>

    <!-- Bootstrap JS (opcional, solo si necesitas funcionalidad JS de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
