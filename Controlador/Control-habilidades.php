<?php   include ("../Conexion/conexion.php"); 


$sentenciasql = $conexion->prepare("select * from habilidades");
$sentenciasql->execute();
$listaHabilidades = $sentenciasql->fetchAll(PDO::FETCH_ASSOC);


$accion = isset($_POST["accion"]) ? $_POST["accion"] : "";

$idhabilidad = isset($_POST["idhabilidad"]) ? $_POST["idhabilidad"] : "";
$imagenHabilidad=(isset($_FILES["imagenHabilidad"]["name"]))?$_FILES["imagenHabilidad"]["name"]:"";



switch ($accion) {

    case "CrearHabilidad":
        $sentenciaSQL = $conexion->prepare("INSERT INTO habilidades(habilidadImagen) 
        VALUES (:habilidadImagen)");

        $fecha= new DateTime();
        $nombreArchivo=($imagenHabilidad!="")?$fecha->getTimestamp()."_".$_FILES["imagenHabilidad"]["name"]:"";
        $imagentemporal=$_FILES["imagenHabilidad"]["tmp_name"];
        if($imagentemporal!=""){
            move_uploaded_file($imagentemporal,"../img/".$nombreArchivo);
        }
        
        $sentenciaSQL->bindParam(":habilidadImagen", $nombreArchivo);
        $sentenciaSQL->execute();

        header("location:../vista/habilidades.php");
        break;
     

        case "actualizarHabilidad":
            
            if($imagenHabilidad!= ""){
                $fecha= new DateTime();
                $nombreArchivo=($imagenHabilidad!="")?$fecha->getTimestamp()."_".$_FILES["imagenHabilidad"]["name"]:"imagen.jpg";
                $imagentemporal=$_FILES["imagenHabilidad"]["tmp_name"];
                move_uploaded_file($imagentemporal,"../img/".$nombreArchivo);

                $sentenciaSQL= $conexion->prepare("SELECT habilidadImagen FROM habilidades WHERE idhabilidad = :id");
                $sentenciaSQL->bindParam(':id',$idhabilidad);
                $sentenciaSQL->execute();
                $imagenHabilidades=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
                
                  if(isset($imagenHabilidades["habilidadImagen"]) && ($imagenHabilidades["habilidadImagen"]!="imagen.jpg")){
                      if(file_exists("../img/".$imagenHabilidades["habilidadImagen"])){   
                        unlink("../img/".$imagenHabilidades["habilidadImagen"]);
                      }
                  } 
      
                $sentenciaSQL= $conexion->prepare("UPDATE habilidades set habilidadImagen= :habilidadImagen WHERE idhabilidad = :id");
                $sentenciaSQL->bindParam(':habilidadImagen',$nombreArchivo); 
                $sentenciaSQL->bindParam(':id',$idhabilidad);
                $sentenciaSQL->execute();
              }
             
              header("location:../vista/habilidades.php");
            break;


         case "eliminarHabilidad":
            $sentenciaSQL= $conexion->prepare("SELECT habilidadImagen FROM habilidades WHERE idhabilidad = :id");
                $sentenciaSQL->bindParam(':id',$idhabilidad);
                $sentenciaSQL->execute();
                $imgenHabilidad=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                  if(isset($imgenHabilidad["habilidadImagen"]) && ($imgenHabilidad["habilidadImagen"]!="imagen.jpg")){
                      if(file_exists("../img/".$imgenHabilidad["habilidadImagen"])){  
                        unlink("../img/".$imgenHabilidad["habilidadImagen"]);
                      }
                  }
      
              $sentenciaSQL = $conexion->prepare("DELETE FROM habilidades WHERE idhabilidad=:id");
              $sentenciaSQL->bindParam(":id", $idhabilidad);
              $sentenciaSQL->execute(); 
             
            header("location:../vista/proyecto.php");
             
              break;

}

?>