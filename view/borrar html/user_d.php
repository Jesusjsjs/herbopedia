<?php
    require_once('../bd/conexion.php');
    require_once('../controller/user/user_controller.php');

    $controller= new user_controller();
    
    if(!empty($_REQUEST['m'])){
        $metodo=$_REQUEST['m'];
        if (method_exists($controller, $metodo)) {
            $controller->$metodo();
        }else{
            $controller->use_D();
        }
    }else{
        $controller->use_D();
    }
?>