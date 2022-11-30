<?php
 include('../crud/model/connection.php');

    
        $id=$_POST["id"];
         session_start();
         include('../crud/model/constantes.php');

        $sql=$con->query("UPDATE `objetos` SET `fecha_salida`='".$fecha_salida."', `h_salida`='".$h_salida."' WHERE id='".$id."'");
        if ($sql==1) {
            echo 'Salida actualizada correctamente';
        }else{
            echo'
            <script>
                alert("Error");
                window.location = "../pages/registro_dispositivos.php";
            </script>
            ';
        }
    
?>

