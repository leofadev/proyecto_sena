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
                <form class="form p-3 rounded border" method="POST">
                    <h3 class="text-center">Buscar usuario</h3>
                    <?php
                    include("../crud/model/connection.php");
                    include("../crud-celador/registro_documento.php");
                    ?>
                    <div class="form form-group">
                        <label for="inputPassword2" class=" mb-1">Documento</label>
                        <input type="text" class="form-control mb-1" placeholder="Ingrese # documento" name="documento">
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-success mt-2" value="ok" name="btnDocumento">Buscar</button>
                    </div>
                </form>
            </div>
            <!-- Formulario para registrar objetos -->
            <div class="container-fluid mt-5">
                <div class="row mt-5">
                    <div class="col-12 col-sm-10 col-md-6 col-xl-3 p-4 mt-5">
                        <form class="form p-3 rounded border" method="POST">
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
                                    <input type="text" class="form-control mb-1" placeholder="Ingrese # documento" name="document" value="<?= $dato->documento ?>">
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
                                    <input type="text" class="form-control mb-1" placeholder="Ingrese Nombre" name="nombre" value="<?= $date->nombre ?>">
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
                                    <input type="text" class="form-control mb-1" placeholder="Ingrese apellido" name="apellido" value="<?= $dati->apellido ?>">
                                </div>
                            <?php
                            }
                            ?>
                            <div class="form form-group">
                                <label class=" mb-1">Cargo</label>
                                <input type="text" class="form-control mb-1" placeholder="Ingrese Su Cargo" name="cargo">
                            </div>
                            <div class="form form-group">
                                <label class=" mb-1">Dispositivo</label>
                                <input type="text" class="form-control mb-1" placeholder="Serial Del Dispositivo" name="dispositivo">
                            </div>
                            <div class="form form-group">
                                <label class=" mb-1">Observaciones</label>
                                <input type="text" class="form-control mb-1" placeholder="Ingrese una observación" name="observacion">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-success mt-2" value="ok" name="btnIngresar">Ingresar Objeto</button>
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
                            <table class="table table-striped text-center text-white" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="bg-success">Vigilante</th>
                                        <th scope="col" class="bg-success">Documento</th>
                                        <th scope="col" class="bg-success">Apellido</th>
                                        <th scope="col" class="bg-success">Nombre</th>
                                        <th scope="col" class="bg-success">cargo</th>
                                        <th scope="col" class="bg-success">Dispositivo</th>
                                        <th scope="col" class="bg-success">Fecha ingreso</th>
                                        <th scope="col" class="bg-success">Hora Ingreso</th>
                                        <th scope="col" class="bg-success">Fecha Salida</th>
                                        <th scope="col" class="bg-success">Hora Salida</th>
                                        <th scope="col" class="bg-success">Observaci&oacute;n</th>

                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                    include("../crud/model/connection.php");
                                    $sql = $con->query(" SELECT * FROM objetos");
                                    while ($datos = $sql->fetch_object()) { ?>

                                        <tr class="table-active">
                                            <td></td>
                                            <td><?= $datos->documento ?></td>
                                            <td><?= $datos->nombre ?></td>
                                            <td><?= $datos->apellido ?></td>
                                            <td><?= $datos->cargo ?></td>
                                            <td><?= $datos->dispositivo ?></td>
                                            <td><?= $datos->fecha ?></td>
                                            <td><?= $datos->h_ingreso ?></td>
                                            <td>
                                            <?php
                                                if (empty($datos->fecha_salida)) {
                                                    echo' <button type="button" class="btn btn-success" value="btnModificar" id="Salida" onclick="iniciarSalida();">pendiente</button>';
                                                    
                                                } else {
                                                    echo $datos->fecha_salida;
                                                }
                                                ?>
                                           

                                              

                                            </td>
                                            <td><?= $datos->h_salida ?></td>
                                            <td>
                                                <?php
                                                if (empty($datos->observacion)) {
                                                    echo '<button type="button" class="btn btn-success">pediente</button>
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
<script>
    iniciarSalida();
    function iniciarSalida() {
        $("#Salida").click(function(s){
           s.preventDefault();
           var id = $(this).attr("id");
           var btn = $(this)[0];
           btn.blur();

           if(confirm("Desea registar la salida del dispositivo?")) {
            $.ajax({ 
                type: "POST",
                url: "crud-celador/salida.php",
                data: 'id='+id,
                success: function(data){
                    alert(data, 1);
                    window.location.reload()
                }

            });
           } else{
            alert("denegado");
           }
        });
    }

</script>
</body>

</html>

<?php
include("../componentes/footer.php");
?>