<?php 
require_once("../bd/validate.php");
require_once("../bd/isAdmin.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Administrador</title>
    <link rel="icon" href="../img/icon.png" type="image/x-icon">
    <link href="../css/style.min.css"/>
    <script src="../js/all.js"></script>
    <link href="../css/styles.css" rel="stylesheet" />

</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="index.html"></a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="user.php">Inicio</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="../bd/logout.php">Cerrar sesión</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">CATALOGO</div>
                        <a class="nav-link" href="admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            PANEL DE CONTROL
                        </a>
                        
                        <a class="nav-link" href="plantas.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-seedling"></i></div>
                            PLANTAS
                        </a>
                        <a class="nav-link" href="recetas.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-utensils"></i></div>
                            RECETAS
                        </a>
                        <a class="nav-link" href="descubridores.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            DESCUBRIDORES
                        </a>
                        <a class="nav-link" href="familias.php">
  <div class="sb-nav-link-icon">
    <svg class="svg-inline--fa fa-seedling" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="seedling" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg>
      <path fill="currentColor" d="M512 128c0 17.7-14.3 32-32 32h-16.2c-.1 0-.1 0-.2 0-1.1 0-2.2-.2-3.3-.2-47.4 0-88.6 25.7-111.2 64H336c-13.3 0-24-10.7-24-24V120c0-6.6-5.4-12-12-12H152c-6.6 0-12 5.4-12 12v160h54.8c10.8 0 20.2 8.4 20.2 20s-9.4 20-20.2 20H136c-2.8 0-5.5-.6-8.1-1.7-32 26.3-71.4 41.7-115 41.7-2.7 0-5.4-.1-8.1-.2-16.7-.5-31.8-14.6-31.8-32.4V128c0-17.7 14.3-32 32-32h16.1c1.1 0 2.2.1 3.3.1 47.4 0 88.6-25.7 111.2-64h61.4c13.3 0 24 10.7 24 24v56c0 6.6 5.4 12 12 12h148.9c6.7 0 13-3.2 17-8.7 1.4-1.9 3.3-3.5 5.3-4.8 9.5-6.3 21.2-9.5 32.9-9.5h32.2c17.7 0 32 14.3 32 32z"></path>
    </svg>
  </div>

                            FAMILIAS DE PLANTAS
                        </a>
                        <a class="nav-link" href="especies.php">
  <div class="sb-nav-link-icon">
    <svg class="svg-inline--fa fa-leaf" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="leaf" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg>
      <path fill="currentColor" d="M546.2 9.7C544.1 3.4 538.3 0 532.1 0c-1.2 0-2.4 .1-3.6 .4c-64.6 14.3-122.8 38.1-173.5 66.2c-31.2 17.8-62.2 39.5-90.4 64.8C214.7 40.1 105.5-3.5 24.5 23.6C9.7 28.7 0 43.2 0 59.3V288c0 124.4 100.4 224.8 224.8 224.8h.3c114.5 0 208.9-85.3 223.4-196.4c44.6-31.8 82.1-63.1 110.9-94.8c16.4-17.6 20.7-42.9 11.1-64.4c-1.3-2.9-2.6-5.7-3.9-8.5c-2.2-4.7-4.5-9.3-7-13.8C555.6 103.3 571 58.1 546.2 9.7zM229.6 415.2c-92.3 0-167.5-75.2-167.5-167.5V78.1c58.5 18.7 135.8 53.8 197.1 111.7c20.7 19.2 40.2 40.2 57.8 62.4c17.2 21.7 33.3 44.7 47.7 68.9C334.6 366.2 284.4 415.2 229.6 415.2z"></path>
    </svg>
  </div>

                            ESPECIES DE PLANTAS
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Accediste como:</div>
                    <?php echo $_SESSION['nombre'] ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
