<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Proyectos</title>
    <link rel="stylesheet" href="/entregable/publico/css/style.css">
</head>
<body class="app-container">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">Proyectos Registrados</h1>
        </header>

        <section class="actions-section">
            <a href="index.php?entidad=proyecto&accion=mostrarFormularioRegistro" class="btn btn-primary">Registrar nuevo proyecto</a>
        </section>

        <section class="table-section">
            <?php if (empty($proyectos)) : ?>
                <p>No hay proyectos registrados.</p>
            <?php else : ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Responsable</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Presupuesto</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($proyectos as $proyecto) : ?>
                            <tr>
                                <td><?= htmlspecialchars($proyecto->getIdProyecto()) ?></td>
                                <td><?= htmlspecialchars($proyecto->getIdCliente()) ?></td>
                                <td><?= htmlspecialchars($proyecto->getIdResponsable()) ?></td>
                                <td><?= htmlspecialchars($proyecto->getNombre()) ?></td>
                                <td><?= htmlspecialchars($proyecto->getDescripcion()) ?></td>
                                <td><?= htmlspecialchars($proyecto->getFechaInicio()) ?></td>
                                <td><?= htmlspecialchars($proyecto->getFechaFin()) ?></td>
                                <td>S/ <?= number_format($proyecto->getPresupuesto(), 2) ?></td>
                                <td><?= htmlspecialchars($proyecto->getEstado()) ?></td>
                                <td>
                                    <a href="index.php?entidad=proyecto&accion=editar&id=<?= $proyecto->getIdProyecto() ?>" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="index.php?entidad=proyecto&accion=eliminar&id=<?= $proyecto->getIdProyecto() ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminar este proyecto?')">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </section>
    </div>
</body>
</html>