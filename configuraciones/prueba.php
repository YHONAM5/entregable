<?php
    require_once 'DB.php';
    $db = DB::getInstancia()->getConexion();
    $sql = "SELECT * FROM usuarios";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
        echo implode(" - ", array_values($usuario)) . "<br>";
        //echo implode(" - ", $usuario) . "<br>";
        //echo "ID: " . $usuario['id_usuario'] . " - username: " . $usuario['username'] .  " - password: " . $usuario['password_hasd'] .  " - Email: " . $usuario['email'] .  " - Nombre: " . $usuario['nombre'] .  " - Apellido: " . $usuario['apellido'] .  " - Rol: " . $usuario['rol'] .  " - fecha_registro: " . $usuario['fecha_registro'] .  " - Ultimo_Login: " . $usuario['ultimo_login'] .  " - Activo: " . $usuario['activo'] ."<br>";
    }
?>