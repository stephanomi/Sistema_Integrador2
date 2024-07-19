<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auditoría - INTEGRADOR</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <?php include('../includes/navbar_admin.php'); ?>

    <div class="container mt-4">
        <h2>Registro de Auditoría</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario ID</th>
                    <th>Tipo de Documento</th>
                    <th>Número de Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Alias</th>
                    <th>Número de Celular</th>
                    <th>Correo</th>
                    <th>Escuela</th>
                    <th>Tipo de Usuario</th>
                    <th>Fecha</th>
                    <th>Operación</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Incluir el archivo de conexión a la base de datos
                include_once('../models/db_connect.php');

                // Consulta para obtener registros de auditoría
                $query = "SELECT * FROM auditoria ORDER BY fecha DESC";
                $result = $conn->query($query);

                // Verificar si hay resultados
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['usuario_id'] . "</td>";
                        echo "<td>" . $row['tipo_documento'] . "</td>";
                        echo "<td>" . $row['numero_documento'] . "</td>";
                        echo "<td>" . $row['nombres'] . "</td>";
                        echo "<td>" . $row['apellidos'] . "</td>";
                        echo "<td>" . $row['alias'] . "</td>";
                        echo "<td>" . $row['numero_celular'] . "</td>";
                        echo "<td>" . $row['correo'] . "</td>";
                        echo "<td>" . $row['escuela'] . "</td>";
                        echo "<td>" . $row['tipo_usuario'] . "</td>";
                        echo "<td>" . $row['fecha'] . "</td>";
                        echo "<td>" . $row['operacion'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='13'>No hay registros de auditoría</td></tr>";
                }

                // Cerrar conexión
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
