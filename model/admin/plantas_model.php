<?php
    
    class plantas_model{
        private $DB;
        private $plantas;
        private $paises;
        private $familia;
        private $descubridores;
        private $especies;

        function __construct(){
            $this->DB=Database::connect();
        }

        function get(){
            $sql= 'SELECT p.IDP, p.foto, p.NomCien, p.NomCom, p.Descrip, p.uso, p.OtroNom, 
            p.FechaDescubr, f.nombrefam AS nombre_familia, pai.N_Pais AS nombre_pais, e.Nombre AS nombre_especie, 
            d.nombre AS nombre_descubridor, p.Estatus FROM planta p INNER JOIN familia f 
            ON p.IDF = f.IDF INNER JOIN pais pai ON p.IDL = pai.IDL 
            INNER JOIN `esp-relac` e ON p.IDE = e.IDE INNER JOIN descubridor d ON p.IDD = d.IDD; ';
            
            $fila=$this->DB->query($sql);
            $this->plantas=$fila;
            return  $this->plantas;
        }

        function pais(){
            $sql= 'SELECT IDL, N_Pais FROM pais';

            $fila=$this->DB->query($sql);
            $this->paises=$fila;
            return $this->paises;
        }

        function Descu(){
            $cargaDescu= 'SELECT IDD, nombre FROM descubridor';

            $opcion=$this->DB->query($cargaDescu);
            $this->descubridores=$opcion;
            return $this->descubridores;
        }

        function FAMILIA(){
            $cargaFam= 'SELECT IDF, nombrefam FROM familia';

            $opcion=$this->DB->query($cargaFam);
            $this->familia=$opcion;
            return $this->familia;
        }


        function especie(){
            $cargaEsp= 'SELECT IDE, Nombre FROM `esp-relac`';

            $opcion=$this->DB->query($cargaEsp);
            $this->especies=$opcion;
            return $this->especies;
        }        

        function create($data, $destino){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO planta(foto,NomCien,NomCom,Descrip,uso,OtroNom, FechaDescubr,IDF, IDL,IDE,IDD)VALUES (?,?,?,?,?,?,?,?,?,?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['foto'],$data['NomCien'],$data['NomCom'],$data['Descrip'],$data['uso'],$data['OtroNom'],$data['FechaDescubr'],$data['nombre_familia'],$data['nombre_pais'],$data['nombre_especie'],$data['nombre_descubridor']));
            Database::disconnect();       
        }

        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE planta  set uso =?, NomCien=?,NomCom=?, Descrip=?, OtroNom=?, FechaDescubr=?, IDF=?, IDL=?, IDE=?, IDD=?, foto=? WHERE IDP = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['uso'],$data['NomCien'],$data['NomCom'],$data['Descrip'],$data['OtroNom'],$data['FechaDescubr'],$data['nombre_familia'], $data['nombre_pais'], $data['nombre_especie'], $data['nombre_descubridor'], $data['foto'], $date ));
            Database::disconnect();

        }

        function delete($date, $estatus){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="UPDATE `planta` SET `Estatus` = ? WHERE `planta`.`IDP` = ?;";

            if($estatus) $estatus = 0; else $estatus = 1;

            $q=$this->DB->prepare($sql);
            $q->execute(array($estatus, $date));
            Database::disconnect();
        }
    }
?>