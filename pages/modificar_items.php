<?php

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
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/style.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/sb-admin-2.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body class="nav">
    <?php
        include("../componentes/navbar.php");
    ?> 
    <!-- Formulario para modificar registros de  -->
<div class="container">
    <div class="row mt-5">
        <div class="col-12 p-7 d-flex justify-content-center mt-5">
            <form class="form p-5 rounded border shadow" method="POST">
                <h3 class="text-center" >Editar items</h3>
                <input type="hidden" name="id" value="<?= $_GET["id"]?>">
                <?php
                include("../crud/controller/modificar_item.php");

                $sql=$con->query(" SELECT * FROM item WHERE id=$id");
                while($dat=$sql->fetch_object()) {?>
                <div class="form form-group">
                    <label class=" mb-1">Modificar items</label>
                    <input type="text" class=" label input mb-1"  placeholder="Ingrese nombre" name="item" value="<?= $dat->descripcion ?>">
                </div>
                <?php
                    }
                ?>
                <div class="col-auto">
                    <button id="th" type="submit" class="btn text-light btn-dark mt-2" value="ok" name="btnModificar">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin de formulario para modificar registros de s -->
</body>
</html>

<?php
include("../componentes/footer.php");
?>
