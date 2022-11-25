<?php
//Este codigo modifica la clave del usuario que inicia sesion

include("../model/connection.php");
session_start();
if (!empty($_POST["op"])&& !empty($_POST["np"])&& !empty($_POST["c_np"])) {
    $documento = $_SESSION ['documento'];
    $op = $_POST["op"];
    $np = $_POST["np"];
    $c_np = $_POST["c_np"];
     $roles= $_SESSION ['roles'];
    if ($op!==$np) {
        $query= mysqli_query($con,"SELECT pass FROM `personas` WHERE documento='$documento'");
        if ($query) {
            while ($dato=mysqli_fetch_array($query)) {
                $pass_bd = $dato['pass'];
            }
            if (password_verify($op,$pass_bd)) {
                if ($np===$c_np) {
                    $pass_new = password_hash($np, PASSWORD_DEFAULT);
                    $upDate= mysqli_query($con,"UPDATE `personas` SET `pass` = '$pass_new' WHERE `personas`.`documento` = '$documento';");
                    if ($upDate) {
                        echo '<script>
                    alert("Contraseña cambiada exitosamente");
                        window.location = "../../pages/cambiar_clave.php";
                    </script>
                    
                    ';
                    }
                }else{
                    echo '<script>
                    alert("La contraseñas no coinciden");
                        window.location = "../../pages/cambiar_clave.php";
                    </script>
                    
                    ';
            
                    }
            }else{
                echo '<script>
                alert("La Contraseña actual no coincide con la de la base da datos");
                    window.location = "../../pages/cambiar_clave.php";
                </script>
                
                ';
        
                }
        }
        
    }else{
        echo '<script>
        alert("Las contraseñas no pueden ser iguales");
            window.location = "../../pages/cambiar_clave.php";
        </script>
        
        ';

        }
    }
?>