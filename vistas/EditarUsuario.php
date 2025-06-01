<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="/entregable/publico/css/style.css">
</head>
<body class="app-container">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">Editar Usuario</h1>
        </header>

        <section class="form-section">
            <form action="index.php?entidad=usuario&accion=editar&id=<?= $usuario->getIdUsuario() ?>" method="POST" class="form">
                <input type="hidden" name="id" value="<?= $usuario->getIdUsuario() ?>">

                <div class="form-group">
                    <label for="username">Nombre de usuario:</label>
                    <input type="text" name="username" id="username" value="<?= $usuario->getUsername() ?>" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" name="email" id="email" value="<?= $usuario->getEmail() ?>" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="<?= $usuario->getNombre() ?>" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" id="apellido" value="<?= $usuario->getApellido() ?>" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="rol">Rol:</label>
                    <select name="rol" id="rol" class="form-select">
                        <option value="Empleado" <?= $usuario->getRol() === 'Empleado' ? 'selected' : '' ?>>Empleado</option>
                        <option value="Administrador" <?= $usuario->getRol() === 'Administrador' ? 'selected' : '' ?>>Administrador</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="activo">Estado:</label>
                    <select name="activo" id="activo" class="form-select">
                        <option value="1" <?= $usuario->getActivo() ? 'selected' : '' ?>>Activo</option>
                        <option value="0" <?= !$usuario->getActivo() ? 'selected' : '' ?>>Inactivo</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="index.php?entidad=usuario&accion=listar" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </section>
    </div>
</body>
</html>