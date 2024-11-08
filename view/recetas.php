<?php
    require_once('../bd/conexion.php');
    require_once('../controller/admin/recetas_controller.php');

    $controller= new recetas_controller();
    
    if(!empty($_REQUEST['m'])){
        $metodo=$_REQUEST['m'];
        if (method_exists($controller, $metodo)) {
            $controller->$metodo();
        }else{
            $controller->recetas();
        }
    }else{
        $controller->recetas();
    }
?>