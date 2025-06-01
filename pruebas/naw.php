
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav>
    <strong>Zona de Gestión</strong> |
    <a href="#" class="nav-link" data-url="index.php?entidad=cliente&accion=listar">Clientes</a> |
    <a href="#" class="nav-link" data-url="index.php?entidad=proyecto&accion=listar">Proyectos</a> |
    <a href="#" class="nav-link" data-url="index.php?entidad=tarea&accion=listar">Tareas</a> |

    <?php if ($_SESSION['usuario']['rol'] === 'Administrador'): ?>
        <a href="#" class="nav-link" data-url="index.php?entidad=usuario&accion=listar">Usuarios</a> |
    <?php endif; ?>


    <?php if (isset($_SESSION['usuario'])): ?>
        <span>Bienvenido, <?= htmlspecialchars($_SESSION['usuario']['username']) ?></span>
        | <a href="index.php?entidad=usuario&accion=logout" style="color: red;">Cerrar sesión</a>
    <?php else: ?>
        <a href="index.php?entidad=usuario&accion=login">Iniciar sesión</a>
    <?php endif; ?>
</nav>
