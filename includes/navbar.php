<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Aquí puedes incluir el contenido de tu barra de navegación
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - INTEGRADOR</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<!-- Eliminar la llamada duplicada a session_start(); -->

<!-- INTEGRADOR/includes/navbar.php -->

<nav class="navbar">
    <div class="container">
        <div class="navbar-left">
            <a href="../views/index.php" class="navbar-item">SinBullyingPE</a>
        </div>
        <div class="navbar-right">
            <a href="../views/material_educativo_alumnos.php" class="navbar-item">Material educativo</a>
            <a href="../views/foro.php" class="navbar-item">Foro</a>
            <a href="../views/formulario_denuncias.php" class="navbar-item btn-red">Denuncias</a>
            <?php if (isset($_SESSION['user_id'])) : ?>
                <span class="navbar-item">Bienvenido, <?php echo $_SESSION['nombre_de_usuario']; ?></span>
                <a href="../views/perfil.php" class="navbar-item">Ver perfil</a>
                <a href="../controllers/logout_controller.php" class="navbar-item">Cerrar sesión</a>
            <?php else : ?>
                <a href="../views/login.php" class="navbar-item btn">Inicio de sesión</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- Resto del contenido de tu página de inicio -->
<script src="../assets/js/script.js"></script>
</body>
</html>
