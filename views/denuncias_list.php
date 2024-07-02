<?php
// Incluir el archivo de conexión a la base de datos
include_once('../models/db_connect.php');

// Verificar si hay mensaje y tipo de mensaje en la URL
$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';
$tipoMensaje = isset($_GET['tipo']) ? $_GET['tipo'] : '';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Denuncias</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include('../includes/navbar_docente.php'); ?>

    <div class="container mt-4">
        <h2>Listado de Denuncias</h2>

        <!-- Mostrar mensaje de éxito o error -->
        <?php if (!empty($mensaje) && !empty($tipoMensaje)): ?>
            <div class="alert alert-<?php echo $tipoMensaje; ?>" role="alert">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Edad</th>
                    <th>Grado Escolar</th>
                    <th>Escuela</th>
                    <th>Fecha y Hora</th>
                    <th>Descripción</th>
                    <th>Tipo de Acoso</th>
                    <th>Impacto en la Víctima</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta para obtener todas las denuncias no atendidas
                $query = "SELECT * FROM denuncias WHERE atendida = 0";
                $result = $conn->query($query);

                // Verificar si hay resultados
                if ($result->num_rows > 0) {
                    // Recorrer los resultados y mostrarlos en la tabla
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nombre_completo'] . "</td>";
                        echo "<td>" . $row['edad'] . "</td>";
                        echo "<td>" . $row['grado_escolar'] . "</td>";
                        echo "<td>" . $row['escuela'] . "</td>";
                        echo "<td>" . $row['fecha_hora'] . "</td>";
                        echo "<td>" . $row['descripcion'] . "</td>";
                        echo "<td>" . $row['tipo_acoso'] . "</td>";
                        echo "<td>" . $row['impacto_victima'] . "</td>";
                        echo "<td>
                                <a href='../controllers/atender_denuncia.php?id=" . $row['id'] . "' class='btn btn-success'>Atender</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No hay denuncias por atender</td></tr>";
                }
                // Cerrar la conexión
                $conn->close();
                ?>
            </tbody>
        </table>

        <!-- Botón para ir al historial de denuncias -->
        <a href="../views/historial_denuncia.php" class="btn btn-primary">Historial de Denuncias</a>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
