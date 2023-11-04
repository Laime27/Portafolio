<?php
  session_start();
include("../Controlador/Control-proyecto.php");
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
}

$pagina = "proyecto";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <title>Administrador</title>
</head>

<body>

  <?php include("../templade/cabecera.php"); ?>

  <div class="container ml-lg-3">
    <div class="mb-4 mt-4">
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#PortafolioCrear">Crear Proyecto</button>
    </div>
    <table class="table table-striped table-hover  text-center" id="tabla">
      <thead class="table-dark">
        <tr>

          <th scope="col">#</th>
          <th scope="col">Imagen</th>
          <th scope="col">TituloPortafolio</th>
          <th scope="col">ContenidoPortafolio</th>
          <th scope="col">Dominio</th>
          <th scope="col">Github</th>
          <th scope="col">Acciones</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($listaProyecto as $Portafolio) { ?>
          <tr>
            <form action="../Controlador/Control-proyecto.php" method="post" enctype="multipart/form-data">

              <td><?php echo $Portafolio["idproyecto"] ?></td>
              <td> <img src="../img/<?php echo $Portafolio["proyectoImagen"] ?>" width="80" height="80" class="img-fluid"> </td>
              <td><?php echo $Portafolio["tituloProyecto"] ?></td>
              <td><?php echo $Portafolio["contenidoProyecto"] ?></td>
              <td><?php echo $Portafolio["dominio"] ?></td>
              <td><?php echo $Portafolio["github"]  ?></td>
              <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#PortafolioEditar<?php echo $Portafolio["idproyecto"] ?>"><i class="fa-solid fa-pencil"></i>
                </button>

                <button type="button" class="btn btn-danger ml-2" 
                   onclick="ConfirmarEliminar(<?php echo $Portafolio['idproyecto']; ?>)">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </td>
            </form>
          </tr>
          <?php include("../modal/proyecto-editar.php"); ?>
        <?php } ?>
      </tbody>
    </table>
  </div>



  <script src="../js/proyecto.js"></script>

  <?php include("../modal/proyecto-crear.php"); ?>
  <?php include("../templade/pie.php"); ?>

</body>

</html>