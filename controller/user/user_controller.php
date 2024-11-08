<?php 
    include_once("../model/usuario/user_model.php");

    class user_controller{
        private $model_e;

        function __construct(){
            $this->model_e=new user_model();
        }

        

        function user(){
            $query =$this->model_e->get_plantas();

            include_once("../view/template/usuario/header.php");
            include_once("../view/template/usuario/main.php");
            include_once("../view/template/usuario/body.php");
            include_once("../view/template/usuario/footer.php");
        }

        function use_D(){
            $query =$this->model_e->get_Descu();
            include_once("../view/template/usuario/header.php");
            include_once("../view/template/usuario/main_Des.php");
            include_once("../view/template/usuario/body.php");
            include_once("../view/template/usuario/footer.php");
        }

        function use_R(){
            $query =$this->model_e->get_Res();
            
            include_once("../view/template/usuario/header.php");
            include_once("../view/template/usuario/main_R.php");
            include_once("../view/template/usuario/body.php");
            include_once("../view/template/usuario/footer.php");

        }

        function tarjeta_P() {
            $query =$this->model_e->g_IDP($_REQUEST['id']);
            $pdf = 'pdf_P';

            include_once("../view/tarjetas/header.php");
            include_once("../view/tarjetas/tarjeta_planta.php");
            include_once("../view/tarjetas/footer.php");
        }


        function tarjeta_D(){
            $query =$this->model_e->g_IDD($_REQUEST['id']);
            $pdf = 'pdf_D';

            include_once("../view/tarjetas/header.php");
            include_once("../view/tarjetas/tarjeta_Desc.php");
            include_once("../view/tarjetas/footer.php");

        }


        function tarjeta_R(){
            $query =$this->model_e->g_IDR($_REQUEST['id']);
            $planta = $this->model_e->p_r($_REQUEST['id']);
            $pdf = 'pdf_R';

            include_once("../view/tarjetas/header.php");
            include_once("../view/tarjetas/tarjeta_Receta.php");
            include_once("../view/tarjetas/footer.php");
        }

        function pdf_P(){
            $query =$this->model_e->g_IDP($_REQUEST['id']);

            include_once("../view/pdf/planta_pdf.php");
        }

        function pdf_D(){
            $query =$this->model_e->g_IDD($_REQUEST['id']);

            include_once("../view/pdf/descubridor_pdf.php");
        }

        function pdf_R(){
            $query =$this->model_e->g_IDR($_REQUEST['id']);
            $planta = $this->model_e->p_r($_REQUEST['id']);

            include_once("../view/pdf/receta_pdf.php");
        }
    }
?>