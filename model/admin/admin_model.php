<?php
    
    class admin_model{
        private $DB;
        private $registros;

        function __construct(){
            $this->DB=Database::connect();
        }

        function get(){
            $sql= 'SELECT u.ID, u.Nombres, u.Apellido, u.FechaNac, u.Correo, t.Tipo FROM usuario as u INNER JOIN tipo_user AS t ON t.IDT = u.IDT';
            $fila=$this->DB->query($sql);
            $this->registros=$fila;
            return  $this->registros;
        }

////////////////////////////////////////////////////////////////

        function registros(){
            $sql="SELECT COUNT(*) AS 'r' FROM descubridor UNION ALL SELECT COUNT(*) FROM planta UNION ALL SELECT COUNT(*) FROM receta";
            $fila=$this->DB->query($sql);
            $this->registros=$fila;
            return  $this->registros->fetchAll(PDO::FETCH_ASSOC);
        }


        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM estudiante where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        function usuarios(){
            $sql = "SELECT COUNT(*) as usuarios FROM usuario";
            $fila=$this->DB->query($sql);
            $this->registros=$fila->fetch(PDO::FETCH_ASSOC);
            return  $this->registros;
        }

        function premium(){
            $sql = "SELECT COUNT(*) as premium FROM usuario WHERE IDT = 3";
            $fila=$this->DB->query($sql);
            $this->registros=$fila->fetch(PDO::FETCH_ASSOC);
            return  $this->registros;
        }
    }
?>

