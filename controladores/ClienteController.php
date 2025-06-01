<?php

//require_once '../modelos/Cliente.php';
require_once 'modelos/ClienteModel.php';

class ClienteController {
    private $clienteModel;

    public function __construct() {
        $this->clienteModel = new ClienteModel();
    }

    // Listar todos los clientesii
    public function listar() {
        $clientes = $this->clienteModel->listarClientes();
        include './vistas/CargarClientes.php';
    }

    public function mostrarFormularioRegistro() {
        include 'vistas/RegistroCliente.php';
    }

    // Insertar nuevo cliente
    public function insertar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente = new Cliente();
            $cliente->setNombre($_POST['nombre']);
            $cliente->setEmail($_POST['email']);
            $cliente->setTelefono($_POST['telefono']);
            $cliente->setDireccion($_POST['direccion']);
            $cliente->setRuc($_POST['ruc']);
            $cliente->setEstado($_POST['estado']);

            $this->clienteModel->insertarCliente($cliente);
            //header("Location: index.php?accion=listar");
            header("Location: index.php?entidad=cliente&accion=listar");
            exit;
        }
    }

    // Cargar datos para editar
    public function editar($id) {
        $cliente = $this->clienteModel->obtenerClientePorId($id);
        include 'vistas/EditarCliente.php';
    }

    // Guardar actualización
    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente = new Cliente();
            $cliente->setNombre($_POST['nombre']);
            $cliente->setEmail($_POST['email']);
            $cliente->setTelefono($_POST['telefono']);
            $cliente->setDireccion($_POST['direccion']);
            $cliente->setRuc($_POST['ruc']);
            $cliente->setEstado($_POST['estado']);
            $cliente->setIdCliente($_POST['id_cliente']);

            $this->clienteModel->actualizarCliente($cliente);
            //header("Location: index.php?accion=listar");
            header("Location: index.php?entidad=cliente&accion=listar");
            exit;
        }
    }

    // Eliminar cliente
    public function eliminar($id) {
        $this->clienteModel->eliminarCliente($id);
        //header("Location: index.php?accion=listar"); //->primera version
        header("Location: index.php?entidad=cliente&accion=listar");
        exit;
    }
}
