<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="/entregable/publico/css/style.css">
</head>
<body class="app-container">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">Editar Tarea</h1>
        </header>

        <section class="form-section">
            <form action="index.php?entidad=tarea&accion=actualizar" method="POST" class="form">
                <input type="hidden" name="id_tarea" value="<?= htmlspecialchars($tarea->getIdTarea()) ?>">

                <div class="form-group">
                    <label for="id_proyecto">ID Proyecto:</label>
                    <input type="number" name="id_proyecto" id="id_proyecto" value="<?= htmlspecialchars($tarea->getIdProyecto()) ?>" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="id_usuario">ID Usuario Responsable:</label>
                    <input type="number" name="id_usuario" id="id_usuario" value="<?= htmlspecialchars($tarea->getIdUsuario()) ?>" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="nombre_tarea">Nombre de la Tarea:</label>
                    <input type="text" name="nombre_tarea" id="nombre_tarea" value="<?= htmlspecialchars($tarea->getNombreTarea()) ?>" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" rows="4" class="form-textarea"><?= htmlspecialchars($tarea->getDescripcion()) ?></textarea>
                </div>

                <div class="form-group">
                    <label for="fecha_inicio">Fecha de Inicio:</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" value="<?= htmlspecialchars($tarea->getFechaInicio()) ?>" class="form-input">
                </div>

                <div class="form-group">
                    <label for="fecha_fin">Fecha de Fin:</label>
                    <input type="date" name="fecha_fin" id="fecha_fin" value="<?= htmlspecialchars($tarea->getFechaFin()) ?>" class="form-input">
                </div>

                <div class="form-group">
                    <label for="prioridad">Prioridad:</label>
                    <select name="prioridad" id="prioridad" class="form-select">
                        <option value="Bajo" <?= $tarea->getPrioridad() == 'Bajo' ? 'selected' : '' ?>>Bajo</option>
                        <option value="Medio" <?= $tarea->getPrioridad() == 'Medio' ? 'selected' : '' ?>>Medio</option>
                        <option value="Alto" <?= $tarea->getPrioridad() == 'Alto' ? 'selected' : '' ?>>Alto</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" id="estado" class="form-select">
                        <option value="Pendiente" <?= $tarea->getEstado() == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
                        <option value="En progreso" <?= $tarea->getEstado() == 'En progreso' ? 'selected' : '' ?>>En progreso</option>
                        <option value="Planificado" <?= $tarea->getEstado() == 'Planificado' ? 'selected' : '' ?>>Planificado</option>
                        <option value="Finalizado" <?= $tarea->getEstado() == 'Finalizado' ? 'selected' : '' ?>>Finalizado</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="index.php?entidad=tarea&accion=listar" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </section>
    </div>
</body>
</html>