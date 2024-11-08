<?php
    
    class access_model{
        private $DB;

        function __construct(){
            $this->DB=Database::connect();
        }

        function registrar($data){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'INSERT INTO `usuario` (`Nombres`, `Apellido`, `FechaNac`, `Correo`, `contrasena`, `IDT`) VALUES (?, ?, ?, ?, ?, 2);';

            $query = $this->DB->prepare($sql);
            try{
                $query->execute(array($data['nombre'], $data['apellido'], $data['fecha'], $data['correo'],  $data['contra']));
                Database::disconnect();
    
                $this->login($data['correo'], $data['contra']);
            }
            catch(PDOException $e){
                $correo = $data['correo'];
                header("Location: access.php?m=register&correo=$correo");
            }

        }

        function login($correo, $contra){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM usuario WHERE contrasena = '$contra' AND correo = '$correo' ";
            $fila=$this->DB->query($sql);
        
            if ($result=$fila->fetch(PDO::FETCH_ASSOC)){
                session_start();
                $_SESSION['id']=$result['ID'];
                $_SESSION['nombre']=$result['Nombres'];
                $_SESSION['idt'] = $result['IDT'];
                header("Location: user.php");
            }
            else{
                header("Location: access.php?m=login&mail=$correo");
            }
        }

        function premium($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="UPDATE `usuario` SET `IDT` = '3' WHERE `usuario`.`ID` = $id;";

            $this->DB->query($sql);

            Database::disconnect();

            header("Location: access.php?m=login");
        }

    }

?>