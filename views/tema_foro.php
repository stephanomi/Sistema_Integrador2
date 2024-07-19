<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema del Foro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<style>
    img.img-fluid {
        max-height: 300px; /* Establece una altura máxima para todas las imágenes */
        width: auto; /* Mantiene la proporción de las imágenes */
        display: block; /* Asegura que la imagen no tenga espacio extra alrededor */
        margin: 0 auto; /* Centra la imagen horizontalmente */
        border-radius: 5px; /* Bordes redondeados para las imágenes */
    }

    .container img:first-child {
        margin-top: 20px; /* Espacio adicional en la parte superior solo para la primera imagen */
        margin-bottom: 20px; /* Espacio debajo de la primera imagen */
    }

    /* Estilos para contenedores de comentarios y tarjetas */
    .card img {
        max-height: 150px; /* Altura más pequeña para imágenes dentro de comentarios o tarjetas */
        width: auto; /* Mantiene la proporción */
        border-radius: 3px; /* Bordes redondeados sutiles para las imágenes en tarjetas */
    }
</style>

    <?php include('../includes/navbar.php'); ?>
    <div class="container mt-4">
        <?php
        include_once('../models/db_connect.php');

        if (isset($_GET['id'])) {
            $id_tema = $_GET['id'];

            // Consultar el tema
            $query = "SELECT * FROM temas_foro WHERE id = ?";
            if ($stmt = $conn->prepare($query)) {
                $stmt->bind_param("i", $id_tema);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    $tema = $result->fetch_assoc();
                    echo "<h2>" . $tema['titulo'] . "</h2>";
                    echo "<p>" . $tema['descripcion'] . "</p>";
                    if (!empty($tema['link_youtube'])) {
                        echo "<a href='" . $tema['link_youtube'] . "' target='_blank' class='btn btn-primary mb-3'>Ver Video</a>";
                    }
                    if (!empty($tema['imagen'])) {
                        echo "<img src='../" . $tema['imagen'] . "' class='img-fluid' alt='Imagen'>";
                    }

                    echo "<hr>";

                    // Consultar los comentarios del tema
                    $query_comentarios = "SELECT * FROM comentarios_foro WHERE id_tema = ? ORDER BY fecha DESC";
                    if ($stmt_comentarios = $conn->prepare($query_comentarios)) {
                        $stmt_comentarios->bind_param("i", $id_tema);
                        $stmt_comentarios->execute();
                        $result_comentarios = $stmt_comentarios->get_result();

                        if ($result_comentarios->num_rows > 0) {
                            while ($comentario = $result_comentarios->fetch_assoc()) {
                                echo "<div class='card mb-3'>";
                                echo "<div class='card-body'>";
                                echo "<h6 class='card-subtitle mb-2 text-muted'>" . $comentario['alias'] . " comentó:</h6>";
                                echo "<p class='card-text'>" . $comentario['comentario'] . "</p>";
                                echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "<p>No hay comentarios en este tema.</p>";
                        }
                    }

                    if (isset($_SESSION['user_id'])) {
                        echo "<hr>";
                        echo "<h4>Agregar Comentario</h4>";
                        echo "<form action='../controllers/guardar_comentario_foro.php' method='POST'>";
                        echo "<div class='mb-3'>";
                        echo "<textarea name='comentario' class='form-control' rows='3' required></textarea>";
                        echo "</div>";
                        echo "<input type='hidden' name='id_tema' value='" . $id_tema . "'>";
                        echo "<button type='submit' class='btn btn-primary'>Comentar</button>";
                        echo "</form>";
                    } else {
                        echo "<p><a href='login.php'>Inicia sesión</a> para comentar.</p>";
                    }
                } else {
                    echo "<p>Tema no encontrado.</p>";
                }

                $stmt->close();
            } else {
                echo "<p>Error al preparar la consulta.</p>";
            }
        } else {
            echo "<p>ID de tema no proporcionado.</p>";
        }

        $conn->close();
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
