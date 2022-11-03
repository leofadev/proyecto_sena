<!-- Este codigo realiza el registros de objetos a la base de datos, en la tabla objetos, y se visualizan de forma inmediata al cargar la pagina web -->
<?php
if (!empty($_POST["btnIngresar"])) {
    if (!empty($_POST["nombre"]) AND !empty($_POST["cargo"]) AND !empty($_POST["dispositivo"]) AND !empty($_POST["observacion"])) {
       
        // $fecha=$_POST["fecha"];
        $nombre=$_POST["nombre"];
        $cargo=$_POST["cargo"];
        $dispositivo=$_POST["dispositivo"];
        //$h_ingreso=$_POST["h_ingreso"];
        //$h_salida=$_POST["h_salida"];
        //$fecha_salida=$_POST["h_salida"];
        $observacion=$_POST["observacion"];

        $sql=$con->query( "INSERT INTO `objetos`(`nombre`,`fecha`, `cargo`, `dispositivo`, `h_ingreso`, `observacion`) VALUES ('$nombre','$fecha','$cargo','$dispositivo','$h_ingreso','$observacion')");
        if ($sql==1) {
            echo'<div class="alert alert-success"> Ingreso Registrado Correctamente</div>';
        } else {
            echo'<div class="alert alert-success">  Registro De Ingreso Fallido</div>';
        }
        
    }else{
        echo'<div class="alert alert-success"> Alguno De Los Campos Están Vacios</div>';
    }
}
?>