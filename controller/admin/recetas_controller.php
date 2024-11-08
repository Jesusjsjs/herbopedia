<?php

require_once('../model/admin/recetas_model.php');

class recetas_controller
{

    private $model_e;

    function __construct()
    {
        $this->model_e = new recetas_model();
    }


    function recetas()
    {
        $query = $this->model_e->get();
        $listaP = $this->model_e->plantas();
        include_once('../view/template/admin/header.php');
        include_once('../view/template/admin/recetas_tb.php');
        include_once('../view/template/admin/footer.php');

    }




    function registro()
    {
        $query = $this->model_e->get();
        include_once('../view/template/admin/header.php');
        include_once('../view/template/admin/recetas_tb.php');
        include_once('../view/template/admin/footer.php');
    }

    function get_datosE()
    {

        if (!empty($_FILES["foto"]["name"])) {
            $foto = $_FILES["foto"]["name"];
            $ruta = $_FILES["foto"]["tmp_name"];
            $destino = "../img/recetas/" . $foto;
            copy($ruta, $destino);
            $data['foto'] = $destino;
        } else {
            $data['foto'] = $_REQUEST['txt_path'];
        }


        $data['nombre'] = $_REQUEST['txt_nom'];
        $data['uso'] = $_REQUEST['txt_uso'];
        $data['dosis'] = $_REQUEST['txt_dosis'];
        $data['ingredientes'] = $_REQUEST['txt_ingre'];
        $data['elaboracion'] = $_REQUEST['txt_elab'];
        $plantas = $_REQUEST['lst_plant'];


        if ($_REQUEST['btn_act'] == "registrar") {
            $this->model_e->create($data, $plantas);
        }

        if ($_REQUEST['btn_act'] == "actualizar") {
            $date = $_REQUEST['txt_id'];
            $this->model_e->update($data, $plantas, $date);
        }

        header("Location:recetas.php");
    }

    function confirmarDelete()
    {

        $data = NULL;
        if ($_REQUEST['id'] == 0) {
            $date['IDR'] = $_REQUEST['txt_id'];
            $estatus = $_REQUEST['txt_es'];
            $this->model_e->delete($date['IDR'], $estatus);
            header("Location:recetas.php");
        }

        include_once('../view/template/admin/header.php');
        include_once('../view/template/admin/recetas_tb.php');
        include_once('../view/template/admin/footer.php');
    }
}