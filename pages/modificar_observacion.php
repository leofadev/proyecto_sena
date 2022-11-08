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

$sql=$con->query(" SELECT `observacion` FROM `objetos` WHERE  id=$id ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/sb-admin-2.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>
<body>
<?php    
    include("../componentes/navbar_celador.php");
?>
<div class="container-fluid mt-5 ">
    <div class="row mt-5 justify-content-center">
    <!-- Formulario para registrar objetos -->
        <div class="col-4 p-4 mt-5">
        <form class="form p-4 rounded border" method="POST">
            <h3 class="text-center">Modificar Observaci&oacute;n</h3>
            <input type="hidden" name="id" value="<?= $_GET["id"]?>">
            <?php

            include("../crud/model/connection.php");
            include("../crud-celador/editar_observacion.php");

            while ($datos=$sql->fetch_object()) { ?>
            
            <div class="col-12 form form-group">
                <label  class=" mb-1">Observaci&oacute;n</label>
                <input type="text" class="form-control mb-1" name="observacion" 
                value="<?= $datos-> observacion?>">
            </div>
            <?php
                }
            ?>
            <div class="col-auto">
                <button type="submit" class="btn btn-success mt-2" value="ok" name="btnModificar">Modificar</button>
            </div>
        </form>
        </div>
        <!-- Fin de formulario para registrar objetos -->      
    </div>
</div>
</body>
</html>

<?php
include("../componentes/footer.php");
?>
