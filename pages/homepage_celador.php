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
</head>
<body class="nav">

    <?php
    include("../componentes/navbar_celador.php");
    ?>
<!-- Registro de personas -->
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-12 col-sm-10 col-md-6 col-xl-3 p-4 mt-5">
            <form class="form p-3 rounded border shadow" method="POST">
                <h3 class="text-center" >Registro de Personas</h3>
                <?php
                include("../crud/model/connection.php");
                include("../crud/controller/registro_personas.php");
                ?>
                <div class="form form-group">
                    <label  class="form-label mb-1">Tipo de documento</label>
                    <select id="td" class=" gn  mb-1" name="tipo_documento" aria-label="Default select example" placeholder="Tipo de roles">
                    <option class="form mb-1" list="listaRoles" id="exampleDataList" value="#" selected >Seleccione</option>
                    <option class="form mb-1" list="listaRoles" id="exampleDataList" value="4">CC</option>
                    <option class="form mb-1" list="listaRoles" id="exampleDataList" placeholder="Tipo de documento"  value="5">CE</option>
                    <option class="form mb-1" list="listaRoles" id="exampleDataList" placeholder="Tipo de documento"  value="3">TI</option>
                    </select>
                </div>
                <div class="form form-group">
                    <label class=" mb-1">Documento</label>
                    <input type="text" class="label input  mb-1"  placeholder=" Numero De Documento" name="documento">
                </div>
                <div class="form form-group">
                    <label class=" mb-1">Correo</label>
                    <input type="mail" class="label input  mb-1"  placeholder="Ingrese Su Correo" name="correo">
                </div>
                <div class="form form-group">
                    <label class=" mb-1">Nombre</label>
                    <input type="text" class="label input  mb-1"  placeholder="Ingrese Su Nombre" name="nombre">
                </div>
                <div class="form form-group">
                    <label class=" mb-1">Apellido</label>
                    <input type="text" class="label input  mb-1"  placeholder="Ingrese Su Apellido" name="apellido">
                </div>
                <div class="form form-group">
                    <label class="form-label mb-1">Roles</label>
                    <select id="td" class=" gn  mb-1" name="rol" aria-label="Default select example" placeholder="Tipo de roles">
                    <option class="form mb-1" list="listaRoles" id="exampleDataList" value="#" selected >Seleccione</option>
                    <option class="form mb-1" list="listaRoles" id="exampleDataList" placeholder="Tipo de roles"  value="6">Instructor</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button id="th" type="submit" class="btn text-light btn-dark mt-2" value="ok" name="btnGuardar">Ingresar Registro</button>
                </div>
            </form>
            </div>
            <!-- Fin de registro de personas -->

            <!-- Inicio del CRUD -->
            <div class="col-12 col-sm-12 col-md-9 col-xl-9 p-4 mt-5">
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
                            while($datos=$sql->fetch_object()) {?>

                            <tr class="table-active">
                                <td id="td" ><?= $datos->tipo_documento?></td>
                                <td id="td" ><?= $datos->documento?></td>
                                <td id="td" ><?= $datos->correo?></td>
                                <td id="td" ><?= $datos->nombre?></td>
                                <td id="td" ><?= $datos->apellido?></td>
                                <!-- <td><= $datos->pass?></td> -->
                                <td id="td" >
                                    <a class="btn btn-small btn-warning" href="./modificar_personas.php?id=<?= $datos->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/> </svg></a>
                                </td>
                            </tr>
                        <?php
                            }
                            ?> 
                        </tbody>
                </table>
            </div>
            </div>
            <!-- Fin del CRUD -->
        </div>
    </div>
</body>
</html>

<?php
    include("../componentes/footer.php");
    ?>





    