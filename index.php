<?php
session_start();

$entidad = $_GET['entidad'] ?? null;
$accion = $_GET['accion'] ?? null;
$esAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';

$libreAcceso = $entidad === 'usuario' && in_array($accion, ['login', 'registrar']);
$usuarioAutenticado = isset($_SESSION['usuario']);

if (!$usuarioAutenticado && !$libreAcceso) {
    header("Location: index.php?entidad=usuario&accion=login");
    exit;
}

// Si es una petición AJAX, no incluir plantilla
if ($entidad && $accion) {
    $nombreControlador = ucfirst($entidad) . 'Controller';
    $archivoControlador = "controladores/{$nombreControlador}.php";
    if (file_exists($archivoControlador)) {
        require_once $archivoControlador;
        $controlador = new $nombreControlador();
        $id = $_GET['id'] ?? null;
        $id ? $controlador->$accion($id) : $controlador->$accion();
        exit; // Evita que cargue Principal.php también
    } else {
        echo "<p>Entidad '$entidad' no encontrada.</p>";
        exit;
    }
}

// Si no es AJAX, carga el layout normalmente
if ($usuarioAutenticado) {
    include 'vistas/Principal.php';
}
