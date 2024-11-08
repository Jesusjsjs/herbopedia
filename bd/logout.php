<?php 

session_start();
session_destroy();

if(isset($_GET['session'])){
    header("Location: ../view/access.php?m=login&session=google");

}else{
    header("Location: ../view/access.php?m=login");
}

