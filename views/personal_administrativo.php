<?php
// Incluir el archivo de conexión a la base de datos
include('../models/db_connect.php');

// Consulta SQL para seleccionar solo usuarios tipo "admin" y "docente" (personal administrativo)
$query = "SELECT * FROM usuarios WHERE tipo_usuario IN ('admin', 'docente')";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Administrativo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include('../includes/navbar_admin.php'); ?>

    <div class="container mt-4">
        <h2>Personal Administrativo</h2>
        <!-- Barra de búsqueda -->
        <input class="form-control mb-3" id="searchBar" type="text" placeholder="Buscar...">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tipo de Documento</th>
                    <th>Número de Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Escuela</th>
                    <th>Tipo de Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="adminTable">
                <?php
                // Verificar si hay resultados en la consulta
                if (mysqli_num_rows($result) > 0) {
                    // Iterar sobre los resultados y mostrar cada usuario
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['tipo_documento'] . "</td>";
                        echo "<td>" . $row['numero_documento'] . "</td>";
                        echo "<td>" . $row['nombres'] . "</td>";
                        echo "<td>" . $row['apellidos'] . "</td>";
                        echo "<td>" . $row['numero_celular'] . "</td>";
                        echo "<td>" . $row['correo'] . "</td>";
                        echo "<td>" . $row['escuela'] . "</td>";
                        echo "<td>" . $row['tipo_usuario'] . "</td>";
                        echo "<td>
                                <a href='update_user.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Editar</a>
                                <a href='delete_user.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Eliminar</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No hay personal administrativo registrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript para la funcionalidad de búsqueda -->
    <script>
        document.getElementById('searchBar').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#adminTable tr');
            
            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>
</body>
</html>
