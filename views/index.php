<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - INTEGRADOR</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Estilos para el footer */
        footer {
            background-color: #333;
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
        /* Estilos para los enlaces del footer */
        footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        /* Estilos para los enlaces del footer cuando se pasan por encima */
        footer a:hover {
            text-decoration: underline;
        }
        /* Estilos para el slider */
        .carousel-caption {
            bottom: 50%;
            transform: translateY(50%);
        }
        .carousel-caption h1 {
            font-size: 3rem;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }
        /* Estilos para la notificación */
        .notification {
            background-color: #f44336;
            color: white;
            text-align: center;
            padding: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <?php include('../includes/navbar.php'); ?>

    <!-- Mostrar notificación si existe -->
    <?php if (isset($_SESSION['notificacion'])): ?>
        <div class="notification">
            <?php echo $_SESSION['notificacion']; ?>
        </div>
        <?php unset($_SESSION['notificacion']); ?>
    <?php endif; ?>

    <!-- Slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../assets/img/img1.jpg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h1>La fuerza para cambiar el mundo comienza con la valentía de defender a los demás</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../assets/img/slide2.jpg" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Detén la Violencia</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../assets/img/slide3.jpg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Juntos Podemos Hacer la Diferencia</h1>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Footer -->
    <footer>
        <p>©Grupo 1 - Todos los derechos reservados</p>
        <nav>
            <a href="#">Acerca de Nosotros</a>
            <a href="#">Servicios</a>
            <a href="#">Contacto</a>
        </nav>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogG3RSDeRI80HjOMhuYJQ6FELgGpN1F2kVXp9PwgKZsw1T" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-pwLeN7EXGVbzKxoe+Xk7/cEJ0C1Chj3z5TO6foSOeIG3Ffhd1ZWBqylr0V4TbrYm" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>
    <script>
        window.addEventListener('mouseover', initLandbot, { once: true });
        window.addEventListener('touchstart', initLandbot, { once: true });
        var myLandbot;
        function initLandbot() {
            if (!myLandbot) {
                var s = document.createElement('script');
                s.type = 'text/javascript';
                s.async = true;
                s.addEventListener('load', function() {
                    var myLandbot = new Landbot.Livechat({
                        configUrl: 'https://storage.googleapis.com/landbot.online/v3/H-2537409-NED4AL3DUZZN9NUJ/index.json',
                    });
                });
                s.src = 'https://cdn.landbot.io/landbot-3/landbot-3.0.0.js';
                var x = document.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(s, x);
            }
        }
    </script>
</body>
</html>
