<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="/entregable/publico/css/style.css">
</head>
<body class="app-container">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">Lista de Usuarios</h1>
        </header>

        <section class="actions-section">
            <a href="index.php" class="btn btn-primary">🏚️Inicio</a>
            <a href="reportes/ReporteUsuarios.php" target="_blank" class="btn btn-secondary">Exportar PDF</a>
        </section>

        <section class="table-section">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Activo</th>
                        <th>Último Login</th>
                        <th>Fecha Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $u): ?>
                        <tr>
                            <td><?= $u->getIdUsuario() ?></td>
                            <td><?= $u->getUsername() ?></td>
                            <td><?= $u->getNombre() ?></td>
                            <td><?= $u->getApellido() ?></td>
                            <td><?= $u->getEmail() ?></td>
                            <td><?= $u->getRol() ?></td>
                            <td><?= $u->getActivo() ? 'Sí' : 'No' ?></td>
                            <td><?= $u->getUltimoLogin() ?></td>
                            <td><?= $u->getFechaRegistro() ?></td>
                            <td>
                                <a href="index.php?entidad=usuario&accion=editar&id=<?= $u->getIdUsuario() ?>" class="btn btn-primary btn-sm">Editar</a>
                                <!--<a href="index.php?entidad=usuario&accion=eliminar&id=<?= $u->getIdUsuario() ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</a>-->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>