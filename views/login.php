<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - INTEGRADOR</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
<?php include('../includes/navbar.php'); ?>
<br>
<br>
    <div class="container login-container">
        <h2>Login</h2>
        <form action="../controllers/login_controller.php" method="POST">
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
                <label for="contraseña">Contraseña</label>
                <input type="password" name="contraseña" id="contraseña" required>
            </div>
            <button type="submit" class="btn">Iniciar Sesión</button>
        </form>
        <p class="register-link">¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>
    </div>
</body>
</html>
