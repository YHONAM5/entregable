<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/entregable/publico/css/style.css">
    <title>Registrar Nueva Tarea</title>
</head>
<body class="app-container">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">Registrar Nueva Tarea</h1>
        </header>

        <section class="form-section">
            <form action="index.php?entidad=tarea&accion=insertar" method="POST" class="form">
                <div class="form-group">
                    <label for="id_proyecto" class="form-label">ID Proyecto:</label>
                    <input type="number" name="id_proyecto" id="id_proyecto" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="id_usuario" class="form-label">ID Usuario Responsable:</label>
                    <input type="number" name="id_usuario" id="id_usuario" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="nombre_tarea" class="form-label">Nombre de la Tarea:</label>
                    <input type="text" name="nombre_tarea" id="nombre_tarea" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" rows="4" class="form-textarea"></textarea>
                </div>

                <div class="form-group">
                    <label for="fecha_inicio" class="form-label">Fecha de Inicio:</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                </div>

                <div class="form-group">
                    <label for="fecha_fin" class="form-label">Fecha de Fin:</label>
                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control">
                </div>

                <div class="form-group">
                    <label for="prioridad" class="form-label">Prioridad:</label>
                    <select name="prioridad" id="prioridad" class="form-select">
                        <option value="Bajo">Bajo</option>
                        <option value="Medio" selected>Medio</option>
                        <option value="Alto">Alto</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="estado" class="form-label">Estado:</label>
                    <select name="estado" id="estado" class="form-select">
                        <option value="Pendiente">Pendiente</option>
                        <option value="En progreso">En progreso</option>
                        <option value="Planificado">Planificado</option>
                        <option value="Finalizado">Finalizado</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Registrar Tarea</button>
                    <a href="index.php?entidad=tarea&accion=listar" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </section>
    </div>
</body>
</html>