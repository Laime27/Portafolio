<?php   include ("../Conexion/conexion.php"); 


$sentenciasql = $conexion->prepare("select * from proyectos");
$sentenciasql->execute();
$listaProyecto = $sentenciasql->fetchAll(PDO::FETCH_ASSOC);


$accion = isset($_POST["accion"]) ? $_POST["accion"] : "";

$idProyecto = isset($_POST["idProyecto"]) ? $_POST["idProyecto"] : "";
$imagenProyecto=(isset($_FILES["imagenProyecto"]["name"]))?$_FILES["imagenProyecto"]["name"]:"";
$tituloProyecto = isset($_POST["TituloProyecto"]) ? $_POST["TituloProyecto"] : "";
$contenidoProyecto = isset($_POST["ContenidoProyecto"]) ? $_POST["ContenidoProyecto"] : "";
$dominioProyecto = isset($_POST["dominioProyecto"]) ? $_POST["dominioProyecto"] : "";
$githubProyecto = isset($_POST["githubProyecto"]) ? $_POST["githubProyecto"] : "";



switch ($accion) {

    case "CrearProyecto":
        $sentenciaSQL = $conexion->prepare("INSERT INTO proyectos(proyectoImagen, tituloProyecto, contenidoProyecto, github,dominio) 
        VALUES (:proyectoImagen, :tituloProyecto, :contenidoProyecto,:github,:dominio)");

        $sentenciaSQL->bindParam(":tituloProyecto", $tituloProyecto);
        $sentenciaSQL->bindParam(":contenidoProyecto", $contenidoProyecto);
        $sentenciaSQL->bindParam(":github", $githubProyecto); 
        $sentenciaSQL->bindParam(":dominio", $dominioProyecto);

        $fecha= new DateTime();
        $nombreArchivo=($imagenProyecto!="")?$fecha->getTimestamp()."_".$_FILES["imagenProyecto"]["name"]:"";
        $imagentemporal=$_FILES["imagenProyecto"]["tmp_name"];
        if($imagentemporal!=""){
            move_uploaded_file($imagentemporal,"../img/".$nombreArchivo);
        }
        
        $sentenciaSQL->bindParam(":proyectoImagen", $nombreArchivo);
        $sentenciaSQL->execute();
        header("location:../vista/proyecto.php");
       
        break;
      
     case "eliminarProyecto":
          $sentenciaSQL= $conexion->prepare("SELECT proyectoImagen FROM proyectos WHERE idproyecto = :id");
          $sentenciaSQL->bindParam(':id',$idProyecto);
          $sentenciaSQL->execute();

          $imgenProyecto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            if(isset($imgenProyecto["proyectoImagen"]) && ($imgenProyecto["proyectoImagen"]!="imagen.jpg")){
                if(file_exists("../img/".$imgenProyecto["proyectoImagen"])){  
                  unlink("../img/".$imgenProyecto["proyectoImagen"]);
                }
            }

        $sentenciaSQL = $conexion->prepare("DELETE FROM proyectos WHERE idproyecto=:id");
        $sentenciaSQL->bindParam(":id", $idProyecto);
        $sentenciaSQL->execute(); 
       
      header("location:../vista/proyecto.php");
       
        break;
    
     case "actualizarProyecto":
      $sentenciaSQL = $conexion->prepare("UPDATE proyectos SET  tituloProyecto=:tituloProyecto, contenidoProyecto=:contenidoProyecto, github=:github,dominio=:dominio WHERE idproyecto=:id");
      $sentenciaSQL->bindParam(":id", $idProyecto);
      $sentenciaSQL->bindParam(":tituloProyecto", $tituloProyecto);
      $sentenciaSQL->bindParam(":contenidoProyecto", $contenidoProyecto);
      $sentenciaSQL->bindParam(":dominio", $dominioProyecto);
      $sentenciaSQL->bindParam(":github", $githubProyecto);
      $sentenciaSQL->execute();
      
      if($imagenProyecto!= ""){
          $fecha= new DateTime();
          $nombreArchivo=($imagenProyecto!="")?$fecha->getTimestamp()."_".$_FILES["imagenProyecto"]["name"]:"imagen.jpg";
          $imagentemporal=$_FILES["imagenProyecto"]["tmp_name"];
          move_uploaded_file($imagentemporal,"../img/".$nombreArchivo);
          $sentenciaSQL= $conexion->prepare("SELECT proyectoImagen FROM proyectos WHERE idproyecto = :id");
          $sentenciaSQL->bindParam(':id',$idProyecto);
          $sentenciaSQL->execute();
          $imgenProyecto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
          
            if(isset($imgenProyecto["proyectoImagen"]) && ($imgenProyecto["proyectoImagen"]!="imagen.jpg")){
                if(file_exists("../img/".$imgenProyecto["proyectoImagen"])){   
                  unlink("../img/".$imgenProyecto["proyectoImagen"]);
                }
            } 

          $sentenciaSQL= $conexion->prepare("UPDATE proyectos set proyectoImagen= :proyectoImagen WHERE idproyecto = :id");
          $sentenciaSQL->bindParam(':proyectoImagen',$nombreArchivo); 
          $sentenciaSQL->bindParam(':id',$idProyecto);
          $sentenciaSQL->execute();
        }
       
        header("location:../vista/proyecto.php");
      break;

     
}

?>