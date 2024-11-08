<?php

require_once('../model/admin/descubridores_model.php');

class descubridores_controller
{

    private $model_e;

    function __construct()
    {
        $this->model_e = new descubridores_model();
    }


    function descubridores()
    {
        $query = $this->model_e->get();
        $listaP = $this->model_e->pais();
        $listaN = $this->model_e->nacionalidades();

        include_once('../view/template/admin/header.php');
        include_once('../view/template/admin/descubridor_tb.php');
        include_once('../view/template/admin/footer.php');

    }




    function registro()
    {
        $data = NULL;
        /*if (isset($_REQUEST['id'])) {
            $data = $this->model_e->get_id($_REQUEST['id']);
        }*/
        $query = $this->model_e->get();
        include_once('../view/template/admin/header.php');
        include_once('../view/template/admin/descubridor_tb.php');
        include_once('../view/template/admin/footer.php');
    }

    function get_datosE()
    {
        if (!empty($_FILES["foto"]["name"])) {
            $foto = $_FILES["foto"]["name"];
            $ruta = $_FILES["foto"]["tmp_name"];
            $destino = "../img/plantas/" . $foto;
            copy($ruta, $destino);
            $data['foto'] = $destino;
        } else {
            $data['foto'] = $_REQUEST['txt_path'];
        }


        $data['nombre'] = $_REQUEST['txt_nom'];
        $data['biografia'] = $_REQUEST['txt_bio'];
        $data['pai'] = $_REQUEST['lst_pai'];
        $data['naci'] = $_REQUEST['lst_naci'];
        $data['f_nac'] = $_REQUEST['date_nac'];
        $data['exped_realiz'] = $_REQUEST['txt_exp'];

        if ($_REQUEST['btn_act'] == "registrar") {
            $this->model_e->create($data);
        }

        if ($_REQUEST['btn_act'] == "actualizar") {
            $date = $_REQUEST['txt_id'];
            $this->model_e->update($data, $date);
        }

        header("Location:descubridores.php");
    }

    function confirmarDelete()
    {

        $data = NULL;

        /*if ($_REQUEST['id'] != 0) {
            $data = $this->model_e->get_id($_REQUEST['IDD']);
        }*/

        if ($_REQUEST['id'] == 0) {
            $date['IDD'] = $_REQUEST['txt_id'];
            $estatus = $_REQUEST['txt_es'];
            $this->model_e->delete($date['IDD'], $estatus);
            header("Location:descubridores.php");
        }

        include_once('../view/template/admin/header.php');
        include_once('../view/template/admin/descubridor_tb.php');
        include_once('../view/template/admin/footer.php');
    }
}
