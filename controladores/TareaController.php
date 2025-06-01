<?php
// controladores/TareaController.php

require_once 'modelos/Tarea.php';
require_once 'modelos/TareaModel.php';

class TareaController {
    private $tareaModel;

    public function __construct() {
        $this->tareaModel = new TareaModel();
    }

    // Listar tareas
    public function listar() {
        $tareas = $this->tareaModel->listarTareas();
        include 'vistas/CargarTareas.php';
    }

    // Mostrar formulario de registro
    public function mostrarFormularioRegistro() {
        include 'vistas/RegistroTarea.php';
    }

    // Insertar nueva tarea
    public function insertar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tarea = new Tarea();
            $tarea->setIdProyecto($_POST['id_proyecto']);
            $tarea->setIdUsuario($_POST['id_usuario']);
            $tarea->setNombreTarea($_POST['nombre_tarea']);
            $tarea->setDescripcion($_POST['descripcion']);
            $tarea->setFechaInicio($_POST['fecha_inicio']);
            $tarea->setFechaFin($_POST['fecha_fin']);
            $tarea->setPrioridad($_POST['prioridad']);
            $tarea->setEstado($_POST['estado']);

            $this->tareaModel->insertarTarea($tarea);
            header("Location: index.php?entidad=tarea&accion=listar");
            exit;
        }
    }

    // Mostrar formulario para editar
    public function editar($id) {
        $tarea = $this->tareaModel->obtenerTareaPorId($id);
        include 'vistas/EditarTarea.php';
    }

    // Guardar actualización
    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tarea = new Tarea();
            $tarea->setIdTarea($_POST['id_tarea']);
            $tarea->setIdProyecto($_POST['id_proyecto']);
            $tarea->setIdUsuario($_POST['id_usuario']);
            $tarea->setNombreTarea($_POST['nombre_tarea']);
            $tarea->setDescripcion($_POST['descripcion']);
            $tarea->setFechaInicio($_POST['fecha_inicio']);
            $tarea->setFechaFin($_POST['fecha_fin']);
            $tarea->setPrioridad($_POST['prioridad']);
            $tarea->setEstado($_POST['estado']);

            $this->tareaModel->actualizarTarea($tarea);
            header("Location: index.php?entidad=tarea&accion=listar");
            exit;
        }
    }

    // Eliminar tarea
    public function eliminar($id) {
        $this->tareaModel->eliminarTarea($id);
        header("Location: index.php?entidad=tarea&accion=listar");
        exit;
    }
}
