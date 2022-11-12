<?php
 
if (!empty($_POST["btnModificar"])) {
    if (empty($_POST["fecha_salida"]) AND empty($_POST["h_salida"])) {
        $id=$_POST["id"];


        $sql=$con->query(" UPDATE `objetos` SET `fecha_salida`='$fecha_salida', `h_salida`='$h_salida' WHERE id=$id");
        if ($sql==1) {
            header("Location:../pages/registro_dispositivos.php");
        }else{
            echo'<div class="alert alert-danger"> Error Al Modificar El Registro</div>';
        }
    }else{
        echo'<div class="alert alert-warning"> Alguno De Los Campos Están Vacios</div>';
    }
    }
?>

