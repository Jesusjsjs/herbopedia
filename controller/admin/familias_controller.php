<?php

require_once('../model/admin/familias_model.php');

class familias_controller
{

    private $model_e;

    function __construct()
    {
        $this->model_e = new familias_model();
    }


    function familias()
    {
        $query = $this->model_e->get();
        
        include_once('../view/template/admin/header.php');
        include_once('../view/template/admin/familias_tb.php');
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

        header("Location:familias.php");
    }

}