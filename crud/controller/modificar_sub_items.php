<!-- Este codigo modifica los registros de item ya existentes en la base de datos y los actualiza de manera inmediata en la vista de items que este en la pagina de items.php-->
<?php
if (!empty($_POST["btnModificar"])) {
    if (!empty($_POST["sub_item"]) AND !empty($_POST["descripcion"])) {
        $id=$_POST["id"];
        $sub_item=$_POST["sub_item"];


        $sql_sub=$con->query("UPDATE `sub_item` SET `descripcion`='$sub_item' WHERE `id`=$id");
        if ($sql_sub==1) {
            echo '<script>
            window.location = "../pages/items.php";
        </script>';
        
        } else {
            echo'<div class="alert alert-danger">Error al modificar sub_item</div>';
        }
        
    }else{
        echo'<div class="alert alert-warning">El campos está vacío</div>';
    }
}
?>
