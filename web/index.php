<?php
include("../Controlador/Control-inicio.php");
include("../Controlador/Control-proyecto.php");
include("../Controlador/Control-habilidades.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/1893f8b6d1.js" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <link rel="stylesheet" href="../css/portafolio.css">
  <title>Portafolio</title>
</head>

<body>

  <button class="menu" id="menu">
    <i class="fa-solid fa-bars"></i>
  </button>

  <header class="header" id="header">
    <div class="d-flex flex-column ">
      <div class="profile ">
        <img src="../img/<?php if (isset($listaInicio[0]["perfil"])) echo $listaInicio[0]["perfil"];
                          else {
                            echo "perfil.png";
                          } ?> " alt="Perfil" class="img-fluid rounded-circle">

        <h1 class="text-light"><a href="#">
            <?php if (isset($listaInicio[0]["nombre"])) echo $listaInicio[0]["nombre"];
            else {
              echo "Liam";
            } ?>
          </a></h1>

        <div class="social-links mt-3 text-center ">
          <a target="_blank" class="facebook rounded-circle" href="<?php if (isset($listaInicio[0]["facebook"])) echo $listaInicio[0]["facebook"];
                                                                    else {
                                                                      echo "#";
                                                                    } ?>">
            <i class="fa-brands fa-facebook-f"></i></a>

          <a target="_blank" class="instagram" href="<?php if (isset($listaInicio[0]["instagram"])) echo $listaInicio[0]["instagram"];
                                                      else {
                                                        echo "#";
                                                      } ?>">
            <i class="fa-brands fa-instagram"></i></a>

          <a target="_blank" class="linkedin" href="<?php if (isset($listaInicio[0]["linkedin"])) echo $listaInicio[0]["linkedin"];
                                                    else {
                                                      echo "#";
                                                    } ?>">
            <i class="fa-brands fa-linkedin-in"></i></a>

          <a target="_blank" class="github" href="<?php if (isset($listaInicio[0]["github"])) echo $listaInicio[0]["github"];
                                                  else {
                                                    echo "#";
                                                  } ?>">
            <i class="fa-brands fa-github"></i></a>

          </div>
          <div class="cv">
           <a href="../cv/<?php if (isset($listaInicio[0]["cv"])) echo $listaInicio[0]["cv"];
                                                  else {
                                                    echo "#";
                                                  } ?>" target="_blank">Abrir CV</a>
          </div>

      </div>
      <div class="navegacion-menu">
        <nav class="d-flex flex-column">
          <a href="#inicio"><i class="fa-solid fa-house"></i> Inicio</a>
          <a href="#habilidades"><i class="fa-solid fa-note-sticky"></i> Habilidades</a>
          <a href="#proyectos"><i class="fa-solid fa-book"></i> Proyectos</a>
          <a href="#contacto"><i class="fa-solid fa-envelope"></i> Contacto</a>
        </nav>
      </div>
    </div>

    <strong style="position: absolute; bottom: 30px; color:white">Copyright &copy; 2023
    <a target="_blank" href="../vista/login.php">Administrar</a>
  </strong>

  </header>

  <section class="fondo" id="inicio">
    <div class="texto-fondo" data-aos="fade-in" data-aos-duration="2000">
      <h1><?php if (isset($listaInicio[0]["titulo"])) echo $listaInicio[0]["titulo"];
          else {
            echo "Liam";
          } ?></h1>
      <h3><?php if (isset($listaInicio[0]["subtitulo"])) echo $listaInicio[0]["subtitulo"];
          else {
            echo "Front end";
          }  ?></h3>
      <p><?php if (isset($listaInicio[0]["contenido"])) echo $listaInicio[0]["contenido"];
          else {
            echo "me gusta la programacion";
          }  ?> </p>
    </div>
  </section>
  <div class="main">
      

      
  <section id="habilidades">
    <div class="container mt-5">
       <div class="portafolio">
          <h2 class="">Habilidades</h2>
       </div>
    <div class="row mt-4"  data-aos="fade-up" data-aos-delay="100">

      <?php foreach($listaHabilidades as $habilidades){?>
          <div class="col-lg-2 col-md-3 col-sm-6 habilidades mb-4" >
              <div class="carta imagen-habilidades ">
                <img src="../img/<?php echo $habilidades["habilidadImagen"]?>" class="img-fluid">
              </div>
          </div>
      <?php }?>       
        
          
    </div>
    </div>
  
  </section>

    <section class="portafolio" id="proyectos">
      <div class="container mt-5" >
        <h2 class="">Proyectos</h2>
        <div class="row mt-4" data-aos="fade-up" data-aos-delay="100">

          <?php foreach($listaProyecto as $Proyecto) {?>

          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="carta"> 
            <img src="../img/<?php if (isset($Proyecto["proyectoImagen"])) echo $Proyecto["proyectoImagen"];
                          else {echo "perfil.png";} ?>" alt="imagen-proyecto" class="img-fluid">

            <div class="carta-contenido" >
                <h3> <?php if (isset($Proyecto["tituloProyecto"])) echo $Proyecto["tituloProyecto"];
                  else { echo "titulo"; } ?></h3>
                <p> <?php if (isset($Proyecto["contenidoProyecto"])) echo $Proyecto["contenidoProyecto"];
                  else {echo "contenido";} ?>
                </p>
              </div>
              <div class="carta-link">              
                  <a href="<?php if (isset($Proyecto["dominio"])) echo $Proyecto["dominio"];
                  else {echo "#";} ?>" target="_blank" class="dominio-proyecto"><i class="fa-solid fa-desktop"></i></a>
                  <a href="<?php if (isset($Proyecto["github"])) echo $Proyecto["github"];
                  else {echo "#";} ?>" target="_blank" class="github-proyecto"><i class="fa-brands fa-github"></i></a>
                </div>
            </div>
          </div>

                <?php }?>

                
        </div>
      </div>
    </section>

    <section id="contacto">
            <div class="portafolio">
              <div class="container mt-5" >
              <h2 class="">Contacto</h2>
                               <div class="row justify-content-center">
                         <div class="col-md-6">
                             <form method="post">
                                  <div class="form-group">
                                      <label for="name">Nombre:</label>
                                       <input type="text" class="form-control mt-2" name="name" id="name" required>
                                 </div>
                                 <div class="form-group">
                                     <label for="email">Correo Electrónico:</label>
                                     <input type="email" class="form-control mt-2" name="email" id="email" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="asunto">Asunto:</label>
                                     <input type="text" class="form-control" name="asunto" id="asunto" required>
                                 </div>
                                  <div class="form-group">
                                     <label for="msg">Mensaje:</label>
                                     <textarea class="form-control mt-2" name="msg" id="msg" rows="4" required></textarea>
                                 </div>
                                  <button type="submit" class="btn btn-primary mt-3" name="enviar">Enviar</button>
                              </form>
                         </div>
                      </div>
               
                </div>
            </div>

            <?php
  if(isset($_POST["enviar"])){
    if(!empty($_POST["name"]) && !empty($_POST["asunto"]) && !empty($_POST["msg"]) && !empty($_POST["email"])){
        $name = $_POST["name"];
        $asunto = $_POST["asunto"];
        $msg = $_POST["msg"];
        $email = $_POST["email"];
        
        // Configura el servidor SMTP de Gmail
        ini_set('SMTP', 'smtp.gmail.com');
        ini_set('smtp_port', 587);
        ini_set('sendmail_from', 'ce27.laime@gmail.com'); 
        
        $header = "From: ce27.laime@gmail.com" . "\r\n"; 
        $header .= "Reply-To: ce27.laime@gmail.com" . "\r\n"; 
        $header .= "X-Mailer: PHP/" . phpversion();
        
        $mail = mail($email, $asunto, $msg, $header);
        
        if($mail){
            echo '<div class="alert alert-success text-center mt-2" role="alert" id="success-message">Mail enviado exitosamente</div>';
        }
    } 
}
  ?>

            
    </section>
  </div>


<script>
    setTimeout(function() {
        document.getElementById("success-message").style.display = "none";
    }, 3000); 
</script>

  <script src="../js/index.js"> </script>
  <script>
    AOS.init();
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>