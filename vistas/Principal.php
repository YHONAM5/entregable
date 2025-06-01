<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/entregable/publico/css/style.css">
    <title>Gestión de Proyectos</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/publico/scrip.js"></script>
</head>
<body>
    <!-- Contenedor principal de toda la app -->
    <div class="app-container">

        <!-- Encabezado con barra de navegación -->
        <header class="app-header">
            <nav class="nav-bar">
                <?php include 'nav.php'; ?> <!-- Barra superior de navegación -->
            </nav>
        </header>

        <!-- Contenido principal -->
        <main class="main-content">
            <!-- Sección de bienvenida -->
            <section class="welcome-section">
                <div class="welcome-container">
                    <h1 class="welcome-title">Bienvenido a la Gestión de Proyectos</h1>
                    <p class="welcome-text">Utiliza el menú de navegación para acceder a las diferentes secciones.</p>
                </div>
            </section>

            <!-- Sección dinámica para cargar vistas -->
            <!-- Sección dinámica para cargar vistas -->
            <section class="dynamic-view-section">
                <div class="dynamic-view-container" id="contenido-dinamico">
                    
                </div>
            </section>

        </main>
        
        <!-- Pie de página -->
        <footer class="app-footer">
            <div class="footer-container">
                <p class="footer-text">&copy; <?= date('Y') ?> Sistema de Gestión de Proyectos. Todos los derechos reservados.</p>
            </div>
        </footer>

    </div>
    <script>
        $(document).ready(function() {
            $('.nav-link').click(function(e) {
                e.preventDefault(); // Evita recarga
                const url = $(this).data('url'); // Obtiene URL

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        $('#contenido-dinamico').html(response); // Carga en contenedor
                    },
                    error: function() {
                        $('#contenido-dinamico').html('<p>Error al cargar la vista.</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>