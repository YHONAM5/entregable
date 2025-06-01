<?php
// modelos/TareaModel.php

require_once './configuraciones/DB.php';
require_once 'modelos/Tarea.php';

class TareaModel {
    private $conexion;

    public function __construct() {
        $this->conexion = DB::getInstancia()->getConexion();
    }

    // Insertar nueva tarea
    public function insertarTarea(Tarea $tarea) {
        $sql = "INSERT INTO tareas (id_proyecto, id_usuario, nombre_tarea, descripcion, fecha_inicio, fecha_fin, prioridad, estado)
                VALUES (:id_proyecto, :id_usuario, :nombre_tarea, :descripcion, :fecha_inicio, :fecha_fin, :prioridad, :estado)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id_proyecto', $tarea->getIdProyecto());
        $stmt->bindValue(':id_usuario', $tarea->getIdUsuario());
        $stmt->bindValue(':nombre_tarea', $tarea->getNombreTarea());
        $stmt->bindValue(':descripcion', $tarea->getDescripcion());
        $stmt->bindValue(':fecha_inicio', $tarea->getFechaInicio());
        $stmt->bindValue(':fecha_fin', $tarea->getFechaFin());
        $stmt->bindValue(':prioridad', $tarea->getPrioridad());
        $stmt->bindValue(':estado', $tarea->getEstado());
        $stmt->execute();
    }

    // Listar todas las tareas
    public function listarTareas() {
        $tareas = [];
        $sql = "SELECT * FROM tareas";
        $stmt = $this->conexion->query($sql);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tarea = new Tarea(
                $row['id_tarea'],
                $row['id_proyecto'],
                $row['id_usuario'],
                $row['nombre_tarea'],
                $row['descripcion'],
                $row['fecha_inicio'],
                $row['fecha_fin'],
                $row['prioridad'],
                $row['estado']
            );
            $tareas[] = $tarea;
        }

        return $tareas;
    }

    // Obtener tarea por ID
    public function obtenerTareaPorId($id) {
        $sql = "SELECT * FROM tareas WHERE id_tarea = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Tarea(
                $row['id_tarea'],
                $row['id_proyecto'],
                $row['id_usuario'],
                $row['nombre_tarea'],
                $row['descripcion'],
                $row['fecha_inicio'],
                $row['fecha_fin'],
                $row['prioridad'],
                $row['estado']
            );
        }

        return null;
    }

    // Actualizar tarea
    public function actualizarTarea(Tarea $tarea) {
        $sql = "UPDATE tareas SET 
                    id_proyecto = :id_proyecto,
                    id_usuario = :id_usuario,
                    nombre_tarea = :nombre_tarea,
                    descripcion = :descripcion,
                    fecha_inicio = :fecha_inicio,
                    fecha_fin = :fecha_fin,
                    prioridad = :prioridad,
                    estado = :estado
                WHERE id_tarea = :id_tarea";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id_proyecto', $tarea->getIdProyecto());
        $stmt->bindValue(':id_usuario', $tarea->getIdUsuario());
        $stmt->bindValue(':nombre_tarea', $tarea->getNombreTarea());
        $stmt->bindValue(':descripcion', $tarea->getDescripcion());
        $stmt->bindValue(':fecha_inicio', $tarea->getFechaInicio());
        $stmt->bindValue(':fecha_fin', $tarea->getFechaFin());
        $stmt->bindValue(':prioridad', $tarea->getPrioridad());
        $stmt->bindValue(':estado', $tarea->getEstado());
        $stmt->bindValue(':id_tarea', $tarea->getIdTarea());

        return $stmt->execute();
    }

    // Eliminar tarea
    public function eliminarTarea($id) {
        $sql = "DELETE FROM tareas WHERE id_tarea = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}
