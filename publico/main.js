$(document).ready(function() {
    // Manejar clics en los enlaces del menú
    $('.nav-link[data-module]').on('click', function(e) {
        e.preventDefault();
        
        // Remover clase activa de todos los enlaces
        $('.nav-link').removeClass('active');
        // Agregar clase activa al enlace clickeado
        $(this).addClass('active');
        
        const module = $(this).data('module');
        loadModule(module);
    });

    // Función para cargar módulos
    function loadModule(module) {
        // Mostrar loader
        $('.dynamic-view-container').html(`
            <div class="loader text-center py-5">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
                <p>Cargando módulo...</p>
            </div>
        `);
        
        // Cargar contenido
        $.ajax({
            url: `index.php?entidad=${module}&accion=listar`,
            type: 'GET',
            success: function(response) {
                $('.dynamic-view-container').html(response);
                
                // Actualizar la URL sin recargar
                history.pushState(null, null, `?entidad=${module}&accion=listar`);
            },
            error: function(xhr, status, error) {
                $('.dynamic-view-container').html(`
                    <div class="alert alert-danger">
                        Error al cargar el módulo: ${xhr.statusText}
                    </div>
                `);
            }
        });
    }

    // Cargar módulo inicial basado en la URL
    const urlParams = new URLSearchParams(window.location.search);
    const initialModule = urlParams.get('entidad') || 'dashboard'; // módulo por defecto
    
    if(initialModule) {
        $(`.nav-link[data-module="${initialModule}"]`).addClass('active');
        loadModule(initialModule);
    }

    // Manejar navegación adelante/atrás
    window.onpopstate = function() {
        const urlParams = new URLSearchParams(window.location.search);
        const module = urlParams.get('entidad');
        if(module) {
            $(`.nav-link[data-module="${module}"]`).addClass('active');
            loadModule(module);
        }
    };
});