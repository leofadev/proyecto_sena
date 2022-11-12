<?php
 include('../crud/model/connection.php');

    
        $id=$_POST["id"];
         session_start();
         include('../crud/model/constantes.php');

        $sql=$con->query("UPDATE `objetos` SET `fecha_salida`='".$fecha_salida."', `h_salida`='".$h_salida."' WHERE id='".$id."'");
        if ($sql==1) {
            echo 'fecha y hora cambiada correctamente';
        }else{
            echo'<div class="alert alert-danger"> Error Al Modificar El Registro</div>';
        }
    
?>

