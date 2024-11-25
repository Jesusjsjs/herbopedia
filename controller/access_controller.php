<?php 
    
    require_once('../model/access_model.php');

    class access_controller{

        private $model_e;

        function __construct(){
            $this->model_e=new access_model();
        }


        function login(){
            if(isset($cor))  $C=$cor;
            include_once('../view/access/header_access.php');
            include_once('../view/access/login.php');
            include_once('../view/access/footer_access.php');

        }

        function register(){
            
            include_once('../view/access/header_access.php');
            include_once('../view/access/register.php');
            include_once('../view/access/footer_access.php');

        }

        function password(){
            include_once('../view/access/header_access.php');
            include_once('../view/access/password.php');
            include_once('../view/access/footer_access.php');

        }
        function pago(){


            include_once('../view/access/header_access.php');
            include_once('../view/access/pago.php');
            include_once('../view/access/footer_access.php');
        }

        function datosL(){
            $correo = $_REQUEST['txt_correo'];
            $contra = md5($_REQUEST['txt_contra']);

            $this->model_e->login($correo, $contra);
        }

        function datosR(){
            $data ['nombre'] = $_REQUEST['txt_nombre'];
            $data ['apellido'] = $_REQUEST['txt_apellido'];
            $data['correo'] = $_REQUEST['txt_correo'];
            $data['fecha'] = $_REQUEST['dt_nac'];
            $data ['contra'] = md5($_REQUEST['txt_contra']);

            $this->model_e->registrar($data);
        }

        function datosPremium(){
            $data = $_REQUEST['id'];

            $this->model_e->premium($data);
            
        }

    }
?>