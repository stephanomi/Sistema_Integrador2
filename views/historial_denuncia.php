<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Denuncias</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('../includes/navbar_docente.php'); ?>

    <div class="container mt-4">
        <h2>Historial de Denuncias</h2>

        <!-- Formulario para filtrar por mes -->
        <form action="" method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <label for="mes" class="form-label">Filtrar por Mes:</label>
                    <select class="form-select" name="mes" id="mes">
                        <option value="01" <?php if(isset($_GET['mes']) && $_GET['mes'] == '01') echo 'selected'; ?>>Enero</option>
                        <option value="02" <?php if(isset($_GET['mes']) && $_GET['mes'] == '02') echo 'selected'; ?>>Febrero</option>
                        <option value="03" <?php if(isset($_GET['mes']) && $_GET['mes'] == '03') echo 'selected'; ?>>Marzo</option>
                        <option value="04" <?php if(isset($_GET['mes']) && $_GET['mes'] == '04') echo 'selected'; ?>>Abril</option>
                        <option value="05" <?php if(isset($_GET['mes']) && $_GET['mes'] == '05') echo 'selected'; ?>>Mayo</option>
                        <option value="06" <?php if(isset($_GET['mes']) && $_GET['mes'] == '06') echo 'selected'; ?>>Junio</option>
                        <option value="07" <?php if(isset($_GET['mes']) && $_GET['mes'] == '07') echo 'selected'; ?>>Julio</option>
                        <option value="08" <?php if(isset($_GET['mes']) && $_GET['mes'] == '08') echo 'selected'; ?>>Agosto</option>
                        <option value="09" <?php if(isset($_GET['mes']) && $_GET['mes'] == '09') echo 'selected'; ?>>Septiembre</option>
                        <option value="10" <?php if(isset($_GET['mes']) && $_GET['mes'] == '10') echo 'selected'; ?>>Octubre</option>
                        <option value="11" <?php if(isset($_GET['mes']) && $_GET['mes'] == '11') echo 'selected'; ?>>Noviembre</option>
                        <option value="12" <?php if(isset($_GET['mes']) && $_GET['mes'] == '12') echo 'selected'; ?>>Diciembre</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary mt-4">Filtrar</button>
                </div>
            </div>
        </form>

        <!-- Botón para exportar a Excel -->
        <form action="exportar_excel.php" method="POST">
            <input type="hidden" name="mes" value="<?php echo isset($_GET['mes']) ? $_GET['mes'] : ''; ?>">
            <button type="submit" class="btn btn-success"><i class="bi bi-file-excel"></i> Descargar Excel</button>
        </form>

        <hr>

        <!-- Mostrar denuncias filtradas por mes -->
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
                </tr>
            </thead>
            <tbody>
                <?php
                // Incluir el archivo de conexión a la base de datos
                include_once('../models/db_connect.php');

                // Verificar si se recibió el mes por GET
                $mes = isset($_GET['mes']) ? $_GET['mes'] : '';

                // Consulta para obtener las denuncias filtradas por mes
                if (!empty($mes)) {
                    $query = "SELECT * FROM denuncias WHERE atendida = 1 AND MONTH(fecha_hora) = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("s", $mes);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $stmt->close();
                } else {
                    // Consulta para obtener todas las denuncias atendidas
                    $query = "SELECT * FROM denuncias WHERE atendida = 1";
                    $result = $conn->query($query);
                }

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
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No hay denuncias atendidas para este mes</td></tr>";
                }

                // Cerrar la conexión
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
