<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Incluir el archivo de conexión a la base de datos
include('../models/db_connect.php');

// Obtener datos del usuario registrado
$user_id = $_SESSION['user_id'];
$query = "SELECT nombres, apellidos, escuela FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$nombres = $user['nombres'];
$apellidos = $user['apellidos'];
$escuela = $user['escuela'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Denuncias</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('../includes/navbar.php'); ?>

    <div class="container mt-4">
        <h2>Formulario de Denuncias</h2>
        <form action="../controllers/submit_denuncia.php" method="POST">
            <!-- Campos del formulario -->
            <div class="mb-3">
                <label for="nombre_completo" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" value="<?php echo $nombres . ' ' . $apellidos; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" class="form-control" id="edad" name="edad" required>
            </div>
            <div class="mb-3">
                <label for="grado_escolar" class="form-label">Grado Escolar</label>
                <select class="form-select" id="grado_escolar" name="grado_escolar" required>
                    <option value="Primero">Primero</option>
                    <option value="Segundo">Segundo</option>
                    <option value="Tercero">Tercero</option>
                    <option value="Cuarto">Cuarto</option>
                    <option value="Quinto">Quinto</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="escuela" class="form-label">Escuela</label>
                <input type="text" class="form-control" id="escuela" name="escuela" value="<?php echo $escuela; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="tipo_acoso" class="form-label">Tipo de Acoso</label>
                <select class="form-select" id="tipo_acoso" name="tipo_acoso" required>
                    <option value="Físico">Físico</option>
                    <option value="Verbal">Verbal</option>
                    <option value="Social">Social</option>
                    <option value="Cibernético">Cibernético</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="impacto_victima" class="form-label">Impacto en la Víctima</label>
                <select class="form-select" id="impacto_victima" name="impacto_victima" required>
                    <option value="Leve">Leve</option>
                    <option value="Moderado">Moderado</option>
                    <option value="Grave">Grave</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Enviar Denuncia</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
