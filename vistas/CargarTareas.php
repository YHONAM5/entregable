<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Tareas</title>
    <link rel="stylesheet" href="/entregable/publico/css/style.css">
</head>
<body class="app-container">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">Tareas Registradas</h1>
        </header>

        <section class="actions-section">
            <a href="index.php?entidad=tarea&accion=mostrarFormularioRegistro" class="btn btn-primary">Registrar nueva tarea</a>
        </section>

        <section class="table-section">
            <?php if (empty($tareas)) : ?>
                <p>No hay tareas registradas.</p>
            <?php else : ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Proyecto</th>
                            <th>Usuario</th>
                            <th>Nombre de Tarea</th>
                            <th>Descripción</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Prioridad</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tareas as $tarea) : ?>
                            <tr>
                                <td><?= htmlspecialchars($tarea->getIdTarea()) ?></td>
                                <td><?= htmlspecialchars($tarea->getIdProyecto()) ?></td>
                                <td><?= htmlspecialchars($tarea->getIdUsuario()) ?></td>
                                <td><?= htmlspecialchars($tarea->getNombreTarea()) ?></td>
                                <td><?= htmlspecialchars($tarea->getDescripcion()) ?></td>
                                <td><?= htmlspecialchars($tarea->getFechaInicio()) ?></td>
                                <td><?= htmlspecialchars($tarea->getFechaFin()) ?></td>
                                <td><?= htmlspecialchars($tarea->getPrioridad()) ?></td>
                                <td><?= htmlspecialchars($tarea->getEstado()) ?></td>
                                <td>
                                    <a href="index.php?entidad=tarea&accion=editar&id=<?= $tarea->getIdTarea() ?>" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="index.php?entidad=tarea&accion=eliminar&id=<?= $tarea->getIdTarea() ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminar esta tarea?')">Eliminar</a>
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