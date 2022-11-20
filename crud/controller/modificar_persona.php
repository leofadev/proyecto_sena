<!-- Este codigo modifica los registros de usuarios ya existentes en la base de datos y los actualiza de manera inmediata en la vista de la persona que este en la pagina web al cargarla-->
<?php
if (!empty($_POST["btnModificar"])) {
    if (!empty($_POST["tipo_documento"]) AND!empty($_POST["documento"]) AND!empty($_POST["correo"]) AND!empty($_POST["nombre"]) AND!empty($_POST["apellido"])) {
        $id=$_POST["id"];
        $tipo_documento=$_POST["tipo_documento"];
        $documento=$_POST["documento"];
        $correo=$_POST["correo"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];

        $sql=$con->query("UPDATE `personas` SET `tipo_documento`=' $tipo_documento',`documento`='$documento',`correo`='$correo',`nombre`='$nombre',`apellido`='$apellido' WHERE `id` = '$id'");
        if ($sql==1) {
            header("Location:./homepage.php");
        } else {
            echo'<div class="alert alert-danger">Error al modificar la persona</div>';
        }
        
    }else{
        echo'<div class="alert alert-warning">Alguno De Los Campos Está Vacio</div>';
    }
}
?>