<?php
    require_once('../bd/conexion.php');
    require_once('../controller/access_controller.php');

    $controller= new access_controller();

    if(!empty($_REQUEST['m'])){
        $metodo=$_REQUEST['m'];
        if (method_exists($controller, $metodo)) {
            $controller->$metodo();
        }else{
            $controller->login();
        }
    }else{
        $controller->login();
    }


    
?>