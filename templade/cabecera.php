<?php 
  include("../Controlador/Control-inicio.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AdminLTE 3 | Starter</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <link rel="stylesheet" href="../adminLite/plugins/fontawesome-free/css/all.min.css" />
  <link rel="stylesheet" href="../adminLite/dist/css/adminlte.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/1893f8b6d1.js" crossorigin="anonymous"></script>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #040b14; position: fixed;">
      <a href="#" class="brand-link text-decoration-none">
        <img src="../img/<?php if(isset($listaInicio[0]["perfil"]))echo $listaInicio[0]["perfil"]; else{echo "perfil.png";} ?> "  alt="" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">Control Portafolio</span>
      </a>

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../img/<?php if(isset($listaInicio[0]["perfil"]))echo $listaInicio[0]["perfil"]; else{echo "perfil.png";} ?> "   class="img-circle elevation-2" alt="imagen-usuario" />
          </div>
          <div class="info">
            <a href="../web/index.php" target="_blank" class="d-block text-decoration-none"> <?php if (isset($listaInicio[0]["nombre"])) echo $listaInicio[0]["nombre"]; else { echo "Liam"; } ?></a>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="../vista/principal.php" class="nav-link <?php if($pagina=="inicio"){echo "active";}?>">
                <i class="nav-icon fas fa-th"></i>
                <p> Inicio </p>
              </a>
            </li>
      
            <li class="nav-item">
              <a href="../vista/habilidades.php" class="nav-link <?php if($pagina=="habilidades"){echo "active";}?>">
                <i class="nav-icon fas fa-th"></i>
                <p> Habilidades </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="../vista/proyecto.php" class="nav-link <?php if($pagina=="proyecto"){echo "active";}?>">
                <i class="nav-icon fas fa-th"></i>
                <p> Proyecto </p>
              </a>
            </li>       
           
            <li class="nav-item">
              <a href="../vista/cerrarSesion.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p> Cerrar Sesion </p>
              </a>
            </li>

          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
      <div class="container ml-md-3 ">
        <div class="row">



        