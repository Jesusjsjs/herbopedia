<?php 
session_start();
session_destroy();
header("Location: ../view/access.php?m=login");
?>