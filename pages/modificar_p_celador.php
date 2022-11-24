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

$sql=$con->query(" SELECT * FROM personas WHERE id =$id");
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
        include("../componentes/navbar_celador.php");
    ?>
    <!-- Formulario para modificar registros de usuarios -->
<div class="container">
    <div class="row mt-5">
        <div class="col-12 p-7 d-flex justify-content-center mt-5">
            <form class="form p-5 rounded border shadow needs-validation" novalidate method="POST" onsubmit="return validarPersonas();">
                <h3 class="text-center" >Editar Datos Personales</h3>
                <input type="hidden" name="id" value="<?= $_GET["id"]?>">
                <?php
                include("../crud/controller/modificar_ps_celador.php");

                while ($datos=$sql->fetch_object()) {?>
                 <div class="form form-group">
                    <label for="seleciona001" class="form-label mb-1">Tipo de documento</label>
                    <select id="seleciona001" class="form-select gn mb-1" name="tipo_documento" required>
                    <option class="form mb-1" list="listaRoles" id="exampleDataList" value="" selected disabled>Seleccione</option>
                    <option class="form mb-1" list="listaRoles" id="exampleDataList" value="4">CC</option>
                    <option class="form mb-1" list="listaRoles" id="exampleDataList" placeholder="Tipo de documento"  value="5">CE</option>
                    <option class="form mb-1" list="listaRoles" id="exampleDataList" placeholder="Tipo de documento"  value="3">TI</option>
                    </select>
                        <div class="valid-feedback">
                            Correcto
                        </div>
                        <div class="invalid-feedback">
                            Seleccione un tipo de documento
                        </div>
                </div>
                <div class="form form-group">
                    <label for="subitem2" class="form-label mb-1">Correo</label>
                    <input  id="subitem2"  class="form-control label input mb-1" type="text" placeholder="Ingrese Su Correo" name="correo" value="<?= $datos->correo ?>" required>
                    <div class="valid-feedback">
                        Correcto
                    </div>
                    <div class="invalid-feedback">
                        Seleccione un tipo de documento
                    </div>
                </div>
                <div class="form form-group">
                    <label for="NombreVALL" class="form-label mb-1">Nombre</label>
                    <input id="NombreVALL"  class="form-control label input mb-1" type="text" placeholder="Ingrese Su Nombre" name="nombre" value="<?= $datos->nombre ?>" required>
                    <div class="valid-feedback">
                        Correcto
                    </div>
                    <div class="invalid-feedback">
                        Seleccione un tipo de documento
                    </div>
                </div>
                <div class="form form-group">
                    <label for="APellidoVALUE" class="form-label mb-1">Apellido</label>
                    <input id="APellidoVALUE"  class="form-control label input mb-1" type="text"  placeholder="Ingrese Su Apellido" name="apellido" value="<?= $datos->apellido ?>" required>
                    <div class="valid-feedback">
                        Correcto
                    </div>
                    <div class="invalid-feedback">
                        Seleccione un tipo de documento
                    </div>
                <?php }
                ?>
                <div class="col-auto">
                    <button id="th" type="submit" class="btn text-light btn-dark mt-2" value="ok" name="btnModificar_c">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin de formulario para modificar registros de usuarios -->

</body>
<script>
       function validarPersonas(){
          var nombre, apellido, correo, expresiones, ExpRegLetrasEspacio;
          
          nombre = document.getElementById("NombreVALL").value;
          apellido = document.getElementById("APellidoVALUE").value;
          correo = document.getElementById("subitem2").value;
          
          expresiones =/\w+@\w+\.+[a-z]/;
          ExpRegLetrasEspacio=/^[ a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/;


          if(correo.length>80){
            alert("el correo es muy largo");
            return false;
            
          }
          if(!expresiones.test(correo)){
            alert("el correo no es válido");
            return false;

          }
          if(nombre.length>70){
            alert("el nombre es muy largo");
            return false;
          }
          if(!ExpRegLetrasEspacio.test(nombre)){
            alert("el nombre solo debe contener letras y/ espacios");
            return false;

          }
          if(apellido.length>70){
            alert("el apellido es muy largo");
            return false;
          }
          if(!ExpRegLetrasEspacio.test(apellido)){
            alert("el apellido solo debe contener letras y/ espacios");
            return false;
          }


        }
    </script>
<script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script> 

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