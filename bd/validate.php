<?php 
session_start();
if(!isset($_SESSION['nombre']))
    header("Location: access.php?m=login");
?>