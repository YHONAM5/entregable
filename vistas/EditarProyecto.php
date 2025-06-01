<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Proyecto</title>
    <link rel="stylesheet" href="/entregable/publico/css/style.css">
</head>
<body class="app-container">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">Editar Proyecto</h1>
        </header>

        <section class="form-section">
            <form action="index.php?entidad=proyecto&accion=actualizar" method="POST" class="form">
                <input type="hidden" name="id_proyecto" value="<?= htmlspecialchars($proyecto->getIdProyecto()) ?>">

                <div class="form-group">
                    <label for="id_cliente">ID Cliente:</label>
                    <input type="number" name="id_cliente" id="id_cliente" value="<?= htmlspecialchars($proyecto->getIdCliente()) ?>" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="id_responsable">ID Responsable (Usuario):</label>
                    <input type="number" name="id_responsable" id="id_responsable" value="<?= htmlspecialchars($proyecto->getIdResponsable()) ?>" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre del Proyecto:</label>
                    <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($proyecto->getNombre()) ?>" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" rows="4" class="form-textarea"><?= htmlspecialchars($proyecto->getDescripcion()) ?></textarea>
                </div>

                <div class="form-group">
                    <label for="fecha_inicio">Fecha de Inicio:</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" value="<?= htmlspecialchars($proyecto->getFechaInicio()) ?>" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="fecha_fin">Fecha de Fin:</label>
                    <input type="date" name="fecha_fin" id="fecha_fin" value="<?= htmlspecialchars($proyecto->getFechaFin()) ?>" class="form-input">
                </div>

                <div class="form-group">
                    <label for="presupuesto">Presupuesto (S/):</label>
                    <input type="number" name="presupuesto" id="presupuesto" step="0.01" value="<?= htmlspecialchars($proyecto->getPresupuesto()) ?>" class="form-input">
                </div>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" id="estado" class="form-select">
                        <option value="Pendiente" <?= $proyecto->getEstado() == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
                        <option value="En proceso" <?= $proyecto->getEstado() == 'En proceso' ? 'selected' : '' ?>>En proceso</option>
                        <option value="En espera" <?= $proyecto->getEstado() == 'En espera' ? 'selected' : '' ?>>En espera</option>
                        <option value="En pruebas" <?= $proyecto->getEstado() == 'En pruebas' ? 'selected' : '' ?>>En pruebas</option>
                        <option value="Finalizado" <?= $proyecto->getEstado() == 'Finalizado' ? 'selected' : '' ?>>Finalizado</option>
                        <option value="Cancelado" <?= $proyecto->getEstado() == 'Cancelado' ? 'selected' : '' ?>>Cancelado</option>
                        <option value="Archivado" <?= $proyecto->getEstado() == 'Archivado' ? 'selected' : '' ?>>Archivado</option>
                        <option value="Rechazado" <?= $proyecto->getEstado() == 'Rechazado' ? 'selected' : '' ?>>Rechazado</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="index.php?entidad=proyecto&accion=listar" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </section>
    </div>
</body>
</html>