<?php
include("../crud/model/connection.php");

$id=$_GET["id"];

$sql=$con->query(" SELECT * FROM objetos WHERE id=$id");
?>
<!-- Pagina para modificar los registros de objetos existentes de la tabla objetos en la base de datos -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Registro</title>
    <!-- Estilos css -->
    
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/sb-admin-2.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body class="nav">
    <!-- <php
        include("../componentes/navbar_celador.php");
    ?> -->
    <!-- Formulario para modificar registro de objetos -->
<div class="container">
    <div class="row mt-5">
        <div class="col-12 p-4 d-flex justify-content-center mt-5">
            <form class="form p-3 rounded border" method="POST">
                <h2 class="text-center mb-3" >¿Est&aacute;s seguro?</h2>
                <p class="card-text mb-2">Dale click al bot&oacute;n "Registar Salida" para registar la fecha y hora de salida del dispositivo.</p>
                <input type="hidden" name="id" value="<?= $_GET["id"]?>">
                <?php
                    include("../crud-celador/modificar_objetos.php");
                    while ($datos=$sql->fetch_object()) {}?>
                
                <div class="col-12 p-2 d-flex justify-content-center mt-1">
                    <button type="submit" class="btn btn-success mt-2" value="ok" name="btnModificar">Registar Salida</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin de formulario para modificar registros de objetos-->
</body>
</html>