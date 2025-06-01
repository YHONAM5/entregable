<?php
// modelos/Tarea.php

class Tarea {
    private $id_tarea;
    private $id_proyecto;
    private $id_usuario;
    private $nombre_tarea;
    private $descripcion;
    private $fecha_inicio;
    private $fecha_fin;
    private $prioridad;
    private $estado;

    public function __construct(
        $id_tarea = null,
        $id_proyecto = null,
        $id_usuario = null,
        $nombre_tarea = null,
        $descripcion = null,
        $fecha_inicio = null,
        $fecha_fin = null,
        $prioridad = null,
        $estado = null
    ) {
        $this->id_tarea = $id_tarea;
        $this->id_proyecto = $id_proyecto;
        $this->id_usuario = $id_usuario;
        $this->nombre_tarea = $nombre_tarea;
        $this->descripcion = $descripcion;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->prioridad = $prioridad;
        $this->estado = $estado;
    }

    // Getters
    public function getIdTarea() { 
        return $this->id_tarea; 
    }
    public function getIdProyecto() { 
        return $this->id_proyecto; 
    }
    public function getIdUsuario() { 
        return $this->id_usuario; 
    }
    public function getNombreTarea() { 
        return $this->nombre_tarea; 
    }
    public function getDescripcion() { 
        return $this->descripcion; 
    }
    public function getFechaInicio() { 
        return $this->fecha_inicio; 
    }
    public function getFechaFin() { 
        return $this->fecha_fin; 
    }
    public function getPrioridad() { 
        return $this->prioridad; 
    }
    public function getEstado() { 
        return $this->estado; 
    }

    // Setters
    public function setIdTarea($id_tarea) { $this->id_tarea = $id_tarea; }
    public function setIdProyecto($id_proyecto) { $this->id_proyecto = $id_proyecto; }
    public function setIdUsuario($id_usuario) { $this->id_usuario = $id_usuario; }
    public function setNombreTarea($nombre_tarea) { $this->nombre_tarea = $nombre_tarea; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function setFechaInicio($fecha_inicio) { $this->fecha_inicio = $fecha_inicio; }
    public function setFechaFin($fecha_fin) { $this->fecha_fin = $fecha_fin; }
    public function setPrioridad($prioridad) { $this->prioridad = $prioridad; }
    public function setEstado($estado) { $this->estado = $estado; }
}
