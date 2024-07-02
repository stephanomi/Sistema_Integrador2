<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
// Aquí puedes acceder a los datos del usuario desde la sesión ($_SESSION['user_id'])
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
    <!-- Cualquier archivo CSS o JavaScript necesario -->
</head>
<body>
    <h1>Perfil de usuario</h1>
    <!-- Aquí puedes mostrar la información del usuario y permitirle actualizarla -->
</body>

<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

</html>
