<?php

class Cliente {
    private $id_cliente;
    private $nombre;
    private $email;
    private $telefono;
    private $direccion;
    private $ruc;
    private $fecha_registro;
    private $estado;

    // Constructor de la clase Cliente con valores por defecto
    // Puedes pasar los valores al constructor o dejarlos como null
    public function __construct($idCliente = null, $nombre=null, $email=null, $telefono=null, $direccion =null, $ruc =null, $fechaRegistro=null, $estado=null) {
        $this->id_cliente = $idCliente;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->ruc = $ruc;
        $this->fecha_registro = $fechaRegistro;
        $this->estado = $estado;
    }

    //funciones para obtener los datos del cliente
    public function getIdCliente() {
         return $this->id_cliente;
    }
    public function getNombre() { 
        return $this->nombre; 
    }
    public function getEmail() {
        return $this->email; 
    }
    public function getTelefono() { 
        return $this->telefono; 
    }
    public function getDireccion() { 
        return $this->direccion; 
    }
    public function getRuc() { 
        return $this->ruc; 
    }
    public function getFechaRegistro() {
        return $this->fecha_registro; 
    }
    public function getEstado() { 
        return $this->estado; 
    }

    //funciones para establecer los datos 
    public function setIdCliente($idCliente) { 
        $this->id_cliente = $idCliente; 
    }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setEmail($email) { $this->email = $email; }
    public function setTelefono($telefono) { $this->telefono = $telefono; }
    public function setDireccion($direccion) { $this->direccion = $direccion; }
    public function setRuc($ruc) { $this->ruc = $ruc; }
    public function setFechaRegistro($fechaRegistro) { $this->fecha_registro = $fechaRegistro; }
    public function setEstado($estado) { $this->estado = $estado; }
}
