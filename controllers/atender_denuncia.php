<?php
// Iniciar la sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Incluir el archivo de conexión a la base de datos
include_once('../models/db_connect.php');

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: ../views/login.php');
    exit;
}

// Verificar si se recibió el ID de la denuncia por GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $denuncia_id = $_GET['id'];

    // Marcar la denuncia como atendida en la base de datos
    $query = "UPDATE denuncias SET atendida = 1 WHERE id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $denuncia_id);
        $stmt->execute();
        $stmt->close();

        // Obtener el correo del usuario que realizó la denuncia
// Obtener el correo del usuario que realizó la denuncia
// Obtener el correo del usuario que realizó la denuncia
// Obtener el correo del usuario que realizó la denuncia
$query = "SELECT usuarios.correo 
          FROM denuncias 
          INNER JOIN usuarios ON denuncias.nombre_completo = CONCAT(usuarios.nombres, ' ', usuarios.apellidos)
          WHERE denuncias.id = (
            SELECT id 
            FROM denuncias
            ORDER BY id DESC
            LIMIT 1
          )";
if ($stmt = $conn->prepare($query)) {
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $correo_usuario = $result->fetch_assoc();
        $correo_usuario = $correo_usuario['correo'];

        // Enviar correo al usuario
        require_once('../vendor/autoload.php');
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sinbullingpe@gmail.com';
        $mail->Password = 'bvhjruzzmsozkbmz';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('sinbullingpe@gmail.com', 'SinBullyingPe');
        $mail->addAddress($correo_usuario);
        $mail->Subject = 'Denuncia atendida';
        $mail->Body = 'Estimado usuario,Su denuncia ha sido atendida y revisada. Gracias por su reporte.\n\nAtentamente,\nEquipo de tu sistema';

        if (!$mail->send()) {
            echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
        } else {
            // Redireccionar de vuelta a la lista de denuncias
            header('Location: ../views/denuncias_list.php?mensaje=Denuncia atendida exitosamente&tipo=success');
            exit;
        }
    } else {
        echo 'No se encontró información del usuario que realizó la denuncia.';
    }
    $stmt->close();
}
    }
} else {
    // Redireccionar si no se recibió el ID de la denuncia
    header('Location: ../views/denuncias_list.php?mensaje=ID de denuncia no proporcionado&tipo=error');
    exit;
}
?>