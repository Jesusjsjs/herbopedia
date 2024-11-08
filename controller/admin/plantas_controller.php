<?php 
    
    require_once('../model/admin/plantas_model.php');

    class plantas_controller{

        private $model_e;

        function __construct(){
            $this->model_e=new  plantas_model();
        }

      
          function plantas(){
            $query =$this->model_e->get();
            $listaP =$this->model_e->pais();
            $listaDesc =$this->model_e->Descu();
            $listafam = $this->model_e->FAMILIA();
            $listaEsp = $this->model_e->especie();
            
            include_once('../view/template/admin/header.php');
            include_once('../view/template/admin/planta_tb.php');
            include_once('../view/template/admin/footer.php');

          }

           


        function registro(){
            $data=NULL;
            /*--if(isset($_REQUEST['id'])){
                $data=$this->model_e->get_id($_REQUEST['id']);    
            }*/
            $query=$this->model_e->get();
            include_once('../view/template/admin/header.php');
            include_once('../view/template/admin/planta_tb.php');
            include_once('../view/template/admin/footer.php');
        }

        function get_datosE(){

            if (!empty($_FILES["foto"]["name"])) {
                $foto = $_FILES["foto"]["name"];
                $ruta = $_FILES["foto"]["tmp_name"];
                $destino = "../img/plantas/" . $foto;
                copy($ruta, $destino);
                $data['foto'] = $destino;
            } else {
                $data['foto'] = $_REQUEST['txt_path'];
            }

            $data['NomCien']=$_REQUEST['txt_NomCien'];
            $data['NomCom']=$_REQUEST['txt_NomCom'];
            $data['OtroNom']=$_REQUEST['txt_OtroNom'];
            $data['Descrip']=$_REQUEST['txt_Desc'];
            $data['uso']=$_REQUEST['txt_uso'];
            $data['FechaDescubr']=$_REQUEST['date_des'];
            $data['nombre_pais']=$_REQUEST['lst_pais'];
            $data['nombre_especie']=$_REQUEST['lst_esp'];
            $data['nombre_familia']=$_REQUEST['lst_fam'];
            $data['nombre_descubridor']=$_REQUEST['lst_des'];




            if ($_REQUEST['btn_act']=="registrar") {
                $this->model_e->create($data, $destino);
            }
            
            if($_REQUEST['btn_act']=="actualizar"){
                $date=$_REQUEST['txt_id'];
                $this->model_e->update($data,$date);
            }
            
            header("Location:plantas.php");

        }

        function confirmarDelete(){

            $data=NULL;

            /*if ($_REQUEST['id']!=0) {
               $data=$this->model_e->get_id($_REQUEST['id']);
            }*/

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_id'];
                $this->model_e->delete($date['id'], $_REQUEST['txt_es']);
                header("Location:plantas.php");
            }

            include_once('../view/template/admin/header.php');
            include_once('../view/template/admin/planta_tb.php');
            include_once('../view/template/admin/footer.php');
            


        }


    }
?>