<!-- Este codigo realiza el registros de sub_items a la base de datos, en la tabla sub_items, y se visualizan de forma inmediata al cargar la pagina web -->
<?php
if(!empty($_POST["GuardarSubItem"])){
    if(!empty($_POST["id_item"]) AND !empty($_POST["descripcion"])){

    $id_item=$_POST["id_item"];
    $descripcion=$_POST["descripcion"];
   

        //Evitar que se duplique sub_item exixtente
        $consulta_sub_item ="SELECT * FROM sub_item WHERE descripcion = '$descripcion'";
        $verificar_sub_item = mysqli_query($con, $consulta_sub_item);
        if(mysqli_num_rows($verificar_sub_item)>0){
            echo '<script>
                alert("El sub_item ya existe");
                window.location = "../pages/items.php";
            </script>
            
            ';
            exit();
        }

    $sql=$con->query("INSERT INTO `sub_item` (`id_item`, `descripcion`) VALUES ('$id_item','$descripcion')");




    if ($sql==1) {
        echo'<div class="alert alert-success">sub_item registrado correctamnte</div>';
    } else {
        echo'<div class="alert alert-danger">Error al momento de registrar sub_item</div>';
    }
    
    } else {
        echo'<div class="alert alert-warning">El campo está vacío</div>';
    }
}
?>