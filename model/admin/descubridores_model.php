<?php
    
    class descubridores_model{
        private $DB;
        private $descubridores;
        private $paises;
        private $nacionalidades;

        function __construct(){
            $this->DB=Database::connect();
        }

        function get(){
            $sql= 'SELECT d.IDD, d.foto, d.nombre, d.biografia, p.N_Pais as pai, n.Gentilicio as naci, d.f_nac, d.exped_realiz, d.estatus FROM `descubridor` as d INNER join pais as p on d.IDL = p.IDL INNER JOIN pais as n ON n.IDL = d.nacion';
            
            $fila=$this->DB->query($sql);
            $this->descubridores=$fila;
            return  $this->descubridores;
        }

        function pais(){
            $sql= 'SELECT IDL, N_Pais FROM pais';

            $fila=$this->DB->query($sql);
            $this->paises=$fila;
            return $this->paises;
        }

        function nacionalidades(){
            $cargaNac= 'SELECT IDL, Gentilicio FROM pais';

            $opcion=$this->DB->query($cargaNac);
            $this->nacionalidades=$opcion;
            return $this->nacionalidades;
        }

        function create($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO descubridor(foto,nombre,exped_realiz,biografia,f_nac,IDL, nacion)VALUES (?,?,?,?,?,?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['foto'],$data['nombre'],$data['exped_realiz'],$data['biografia'],$data['f_nac'],$data['pai'],$data['naci']));
            Database::disconnect();       
        }

        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE descubridor set foto=?, nombre =?, exped_realiz=?,biografia=?, f_nac=?, IDL=?, nacion=? WHERE IDD = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['foto'],$data['nombre'],$data['exped_realiz'],$data['biografia'],$data['f_nac'],$data['pai'],$data['naci'], $date));
            Database::disconnect();

        }

        function delete($date, $estatus){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="UPDATE `descubridor` SET `estatus` = ? where IDD = ?";

            if($estatus) $estatus = 0; else $estatus = 1;

            $q=$this->DB->prepare($sql);
            $q->execute(array($estatus, $date));
            Database::disconnect();
        }

    }
?>