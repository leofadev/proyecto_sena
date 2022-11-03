<!-- Este codigo realiza el registros de usuarios a la base de datos, en la tabla personas, y se visualizan de forma inmediata al cargar la pagina web -->
<?php
if(!empty($_POST["btnGuardar"])){
    if(!empty($_POST["tipo_documento"]) and !empty($_POST["documento"]) and !empty($_POST["correo"]) and !empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["pass"]) and !empty($_POST["rol"])){

    $tipo_documento=$_POST["tipo_documento"];
    $documento=$_POST["documento"];
    $correo=$_POST["correo"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $pass=$_POST["pass"];
    //$pass= hash('sha512', $pass);
    $rol=$_POST["rol"];

    $sql=$con->query("INSERT INTO personas( `tipo_documento`, `documento`, `correo`, `nombre`, `apellido`, `pass`, `rol`) VALUES('$tipo_documento','$documento','$correo','$nombre','$apellido','$pass','$rol')");

    if ($sql==1) {
        echo'<div class="alert alert-success">Persona Registrada Correctamente</div>';
    } else {
        echo'<div class="alert alert-danger">Error Al Registrar La Personas</div>';
    }
    
    } else {
        echo'<div class="alert alert-warning">Alguno De Los Campos Está Vacio</div>';
    }
}
?>