<?php
    class DB {
        private static $intancia = null;
        private $conexion;
        private $servidor = "localhost";
        private $usuario = "root";
        private $password = "";
        private $baseDatos = "gestion_proyectos";
        private $puerto;

        private function __construct(){
            try{
                $url = "mysql:host=" . $this->servidor . ";dbname=" . $this->baseDatos;
                $this->conexion = new PDO($url, $this->usuario, $this->password);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo "Error de conexion: " . $e->getMessage();
            }
        }
        public static function getInstancia(){
            if(self::$intancia == null){
                self::$intancia = new DB();
            }
            return self::$intancia;
        }
        public function getConexion(){
            return $this->conexion;
        }
        
    }    
?>