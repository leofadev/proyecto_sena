<!-- Pagina de los listados de registro de personas -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- Estilos css -->
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/sb-admin-2.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</head>
<body class="nav">

<?php
session_start();
    include("../componentes/navbar.php");
?>
<div class="container mt-5">
<!-- Inicio del CRUD -->
<div class="col-12 col-sm-12 col-md-9 col-xl-9 p-4  mt-5 ml-auto mr-auto">
    <div class="overflow-auto">
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
                        </tr>
                    </thead>
                        <tbody id="myTable" >
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