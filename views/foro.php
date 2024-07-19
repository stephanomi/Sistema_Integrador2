<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro de Discusión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('../includes/navbar.php'); ?>
    <div class="container mt-4">
        <h2>Foro de Discusión</h2>
        <div class="row">
            <?php
            include_once('../models/db_connect.php');

            // Consultar los temas del foro
            $query = "SELECT * FROM temas_foro ORDER BY fecha DESC";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-4'>";
                    echo "<div class='card mb-4'>";
                    if (!empty($row['imagen'])) {
                        echo "<img src='../" . $row['imagen'] . "' class='card-img-top' alt='Imagen'>";
                    }
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $row['titulo'] . "</h5>";
                    echo "<p class='card-text'>" . $row['descripcion'] . "</p>";
                    if (!empty($row['link_youtube'])) {
                        echo "<a href='" . $row['link_youtube'] . "' target='_blank' class='btn btn-primary'>Ver Video</a> ";
                    }
                    echo "<a href='tema_foro.php?id=" . $row['id'] . "' class='btn btn-secondary'>Comentar</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay temas en el foro</p>";
            }

            $conn->close();
            
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
