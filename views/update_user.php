<?php
include('../models/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $numero_celular = $_POST['numero_celular'];
    $correo = $_POST['correo'];
    $escuela = $_POST['escuela'];
    $tipo_usuario = $_POST['tipo_usuario'];

    $query = "UPDATE usuarios SET tipo_documento=?, numero_documento=?, nombres=?, apellidos=?, numero_celular=?, correo=?, escuela=?, tipo_usuario=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssssi", $tipo_documento, $numero_documento, $nombres, $apellidos, $numero_celular, $correo, $escuela, $tipo_usuario, $id);
    $stmt->execute();

    // Redirigir a la lista de personal administrativo después de actualizar
    header('Location: personal_administrativo.php');
    exit; // Detener la ejecución del script después de la redirección
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Actualizar Usuario</h2>
        <form action="update_user.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="mb-3">
                <label for="tipo_documento" class="form-label">Tipo de Documento:</label>
                <select name="tipo_documento" id="tipo_documento" class="form-select" required>
                    <option value="DNI" <?php echo ($user['tipo_documento'] == 'DNI') ? 'selected' : ''; ?>>DNI</option>
                    <option value="Pasaporte" <?php echo ($user['tipo_documento'] == 'Pasaporte') ? 'selected' : ''; ?>>Pasaporte</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="numero_documento" class="form-label">Número de Documento:</label>
                <input type="text" name="numero_documento" id="numero_documento" class="form-control" value="<?php echo $user['numero_documento']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres:</label>
                <input type="text" name="nombres" id="nombres" class="form-control" value="<?php echo $user['nombres']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" value="<?php echo $user['apellidos']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="numero_celular" class="form-label">N° celular:</label>
                <input type="tel" name="numero_celular" id="numero_celular" class="form-control" value="<?php echo $user['numero_celular']; ?>">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico:</label>
                <input type="email" name="correo" id="correo" class="form-control" value="<?php echo $user['correo']; ?>">
            </div>
            <div class="mb-3">
                <label for="escuela" class="form-label">Escuela:</label>
                <input type="text" name="escuela" id="escuela" class="form-control" value="<?php echo $user['escuela']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tipo_usuario" class="form-label">Tipo de Usuario:</label>
                <select name="tipo_usuario" id="tipo_usuario" class="form-select" required>
                    <option value="admin" <?php echo ($user['tipo_usuario'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="docente" <?php echo ($user['tipo_usuario'] == 'docente') ? 'selected' : ''; ?>>Docente</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
