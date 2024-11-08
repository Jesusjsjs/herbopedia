<?php
    require_once('../bd/conexion.php');
    require_once('../controller/admin/familias_controller.php');

    $controller= new familias_controller();
    
    if(!empty($_REQUEST['m'])){
        $metodo=$_REQUEST['m'];
        if (method_exists($controller, $metodo)) {
            $controller->$metodo();
        }else{
            $controller->familias();
        }
    }else{
        $controller->familias();
    }
?>