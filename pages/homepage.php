<!-- Pagina web del Administrador -->
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
    <title>Administraci&oacute;n</title>
    <!-- Estilos css -->
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/sb-admin-2.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>
<body class="nav">
    <script>
        function eliminar(){
            var respuesta=confirm("Estas seguro que deseas eliminar este registro?");
            return respuesta;
        }
    </script>

<?php
    include("../componentes/navbar.php");
    ?>
<!-- Section inicio -->
<section class="container mt-5">
    <div class="row">
        <div class="col-12 mt-5 ">
            <h1 class="text-success">Sede TIC</h1>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-xl-6 mt-5 ">
            <h4 class="text-center text-black" >Con t&uacute; ayuda mejoramos cada d&iacute;a m&aacute;s</h4>
            <p class="h5 mt-4 text-secondary" >En este node del Sena nos enfocamos en el bienestar de nuestros empleados y aprendices Sena, t&uacute; tambi&eacute;n eres parte del cambio ayudanos a progresar.</p>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-xl-6 mt-5 ">
            <div class=" shadow p-3 mb-5 bg-white rounded mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 text-center">
                    <img src="../bootstrap-5.0.2-dist/img/logo-sena-verde.png" class="img-fluid rounded-start" alt="Logo-Sena">
                    </div>
                    <div class="col-md-8 mt-4 pl-5">
                    <div class="card-body mt-2">
                        <h5 class="card-title">Administraci&oacute;n</h5>
                        <a class="btn btn-success" href="#crud">Registar Usuarios</a>
                    </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br>
</section>
<!-- Fin del section inicio -->

<!-- Registro de personas -->
    <div class="container" id="crud">
        <div class="row mt-5">
            <div class="col-12 col-sm-10 col-md-6 col-xl-3 p-7 mt-5">
            <form class="form p-3 rounded border" method="POST">
                <h3 class="text-center" >Registro de Personas</h3>
                <?php
                include("../crud/model/connection.php");
                include("../crud/controller/registro_personas.php");
                ?>
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
                    <input type="text" class="form-control mb-1"  placeholder=" Numero De Documento" name="documento">
                </div>
                <div class="form form-group">
                    <label for="inputPassword2" class=" mb-1">Correo</label>
                    <input type="mail" class="form-control mb-1"  placeholder="Ingrese Su Correo" name="correo">
                </div>
                <div class="form form-group">
                    <label for="inputPassword2" class=" mb-1">Nombre</label>
                    <input type="text" class="form-control mb-1"  placeholder="Ingrese Su Nombre" name="nombre">
                </div>
                <div class="form form-group">
                    <label for="inputPassword2" class=" mb-1">Apellido</label>
                    <input type="text" class="form-control mb-1"  placeholder="Ingrese Su Apellido" name="apellido">
                </div>
                <div class="form form-group">
                    <label for="exampleInputEmail1" class="form-label mb-1">Roles</label>
                    <select for="inputPassword2" class=" form-select mb-1" name="rol" aria-label="Default select example" placeholder="Tipo de roles">
                    <option class="form-control mb-1" list="listaRoles" id="exampleDataList" value="#" selected >Seleccione</option>
                    <option class="form-control mb-1" list="listaRoles" id="exampleDataList" value="1">Administrador</option>
                    <option class="form-control mb-1" list="listaRoles" id="exampleDataList" placeholder="Tipo de roles"  value="2">Vigilante</option>
                    <option class="form-control mb-1" list="listaRoles" id="exampleDataList" placeholder="Tipo de roles"  value="6">Instructor</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success mt-2" value="ok" name="btnGuardar">Ingresar Registro</button>
                </div>
            </form>
            </div>
            <!-- Fin de registro de personas -->

            <!-- Inicio del CRUD -->
            <div class="col-12 col-sm-12 col-md-9 col-xl-9 p-4 mt-4">
            <?php
            include("../crud/model/connection.php");
            include("../crud/controller/eliminar_persona.php");
            ?>
                <table class="table table-striped text-center text-white" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-success">Tipo De Documento</th>
                            <th scope="col" class="bg-success">Documento</th>
                            <th scope="col" class="bg-success">Correo</th>
                            <th scope="col" class="bg-success">Nombre</th>
                            <th scope="col" class="bg-success">Apellido</th>
                            <th scope="col" class="bg-success">Rol</th>
                            <th scope="col" class="bg-success">Editar</th>
                            <th scope="col" class="bg-success">Eliminar</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php
                            include("../crud/model/connection.php");
                            $sql = $con->query(" SELECT * FROM personas");
                            while($datos=$sql->fetch_object()) {
                                    $sql_tipoDoc = $con->query("SELECT descripcion FROM sub_item    WHERE id = '$datos->tipo_documento'");
                                    while($row= mysqli_fetch_array($sql_tipoDoc)) {
                                    $tipoDoc = $row['descripcion'];
                                    }
                                    $sql_rol = $con->query("SELECT descripcion FROM sub_item WHERE id = '$datos->rol'");
                                    while($row= mysqli_fetch_array($sql_rol)) {
                                    $rol = $row['descripcion'];
                                    }
                                    ?>
                            <tr class="table-active">
                                <td><?= $tipoDoc?></td>
                                <td><?= $datos->documento?></td>
                                <td><?= $datos->correo?></td>
                                <td><?= $datos->nombre?></td>
                                <td><?= $datos->apellido?></td>
                                <td><?= $rol?></td> 
                                <td>
                                    <a class="btn btn-small btn-success" href="./modificar_personas.php?id=<?= $datos->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/> </svg></a>
                                </td>
                                <td>
                                    <a onclick="return eliminar()" class="btn btn-small bt-ligero" href="homepage.php?id=<?= $datos->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/> </svg></a>
                                </td>
                            </tr>
                        <?php
                            }
                            ?> 
                        </tbody>
                </table>
            </div>
            <!-- Fin del CRUD -->
        </div>
    </div>
    


</body>
</html>

<?php
    include("../componentes/footer.php");
    ?>