<!-- Pagina web del Administrador -->
<?php
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
    <title>Administraci&oacute;n</title>
    <!-- Estilos css -->
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/style.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/sb-admin-2.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../jquery/css/alertify.css">
</head>

<body class="nav">
    <script>
        function eliminar() {
            var respuesta = confirm("Estas seguro que deseas eliminar este registro?");
            return respuesta;
        }
    </script>

    <?php
    include("../componentes/navbar.php");
    $roles = $_SESSION ['roles'];
    switch ($roles) {
      case $roles==2:
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
            <div class="col-12 col-sm-6 col-md-6 col-xl-6 mt-5 ">
                <h1 id="td" class=" mb-3">Sede TIC</h1>
                <h4 class="text-center text-black">Con t&uacute; ayuda mejoramos cada d&iacute;a m&aacute;s</h4>
                <p class="h5 mt-4 text-secondary">En esta sede del Sena nos enfocamos en el bienestar de nuestros empleados y aprendices Sena, t&uacute; tambi&eacute;n eres parte del cambio ayudanos a progresar.</p>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-6 mt-5 ">
                <div class=" shadow p-3 mb-5 bg-white rounded mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4 text-center">
                            <img src="../bootstrap-5.0.2-dist/img/logo-de-SENA-png-Negro.png" class="img-fluid rounded-start" alt="Logo-Sena">
                        </div>
                        <div class="col-md-8 mt-4 pl-5">
                            <div class="card-body mt-2">
                                <h5 class="card-title">Administraci&oacute;n</h5>
                                <a id="th" class="btn text-white btn-light" href="#crud">Registar Usuarios</a>
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
            <div class="col-8 col-sm-10 col-md-6 col-xl-3 p-4 mt-5">
                <form class="form p-3 rounded border shadow needs-validation" novalidate method="POST" onsubmit="return validarDatos();">
                    <h3 class="text-center ">Registro de Personas</h3>
                    <?php
                    include("../crud/model/connection.php");
                    include("../crud/controller/registro_personas.php");
                    ?>
                    <div class="form form-group">
                        <label for="documentoVAL" class="form-label mb-1">Tipo de documento</label>
                        <select class="form-select gn  mb-1" id="documentoVAL" required name="tipo_documento" aria-label="Default select example" placeholder="Tipo de roles">
                            <option class="form mb-1" list="listaRoles" value="" selected disabled>Seleccione</option>
                            <option class="form mb-1" list="listaRoles" value="4">CC</option>
                            <option class="form mb-1" list="listaRoles" placeholder="Tipo de documento" value="5">CE</option>
                            <option class="form mb-1" list="listaRoles" placeholder="Tipo de documento" value="3">TI</option>
                        </select>
                            <div class="valid-feedback">
                            Correcto
                        </div>
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
                        <label for="validationCustomUsername1" class="form-label mb-1">Correo</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control label input mb-1" id="validationCustomUsername1" required placeholder="Ingrese Su Correo" name="correo">
                            <div class="valid-feedback">
                            Correcto
                        </div>
                        <div class="invalid-feedback">
                            campo requerido
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
                            <option class=" form mb-1" list="listaRoles" value="1">Administrador</option>
                            <option class=" form mb-1" list="listaRoles" placeholder="Tipo de roles" value="2">Vigilante</option>
                            <option class=" form mb-1" list="listaRoles" placeholder="Tipo de roles" value="6">Instructor</option>
                        </select>
                        <div class="valid-feedback">
                            Correcto
                        </div>
                        <div class="invalid-feedback">
                            Seleccione un rol
                        </div>
                    </div>
                    <div class="col-auto">
                        <button id="th" type="submit" class="btn text-light btn-dark mt-2" value="ok" name="btnGuardar">Ingresar Registro</button>
                    </div>
                </form>
            </div>
            </div>
            <!-- Fin de registro de personas -->

            <!-- Inicio del CRUD -->
            <div class="row mt-5">
            <div class="col-12 col-sm-12 col-md-9 col-xl-9 p-4 shadow mt-5 ml-auto mr-auto">
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
                                <th scope="col" id="th">Rol</th>
                                <th scope="col" id="th">Editar</th>
                                <th scope="col" id="th">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php
                            include("../crud/model/connection.php");
                            $sql = $con->query(" SELECT * FROM personas");
                            while ($datos = $sql->fetch_object()) {
                                $sql_tipoDoc = $con->query("SELECT descripcion FROM sub_item    WHERE id = '$datos->tipo_documento'");
                                while ($row = mysqli_fetch_array($sql_tipoDoc)) {
                                    $tipoDoc = $row['descripcion'];
                                }
                                $sql_rol = $con->query("SELECT descripcion FROM sub_item WHERE id = '$datos->rol'");
                                while ($row = mysqli_fetch_array($sql_rol)) {
                                    $rol = $row['descripcion'];
                                }
                            ?>
                                <tr class="table-active">
                                    <td id="td"><?= $tipoDoc ?></td>
                                    <td id="td"><?= $datos->documento ?></td>
                                    <td id="td"><?= $datos->correo ?></td>
                                    <td id="td"><?= $datos->nombre ?></td>
                                    <td id="td"><?= $datos->apellido ?></td>
                                    <td id="td"><?= $rol ?></td>
                                    <td id="td">
                                        <a class="btn btn-small btn-warning" href="./modificar_personas.php?id=<?= $datos->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></a>
                                    </td>
                                    <td id="td">
                                        <a onclick="return eliminar()" class="btn btn-danger" href="homepage.php?id=<?= $datos->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" />
                                            </svg></a>
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

    <script>
       function validarDatos(){
          var documento, nombre, apellido, correo, expresiones, ExpRegLetrasEspacio;
          
          documento = document.getElementById("validationCustom02").value;
          nombre = document.getElementById("NombreVALIDATION").value;
          apellido = document.getElementById("ApellidoVALL").value;
          correo = document.getElementById("validationCustomUsername1").value;
          
          expresiones =/\w+@\w+\.+[a-z]/;
          ExpRegLetrasEspacio=/^[ a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/;

          if(documento.length>30){
            alert("el documento es muy largo");
            return false;
          }
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
          if(isNaN(documento)){
            alert("el documento no es válido");
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
        function valideKey(evt) {

            // code is the decimal ASCII representation of the pressed key.
            var code = (evt.which) ? evt.which : evt.keyCode;

            if (code == 8) { // backspace.
                return true;
            } else if (code >= 48 && code <= 57) { // is a number.
                return true;
            } else { // other keys.
                return false;
            }
        }
    </script>

</body>

</html>

<?php
include("../componentes/footer.php");
?>