<?php 
    
    require_once('../model/admin/admin_model.php');

    class admin_controller{

        private $model_e;
        private $model_p;

        function __construct(){
            $this->model_e=new admin_model();
        }


        function index(){
            $query =$this->model_e->get();
            $registros = $this->model_e->registros();
            $u = $this->model_e->usuarios();
            $p = $this->model_e->premium();

            include_once('../view/template/admin/header.php');
            include_once('../view/template/admin/dashboard.php');
            include_once('../view/template/admin/footer.php');

        }




    }
?>