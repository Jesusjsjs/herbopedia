<?php
    require_once('../bd/conexion.php');
    require_once('../controller/admin/descubridores_controller.php');

    $controller= new descubridores_controller();
    
    if(!empty($_REQUEST['m'])){
        $metodo=$_REQUEST['m'];
        if (method_exists($controller, $metodo)) {
            $controller->$metodo();
        }else{
            $controller->descubridores();
        }
    }else{
        $controller->descubridores();
    }
?>