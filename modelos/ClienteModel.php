<?php
// modelos/ClienteModel.php

require_once './configuraciones/DB.php';
require_once 'Cliente.php';

class ClienteModel {
    private $conexion;

    public function __construct() {
        $this->conexion = DB::getInstancia()->getConexion();
    }

    // Agregar cliente
    public function insertarCliente(Cliente $cliente) {
        $sql = "INSERT INTO clientes (nombre, email, telefono, direccion, ruc, estado)
                VALUES (:nombre, :email, :telefono, :direccion, :ruc, :estado)";
        $ps = $this->conexion->prepare($sql);
        $ps->bindValue(':nombre', $cliente->getNombre());
        $ps->bindValue(':email', $cliente->getEmail());
        $ps->bindValue(':telefono', $cliente->getTelefono());
        $ps->bindValue(':direccion', $cliente->getDireccion());
        $ps->bindValue(':ruc', $cliente->getRuc());
        $ps->bindValue(':estado', $cliente->getEstado());
        return $ps->execute();
    }

    // Obtener todos los clientes
    public function listarClientes() {
        $clientes = [];
        $sql = "SELECT * FROM clientes";
        $ps = $this->conexion->prepare($sql);
        $ps->execute();

        
        while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
            $cliente = new Cliente(
                $row['id_cliente'],
                $row['nombre'],
                $row['email'],
                $row['telefono'],
                $row['direccion'],
                $row['ruc'],
                $row['fecha_registro'],
                $row['estado']
            );
            $clientes[] = $cliente;
        }

        return $clientes;
    }

    // Obtener un cliente por ID
    public function obtenerClientePorId($id) {
        $sql = "SELECT * FROM clientes WHERE id_cliente = :id";
        $ps = $this->conexion->prepare($sql);
        $ps->bindValue(':id', $id);
        $ps->execute();
        $row = $ps->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Cliente(
                $row['id_cliente'],
                $row['nombre'],
                $row['email'],
                $row['telefono'],
                $row['direccion'],
                $row['ruc'],
                $row['fecha_registro'],
                $row['estado']
            );
        }
        return null;
    }

    // Actualizar cliente
    public function actualizarCliente(Cliente $cliente) {
        $sql = "UPDATE clientes SET 
                    nombre = :nombre,
                    email = :email,
                    telefono = :telefono,
                    direccion = :direccion,
                    ruc = :ruc,
                    estado = :estado
                WHERE id_cliente = :id";
        $ps = $this->conexion->prepare($sql);
        $ps->bindValue(':nombre', $cliente->getNombre());
        $ps->bindValue(':email', $cliente->getEmail());
        $ps->bindValue(':telefono', $cliente->getTelefono());
        $ps->bindValue(':direccion', $cliente->getDireccion());
        $ps->bindValue(':ruc', $cliente->getRuc());
        $ps->bindValue(':estado', $cliente->getEstado());
        $ps->bindValue(':id', $cliente->getIdCliente());

        $ps->execute();
    }

    // Eliminar cliente
    public function eliminarCliente($id) {
        $sql = "DELETE FROM clientes WHERE id_cliente = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}
