<?php
require_once 'modelos/UsuarioModel.php';
require_once 'modelos/Usuario.php';

class UsuarioController {
    private $usuarioModel;

    public function __construct() {
        // Inicia sesión para login y control de acceso
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->usuarioModel = new UsuarioModel();
    }

    // Acción para iniciar sesión
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $usuario = $this->usuarioModel->verificarCredenciales($username, $password);

            if ($usuario) {
                $_SESSION['usuario'] = [
                    'id' => $usuario->getIdUsuario(),
                    'username' => $usuario->getUsername(),
                    'rol' => $usuario->getRol()
                ];
                header("Location: index.php");
                exit();
            } else {
                $error = "Credenciales inválidas.";
                require 'vistas/Login.php';
            }
        } else {
            require 'vistas/Login.php';
        }
    }

    // Acción para cerrar sesión
    public function logout() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    session_unset();       // Limpia las variables de sesión
    session_destroy();     // Destruye la sesión actual

    header("Location: index.php?entidad=usuario&accion=login");
    exit;
    }

    private function esAdministrador() {
        return isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] === 'Administrador';
    }

        // Acción para registrar nuevo usuario
    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = new Usuario();
            $usuario->setUsername($_POST['username']);
            $usuario->setPasswd($_POST['password']);
            $usuario->setEmail($_POST['email']);
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellido($_POST['apellido']);
            $usuario->setRol($_POST['rol'] ?? 'Empleado');
            $usuario->setActivo(1);

            try {
                $this->usuarioModel->registrarUsuario($usuario);
                $mensajeExito = "Usuario registrado correctamente. Puedes iniciar sesión.";
                require 'vistas/Login.php'; // Redirige al login con mensaje
            } catch (PDOException $e) {
                if (str_contains($e->getMessage(), 'Duplicate')) {
                    $error = "El nombre de usuario o el correo ya está en uso.";
                } else {
                    $error = "Error al registrar usuario: " . $e->getMessage();
                }
                require 'vistas/RegistroUsuario.php'; // Vuelve al formulario con error
            }
        } else {
                require 'vistas/RegistroUsuario.php';
        }
    }
    // Acción para listar todos los usuarios
    public function listar() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?entidad=usuario&accion=login");
            exit;
        }
        if (!$this->esAdministrador()) {
            echo "<p>No tienes permisos para ver esta sección.</p>";
            return;
        }

        $usuarios = $this->usuarioModel->obtenerTodos();
        require 'vistas/CargarUsuarios.php';
    }
    // Acción para editar un usuario
    public function editar($id) {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?entidad=usuario&accion=login");
            exit;
        }
        if (!$this->esAdministrador()) {
            echo "<p>No tienes permisos para editar usuarios.</p>";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = new Usuario();
            $usuario->setIdUsuario($id);
            $usuario->setUsername($_POST['username']);
            $usuario->setEmail($_POST['email']);
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellido($_POST['apellido']);
            $usuario->setRol($_POST['rol']);
            $usuario->setActivo($_POST['activo']);

            $this->usuarioModel->actualizarUsuario($usuario);
            header("Location: index.php?entidad=usuario&accion=listar");
        } else {
            $usuario = $this->usuarioModel->obtenerPorId($id);
            require 'vistas/EditarUsuario.php';
        }
    }
    // Acción para eliminar un usuario
    // Esta acción no estará disponible ya que al eliminar un usuario, se eliminarán todos sus datos asociados.
    // Pero se deja aquí como referencia para futuras mejoras o si se decide implementar una lógica de eliminación suave.
    public function eliminar($id) {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?entidad=usuario&accion=login");
            exit;
        }
        if (!$this->esAdministrador()) {
            echo "<p>No tienes permisos para eliminar usuarios.</p>";
            return;
        }

        $this->usuarioModel->eliminarUsuario($id);
        header("Location: index.php?entidad=usuario&accion=listar");
    }
}
