<?php
include("../crud/model/connection.php");

$id=$_GET["id"];

$sql=$con->query(" SELECT * FROM personas WHERE id=$id");
?>
<!-- Pagina para modificar los registros de usuarios existentes en la tabla personas de la base de datos -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Registro</title>
    <!-- Estilos css -->
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist\css\bootstrap.min.css">
</head>
<body>
    <?php
    include("../componentes/navbar.php");
    ?>
    <!-- Formulario para modificar registros de usuarios -->
<div class="container">
    <div class="row mt-5">
        <div class="col-12 p-4 d-flex justify-content-center">
            <form class="form p-3 rounded border" method="POST">
                <h3 class="text-center" >Modificar Registro</h3>
                <input type="hidden" name="id" value="<?= $_GET["id"]?>">
                <?php
                include("../crud/controller/modificar_persona.php");

                while ($datos=$sql->fetch_object()) {?>
                <div class="form form-group">
                    <label for="inputPassword2" class=" mb-1">Tipo De Documento</label>
                    <input class="form-control mb-1" list="listaDocumento" id="exampleDataList" placeholder="Tipo de documento" name="tipo_documento" value="<?= $datos->tipo_documento?>">
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
                <div class="form form-group">
                    <label for="inputPassword2" class=" mb-1">Contraseña</label>
                    <input type="password" class="form-control mb-1"  placeholder="Ingrese Su Contraseña" name="pass" value="<?= $datos->pass ?>">
                </div>
                <div class="form form-group">
                    <label for="inputPassword2" class=" mb-1">Roles</label>
                    <input class="form-control mb-1" list="listaRoles" id="exampleDataList" placeholder="Tipo de roles" name="rol" value="<?= $datos->rol ?>">
                </div>
                <?php }
                ?>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mt-2" value="ok" name="btnModificar">Modificar Registro</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin de formulario para modificar registros de usuarios -->
</body>
</html>