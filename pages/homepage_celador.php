<!-- Pagina web del Celador -->
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


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio-Celador</title>
    <!-- link Css -->
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/style.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/sb-admin-2.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../jquery/css/alertify.css">
    <link rel="stylesheet" href="../jquery/css/themes/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;1,300&display=swap" rel="stylesheet">

</head>
<body class="nav">

<?php
    include("../componentes/navbar_celador.php");
    $roles = $_SESSION ['roles'];
    switch ($roles) {
    case $roles==1:
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        break;
    default:
        echo "error de registro";
        break;
    }
?>

<!-- Section inicio -->
<section class="container mt-5">
<div class="row mt-5">
<div class="col-12 col-sm-6 col-md-6 col-xl-6 mt-4 ml-auto mr-auto">
                <h1 id="td" class="text-center mb-2">Sede TIC</h1>
                <h4 class=" text-center text-black">Con t&uacute; ayuda mejoramos cada d&iacute;a m&aacute;s</h4>
                <p class="h5 text-center mt-4 text-secondary">En esta sede del Sena nos enfocamos en el bienestar
                     de nuestros empleados y aprendices Sena, t&uacute; tambi&eacute;n eres parte del cambio.
                      Ayudanos a progresar.</p>            
                 
                      <div class="d-flex justify-content-center">
                   
                   <a id="th" href="#tabla" class="btn text-white btn-light mt-2" href="#crud">Ver Registros</a>
                    
                   </div>          
                            
                
            </div>
        <div class="col-12 col-sm-6 col-md-6 col-xl-6 mt-5 ">
            <div class=" shadow p-3 mb-5 bg-white rounded mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 text-center">
                    <img src="../bootstrap-5.0.2-dist/img/logo-de-SENA-png-Negro.png" class="img-fluid rounded-start" alt="Logo-Sena">
                    </div>
                    <div class="col-md-8 mt-4 pl-5">
                    <div class="card-body mt-2">
                        <h5 class="card-title pl-4">Vigilancia</h5>
                        <a id="th" class="btn text-white btn-light mt-1" href="#crud">Registar Usuarios</a>
                    </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>
<!-- Fin del section inicio -->

<!-- Registro de personas -->
    <div class="container-fluid" id="crud">
        <div class="row mt-5">
            <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-4 col-xxl-4 p-4 mt-5 ml-auto mr-auto">
            <form class="form p-5 rounded border shadow needs-validation" novalidate method="POST" onsubmit="return validarDatos();">
                <h3 class="text-center" >Registro de Personas</h3>
                <?php
                include("../crud/model/connection.php");
                include("../crud/controller/registro_personas.php");
                ?>
                        <div class="form form-group">
                        <label for="documentoVAL" class="form-label mb-1">Tipo Documento</label>
                        <select class="form-select gn  mb-1" id="documentoVAL" required name="tipo_documento" aria-label="Default select example" placeholder="Tipo de roles">
                            <option class="form mb-1" list="listaRoles" value="" selected disabled>Seleccione</option>
                            <option class="form mb-1" list="listaRoles" value="4">CC</option>
                            <option class="form mb-1" list="listaRoles" placeholder="Tipo de documento" value="5">CE</option>
                            <option class="form mb-1" list="listaRoles" placeholder="Tipo de documento" value="3">TI</option>
                        </select>
                        <div class="invalid-feedback">
                            Sleccione un tipo de documento
                        </div>
                    </div>
                    <div class="form form-group">
                        <label for="validationCustom02" class="form-label mb-1">Documento</label>
                        <input type="text" class="form-control label input mb-1" id="validationCustom02" required placeholder=" Numero De Documento" name="documento" id="age" onkeypress="return valideKey(event);">
                        <div class="valid-feedback">
                            Correcto
                        </div>
                        <div class="invalid-feedback">
                            campo requerido
                        </div>
                    </div>
                    <div class="form form-group">
                        <label for="validationCustomUsername" class="form-label mb-1">Correo</label>
                        <div class="has-validation">
                            <input type="text" class="form-control label input mb-1" id="validationCustomUsername" required placeholder="Ingrese Su Correo" name="correo">
                            <div class="valid-feedback">
                            Correcto
                        </div>
                        <div class="invalid-feedback">
                            campo requerido
                        </div>
                    </div>
                    </div>
                    <div class="form form-group">
                        <label for="NombreVALIDATION" class="form-label mb-1">Nombre</label>
                        <input type="text" class="form-control label input mb-1" id="NombreVALIDATION" required placeholder="Ingrese Su Nombre" name="nombre">
                        <div class="valid-feedback">
                            Correcto
                        </div>
                        <div class="invalid-feedback">
                            campo requerido
                        </div>
                    </div>
                    <div class="form form-group">
                        <label for="ApellidoVALL" class="form-label mb-1">Apellido</label>
                        <input type="text" class="form-control label input mb-1" id="ApellidoVALL" required placeholder="Ingrese Su Apellido" name="apellido">
                        <div class="valid-feedback">
                            Correcto
                        </div>
                        <div class="invalid-feedback">
                            campo requerido
                        </div>
                    </div>
                    <div class="form form-group">
                        <label for="validationCustom001" class="form-label mb-1">Roles</label>
                        <select id="validationCustom001" class="form-select gn mb-1" name="rol" required aria-label="Default select example" placeholder="Tipo de roles">
                            <option class=" form mb-1" list="listaRoles" value="" selected disabled>Seleccione</option>
                            <option class=" form mb-1" list="listaRoles" placeholder="Tipo de roles" value="6">Instructor</option>
                        </select>
                        <div class="valid-feedback">
                            Correcto
                        </div>
                        <div class="invalid-feedback">
                            Seleccione un rol
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-auto ml-auto mr-auto">
                        <button type="submit" class="btn text-light btn-success mt-2 p-2" value="ok" name="btnGuardar">Ingresar Registro</button>
                        <a href="#tabla" class="btn text-light btn-danger mt-2 p-2" value="ok" name="btnGuardar">Ver registros</a>
                    </div>
                    </div>
            </form>
            </div>
            </div>
            <!-- Fin de registro de personas -->

            <!-- Inicio del CRUD -->
            <div class="row mt-5">
            <div class="col-12 col-sm-12 col-md-9 col-xl-9 p-4 shadow mt-5 ml-auto mr-auto" id="tabla">
            <div class="overflow-auto">
            <?php
            include("../crud/model/connection.php");
            include("../crud/controller/eliminar_persona.php");
            ?>
                <table class="table rounded border table-hover text-center text-white" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" id="th">Tipo De Documento</th>
                            <th scope="col" id="th">Documento</th>
                            <th scope="col" id="th">Correo</th>
                            <th scope="col" id="th">Nombre</th>
                            <th scope="col" id="th">Apellido</th>
                            <th scope="col" id="th">Editar</th>
                        </tr>
                    </thead>
                        <tbody id="myTable">
                        <?php
                            include("../crud/model/connection.php");
                            $sql = $con->query(" SELECT * FROM personas");
                            while($datos=$sql->fetch_object()) {
                                    $sql_tipoDoc = $con->query("SELECT descripcion FROM sub_item   WHERE id = '$datos->tipo_documento'");
                                    while($row= mysqli_fetch_array($sql_tipoDoc)) {
                                    $tipoDoc = $row['descripcion'];
                                    }?>
                            <tr class="table-active">
                                <td id="td" ><?= $tipoDoc?></td>
                                <td id="td" ><?= $datos->documento?></td>
                                <td id="td" ><?= $datos->correo?></td>
                                <td id="td" ><?= $datos->nombre?></td>
                                <td id="td" ><?= $datos->apellido?></td>
                                <td id="td" >
                                    <a class="btn btn-small btn-warning" href="./modificar_p_celador.php?id=<?= $datos->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/> </svg></a>
                                </td>
                            </tr>
                        <?php
                            }
                            ?> 
                        </tbody>
                </table>
            </div>
            </div>
            </div>
            <!-- Fin del CRUD -->
        </div>
    </div>
</body>
<script>
       function validarDatos(){
          var documento, nombre, apellido, correo, expresiones, ExpRegLetrasEspacio;
          
          documento = document.getElementById("validationCustom02").value;
          nombre = document.getElementById("NombreVALIDATION").value;
          apellido = document.getElementById("ApellidoVALL").value;
          correo = document.getElementById("validationCustomUsername").value;
          
          expresiones = /\w+@\w+\.+[a-z]/;
          ExpRegLetrasEspacio=/^[ a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/;

          if(documento.length>30){
            alertify
.alert("el documento es muy largo.", function(){
    alertify.message('OK');
});
            return false;
          }
          if(correo.length>80){
            alertify
            .alert("el correo es muy largo.", function(){
    alertify.message('OK');
});
            return false;
            
          }
          if(!expresiones.test(correo)){
            alertify
.alert("el correo no es válido.", function(){
    alertify.message('OK');
});
            return false;

          }
          if(nombre.length>70){
            alertify
.alert("el nombre es muy largo.", function(){
    alertify.message('OK');
});            
return false;
          }
          if(!ExpRegLetrasEspacio.test(nombre)){
            alertify
.alert("el nombre solo debe contener espacios y/o letras, pero no puede estar vacío.", function(){
    alertify.message('OK');
});           
return false;

          }
          if(apellido.length>70){
            alertify
.alert("el apellido es muy largo.", function(){
    alertify.message('OK');
});
            return false;
          }
          if(!ExpRegLetrasEspacio.test(apellido)){
            alertify
.alert("el apellido solo debe contener espacios y/o letras, pero no puede estar vacío.", function(){
    alertify.message('OK');
});
return false;
}

          if(isNaN(documento)){
            alertify
.alert("el documento no es válido.", function(){
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

<?php
    include("../componentes/footer.php");
    ?>





    