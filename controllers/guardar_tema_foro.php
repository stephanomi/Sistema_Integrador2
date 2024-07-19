<?php
include_once('../models/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $link_youtube = $_POST['link_youtube'];

    // Procesar la imagen
    $imagen_nombre = $_FILES['imagen']['name'];
    $imagen_tmp = $_FILES['imagen']['tmp_name'];
    $imagen_ruta = '../uploads/imagenes_foro/' . $imagen_nombre;

    if (move_uploaded_file($imagen_tmp, $imagen_ruta)) {
        $imagen_ruta_relativa = 'uploads/imagenes_foro/' . $imagen_nombre;

        // Insertar el tema del foro en la base de datos
        $query = "INSERT INTO temas_foro (titulo, descripcion, link_youtube, imagen) VALUES (?, ?, ?, ?)";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("ssss", $titulo, $descripcion, $link_youtube, $imagen_ruta_relativa);
            if ($stmt->execute()) {
                // Notificar a los estudiantes
                session_start();
                $_SESSION['notificacion'] = 'Se ha agregado un nuevo tema en el foro.';

                header('Location: ../views/agregar_tema_foro.php?success=true');
                exit;
            } else {
                echo "Error al ejecutar la consulta: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $conn->error;
        }
    } else {
        echo "Error al subir la imagen.";
    }

    $conn->close();
} else {
    header('Location: ../views/agregar_tema_foro.php');
    exit;
}
?>
