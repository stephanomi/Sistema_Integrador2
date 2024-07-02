<?php
// archivo: ../controllers/estadisticas_por_mes.php

include_once('../models/db_connect.php');

if (isset($_GET['mes'])) {
    $mes = $_GET['mes'];
    
    // Ajustar este array según tus necesidades
    $meses = [
        'enero' => '01',
        'febrero' => '02',
        'marzo' => '03',
        'abril' => '04',
        'mayo' => '05',
        'junio' => '06',
        'julio' => '07',
        'agosto' => '08',
        'septiembre' => '09',
        'octubre' => '10',
        'noviembre' => '11',
        'diciembre' => '12'
    ];

    $mesNumero = $meses[$mes];
    
    // Consultas ajustadas para obtener datos según el mes
    $queryGradoEscolar = "SELECT grado_escolar, COUNT(*) as cantidad FROM denuncias WHERE MONTH(fecha_hora) = ? GROUP BY grado_escolar";
    $stmtGradoEscolar = $conn->prepare($queryGradoEscolar);
    $stmtGradoEscolar->bind_param("s", $mesNumero);
    $stmtGradoEscolar->execute();
    $resultGradoEscolar = $stmtGradoEscolar->get_result();

    $gradoEscolar = [];
    while ($row = $resultGradoEscolar->fetch_assoc()) {
        $gradoEscolar[$row['grado_escolar']] = $row['cantidad'];
    }

    $queryEvolucionTemporal = "SELECT DAY(fecha_hora) as dia, COUNT(*) as cantidad FROM denuncias WHERE MONTH(fecha_hora) = ? GROUP BY dia";
    $stmtEvolucionTemporal = $conn->prepare($queryEvolucionTemporal);
    $stmtEvolucionTemporal->bind_param("s", $mesNumero);
    $stmtEvolucionTemporal->execute();
    $resultEvolucionTemporal = $stmtEvolucionTemporal->get_result();

    $evolucionTemporal = [];
    while ($row = $resultEvolucionTemporal->fetch_assoc()) {
        $evolucionTemporal[$row['dia']] = $row['cantidad'];
    }

    $queryTipoAcoso = "SELECT tipo_acoso, COUNT(*) as cantidad FROM denuncias WHERE MONTH(fecha_hora) = ? GROUP BY tipo_acoso";
    $stmtTipoAcoso = $conn->prepare($queryTipoAcoso);
    $stmtTipoAcoso->bind_param("s", $mesNumero);
    $stmtTipoAcoso->execute();
    $resultTipoAcoso = $stmtTipoAcoso->get_result();

    $tipoAcoso = [];
    while ($row = $resultTipoAcoso->fetch_assoc()) {
        $tipoAcoso[$row['tipo_acoso']] = $row['cantidad'];
    }

    echo json_encode([
        'grado_escolar' => $gradoEscolar,
        'evolucion_temporal' => $evolucionTemporal,
        'distribucion_acoso' => $tipoAcoso
    ]);

    $stmtGradoEscolar->close();
    $stmtEvolucionTemporal->close();
    $stmtTipoAcoso->close();
    $conn->close();
}
?>
