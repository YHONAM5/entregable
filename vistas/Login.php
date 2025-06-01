<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            width: 300px;
        }
        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 0.7rem;
            margin: 0.5rem 0;
            border-radius: 5px;
            border: 1px solid #aaa;
        }
        button {
            width: 100%;
            padding: 0.7rem;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .error {
            color: red;
            margin-bottom: 1rem;
            text-align: center;
        }
        .exito {
            color: green;
            margin-bottom: 1rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Iniciar Sesión</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (isset($mensajeExito)): ?>
            <div class="exito"><?= htmlspecialchars($mensajeExito) ?></div>
        <?php endif; ?>

        <form action="index.php?entidad=usuario&accion=login" method="POST">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
        </form>
        <p style="text-align: center; margin-top: 1rem;">
            ¿No tienes una cuenta? 
            <a href="index.php?entidad=usuario&accion=registrar">Regístrate aquí</a>
        </p>
    </div>
</body>
</html>
