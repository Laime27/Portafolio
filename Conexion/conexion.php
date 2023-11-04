<?php 
    $host = "localhost";
    $usuario = "root";
    $contra = "";
    $db = "portafolio";

    try{
        $conexion = new PDO("mysql:host=$host; dbname=$db",$usuario,$contra);

    } catch(Exception $e){
        echo "<script>alert('error en la conexion de la base de datos');</script>";
    }

    //$url = "http://localhost:3000/Portafolio/";
    //$url = "http://".$_SERVER["HTTP_HOST"]."/Portafolio";
 ?>
