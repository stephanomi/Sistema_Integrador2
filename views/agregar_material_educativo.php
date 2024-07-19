<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Material Educativo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include('../includes/navbar_docente.php'); ?>
    <div class="container mt-4">
        <h2>Agregar Material Educativo</h2>
        <form action="../controllers/guardar_material_educativo.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="link_youtube" class="form-label">Enlace de YouTube:</label>
                <input type="text" name="link_youtube" id="link_youtube" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" name="imagen" id="imagen" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
