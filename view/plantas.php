<?php
    require_once('../bd/conexion.php');
    require_once('../controller/admin/plantas_controller.php');

    $controller= new plantas_controller();
    
    if(!empty($_REQUEST['m'])){
        $metodo=$_REQUEST['m'];
        if (method_exists($controller, $metodo)) {
            $controller->$metodo();
        }else{
            $controller->plantas();
        }
    }else{
        $controller->plantas();
    }
?>