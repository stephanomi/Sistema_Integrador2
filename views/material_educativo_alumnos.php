<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material Educativo para Alumnos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            max-height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<?php include('../includes/navbar.php'); ?>
    <div class="container mt-4">
        <h2>Material Educativo para Alumnos</h2>
        <div class="row">
            <?php
            include_once('../models/db_connect.php');

            // Consultar material educativo disponible
            $query = "SELECT * FROM material_educativo";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-4'>";
                    echo "<div class='card mb-4'>";
                    echo "<img src='../" . $row['imagen'] . "' class='card-img-top' alt='Imagen'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $row['titulo'] . "</h5>";
                    echo "<p class='card-text'>" . $row['descripcion'] . "</p>";
                    echo "<a href='" . $row['link_youtube'] . "' target='_blank' class='btn btn-primary'>Ver</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay material educativo disponible</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
