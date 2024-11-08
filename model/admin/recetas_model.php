<?php
    
    class recetas_model{
        private $DB;
        private $recetas;
        private $plantas;
        private $pr;

        function __construct(){
            $this->DB=Database::connect();
        }

        function get(){
            $sql= 'SELECT * FROM receta ORDER BY IDR';
            
            $fila=$this->DB->query($sql);
            $this->recetas=$fila;
            return  $this->recetas;
        }

        function plantas(){
            $sql= 'SELECT IDP, NomCom FROM planta';

            $fila=$this->DB->query($sql);
            $this->plantas=$fila;
            return $this->plantas;
        }

        function p_r($idr){
            $sql= "SELECT p.IDP, p.NomCom FROM planta_rec as r INNER JOIN planta as p ON r.IDP=p.IDP where IDR = ?";
            $fila = $this->DB->prepare($sql);
            $fila->execute(array($idr));

            $this->pr=$fila;
            return $this->pr;
        }

        function comp($idr){
            $sql= "SELECT IDP FROM planta_rec where IDR = ?";
            $fila = $this->DB->prepare($sql);
            $fila->execute(array($idr));

            $this->pr=$fila;
            return $this->pr;
        }

        function IDMAX(){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql= 'SELECT MAX(IDR) as IDR FROM receta';
            $sql=$this->DB->query($sql);
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            $id = $data['IDR'];
            return $id;
        }


        function create($data, $plantas){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO `receta` (`foto`, `uso`, `nombre`, `dosis`, `ingredientes`, `elaboracion`) VALUES (?, ?, ?, ?, ?, ?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['foto'],$data['uso'],$data['nombre'],$data['dosis'],$data['ingredientes'],$data['elaboracion']));

            $id = $this->IDMAX();

            $this->addP($id, $plantas);
            Database::disconnect();   
        }


        function addP($id, $plantas){
            $sql="INSERT INTO planta_rec (`IDR`, `IDP`) VALUES (?, ?)";
            foreach($plantas as $plant):
                $query = $this->DB->prepare($sql);
                $query->execute(array($id, $plant));
            endforeach;
        }


        function update($data, $plantas, $date){
            //Selecciona la matriz a comparar
            $result = $this->comp($date);
                $com = [];

                foreach ($result as $fila){
                    $com[] = $fila['IDP'];
                }
            
            //Compara las matrices...
            //Para añadir plantas:
            $add = array_diff($plantas, $com);
            //Para borrar plantas:
            $del = array_diff($com, $plantas);


            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE receta SET foto=?, uso=?, nombre=?, dosis=?, ingredientes=?, elaboracion=? WHERE IDR = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['foto'],$data['uso'],$data['nombre'],$data['dosis'],$data['ingredientes'],$data['elaboracion'], $date));

            $this->addP($date, $add);

            $sql = "DELETE FROM planta_rec WHERE IDR=? AND IDP=?";
            foreach($del as $d):
                $q = $this->DB->prepare($sql);
                $q->execute(array($date, $d));
            endforeach;

            Database::disconnect();

        }


        function delete($date, $estatus){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="UPDATE `receta` SET `estatus` = ? WHERE `IDR` = ?;";

            if($estatus) $estatus = 0; else $estatus = 1;


            $q=$this->DB->prepare($sql);
            $q->execute(array($estatus, $date));

            Database::disconnect();
        }
    }
?>