<?php
include_once('../models/db_connect.php');

// Consulta SQL para obtener el conteo de denuncias por mes
$query = "SELECT DATE_FORMAT(fecha_hora, '%Y-%m') as mes, COUNT(*) as cantidad FROM denuncias GROUP BY mes";
$result = $conn->query($query);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[$row['mes']] = (int) $row['cantidad'];
}

// Devolver los datos como JSON
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
