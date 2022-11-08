<?php

session_start();
if(!isset($_SESSION ['documento'])){
    echo '<script>
        alert("Por favor inicie sesión");
        
    </script>';
    
    header("Location: ../index.php");
    session_destroy();
    die();
}

include("../crud/model/connection.php");

$id=$_GET["id"];

$sql=$con->query(" SELECT * FROM item WHERE id=$id");
?>
<!-- Pagina para modificar los registros de usuarios existentes en la tabla personas de la base de datos -->
<!DOCTYPE html>
<html class="" lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar item</title>
    <!-- Estilos css -->
    
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/sb-admin-2.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body class="nav">
    <?php
        include("../componentes/navbar.php");
    ?> 
    <!-- Formulario para modificar registros de usuarios -->
<div class="container">
    <div class="row mt-5">
        <div class="col-12 p-7 d-flex justify-content-center mt-5">
            <form class="form p-5 border bg-white p-5 rounded-5 text-black shadow" method="POST">
                <h3 class="text-center" >Editar Nombre</h3>
                <input type="hidden" name="id" value="<?= $_GET["id"]?>">
                <?php
                include("../crud/controller/modificar_items.php");

                while ($datos=$sql->fetch_object()) {?>
                <div class="form form-group">
                    <label for="inputPassword2" class=" mb-1">Documento</label>
                    <input type="text" class="form-control mb-1"  placeholder="Ingrese nombre" name="item" value="<?= $datos->descripcion ?>">
                </div>
                <?php }
                ?>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success mt-2" value="ok" name="btnModificar">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin de formulario para modificar registros de usuarios -->
</body>
</html>

<?php
include("../componentes/footer.php");
?>
