<?php
include("../crud/model/connection.php");
if(!empty($_POST["btnDocumento"])){

    if(!empty($_POST["documento"])){
        $documento=$_POST["documento"];

        $consulta=$con->query("SELECT COUNT(*) AS 'total' FROM personas WHERE documento = '$documento'");
        $name=$con->query("SELECT `documento` FROM `personas` WHERE `documento` = '$documento'");
        $nombre_sql =$con->query("SELECT `nombre` FROM `personas` WHERE `documento` = '$documento'");
        $apellido_sql =$con->query("SELECT `apellido` FROM `personas` WHERE `documento` = '$documento'");
        // $cargo=$con->query("");
        if($consulta->fetch_object()->total > 0){
            $documento_mostrado=$name->fetch_object()->documento;
            $nombre_mostrado=$nombre_sql->fetch_object()->nombre;
            $apellido_mostrado=$apellido_sql->fetch_object()->apellido;


        } else{
            echo'<script>
            alert("El documento no existe");
            window.location = "../pages/registro_dispositivos.php";
        </script>'; 
        }
    } else{
        echo'<script>
        alert("EL campo está vacío");
        window.location = "../pages/registro_dispositivos.php";
    </script>'; 
    
    }
}
?>
