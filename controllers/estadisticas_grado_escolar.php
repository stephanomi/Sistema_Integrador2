<?php
include_once('../models/db_connect.php');

// Consulta SQL para obtener el conteo de denuncias por grado escolar
$query = "SELECT grado_escolar, COUNT(*) as cantidad FROM denuncias GROUP BY grado_escolar";
$result = $conn->query($query);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[$row['grado_escolar']] = (int) $row['cantidad'];
}

// Devolver los datos como JSON
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
