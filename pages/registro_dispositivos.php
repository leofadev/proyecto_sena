<!-- Pagina para los registros de objetos  -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/sb-admin-2.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>
<body class="nav">
    <?php    
        include("../componentes/navbar_celador.php");
    ?>  
    <!-- Formulario para registrar objetos -->
<div class="container mt-5">
        <div class="row mt-5">
            <div class="col-12 col-sm-10 col-md-6 col-xl-3 p-7 mt-5">
            <form class="form p-3 rounded border" method="POST">
                <h3 class="text-center" >Registro De Objetos</h3>
                <?php
                include("../crud/model/connection.php");
                include("../crud-celador/registro_objetos.php");
                ?>
                <div class="form form-group">
                    <label for="inputPassword2" class=" mb-1">Nombre</label>
                    <input type="text" class="form-control mb-1"  placeholder="Ingrese Su Nombre" name="nombre">
                </div>
                <div class="form form-group">
                    <label for="inputPassword2" class=" mb-1">Cargo</label>
                    <input type="text" class="form-control mb-1" placeholder="Ingrese Su Cargo"  name="cargo">
                </div>
                <div class="form form-group">
                    <label for="inputPassword2" class=" mb-1">Dispositivo</label>
                    <input type="text" class="form-control mb-1" placeholder="Serial Del Dispositivo" name="dispositivo">
                </div>
                <div class="form form-group">
                    <label for="inputPassword2" class=" mb-1">Observaciones</label>
                    <input type="text" class="form-control mb-1" placeholder="Ingrese una observación" name="observacion">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success mt-2" value="ok" name="btnIngresar">Ingresar Objeto</button>
                </div>
            </form>
            </div>
                <!-- Fin de formulario para registrar objetos -->

                <!-- Inicio del CRUD -->
            <div class="col-12 col-sm-12 col-md-9 col-xl-9 p-7 mt-5">
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
                            <th scope="col" class="bg-success">Actualizar Salida</th>
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
                                <td>
                                    <a class="btn btn-small btn-success" href="./modificar_objeto.php?id=<?= $datos->id ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> 
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/> </svg></a>
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