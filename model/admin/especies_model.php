<?php
    
    class especies_model{
        private $DB;
        private $especies;

        function __construct(){
            $this->DB=Database::connect();
        }

        function get(){
            $sql= 'SELECT * FROM `esp-relac`';
            
            $fila=$this->DB->query($sql);
            $this->especies=$fila;
            return  $this->especies;
        }

        function count($idr){
            $sql = 'SELECT COUNT(IDE) as c FROM planta WHERE IDE = '.$idr;
            $count = $this->DB->query($sql);
            $c = $count->fetch(PDO::FETCH_ASSOC);
            return $c;
        }

        function create($nombre){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO `esp-relac` (`Nombre`) VALUES ('$nombre');";

            $this->DB->query($sql);

            Database::disconnect();   
        }

        function update($nombre, $date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="UPDATE `esp-relac` SET `Nombre` = '$nombre' WHERE `esp-relac`.`IDE` = $date;";

            $this->DB->query($sql);

            Database::disconnect();
        }

    }
?>