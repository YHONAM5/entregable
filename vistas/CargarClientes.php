<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Clientes</title>
    <link rel="stylesheet" href="/entregable/publico/css/style.css">
</head>
<body class="app-container">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">Clientes Registrados</h1>
        </header>

        <section class="actions-section">
            <!--<a href="index.php?accion=formulario" class="btn btn-primary">Registrar nuevo cliente</a>-->
            <a href="index.php" class="btn btn-primary">🏚️Inicio</a>
            <a href="index.php?entidad=cliente&accion=mostrarFormularioRegistro" class="btn btn-primary">Registrar nuevo cliente</a>
            <a href="../reportes/ReporteClientes.php" class="btn btn-secondary">realizar reporte</a>
            
        </section>

        <section class="table-section">
            <?php if (empty($clientes)) : ?>
                <p>No hay clientes registrados.</p>
            <?php else : ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>RUC</th>
                            <th>Estado</th>
                            <th>Fecha Registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $cliente) : ?>
                            <tr>
                                <td><?= htmlspecialchars($cliente->getIdCliente()) ?></td>
                                <td><?= htmlspecialchars($cliente->getNombre()) ?></td>
                                <td><?= htmlspecialchars($cliente->getEmail()) ?></td>
                                <td><?= htmlspecialchars($cliente->getTelefono()) ?></td>
                                <td><?= htmlspecialchars($cliente->getDireccion()) ?></td>
                                <td><?= htmlspecialchars($cliente->getRuc()) ?></td>
                                <td><?= htmlspecialchars($cliente->getEstado()) ?></td>
                                <td><?= htmlspecialchars($cliente->getFechaRegistro()) ?></td>
                                <td>
                                    <a href="index.php?entidad=cliente&accion=editar&id=<?= $cliente->getIdCliente() ?>" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="index.php?entidad=cliente&accion=eliminar&id=<?= $cliente->getIdCliente() ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</a>
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
