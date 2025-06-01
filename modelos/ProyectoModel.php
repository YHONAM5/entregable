<?php
// modelos/ProyectoModel.php

require_once './configuraciones/DB.php';
require_once 'modelos/Proyecto.php';

class ProyectoModel {
    private $conexion;

    public function __construct() {
        $this->conexion = DB::getInstancia()->getConexion();
    }

    // Insertar nuevo proyecto
    public function insertarProyecto(Proyecto $proyecto) {
        $sql = "INSERT INTO proyectos (id_cliente, id_responsable, nombre, descripcion, fecha_inicio, fecha_fin, presupuesto, estado)
                VALUES (:id_cliente, :id_responsable, :nombre, :descripcion, :fecha_inicio, :fecha_fin, :presupuesto, :estado)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id_cliente', $proyecto->getIdCliente());
        $stmt->bindValue(':id_responsable', $proyecto->getIdResponsable());
        $stmt->bindValue(':nombre', $proyecto->getNombre());
        $stmt->bindValue(':descripcion', $proyecto->getDescripcion());
        $stmt->bindValue(':fecha_inicio', $proyecto->getFechaInicio());
        $stmt->bindValue(':fecha_fin', $proyecto->getFechaFin());
        $stmt->bindValue(':presupuesto', $proyecto->getPresupuesto());
        $stmt->bindValue(':estado', $proyecto->getEstado());
        $stmt->execute();
    }

    // Listar todos los proyectos
    public function listarProyectos() {
        $proyectos = [];
        $sql = "SELECT * FROM proyectos";
        $stmt = $this->conexion->query($sql);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $proyecto = new Proyecto(
                $row['id_proyecto'],
                $row['id_cliente'],
                $row['id_responsable'],
                $row['nombre'],
                $row['descripcion'],
                $row['fecha_inicio'],
                $row['fecha_fin'],
                $row['presupuesto'],
                $row['estado']
            );
            $proyectos[] = $proyecto;
        }

        return $proyectos;
    }

    // Obtener proyecto por ID
    public function obtenerProyectoPorId($id) {
        $sql = "SELECT * FROM proyectos WHERE id_proyecto = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Proyecto(
                $row['id_proyecto'],
                $row['id_cliente'],
                $row['id_responsable'],
                $row['nombre'],
                $row['descripcion'],
                $row['fecha_inicio'],
                $row['fecha_fin'],
                $row['presupuesto'],
                $row['estado']
            );
        }

        return null;
    }

    // Actualizar proyecto
    public function actualizarProyecto(Proyecto $proyecto) {
        $sql = "UPDATE proyectos SET
                    id_cliente = :id_cliente,
                    id_responsable = :id_responsable,
                    nombre = :nombre,
                    descripcion = :descripcion,
                    fecha_inicio = :fecha_inicio,
                    fecha_fin = :fecha_fin,
                    presupuesto = :presupuesto,
                    estado = :estado
                WHERE id_proyecto = :id_proyecto";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id_cliente', $proyecto->getIdCliente());
        $stmt->bindValue(':id_responsable', $proyecto->getIdResponsable());
        $stmt->bindValue(':nombre', $proyecto->getNombre());
        $stmt->bindValue(':descripcion', $proyecto->getDescripcion());
        $stmt->bindValue(':fecha_inicio', $proyecto->getFechaInicio());
        $stmt->bindValue(':fecha_fin', $proyecto->getFechaFin());
        $stmt->bindValue(':presupuesto', $proyecto->getPresupuesto());
        $stmt->bindValue(':estado', $proyecto->getEstado());
        $stmt->bindValue(':id_proyecto', $proyecto->getIdProyecto());
        $stmt->execute();
    }

    // Eliminar proyecto
    public function eliminarProyecto($id) {
        $sql = "DELETE FROM proyectos WHERE id_proyecto = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}
