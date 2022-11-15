<?php
session_start();
$nombreCompleto = $_SESSION ['nombre_user'];
if (!isset($_SESSION['documento'])) {
    echo '<script>
        alert("Por favor inicie sesión");
        
    </script>';

    header("Location: ../index.php");
    session_destroy();
    die();
}


?>
<!-- Pagina de los listados de registro de objetos -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Dispositivos</title>
    
    <!-- Estilos css -->
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/style.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/sb-admin-2.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</head>
<body class="nav">

<?php
    include("../componentes/navbar.php");
?>
<div class="container mt-5">
    <!-- Inicio del CRUD -->
    <div class="col-12 col-sm-12 col-md-10 col-xl-10 p-4 shadow mt-5 ml-auto mr-auto">
        <div class="overflow-auto">
            <?php
            include("../crud/model/connection.php");
            ?>
                <table class="table table-striped rounded border table-hover text-center text-white" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" id="th">Vigilante</th>
                            <th scope="col" id="th">Fecha ingreso</th>
                            <th scope="col" id="th">Nombre</th> 
                            <th scope="col" id="th">cargo</th>
                            <th scope="col" id="th">Dispositivo</th>
                            <th scope="col" id="th">Hora Ingreso</th>
                            <th scope="col" id="th">Fecha Salida</th>
                            <th scope="col" id="th">Hora Salida</th>
                            <th scope="col" id="th">Observacion</th>
                        </tr>
                    </thead>
                        <tbody id="myTable">
                            <?php
                            include("../crud/model/connection.php");
                            $sql = $con->query(" SELECT * FROM objetos");
                            while($datos=$sql->fetch_object()) {?>

                            <tr class="table-active">
                                <td id="td" ><?= $datos->vigiliante ?></td>
                                <td id="td" ><?= $datos->fecha?></td>
                                <td id="td" ><?= $datos->nombre?></td>
                                <td id="td" ><?= $datos->cargo?></td>
                                <td id="td" ><?= $datos->dispositivo?></td>
                                <td id="td" ><?= $datos->h_ingreso?></td>
                                <td id="td" ><?= $datos->fecha_salida?></td>
                                <td id="td" ><?= $datos->h_salida?></td>
                                <td id="td" ><?= $datos->observacion?></td>
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
</body>
</html>
<?php
    include("../componentes/footer.php");
?>