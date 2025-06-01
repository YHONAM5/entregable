<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="/entregable/publico/css/style.css">
</head>
<body>
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">Editar Cliente</h1>
        </header>

        <section class="form-section">
            <form action="index.php?entidad=cliente&accion=actualizar" method="POST" class="form">
                <input type="hidden" name="id_cliente" value="<?= htmlspecialchars($cliente->getIdCliente()) ?>">

                <div class="form-group">
                    <label for="nombre">Nombre:</label><br>
                    <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($cliente->getNombre()) ?>" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico:</label><br>
                    <input type="email" name="email" id="email" value="<?= htmlspecialchars($cliente->getEmail()) ?>" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label><br>
                    <input type="text" name="telefono" id="telefono" value="<?= htmlspecialchars($cliente->getTelefono()) ?>" class="form-input">
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección:</label><br>
                    <input type="text" name="direccion" id="direccion" value="<?= htmlspecialchars($cliente->getDireccion()) ?>" class="form-input">
                </div>

                <div class="form-group">
                    <label for="ruc">RUC:</label><br>
                    <input type="text" name="ruc" id="ruc" value="<?= htmlspecialchars($cliente->getRuc()) ?>" class="form-input">
                </div>

                <div class="form-group">
                    <label for="estado">Estado:</label><br>
                    <select name="estado" id="estado" class="form-select">
                        <option value="Activo" <?= $cliente->getEstado() == 'Activo' ? 'selected' : '' ?>>Activo</option>
                        <option value="Pendiente" <?= $cliente->getEstado() == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
                        <option value="Inactivo" <?= $cliente->getEstado() == 'Inactivo' ? 'selected' : '' ?>>Inactivo</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="index.php?entidad=cliente&accion=listar" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </section>
    </div>
</body>
</html>
