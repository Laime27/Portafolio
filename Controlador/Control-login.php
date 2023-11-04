<?php 
session_start();
include("../Conexion/conexion.php");

$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
$contra = isset($_POST["contra"]) ? $_POST["contra"] : "";

$sentenciaSQL = $conexion->prepare("SELECT *, count(*) as n_usuario FROM usuario WHERE email = :email and contra = :contra");
$sentenciaSQL->bindParam(":email", $usuario);
$sentenciaSQL->bindParam(":contra", $contra);
$sentenciaSQL->execute();
$ListaUsuario = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);

if ($ListaUsuario["n_usuario"] > 0) {
    $_SESSION["email"] = $ListaUsuario["email"];
    $_SESSION["logueado"] = true;
    header("location:../vista/principal.php");
} else {
    $mensajeError = "Usuario o contraseña incorrecta.";
}

?>

 


