<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - INTEGRADOR</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include('../includes/navbar.php'); ?>
<br>
<br>
<div class="container login-container">
    <h2>Registro</h2>
    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message'] . '</div>';
        unset($_SESSION['error_message']);
    }
    if (isset($_SESSION['success_message'])) {
        echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
        unset($_SESSION['success_message']);
    }
    ?>
    <form action="../controllers/register_controller.php" method="POST">
        <div class="form-group">
            <label for="tipo_documento">Tipo de Documento</label>
            <select name="tipo_documento" id="tipo_documento" required>
                <option value="DNI">DNI</option>
                <option value="Pasaporte">Pasaporte</option>
                <!-- Otros tipos de documentos -->
            </select>
        </div>
        <div class="form-group">
            <label for="numero_documento">Número de Documento</label>
            <input type="text" name="numero_documento" id="numero_documento" required>
        </div>
        <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" name="nombres" id="nombres" required>
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" required>
        </div>
        <div class="form-group">
            <label for="alias">Alias</label>
            <input type="text" name="alias" id="alias" required>
        </div>
        <div class="form-group">
            <label for="numero_celular">Número de Celular</label>
            <input type="text" name="numero_celular" id="numero_celular" required>
        </div>
        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" id="correo" required>
        </div>
        <div class="form-group">
            <label for="contraseña">Contraseña</label>
            <input type="password" name="contraseña" id="contraseña" required>
        </div>
        <div class="form-group">
            <label for="confirmar_contraseña">Confirmar Contraseña</label>
            <input type="password" name="confirmar_contraseña" id="confirmar_contraseña" required>
        </div>
        <div class="form-group">
            <label for="escuela">Escuela</label>
            <input type="text" name="escuela" id="escuela" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
</div>
</body>
</html>
