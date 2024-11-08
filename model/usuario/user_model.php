<?php
    
    class user_model{
        private $DB;
        private $plantas;
        private $descubridores;
        private $recetas;
        private $pr;
        

        function __construct(){
            $this->DB=Database::connect();
        }

        function get_plantas(){
            $sql= 'SELECT p.IDP, p.foto, p.NomCien, p.NomCom, p.Descrip, p.uso, p.OtroNom, 
            p.FechaDescubr, f.nombrefam AS nombre_familia, pai.N_Pais AS nombre_pais, e.Nombre AS nombre_especie, 
            d.nombre AS nombre_descubridor FROM planta p INNER JOIN familia f 
            ON p.IDF = f.IDF INNER JOIN pais pai ON p.IDL = pai.IDL 
            INNER JOIN `esp-relac` e ON p.IDE = e.IDE INNER JOIN descubridor d ON p.IDD = d.IDD  WHERE p.estatus = 1 ORDER BY p.IDP; ';
            
            $fila=$this->DB->query($sql);
            $this->plantas=$fila;
            return  $this->plantas;
            
            $result=$fila->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['nombre']=$result['Nombres'];
            $_SESSION['idt'] = $result['IDT'];


        }


        function g_IDP($id){
            $sql = "SELECT p.IDP, p.foto, p.NomCien, p.NomCom, p.Descrip, p.uso, p.OtroNom, 
            p.FechaDescubr, f.nombrefam AS nombre_familia, pai.N_Pais AS nombre_pais, e.Nombre AS nombre_especie, 
            d.nombre AS nombre_descubridor FROM planta p INNER JOIN familia f 
            ON p.IDF = f.IDF INNER JOIN pais pai ON p.IDL = pai.IDL 
            INNER JOIN `esp-relac` e ON p.IDE = e.IDE INNER JOIN descubridor d ON p.IDD = d.IDD  WHERE IDP = $id ";

            $fila=$this->DB->query($sql);
            $result=$fila->fetch(PDO::FETCH_ASSOC);
            return $result;

        }


        function get_Descu(){
            $sql= 'SELECT d.IDD, d.foto, d.nombre, d.biografia, p.N_Pais as pai, p.Gentilicio as naci, d.f_nac, d.exped_realiz FROM `descubridor` as d INNER join pais as p on d.IDL = p.IDL WHERE d.estatus=1 ORDER BY d.IDD;';
            
            $fila=$this->DB->query($sql);
            $this->descubridores=$fila;
            return  $this->descubridores;
        }

        function g_IDD($id){
            $sql = "SELECT d.IDD, d.foto, d.nombre, d.biografia, p.N_Pais as pai, p.Gentilicio as naci, d.f_nac, d.exped_realiz FROM `descubridor` as d INNER join pais as p on d.IDL = p.IDL WHERE IDD = $id";

            $fila=$this->DB->query($sql);
            $result=$fila->fetch(PDO::FETCH_ASSOC);
            return $result;
        }


        function get_Res(){
            $sql= 'SELECT * FROM receta WHERE estatus=1 ORDER BY IDR';
            
            $fila=$this->DB->query($sql);
            $this->recetas=$fila;
            return  $this->recetas;

        }

        function g_IDR($id){
            $sql= "SELECT * FROM receta WHERE IDR = $id";

            $fila=$this->DB->query($sql);
            $result=$fila->fetch(PDO::FETCH_ASSOC);
            return $result;

        }

        function p_r($idr){
            $sql= "SELECT p.IDP, p.NomCom FROM planta_rec as r INNER JOIN planta as p ON r.IDP=p.IDP where IDR = ?";
            $fila = $this->DB->prepare($sql);
            $fila->execute(array($idr));

            $this->pr=$fila;
            return $this->pr;
        }



    }
?>