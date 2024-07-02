<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Obtener el mes seleccionado
$mes = isset($_GET['mes']) ? $_GET['mes'] : '';

// Nombre del mes en formato YYYY-MM
$nombre_mes = '';

if (!empty($mes)) {
    // Obtener el nombre del mes en formato YYYY-MM
    $nombre_mes = date('Y-m', strtotime(date('Y') . '-' . $mes . '-01'));
} else {
    // Si no se seleccionó un mes, utilizar el mes actual como predeterminado
    $nombre_mes = date('Y-m');
}

// Incluir el archivo de conexión a la base de datos
include_once('../models/db_connect.php');

// Consulta para obtener las denuncias filtradas por mes
if (!empty($mes)) {
    $query = "SELECT * FROM denuncias WHERE atendida = 1 AND MONTH(fecha_hora) = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $mes);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
} else {
    // Si no se seleccionó un mes, generar un archivo con todas las denuncias atendidas
    $query = "SELECT * FROM denuncias WHERE atendida = 1";
    $result = $conn->query($query);
}

// Crear un nuevo libro de Excel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Encabezados de columna
$sheet->setCellValue('A1', 'Nombre Completo');
$sheet->setCellValue('B1', 'Edad');
$sheet->setCellValue('C1', 'Grado Escolar');
$sheet->setCellValue('D1', 'Escuela');
$sheet->setCellValue('E1', 'Fecha y Hora');
$sheet->setCellValue('F1', 'Descripción');
$sheet->setCellValue('G1', 'Tipo de Acoso');
$sheet->setCellValue('H1', 'Impacto en la Víctima');

// Datos de la base de datos
$row = 2; // Empezar en la fila 2
while ($row_data = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $row, $row_data['nombre_completo']);
    $sheet->setCellValue('B' . $row, $row_data['edad']);
    $sheet->setCellValue('C' . $row, $row_data['grado_escolar']);
    $sheet->setCellValue('D' . $row, $row_data['escuela']);
    $sheet->setCellValue('E' . $row, $row_data['fecha_hora']);
    $sheet->setCellValue('F' . $row, $row_data['descripcion']);
    $sheet->setCellValue('G' . $row, $row_data['tipo_acoso']);
    $sheet->setCellValue('H' . $row, $row_data['impacto_victima']);
    $row++;
}

// Configurar encabezados de respuesta para descargar el archivo Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="denuncias_' . $nombre_mes . '.xlsx"');
header('Cache-Control: max-age=0');

// Crear el escritor de Excel y descargar el archivo
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

// Cerrar la conexión
$conn->close();
?>
