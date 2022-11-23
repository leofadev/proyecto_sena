<!-- Este codigo realiza el registros de usuarios a la base de datos, en la tabla personas, y se visualizan de forma inmediata al cargar la pagina web -->
<?php
if(!empty($_POST["btnGuardar"])){
    if(!empty($_POST["item"])){

    $item=$_POST["item"];
   

        //Evitar que se duplique item exixtente
        $consulta_item = "SELECT `descripcion` FROM `item` WHERE `descripcion` = '$item'";
        $verificar_item = mysqli_query($con, $consulta_item);
        if(mysqli_num_rows($verificar_item)>0){
            echo '<script>
                alert("El item ya existe");
                window.location = "../pages/items.php";
            </script>
            
            ';
            exit();
        }

    $sql=$con->query("INSERT INTO item(`descripcion`) VALUES('$item')");




    if ($sql==1) {
        echo'<div class="alert alert-success">item registrado correctamnte</div>';
    } else {
        echo'<div class="alert alert-danger">Error al momento de registrar item</div>';
    }
    
    } else {
        echo'<div class="alert alert-warning">El campo está vacío</div>';
    }
}
?>