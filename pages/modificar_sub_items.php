<?php

include("../crud/model/connection.php");

$id=$_GET["id"];

$sql=$con->query(" SELECT * FROM sub_item WHERE id='$id'");
?>
<!-- Pagina para modificar los registros de usuarios existentes en la tabla personas de la base de datos -->
<!DOCTYPE html>
<html class="" lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar sub&iacute;tem</title>
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
            <form class="form p-5 rounded border shadow needs-validation" novalidate method="POST" onsubmit="return modificarSub();">
                <h3 class="text-center" >Editar sub&iacute;tem</h3>
                <input type="hidden" name="id" value="<?= $_GET["id"]?>">
                <?php
                include("../crud/controller/modificar_sub_items.php");
                 
                $sql=$con->query(" SELECT * FROM sub_item WHERE id='$id'");
               
                while($dato=$sql->fetch_object()) {?>
                <div class="form form-group">
                    <label  for="subitem22" class="form-label mb-1">Modificar sub&iacute;tems</label>
                    <input  id="subitem22"  class="form-control label input mb-1" type="text" placeholder="Ingrese nombre" name="sub_item" value="<?= $dato->descripcion ?>" required>
                    <div class="valid-feedback">
                        Correcto
                    </div>
                    <div class="invalid-feedback">
                        Campo requerido
                    </div>
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
<script>
function modificarSub(){
   var nombre,ExpRegLetrasEspacio;
   

   nombre = document.getElementById("subitem22").value;

   

   ExpRegLetrasEspacio= /^[ a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/;

  
   if(nombre.length>70){
     alert("el nombre es muy largo");
     return false;
   }
   if(!ExpRegLetrasEspacio.test(nombre)){
     alert("Solo debe contener letras y/ espacios, pero no puede estar vacío");
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
</html>

<?php
include("../componentes/footer.php");
?>
