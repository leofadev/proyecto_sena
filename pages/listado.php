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
<!-- Pagina de los listados de registro de personas -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Personas</title>
    
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
<div class="col-12 col-sm-12 col-md-9 col-xl-9 p-4 shadow  mt-5 ml-auto mr-auto">
    <div class="overflow-auto">
            <?php
            include("../crud/model/connection.php");
            include("../crud/controller/eliminar_persona.php");
            ?>
                <table  class="table rounded border table-hover text-center text-white" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" id="th">Tipo De Documento</th>
                            <th scope="col" id="th">Documento</th>
                            <th scope="col" id="th">Correo</th>
                            <th scope="col" id="th">Nombre</th>
                            <th scope="col" id="th">Apellido</th>
                            <th scope="col" id="th">Rol</th>
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
                                <td id="td"><?= $tipoDoc?></td>
                                <td id="td"><?= $datos->documento?></td>
                                <td id="td"><?= $datos->correo?></td>
                                <td id="td"><?= $datos->nombre?></td>
                                <td id="td"><?= $datos->apellido?></td>
                                <td id="td"><?= $rol?></td> 
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