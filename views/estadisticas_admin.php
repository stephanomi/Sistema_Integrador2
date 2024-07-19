<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Estadísticas Administrativas</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .graph-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }
        .graph-container > div {
            width: calc(50% - 20px);
            min-width: 200px;
            text-align: center;
        }
        @media (max-width: 992px) {
            .graph-container > div {
                width: 100%;
            }
        }
        #graficoTipoAcoso {
            max-height: 400px;
            width: 100%;
            height: auto;
            margin: 0 auto;
        }
        .notification {
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            position: relative;
        }
        .notification p {
            margin: 0;
        }
        .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .filter-container {
            text-align: right;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .filter-container select {
            padding: 8px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <?php include('../includes/navbar_admin.php'); ?>

    <div class="container mt-4">
        <!-- Contenedor de filtros y botón de exportar -->
        <div class="filter-container">
            <form id="filtroMes">
                <label for="mes">Filtrar por mes:</label>
                <select name="mes" id="mes">
                    <option value="">Seleccione un mes</option>
                    <option value="enero">Enero</option>
                    <option value="febrero">Febrero</option>
                    <option value="marzo">Marzo</option>
                    <option value="abril">Abril</option>
                    <option value="mayo">Mayo</option>
                    <option value="junio">Junio</option>
                    <option value="julio">Julio</option>
                    <option value="agosto">Agosto</option>
                    <option value="septiembre">Septiembre</option>
                    <option value="octubre">Octubre</option>
                    <option value="noviembre">Noviembre</option>
                    <option value="diciembre">Diciembre</option>
                </select>
                <button type="submit">Filtrar</button>
            </form>
        </div>

        <!-- Contenedor de gráficos -->
        <div class="graph-container">
            <div>
                <h3>Denuncias por Grado Escolar</h3>
                <canvas id="graficoGradoEscolar"></canvas>
            </div>
            <div>
                <h3>Evolución Temporal de Denuncias</h3>
                <canvas id="graficoEvolucionTemporal"></canvas>
            </div>
            <div>
                <h3>Distribución de Denuncias por Tipo de Acoso</h3>
                <canvas id="graficoTipoAcoso"></canvas>
            </div>
        </div>

        <!-- Formulario para exportar a Excel -->
        <form action="../controllers/exportController.php" method="post">
            <button type="submit" name="exportar_excel">Exportar a Excel</button>
        </form>
    </div>

    <!-- Scripts JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let chartGradoEscolar;
        let chartEvolucionTemporal;
        let chartTipoAcoso;

        function inicializarGraficos() {
            const ctxGradoEscolar = document.getElementById('graficoGradoEscolar').getContext('2d');
            chartGradoEscolar = new Chart(ctxGradoEscolar, {
                type: 'bar',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Denuncias por Grado Escolar',
                        data: [],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const ctxEvolucionTemporal = document.getElementById('graficoEvolucionTemporal').getContext('2d');
            chartEvolucionTemporal = new Chart(ctxEvolucionTemporal, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Evolución Temporal de Denuncias',
                        data: [],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const ctxTipoAcoso = document.getElementById('graficoTipoAcoso').getContext('2d');
            chartTipoAcoso = new Chart(ctxTipoAcoso, {
                type: 'pie',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Distribución de Denuncias por Tipo de Acoso',
                        data: [],
                        backgroundColor: [
                            '#ffcd56',
                            '#36a2eb',
                            '#ff6384',
                            '#ff9f40'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        }

        function actualizarGraficos(data) {
            chartGradoEscolar.data.labels = Object.keys(data.grado_escolar);
            chartGradoEscolar.data.datasets[0].data = Object.values(data.grado_escolar);
            chartGradoEscolar.update();

            chartEvolucionTemporal.data.labels = Object.keys(data.evolucion_temporal);
            chartEvolucionTemporal.data.datasets[0].data = Object.values(data.evolucion_temporal);
            chartEvolucionTemporal.update();

            chartTipoAcoso.data.labels = Object.keys(data.distribucion_acoso);
            chartTipoAcoso.data.datasets[0].data = Object.values(data.distribucion_acoso);
            chartTipoAcoso.update();
        }

        document.getElementById('filtroMes').addEventListener('submit', function (e) {
            e.preventDefault();
            const mes = document.getElementById('mes').value;

            if (mes) {
                fetch(`../controllers/estadisticas_por_mes.php?mes=${mes}`)
                    .then(response => response.json())
                    .then(data => {
                        actualizarGraficos(data);
                    })
                    .catch(error => {
                        console.error('Error al obtener datos:', error);
                    });
            } else {
                actualizarGraficos({
                    grado_escolar: {},
                    evolucion_temporal: {},
                    distribucion_acoso: {}
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            inicializarGraficos();
            // Inicialmente cargar datos sin filtro
            actualizarGraficos({
                grado_escolar: {},
                evolucion_temporal: {},
                distribucion_acoso: {}
            });
        });
    </script>
</body>
</html>
