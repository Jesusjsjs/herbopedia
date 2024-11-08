<?php

require_once('../model/admin/especies_model.php');

class especies_controller
{

    private $model_e;

    function __construct()
    {
        $this->model_e = new especies_model();
    }


    function especies()
    {
        $query = $this->model_e->get();
        
        include_once('../view/template/admin/header.php');
        include_once('../view/template/admin/especies_tb.php');
        include_once('../view/template/admin/footer.php');

    }


    function get_datosE()
    {
        $nombre = $_REQUEST['txt_nom'];

        if ($_REQUEST['btn_act'] == "registrar") {
            $this->model_e->create($nombre);
        }

        if ($_REQUEST['btn_act'] == "actualizar") {
            $date = $_REQUEST['txt_id'];
            $this->model_e->update($nombre, $date);
        }

        header("Location:especies.php");
    }

}