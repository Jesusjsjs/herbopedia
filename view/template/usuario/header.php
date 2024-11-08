<?php 
require_once("../bd/validate.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
  rel="stylesheet">
  <link rel="icon" href="../img/icon.png" type="image/x-icon">
  <title>Herbopedia</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../assets/css/fontawesome.css">
  <link rel="stylesheet" href="../assets/css/templatemo-scholar.css">
  <link rel="stylesheet" href="../assets/css/owl.css">
  <link rel="stylesheet" href="../assets/css/animate.css">
  <link rel="stylesheet" href="../css/swiper-bundle.min.css" />
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/styles-datos.css">


  <!-- Api de Paypal -->
  <script src="https://www.paypal.com/sdk/js?client-id=tu-cliente-idcurrency=MXN"></script>
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="user.php" class="logo">
              <h1>Herbopedia <?php if($_SESSION['idt']==3) echo '<i class="fa-regular fa-gem"></i>';
              elseif ($_SESSION['idt']==1) echo '<i class="fa-solid fa-user"></i>';?>
              </h1>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <?php if ($_SESSION['idt']==1) echo '
              <li class="scroll-to-section"><a href="../view/face_login.php"><strong>Dashboard</strong></a></li>';?>
              <li class="scroll-to-section"><a href="../view/user.php?m=use_P">Plantas</a></li>
              <li class="scroll-to-section"><a href="../view/user.php?m=use_D">Descubridores</a></li>
              <?php if ($_SESSION['idt']==2) echo '
              <li class="scroll-to-section"><a data-bs-toggle="modal" data-bs-target="#premium_modal"><i class="fa-regular fa-gem"></i>  Recetas</a></li>';
              else echo'<li class="scroll-to-section"><a href="../view/user.php?m=use_R">Recetas</a></li>';?>
              <li class="scroll-to-section"><a href="../bd/logout.php?session=google">Cerrar Sesion</a></li>
            </ul>
            <a class="menu-trigger">
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-banner">
            <div class="item item-1">
              <div class="header-text">
                <span class="category">Nuevos decubrimientos</span>
                <h2>Descubre diferentes fuentes de informacón</h2>
                <p>Herbopedia es un sitio web donde puedes consultar información sobre las distintas plantas médicas y
                  los diferentes usos que tienen a través de la plataforma</p>
              </div>
            </div>
            <div class="item item-2">
              <div class="header-text">
                <span class="category">Aprende de medicina</span>
                <h2>Consulta nuestro catalogo de recetas </h2>
                <p>En nuestro sitio podrás consultar con nuestro amplio catálogo de recetas médicas y descubre distintos
                  medios contra malestares y enfermedades </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="services section-datos" id="services">

  <?php if($_SESSION['idt']==2) include_once("modal/premium_modal.php")?>



  
  <style>
    .logo {
      display: flex;
      align-items: center;
    }

    .logo h1 {
      display: flex;
      align-items: center;
    }

    .logo i {
      margin-left: 8px; /* Aqui puedo ajustar el espacio a la derecha del texto según sea necesario */
    }
  </style>

