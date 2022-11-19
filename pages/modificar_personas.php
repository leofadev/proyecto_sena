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

$sql=$con->query(" SELECT * FROM personas WHERE id='$id' ");
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
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/style.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/sb-admin-2.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body class="nav">
     <?php
     include("../crud/controller/navbar.php");
    
    ?>
    <!-- Formulario para modificar registros de usuarios -->
<div class="container">
    <div class="row mt-5">
        <div class="col-12 p-7 d-flex justify-content-center mt-5">
            <form class="form p-5 rounded border shadow" method="POST">
                <h3 class="text-center" >Editar Datos Personales</h3>
                <input type="hidden" name="id" value="<?= $_GET["id"]?>">
                <?php
                include("../crud/controller/modificar_persona.php");

                while ($datos=$sql->fetch_object()) {?>
                <div class="form form-group">
                    <label class="form-label mb-1">Tipo de documento</label>
                    <select id="td" class=" gn mb-1" name="tipo_documento" aria-label="Default select example" placeholder="Tipo de roles">
                    <option class="form mb-1" list="listaRoles" id="exampleDataList" value="#" selected >Seleccione</option>
                    <option class="form mb-1" list="listaRoles" id="exampleDataList" value="4">CC</option>
                    <option class="form mb-1" list="listaRoles" id="exampleDataList" placeholder="Tipo de documento"  value="5">CE</option>
                    <option class="form mb-1" list="listaRoles" id="exampleDataList" placeholder="Tipo de documento"  value="3">TI</option>
                    </select>
                </div>
                <div class="form form-group">
                    <label class=" mb-1">Documento</label>
                    <input type="text" class=" label input mb-1"  placeholder="Ingrese Su Numero De Documento" name="documento" value="<?= $datos->documento ?>" id="age" onkeypress="return valideKey(event);">
                </div>
                <div class="form form-group">
                    <label class=" mb-1">Correo</label>
                    <input type="text" class=" label input mb-1"  placeholder="Ingrese Su Correo" name="correo" value="<?= $datos->correo ?>">
                </div>
                <div class="form form-group">
                    <label class=" mb-1">Nombre</label>
                    <input type="text" class=" label input mb-1"  placeholder="Ingrese Su Nombre" name="nombre" value="<?= $datos->nombre ?>">
                </div>
                <div class="form form-group">
                    <label class=" mb-1">Apellido</label>
                    <input type="text" class=" label input mb-1"  placeholder="Ingrese Su Apellido" name="apellido" value="<?= $datos->apellido ?>">
                </div>
                <?php }
                ?>
                <div class="col-auto">
                    <button id="th" type="submit" class="btn text-light btn-dark mt-2" value="ok" name="btnModificar">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin de formulario para modificar registros de usuarios -->
</body>
<script type="text/javascript">
function valideKey(evt){
    
    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }
}
</script> 
</html>