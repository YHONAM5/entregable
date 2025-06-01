<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/entregable/publico/css/style.css">
    <title>Registrar Proyecto</title>
</head>
<body class="app-container">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">Registrar Nuevo Proyecto</h1>
        </header>

        <section class="form-section">
            <form action="index.php?entidad=proyecto&accion=insertar" method="POST" class="form">
                <div class="form-group">
                    <label for="id_cliente" class="form-label">ID Cliente:</label>
                    <input type="number" name="id_cliente" id="id_cliente" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="id_responsable" class="form-label">ID Responsable (Usuario):</label>
                    <input type="number" name="id_responsable" id="id_responsable" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre del Proyecto:</label>
                    <input type="text" name="nombre" id="nombre" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" rows="4" class="form-textarea"></textarea>
                </div>

                <div class="form-group">
                    <label for="fecha_inicio" class="form-label">Fecha de Inicio:</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="fecha_fin" class="form-label">Fecha de Fin:</label>
                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control">
                </div>

                <div class="form-group">
                    <label for="presupuesto" class="form-label">Presupuesto (S/):</label>
                    <input type="number" name="presupuesto" id="presupuesto" step="0.01" class="form-control">
                </div>

                <div class="form-group">
                    <label for="estado" class="form-label">Estado:</label>
                    <select name="estado" id="estado" class="form-select">
                        <option value="Pendiente">Pendiente</option>
                        <option value="En proceso">En proceso</option>
                        <option value="En espera">En espera</option>
                        <option value="En pruebas">En pruebas</option>
                        <option value="Finalizado">Finalizado</option>
                        <option value="Cancelado">Cancelado</option>
                        <option value="Archivado">Archivado</option>
                        <option value="Rechazado">Rechazado</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Registrar Proyecto</button>
                    <a href="index.php?entidad=proyecto&accion=listar" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </section>
    </div>
</body>
</html>