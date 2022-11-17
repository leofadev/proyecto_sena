<?php
include("../crud/model/connection.php");
session_start();

if (!empty($_POST["btnIngresar"])) {
    if (!empty($_POST["nombre"]) AND !empty($_POST["document"]) AND !empty($_POST["apellido"]) AND !empty($_POST["cargo"]) AND !empty($_POST["dispositivo"])) {
        $documento=$_POST["document"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $cargo=$_POST["cargo"];
        $dispositivo=$_POST["dispositivo"];
        $nombreCompleto = $_SESSION ['nombre_user'];

        $sql=$con->query("INSERT INTO `objetos`(`vigiliante`,`documento`,`nombre`,`apellido`,`fecha`, `cargo`, `dispositivo`, `h_ingreso`) VALUES ('$nombreCompleto','$documento','$apellido','$nombre','$fecha','$cargo','$dispositivo','$h_ingreso')");
        
        if ($sql==1) {
            header("Location: ../pages/registro_dispositivos.php");
            echo'<div class="alert alert-success"> Ingreso Registrado Correctamente
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else {
            echo'<div class="alert alert-success">  Registro De Ingreso Fallido</div>';
        }
        
    }else{
        echo'<div class="alert alert-success"> Alguno De Los Campos Están Vacios</div>';
    }
}
?>