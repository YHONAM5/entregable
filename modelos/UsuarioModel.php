<?php
require_once 'configuraciones/DB.php';
require_once 'modelos/Usuario.php';

class UsuarioModel {
    private $db;

    public function __construct() {
        $this->db = DB::getInstancia()->getConexion();
    }

    // Verificar credenciales para login
    public function verificarCredenciales($username, $password) {
        $sql = "SELECT * FROM usuarios WHERE username = ? AND activo = 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && password_verify($password, $row['passwd'])) {
            // Actualizar último login
            $this->actualizarUltimoLogin($row['id_usuario']);

            // Retornar objeto Usuario
            $usuario = new Usuario();
            $usuario->setIdUsuario($row['id_usuario']);
            $usuario->setUsername($row['username']);
            $usuario->setPasswd($row['passwd']);
            $usuario->setEmail($row['email']);
            $usuario->setNombre($row['nombre']);
            $usuario->setApellido($row['apellido']);
            $usuario->setRol($row['rol']);
            $usuario->setFechaRegistro($row['fecha_registro']);
            $usuario->setUltimoLogin($row['ultimo_login']);
            $usuario->setActivo($row['activo']);

            return $usuario;
        }

        return false;
    }

    // Registrar nuevo usuario
    public function registrarUsuario(Usuario $usuario) {
        $sql = "INSERT INTO usuarios (username, passwd, email, nombre, apellido, rol, activo)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $usuario->getUsername(),
            password_hash($usuario->getPasswd(), PASSWORD_DEFAULT),
            $usuario->getEmail(),
            $usuario->getNombre(),
            $usuario->getApellido(),
            $usuario->getRol(),
            $usuario->getActivo()
        ]);
    }

    // Actualizar último login
    public function actualizarUltimoLogin($id_usuario) {
        $sql = "UPDATE usuarios SET ultimo_login = NOW() WHERE id_usuario = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id_usuario]);
    }

    // Obtener todos los usuarios (por ejemplo para admin)
    public function listarUsuarios() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar por ID
    public function obtenerUsuarioPorId($id_usuario) {
        $sql = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id_usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Eliminar (lógico) un usuario
    public function desactivarUsuario($id_usuario) {
        $sql = "UPDATE usuarios SET activo = 0 WHERE id_usuario = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id_usuario]);
    }

    
    public function obtenerTodos() {
    $stmt = $this->db->prepare("SELECT * FROM usuarios");
    $stmt->execute();
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $usuarios = [];
    foreach ($datos as $fila) {
        $usuario = new Usuario();
        $usuario->setIdUsuario($fila['id_usuario']);
        $usuario->setUsername($fila['username']);
        $usuario->setPasswd($fila['passwd']);
        $usuario->setEmail($fila['email']);
        $usuario->setNombre($fila['nombre']);
        $usuario->setApellido($fila['apellido']);
        $usuario->setRol($fila['rol']);
        $usuario->setFechaRegistro($fila['fecha_registro']);
        $usuario->setUltimoLogin($fila['ultimo_login']);
        $usuario->setActivo($fila['activo']);
        $usuarios[] = $usuario;
    }
        return $usuarios;
    }

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
        $stmt->execute([$id]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$fila) return null;

        $usuario = new Usuario();
        $usuario->setIdUsuario($fila['id_usuario']);
        $usuario->setUsername($fila['username']);
        $usuario->setPasswd($fila['passwd']);
        $usuario->setEmail($fila['email']);
        $usuario->setNombre($fila['nombre']);
        $usuario->setApellido($fila['apellido']);
        $usuario->setRol($fila['rol']);
        $usuario->setFechaRegistro($fila['fecha_registro']);
        $usuario->setUltimoLogin($fila['ultimo_login']);
        $usuario->setActivo($fila['activo']);
        return $usuario;
    }

    public function actualizarUsuario($usuario) {
        $stmt = $this->db->prepare("UPDATE usuarios SET username = ?, email = ?, nombre = ?, apellido = ?, rol = ?, activo = ? WHERE id_usuario = ?");
        return $stmt->execute([
            $usuario->getUsername(),
            $usuario->getEmail(),
            $usuario->getNombre(),
            $usuario->getApellido(),
            $usuario->getRol(),
            $usuario->getActivo(),
            $usuario->getIdUsuario()
        ]);
    }

    public function eliminarUsuario($id) {
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario = :id");
        $stmt->bindValue('id',$id);
        return $stmt->execute();
    }
}
