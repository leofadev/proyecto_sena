<!-- Este codigo modifica los registros de item ya existentes en la base de datos y los actualiza de manera inmediata en la vista de items que este en la pagina de items.php-->
<?php
if (!empty($_POST["btnModificar"])) {
    if (!empty($_POST["item"])) {
        $id=$_POST["id"];
        $item=$_POST["item"];

        $sql=$con->query("UPDATE `item` SET `descripcion`=' $item' WHERE `id`=$id");
        if ($sql==1) {
            header("Location:./items.php");
        } else {
            echo'<div class="alert alert-danger">Error al modificar item</div>';
        }
        
    }else{
        echo'<div class="alert alert-warning">El campos está vacío</div>';
    }
}
?>
