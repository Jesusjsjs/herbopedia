<?php 
require_once("../bd/validate.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link rel="icon" href="../img/icon.png" type="image/x-icon">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/toastify.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/styles-datos.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
</head>

<body>
    <div class="wrapper">
        <header class="header-mobile">
            <h1 class="logo">Herbopedia</h1>
            <button class="open-menu" id="open-menu">
                <i class="bi bi-list"></i>
            </button>
        </header>
        <aside>
            <button class="close-menu" id="close-menu">
                <i class="bi bi-x"></i>
            </button>
            <header>
                <h1 class="logo"><?php if($_SESSION['idt']==3) echo '<i class="fa-regular fa-gem"></i>  ';
                elseif ($_SESSION['idt']==1) echo '<i class="fa-solid fa-user"></i>  ';?>Herbopedia</h1>
            </header>
            <nav>
                <ul class="menu">
                    <li>
                        <a href="../view/user.php">
                            <button id="recetas" class="boton-menu boton-categoria"><i class="fa-regular fa-circle-left"></i>
                                Regresar
                            </button>
                        </a>
                    </li>
                    <li>
                        <?php if($_SESSION['idt']==2) echo '
                            <a>
                                <button id="descarga" class="boton-menu boton-categoria" data-bs-toggle="modal" data-bs-target="#premium_modal"><i class="fa-regular fa-gem"></i>';
                        else echo
                            '<a href="../view/user.php?m='.$pdf.'&id='.$_REQUEST['id'].' " target="_blank">
                                <button id="descarga" class="boton-menu boton-categoria"><i class="fa-regular fa-file-pdf"></i>'?>
                        Descargar en PDF
                        </button></a>
                    </li>
                    <!--<li>
                        <button id="descubridores" class="boton-menu boton-categoria"><i class="bi bi-hand-index-thumb"></i> Todas las opciones</button>
                    </li>-->
                    <li>
                        <a class="boton-menu " href="../view/access.php?m=login">
                        <i class="fa-solid fa-right-to-bracket"></i> Cerrar Sesión
                        </a>
                    </li>

                </ul>
            </nav>
            <footer>
                <p class="texto-footer">© 2024 Herbopedia</p>
            </footer>

        </aside>






