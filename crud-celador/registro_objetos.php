<!-- Este codigo realiza el registros de objetos a la base de datos, en la tabla objetos, y se visualizan de forma inmediata al cargar la pagina web -->
<?php
if (!empty($_POST["btnIngresar"])) {
    if (!empty($_POST["nombre"]) AND !empty($_POST["document"]) AND !empty($_POST["apellido"]) AND !empty($_POST["cargo"]) AND !empty($_POST["dispositivo"])) {
        $documento=$_POST["document"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $cargo=$_POST["cargo"];
        $dispositivo=$_POST["dispositivo"];
        //$h_ingreso=$_POST["h_ingreso"];
        //$h_salida=$_POST["h_salida"];
        //$fecha_salida=$_POST["fecha_salida"];

        $sql=$con->query( "INSERT INTO `objetos`(`documento`,`nombre`,`apellido`,`fecha`, `cargo`, `dispositivo`, `h_ingreso`) VALUES ('$documento','$apellido','$nombre','$fecha','$cargo','$dispositivo','$h_ingreso')");
        
        if ($sql==1) {
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