<?php
    require_once('../bd/conexion.php');
    require_once('../controller/admin/especies_controller.php');

    $controller= new especies_controller();
    
    if(!empty($_REQUEST['m'])){
        $metodo=$_REQUEST['m'];
        if (method_exists($controller, $metodo)) {
            $controller->$metodo();
        }else{
            $controller->especies();
        }
    }else{
        $controller->especies();
    }
?>