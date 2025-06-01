<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/entregable/publico/css/style.css">
    <title>Registrar Cliente</title>
</head>
<body>
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">Registrar Nuevo Cliente</h1>
        </header>

        <section class="form-section">
            <form action="index.php?entidad=cliente&accion=insertar" method="POST" class="form">
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre:</label><br>
                    <input type="text" name="nombre" id="nombre" required class="form-control"><br><br>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Correo electrónico:</label><br>
                    <input type="email" name="email" id="email" required class="form-control"><br><br>
                </div>

                <div class="form-group">
                    <label for="telefono" class="form-label">Teléfono:</label><br>
                    <input type="text" name="telefono" id="telefono" class="form-control"><br><br>
                </div>

                <div class="form-group">
                    <label for="direccion" class="form-label">Dirección:</label><br>
                    <input type="text" name="direccion" id="direccion" class="form-control"><br><br>
                </div>

                <div class="form-group">
                    <label for="ruc" class="form-label">RUC:</label><br>
                    <input type="text" name="ruc" id="ruc" class="form-control"><br><br>
                </div>

                <div class="form-group">
                    <label for="estado" class="form-label">Estado:</label><br>
                    <select name="estado" id="estado" class="form-select">
                        <option value="Activo">Activo</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Inactivo">Inactivo</option>
                    </select><br><br>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Registrar Cliente</button>
                    <a href="index.php?entidad=cliente&accion=listar" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </section>
    </div>
</body>
</html>