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

$sql=$con->query(" SELECT * FROM personas WHERE id=$id ");
?>
<!-- Pagina para modificar los registros de usuarios existentes en la tabla personas de la base de datos -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Datos Personales</title>
    <!-- Estilos css -->
    
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/sb-admin-2.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body class="nav">
    <!-- <php
    include("../componentes/navbar.php");
    ?> -->
    <!-- Formulario para modificar registros de usuarios -->
<div class="container">
    <div class="row mt-5">
        <div class="col-12 p-7 d-flex justify-content-center mt-5">
            <form class="form p-5 rounded border" method="POST">
                <h3 class="text-center" >Editar Datos Personales</h3>
                <input type="hidden" name="id" value="<?= $_GET["id"]?>">
                <?php
                include("../crud/controller/modificar_persona.php");

                while ($datos=$sql->fetch_object()) {?>
                <div class="form form-group">
                    <label for="exampleInputEmail1" class="form-label mb-1">Tipo de documento</label>
                    <select for="inputPassword2" class=" form-select mb-1" name="tipo_documento" aria-label="Default select example" placeholder="Tipo de roles">
                    <option class="form-control mb-1" list="listaRoles" id="exampleDataList" value="#" selected >Seleccione</option>
                    <option class="form-control mb-1" list="listaRoles" id="exampleDataList" value="4">CC</option>
                    <option class="form-control mb-1" list="listaRoles" id="exampleDataList" placeholder="Tipo de documento"  value="5">CE</option>
                    <option class="form-control mb-1" list="listaRoles" id="exampleDataList" placeholder="Tipo de documento"  value="3">TI</option>
                    </select>
                </div>
                <div class="form form-group">
                    <label for="inputPassword2" class=" mb-1">Documento</label>
                    <input type="text" class="form-control mb-1"  placeholder="Ingrese Su Numero De Documento" name="documento" value="<?= $datos->documento ?>">
                </div>
                <div class="form form-group">
                    <label for="inputPassword2" class=" mb-1">Correo</label>
                    <input type="mail" class="form-control mb-1"  placeholder="Ingrese Su Correo" name="correo" value="<?= $datos->correo ?>">
                </div>
                <div class="form form-group">
                    <label for="inputPassword2" class=" mb-1">Nombre</label>
                    <input type="text" class="form-control mb-1"  placeholder="Ingrese Su Nombre" name="nombre" value="<?= $datos->nombre ?>">
                </div>
                <div class="form form-group">
                    <label for="inputPassword2" class=" mb-1">Apellido</label>
                    <input type="text" class="form-control mb-1"  placeholder="Ingrese Su Apellido" name="apellido" value="<?= $datos->apellido ?>">
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