
<?php  include("../Conexion/conexion.php");

$sentenciasql = $conexion->prepare("select * from inicio");
$sentenciasql->execute();
$listaInicio = $sentenciasql->fetchAll(PDO::FETCH_ASSOC);


$id = isset($_POST["id"]) ? $_POST["id"] : "";
$accion = isset($_POST["accion"]) ? $_POST["accion"] : "";
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
$subtitulo = isset($_POST["subtitulo"]) ? $_POST["subtitulo"] : "";
$contenido = isset($_POST["contenido"]) ? $_POST["contenido"] : "";
$imagen=(isset($_FILES["imagen-perfil"]["name"]))?$_FILES["imagen-perfil"]["name"]:"";

$facebook = isset($_POST["facebook"]) ? $_POST["facebook"] : "";
$instagram = isset($_POST["instagram"]) ? $_POST["instagram"] : "";
$linkedin = isset($_POST["linkedin"]) ? $_POST["linkedin"] : "";
$github = isset($_POST["github"]) ? $_POST["github"] : "";
$cv=(isset($_FILES["cv"]["name"]))?$_FILES["cv"]["name"]:"";



switch ($accion) {
    case "crear":
        $sentenciaSQL = $conexion->prepare("INSERT INTO inicio(nombre, titulo, subtitulo, contenido,facebook,instagram,linkedin,github,perfil,cv) 
        VALUES (:nombre, :titulo, :subtitulo,:contenido,:facebook,:instagram,:linkedin,:github, :perfil, :cv)");

        $sentenciaSQL->bindParam(":nombre", $nombre);
        $sentenciaSQL->bindParam(":titulo", $titulo);
        $sentenciaSQL->bindParam(":subtitulo", $subtitulo);
        $sentenciaSQL->bindParam(":contenido", $contenido);
        $sentenciaSQL->bindParam(":facebook", $facebook);
        $sentenciaSQL->bindParam(":instagram", $instagram);
        $sentenciaSQL->bindParam(":linkedin", $linkedin);
        $sentenciaSQL->bindParam(":github", $github);
       
        $fecha= new DateTime();
        $nombreCV=($cv!="")?$fecha->getTimestamp()."_".$_FILES["cv"]["name"]:"";
        $cvtemporal=$_FILES["cv"]["tmp_name"];

        if($cvtemporal!=""){
            move_uploaded_file($cvtemporal,"../cv/".$nombreCV);
        }

        $fecha= new DateTime();
        $nombreArchivo=($imagen!="")?$fecha->getTimestamp()."_".$_FILES["imagen-perfil"]["name"]:"imagen.jpg";
        $imagentemporal=$_FILES["imagen-perfil"]["tmp_name"];

        if($imagentemporal!=""){
            move_uploaded_file($imagentemporal,"../img/".$nombreArchivo);
        }
        
        $sentenciaSQL->bindParam(":cv", $nombreCV);
        $sentenciaSQL->bindParam(":perfil", $nombreArchivo);
        $sentenciaSQL->execute();
        header("location:../vista/principal.php");
        break;

    case "actualizar":
        $sentenciaSQL = $conexion->prepare("UPDATE inicio SET nombre=:nombre, titulo=:titulo, subtitulo=:subtitulo, contenido=:contenido,facebook=:facebook,instagram=:instagram,linkedin=:linkedin,github=:github WHERE idInicio=:id");
        $sentenciaSQL->bindParam(":id", $id);
        $sentenciaSQL->bindParam(":nombre", $nombre);
        $sentenciaSQL->bindParam(":titulo", $titulo);
        $sentenciaSQL->bindParam(":subtitulo", $subtitulo);
        $sentenciaSQL->bindParam(":contenido", $contenido);
        $sentenciaSQL->bindParam(":facebook", $facebook);
        $sentenciaSQL->bindParam(":instagram", $instagram);
        $sentenciaSQL->bindParam(":linkedin", $linkedin);
        $sentenciaSQL->bindParam(":github", $github);
        
        $sentenciaSQL->execute();
        
        if($cv!= ""){
          $fecha= new DateTime();
          $nombreCV=($cv!="")?$fecha->getTimestamp()."_".$_FILES["cv"]["name"]:"";
          $cvtemporal=$_FILES["cv"]["tmp_name"];
          move_uploaded_file($cvtemporal,"../cv/".$nombreCV);
          
          $sentenciaSQL= $conexion->prepare("SELECT cv FROM inicio WHERE idInicio = :id");
          $sentenciaSQL->bindParam(':id',$id);
          $sentenciaSQL->execute();
          $cvlista=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            if(isset($cvlista["cv"]) && ($cvlista["cv"]!="")){
  
                if(file_exists("../cv/".$cvlista["cv"])){
                  
                  unlink("../cv/".$cvlista["cv"]);
                }
            }
            $sentenciaSQL= $conexion->prepare("UPDATE inicio set cv=:cv WHERE idInicio = :id");
            $sentenciaSQL->bindParam(':cv',$nombreCV); 
            $sentenciaSQL->bindParam(':id',$id);
            $sentenciaSQL->execute();
          }

        if($imagen!= ""){
            $fecha= new DateTime();
            $nombreArchivo=($imagen!="")?$fecha->getTimestamp()."_".$_FILES["imagen-perfil"]["name"]:"imagen.jpg";
            $imagentemporal=$_FILES["imagen-perfil"]["tmp_name"];
            move_uploaded_file($imagentemporal,"../img/".$nombreArchivo);
            
            $sentenciaSQL= $conexion->prepare("SELECT perfil FROM inicio WHERE idInicio = :id");
            $sentenciaSQL->bindParam(':id',$id);
            $sentenciaSQL->execute();
            $perfil=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
              if(isset($perfil["perfil"]) && ($perfil["perfil"]!="imagen.jpg")){
    
                  if(file_exists("../img/".$perfil["perfil"])){
                    
                    unlink("../img/".$perfil["perfil"]);
                  }
              }

            $sentenciaSQL= $conexion->prepare("UPDATE inicio set perfil= :perfil WHERE idInicio = :id");

            $sentenciaSQL->bindParam(':perfil',$nombreArchivo); 
            $sentenciaSQL->bindParam(':id',$id);
            $sentenciaSQL->execute();
          }

        header("location:../vista/principal.php");
        break;
}
?>