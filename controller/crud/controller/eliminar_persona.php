<!-- Este codigo elimina los registros de usuarios según su identificador en la base de datos, en la tabla personas -->
<?php
if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$con->query(" DELETE FROM personas WHERE id=$id ");
    if ($sql==1) {
        echo'<div class=" alert alert-success">Persona Eliminada Correctamente</div>';
    } else {
        echo'<div class=" alert alert-danger">Error Al Eliminar</div>';
    }
    
}
?>