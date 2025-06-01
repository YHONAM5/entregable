<?php

require_once 'modelos/Proyecto.php';
require_once 'modelos/ProyectoModel.php';

class ProyectoController {
    private $proyectoModel;

    public function __construct() {
        $this->proyectoModel = new ProyectoModel();
    }

    // Listar proyectos
    public function listar() {
        $proyectos = $this->proyectoModel->listarProyectos();
        include 'vistas/CargarProyectos.php';
    }

    // Mostrar formulario para nuevo proyecto
    public function mostrarFormularioRegistro() {
        include 'vistas/RegistroProyecto.php';
    }

    // Insertar nuevo proyecto
    public function insertar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $proyecto = new Proyecto();
            $proyecto->setIdCliente($_POST['id_cliente']);
            $proyecto->setIdResponsable($_POST['id_responsable']);
            $proyecto->setNombre($_POST['nombre']);
            $proyecto->setDescripcion($_POST['descripcion']);
            $proyecto->setFechaInicio($_POST['fecha_inicio']);
            $proyecto->setFechaFin($_POST['fecha_fin']);
            $proyecto->setPresupuesto($_POST['presupuesto']);
            $proyecto->setEstado($_POST['estado']);

            $this->proyectoModel->insertarProyecto($proyecto);
            header("Location: index.php?entidad=proyecto&accion=listar");
            exit;
        }
    }

    // Mostrar formulario para editar
    public function editar($id) {
        $proyecto = $this->proyectoModel->obtenerProyectoPorId($id);
        include 'vistas/EditarProyecto.php';
    }

    // Actualizar proyecto
    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $proyecto = new Proyecto();
            $proyecto->setIdProyecto($_POST['id_proyecto']);
            $proyecto->setIdCliente($_POST['id_cliente']);
            $proyecto->setIdResponsable($_POST['id_responsable']);
            $proyecto->setNombre($_POST['nombre']);
            $proyecto->setDescripcion($_POST['descripcion']);
            $proyecto->setFechaInicio($_POST['fecha_inicio']);
            $proyecto->setFechaFin($_POST['fecha_fin']);
            $proyecto->setPresupuesto($_POST['presupuesto']);
            $proyecto->setEstado($_POST['estado']);

            $this->proyectoModel->actualizarProyecto($proyecto);
            header("Location: index.php?entidad=proyecto&accion=listar");
            exit;
        }
    }

    // Eliminar proyecto
    public function eliminar($id) {
        $this->proyectoModel->eliminarProyecto($id);
        header("Location: index.php?entidad=proyecto&accion=listar");
        exit;
    }
}
