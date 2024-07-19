<?php
// controllers/estadisticas_denuncias.php

include_once('../models/db_connect.php');

// Consulta SQL para obtener la cantidad de denuncias por tipo de acoso
$query = "SELECT tipo_acoso, COUNT(*) as cantidad FROM denuncias GROUP BY tipo_acoso";
$result = $conn->query($query);

$estadisticas = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $estadisticas[$row['tipo_acoso']] = $row['cantidad'];
    }
}

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($estadisticas);

$conn->close();
?>
