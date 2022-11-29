<?php
//pagina para cambiar contraseña
session_start();

if (!isset($_SESSION['documento'])) {
    echo '<script>
            alert("Por favor inicie sesión");
            
        </script>';

    header("Location: ../index.php");
    session_destroy();
    die();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cambiar clave</title>
    <!-- Estilos css -->
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/style.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/sb-admin-2.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../jquery/css/alertify.css">
    <link rel="stylesheet" href="../jquery/css/themes/bootstrap.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body class="nav">
    <?php
    $roles = $_SESSION ['roles'];
    switch ($roles) {
        case $roles==1:
        include("../componentes/navbar.php");
        break;
        case $roles==2:
        include("../componentes/navbar_celador.php");
        break;     
        default:
        echo "error de registro";
        break;
    } 
    ?>
    <!-- Formulario para cambiar contraseña -->
    <div class="container mb-3">
    <div class="row mt-5">
        <div class="col-12 p-7 d-flex justify-content-center mt-5">
            <div class="col-12 p-7 d-flex justify-content-center mt-5 mb-5">
                <form action="../crud/controller/modificar_clave.php" class="form p-5 rounded border shadow needs-validation" novalidate method="POST" onsubmit="return ModificarContrasena();">
                    <h2 class="mb-3 text-center">Cambiar Contraseña</h2>
                    <div class="form form-group">
                    <input id="ContraseActual" type="password" name="op" class="form-control label input mb-3" placeholder="Contraseña Actual" required>
                    <div class="valid-feedback">
                        Correcto
                    </div>
                    <div class="invalid-feedback">
                        Campo requerido
                    </div>
                    </div>

                    <div class="form form-group">
                    <input id="passwordNuevo" type="password" name="np" class=" form-control label input  mb-3" placeholder="Nueva Contraseña" required>
                    <div class="valid-feedback">
                        Correcto
                    </div>
                    <div class="invalid-feedback">
                        Campo requerido
                    </div>
                    </div>
                    <div class="form form-group">
                    <input id="claveNueva" type="password" name="c_np" class="form-control label input mb-3" placeholder="Nueva Contraseña" required>
                    <div class="valid-feedback">
                        Correcto
                    </div>
                    <div class="invalid-feedback">
                        Campo requerido
                    </div>

                    </div>
                    <div class="row">
                    <div class="col-auto ml-auto mr-auto">
                    <button type="submit" id="th" name="btnPass" class="btn text-light btn-dark mt-2">Cambiar</button>
                    <a href="../pages/cerrar_sesion.php" class="btn text-light btn-danger mt-2">Salir</a>
                    </div>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>}
</div>
    <!-- Fin de formulario para cambiar contraseña -->
    <?php
    include("../componentes/footer.php");
    
    ?>
</body>
<script>
function ModificarContrasena(){
   var nombre, nueva, confirmar, expresion;
   

   nombre = document.getElementById("ContraseActual").value;
   nueva =   document.getElementById("passwordNuevo").value; 
   confirmar =  document.getElementById("claveNueva").value;

 if(nombre.length>70){
    alertify
.alert("la contraseña es muy larga.", function(){
    alertify.message('OK');
});
    return false;
}
   
if(nueva.length>70){
    alertify
.alert("la contraseña es muy larga.", function(){
    alertify.message('OK');
});
    return false;
    }
    if(confirmar.length>70){
        alertify
.alert("la contraseña es muy larga.", function(){
    alertify.message('OK');
});
     return false;
    }
    if(confirmar != nueva){
        alertify
.alert("la contraseñas no coiciden.", function(){
    alertify.message('OK');
});
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