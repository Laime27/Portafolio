<?php
session_start();
include("../Controlador/Control-habilidades.php");

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
  }


$pagina = "habilidades";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1893f8b6d1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Administrador</title>
</head>

<body>
    <?php include("../templade/cabecera.php"); ?>

    <div class="container ml-lg-3">
        <div class="mb-4 mt-4">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#HabilidadesCrear">Crear tecnologia</button>
        </div>
        <table class="table table-striped table-hover  text-center" id="tabla">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaHabilidades as $Habilidades) { ?>
                    <tr>
                        <form action="../Controlador/Control-proyecto.php" method="post" enctype="multipart/form-data">
                            <td><?php echo $Habilidades["idhabilidad"] ?></td>
                            <td> <img src="../img/<?php echo $Habilidades["habilidadImagen"] ?>" width="80" height="80" class="img-fluid"> </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#HabilidadEditar<?php echo $Habilidades["idhabilidad"] ?>"><i class="fa-solid fa-pencil"></i>
                                </button>

                                <button type="button" class="btn btn-danger ml-2" onclick="EliminarHabilidad(<?php echo $Habilidades['idhabilidad']; ?>)">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </form>
                    </tr>
                    <?php include("../modal/habilidad-editar.php"); ?>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="../js/proyecto.js"></script>
    <?php include("../modal/habilidad-crear.php"); ?>
    <?php include("../templade/pie.php"); ?>
</body>

</html>