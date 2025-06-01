<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/entregable/publico/css/style.css">
    <title>Registrar Usuario</title>
</head>
<body class="app-container">
    <div class="container">
        <div class="auth-box">
            <header class="page-header">
                <h1 class="page-title">Registrar Nuevo Usuario</h1>
            </header>

            <section class="form-section">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

                <form action="index.php?entidad=usuario&accion=registrar" method="POST" class="form">
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Usuario" required class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" placeholder="Contraseña" required class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" placeholder="Correo electrónico" required class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="nombre" placeholder="Nombre" required class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="apellido" placeholder="Apellido" required class="form-control">
                    </div>

                    <div class="form-group">
                        <select name="rol" class="form-select">
                            <option value="Empleado" selected>Empleado</option>
                            <option value="Administrador">Administrador</option>
                        </select>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                    </div>
                </form>

                <div class="auth-link">
                    <a href="index.php?entidad=usuario&accion=login" class="btn btn-link">¿Ya tienes cuenta? Inicia sesión</a>
                </div>
            </section>
        </div>
    </div>
</body>
</html>