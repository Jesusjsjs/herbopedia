<?php
    
    class familias_model{
        private $DB;
        private $familias;

        function __construct(){
            $this->DB=Database::connect();
        }

        function get(){
            $sql= 'SELECT * FROM familia';
            
            $fila=$this->DB->query($sql);
            $this->familias=$fila;
            return  $this->familias;
        }

        function count($idf){
            $sql = 'SELECT COUNT(IDF) as c FROM planta WHERE IDF = '.$idf;
            $count = $this->DB->query($sql);
            $c = $count->fetch(PDO::FETCH_ASSOC);
            return $c;
        }

        function create($nombre){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO `familia` (`nombrefam`) VALUES ('$nombre')";

            $this->DB->query($sql);

            Database::disconnect();   
        }

        function update($nombre, $date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="UPDATE `familia` SET `nombrefam` = '$nombre' WHERE `IDF` = $date;";

            $this->DB->query($sql);

            Database::disconnect();
        }

    }
?>