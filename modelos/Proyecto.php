<?php
// modelos/Proyecto.php

class Proyecto {
    private $id_proyecto;
    private $id_cliente;
    private $id_responsable;
    private $nombre;
    private $descripcion;
    private $fecha_inicio;
    private $fecha_fin;
    private $presupuesto;
    private $estado;

    public function __construct(
        $id_proyecto = null,
        $id_cliente = null,
        $id_responsable = null,
        $nombre = null,
        $descripcion = null,
        $fecha_inicio = null,
        $fecha_fin = null,
        $presupuesto = null,
        $estado = null
    ) {
        $this->id_proyecto = $id_proyecto;
        $this->id_cliente = $id_cliente;
        $this->id_responsable = $id_responsable;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->presupuesto = $presupuesto;
        $this->estado = $estado;
    }

    
    public function getIdProyecto() { 
        return $this->id_proyecto; 
    }
    public function getIdCliente() { 
        return $this->id_cliente; 
    }
    public function getIdResponsable() { 
        return $this->id_responsable; 
    }
    public function getNombre() { 
        return $this->nombre; 
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
    public function getPresupuesto() { 
        return $this->presupuesto; }
    public function getEstado() { 
        return $this->estado; 
    }


    public function setIdProyecto($id_proyecto) { 
        $this->id_proyecto = $id_proyecto; 
    }
    public function setIdCliente($id_cliente) { 
        $this->id_cliente = $id_cliente; 
    }
    public function setIdResponsable($id_responsable) {
        $this->id_responsable = $id_responsable; 
    }
    public function setNombre($nombre) { 
        $this->nombre = $nombre; 
    }
    public function setDescripcion($descripcion) { 
        $this->descripcion = $descripcion; 
    }
    public function setFechaInicio($fecha_inicio) { 
        $this->fecha_inicio = $fecha_inicio; 
    }
    public function setFechaFin($fecha_fin) { 
        $this->fecha_fin = $fecha_fin; 
    }
    public function setPresupuesto($presupuesto) { 
        $this->presupuesto = $presupuesto; 
    }
    public function setEstado($estado) { 
        $this->estado = $estado; 
    }
}
