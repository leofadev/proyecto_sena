<!-- Pagina de los listados de registro de objetos -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Registros</title>
    
    <!-- Estilos css -->
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
    <div class="col-12 col-sm-12 col-md-9 col-xl-9 p-7 mt-5 ml-auto mr-auto">
        <div class="overflow-auto">
            <?php
            include("../crud/model/connection.php");
            include("../crud-celador/modificar_objetos.php");
            ?>
                <table class="table table-striped text-center text-white" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-success">Fecha ingreso</th>
                            <th scope="col" class="bg-success">Nombre</th> 
                            <th scope="col" class="bg-success">cargo</th>
                            <th scope="col" class="bg-success">Dispositivo</th>
                            <th scope="col" class="bg-success">Hora Ingreso</th>
                            <th scope="col" class="bg-success">Fecha Salida</th>
                            <th scope="col" class="bg-success">Hora Salida</th>
                            <th scope="col" class="bg-success">Observacion</th>
                        </tr>
                    </thead>
                        <tbody id="myTable">
                            <?php
                            include("../crud/model/connection.php");
                            $sql = $con->query(" SELECT * FROM objetos");
                            while($datos=$sql->fetch_object()) {?>

                            <tr class="table-active">
                                <td><?= $datos->fecha?></td>
                                <td><?= $datos->nombre?></td>
                                <td><?= $datos->cargo?></td>
                                <td><?= $datos->dispositivo?></td>
                                <td><?= $datos->h_ingreso?></td>
                                <td><?= $datos->fecha_salida?></td>
                                <td><?= $datos->h_salida?></td>
                                <td><?= $datos->observacion?></td>
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