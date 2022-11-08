<?php
include("../crud/model/connection.php");

if (!empty($_POST["btnModificar"])) {
    if (!empty($_POST["observacion"])) {
        $id = $_POST["id"];
        $observacion = $_POST["observacion"];
        
        $sql=$con->query(" UPDATE `objetos` SET `observacion`='$observacion' WHERE id=$id");
        if ($sql==1) {
            header("Location:../pages/registro_dispositivos.php");
        }else{
            echo'<div class="alert alert-danger"> Error Al Modificar La Observaci&oacute;n</div>';
        }
    }else{
        echo'<div class="alert alert-warning">Campo vacio</div>';
    }
}

?>