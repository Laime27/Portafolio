<?php 
    session_start();
    include("../Controlador/Control-inicio.php");

    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
      }
    
    $pagina = "inicio";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1893f8b6d1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/principal.css">
    <title>Administrador</title>
</head>

<body>
    <?php include("../templade/cabecera.php"); ?>
         <div class="col-lg-8 m-auto mt-4">
         <form method="post" action="../Controlador/Control-inicio.php" enctype="multipart/form-data">
            <input name="id" value="<?php echo $listaInicio[0]['idInicio']; ?>" type="hidden" readonly>

                     <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php if(isset($listaInicio[0]["nombre"])) echo $listaInicio[0]["nombre"]; else { echo ""; } ?>">
                    </div>
                    
                     <div class="mb-2">
                         <label>Imagen de perfil:</label> 
                          <img src="../img/<?php if(isset($listaInicio[0]["perfil"])) echo $listaInicio[0]["perfil"]; else { echo ""; }?>" alt="imagen-perfil" width="80" height="80" class="img-fluid">  
                      </div>
                         <input type="file" name="imagen-perfil" placeholder="name">

                     <div class="input-group mb-3 mt-4">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-facebook-f"></i></span>
                        <input type="text" class="form-control" placeholder="Link de Facebook" aria-describedby="basic-addon1" value="<?php if(isset($listaInicio[0]["facebook"])) echo $listaInicio[0]["facebook"]; else { echo ""; } ?>" name="facebook">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2"><i class="fa-brands fa-instagram"></i></span>
                        <input type="text" class="form-control" placeholder="Link de Instagram" aria-describedby="basic-addon2" value="<?php if(isset($listaInicio[0]["instagram"])) echo $listaInicio[0]["instagram"]; else { echo ""; } ?>" name="instagram">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3"><i class="fa-brands fa-linkedin-in"></i></span>
                        <input type="text" class="form-control" placeholder="Link de Linkedin" aria-describedby="basic-addon3" value="<?php if(isset($listaInicio[0]["linkedin"])) echo $listaInicio[0]["linkedin"]; else { echo ""; } ?>" name="linkedin">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon4"><i class="fa-brands fa-github"></i></span>
                        <input type="text" class="form-control" placeholder="Link de Github" aria-describedby="basic-addon4" value="<?php if(isset($listaInicio[0]["github"])) echo $listaInicio[0]["github"]; else { echo ""; } ?>" name="github">
                    </div>
                    
                    <div class="mb-2">
                         <label>Ingresar tu Curriculum: <?php if(isset($listaInicio[0]["cv"])) echo $listaInicio[0]["cv"]; else { echo ""; }?></label> 
                          
                      </div>
                         <input type="file" name="cv" placeholder="name">
                    
                  
                    <div class="mb-3 mt-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" name="titulo" value="<?php if(isset($listaInicio[0]["titulo"])) echo $listaInicio[0]["titulo"]; else { echo ""; } ?>">
                    </div>

                    <div class="mb-3">
                        <label for="subtitulo" class="form-label">Subtítulo</label>
                        <input type="text" class="form-control" name="subtitulo" value="<?php if(isset($listaInicio[0]["subtitulo"])) echo $listaInicio[0]["subtitulo"]; else { echo ""; } ?>">
                    </div>

                    <div class="mb-3" class="contenido">
                        <label for="contenido" class="form-label">Contenido</label>
                        <textarea class="form-control" name="contenido" ><?php if(isset($listaInicio[0]["contenido"])) echo $listaInicio[0]["contenido"]; else { echo ""; } ?></textarea>
                    </div>

                    <div class="mt-3 mb-5">
                    <button type="submit" class="btn btn-success" <?php if(isset($listaInicio[0]['idInicio']) == 1) { echo "hidden"; } ?> name="accion" value="crear" >Crear</button>   
                              
                    <button type="submit" class="btn btn-primary" name="accion" value="actualizar" <?php if(isset($listaInicio[0]['idInicio']) == 0) { echo "disabled"; } ?>>Guardar</button>
                    </div>
                </form>
            </div>
  
            
  
    <?php include("../templade/pie.php"); ?>
</body>

</html>