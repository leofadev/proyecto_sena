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
<!-- Pagina para los registros de objetos  -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro-Dispopsitivo Vigilantes</title>
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
    <div class="container-fluid mt-5">
        <div class="row mt-5">
            <div class="col-12 p-7 mt-5 col-sm-10 col-md-6 col-xl-3 p-4 mt-5">
                <form class="form p-3 rounded border shadow" method="POST">
                    <h3 class="text-center">Buscar usuario</h3>
                    <?php
                    include("../crud/model/connection.php");
                    include("../crud-celador/registro_documento.php");
                    ?>
                    <div class="form form-group">
                        <label class=" mb-1">Documento</label>
                        <input type="text" class=" label input mb-1" placeholder="Ingrese # documento" name="documento">
                    </div>

                    <div class="col-auto">
                        <button id="th" type="submit" class="btn text-light btn-dark mt-2" value="ok" name="btnDocumento">Buscar</button>
                    </div>
                </form>
            </div>
            <!-- Formulario para registrar objetos -->
            <div class="container-fluid mt-5">
                <div class="row mt-5">
                    <div class="col-12 col-sm-10 col-md-6 col-xl-3 p-4 mt-5">
                        <form class="form p-3 rounded border shadow" method="POST">
                            <h3 class="text-center">Registro De Objetos</h3>
                            <?php
                            include("../crud/model/connection.php");
                            include("../crud-celador/registro_objetos.php");

                            include("../crud/controller/modificar_persona.php");
                            ?>

                            <?php
                            include("../crud-celador/registro_documento.php");

                            $name = $con->query("SELECT `documento` FROM `personas` WHERE `documento` = '$documento'");


                            while ($dato = $name->fetch_object()) {

                            ?>
                                <div class="form form-group">
                                    <label class=" mb-1">Documento</label>
                                    <input type="text" class=" label input mb-1" placeholder="Ingrese # documento" name="document" value="<?= $dato->documento ?>">
                                </div>
                            <?php
                            }
                            ?>
                            <?php
                            include("../crud-celador/registro_documento.php");
                            $nombre_sql = $con->query("SELECT `nombre` FROM `personas` WHERE `documento` = '$documento'");
                            while ($date = $nombre_sql->fetch_object()) {

                            ?>
                                <div class="form form-group">
                                    <label class=" mb-1">Nombre</label>
                                    <input type="text" class=" label input mb-1" placeholder="Ingrese Nombre" name="nombre" value="<?= $date->nombre ?>">
                                </div>
                            <?php
                            }
                            ?>
                            <?php
                            include("../crud-celador/registro_documento.php");
                            $apellido_sql = $con->query("SELECT `apellido` FROM `personas` WHERE `documento` = '$documento'");

                            while ($dati = $apellido_sql->fetch_object()) {

                            ?>
                                <div class="form form-group">
                                    <label class=" mb-1">Apellido</label>
                                    <input type="text" class=" label input mb-1" placeholder="Ingrese apellido" name="apellido" value="<?= $dati->apellido ?>">
                                </div>
                            <?php
                            }
                            ?>
                            <div class="form form-group">
                                <label class=" mb-1">Cargo</label>
                                <input type="text" class=" label input mb-1" placeholder="Ingrese Su Cargo" name="cargo">
                            </div>
                            <div class="form form-group">
                                <label class=" mb-1">Dispositivo</label>
                                <input type="text" class=" label input mb-1" placeholder="Serial Del Dispositivo" name="dispositivo">
                            </div>
                            <div class="form form-group">
                                <label class=" mb-1">Observaciones</label>
                                <input type="text" class=" label input mb-1" placeholder="Ingrese una observación" name="observacion">
                            </div>
                            <div class="col-auto">
                                <button id="th" type="submit" class="btn text-light btn-dark mt-2" value="ok" name="btnIngresar">Ingresar Objeto</button>
                            </div>
                        </form>
                    </div>
                    <!-- Fin de formulario para registrar objetos -->

                    <!-- Inicio del CRUD -->
                    <div class="col-12 col-sm-12 col-md-9 col-xl-9 p-4 mt-5">
                        <div class="overflow-auto">
                            <?php
                            include("../crud/model/connection.php"); 
                            ?>
                            <table class="table table-striped rounded border table-hover text-center text-white" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col" id="th">Vigilante</th>
                                        <th scope="col" id="th">Documento</th>
                                        <th scope="col" id="th">Apellido</th>
                                        <th scope="col" id="th">Nombre</th>
                                        <th scope="col" id="th">cargo</th>
                                        <th scope="col" id="th">Dispositivo</th>
                                        <th scope="col" id="th">Fecha ingreso</th>
                                        <th scope="col" id="th">Hora Ingreso</th>
                                        <th scope="col" id="th">Fecha Salida</th>
                                        <th scope="col" id="th">Hora Salida</th>
                                        <th scope="col" id="th">Observaci&oacute;n</th>

                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                    include("../crud/model/connection.php");
                                    $sql = $con->query(" SELECT * FROM objetos");
                                    while ($datos = $sql->fetch_object()) { ?>

                                        <tr class="table-active">
                                            <td id="td" ></td>
                                            <td id="td" ><?= $datos->documento ?></td>
                                            <td id="td" ><?= $datos->nombre ?></td>
                                            <td id="td" ><?= $datos->apellido ?></td>
                                            <td id="td" ><?= $datos->cargo ?></td>
                                            <td id="td" ><?= $datos->dispositivo ?></td>
                                            <td id="td" ><?= $datos->fecha ?></td>
                                            <td id="td" ><?= $datos->h_ingreso ?></td>
                                            <td id="td" >


                                                <?php
                                                if (empty($datos->fecha_salida)) {
                                                    echo '<button type="button" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                                                    <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                                                    <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                                                    </svg></button>
                                                    ';
                                                } else {
                                                    echo $datos->fecha_salida;
                                                }
                                                ?>

                                            </td>
                                            <td id="td"><?= $datos->h_salida ?></td>
                                            <td id="td">
                                                <?php
                                                if (empty($datos->observacion)) {
                                                    echo '<button type="button" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                                    <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                                                    </svg></button>
                                                    ';
                                                } else {
                                                    echo $datos->observacion;
                                                }
                                                ?>
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
                <br><br><br><br><br><br><br><br><br>
            </div>

</body>

</html>

<?php
include("../componentes/footer.php");
?>