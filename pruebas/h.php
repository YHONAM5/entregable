<?php
session_start(); // Iniciar sesión

$entidad = $_GET['entidad'] ?? null;
$accion = $_GET['accion'] ?? null;

// Permitir acceso sin login solo a login y registro
$libreAcceso = $entidad === 'usuario' && in_array($accion, ['login', 'registrar']);

// Verificar si el usuario ha iniciado sesion
$usuarioAutenticado = isset($_SESSION['usuario']);

// si no se autentica y no es una acción libre, redirigir al login
if (!$usuarioAutenticado && !$libreAcceso) {
    header("Location: index.php?entidad=usuario&accion=login");
    exit;
}

//
// se filtra primero el acceso a la vista principal
//si es un usuario autenticado entonces se muestra la vista principal
if ($usuarioAutenticado) {
    include 'vistas/Principal.php';
}

// ejecuta todas las acciones de todas la entidades que se hagan definido en la url y en la pp
if ($entidad && $accion) {
    $nombreControlador = ucfirst($entidad) . 'Controller';
    $archivoControlador = "controladores/{$nombreControlador}.php";
    if (file_exists($archivoControlador)) {
        require_once $archivoControlador;
        $controlador = new $nombreControlador();
        if (method_exists($controlador, $accion)) {
            $id = $_GET['id'] ?? null;
            $id ? $controlador->$accion($id) : $controlador->$accion();
        } else {
            echo "<p>Acción '$accion' no válida para '$entidad'.</p>";
        }
    } else {
        echo "<p>Entidad '$entidad' no encontrada.</p>";
    }
}
?>
