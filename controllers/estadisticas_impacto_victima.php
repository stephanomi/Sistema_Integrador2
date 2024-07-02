<?php
include_once('../models/db_connect.php');

// Consulta SQL para obtener el conteo de denuncias por impacto en la víctima
$query = "SELECT impacto_victima, COUNT(*) as cantidad FROM denuncias GROUP BY impacto_victima";
$result = $conn->query($query);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[$row['impacto_victima']] = (int) $row['cantidad'];
}

// Devolver los datos como JSON
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
