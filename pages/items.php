<!-- Pagina Administrador items y sub_items   -->
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
    <title>Crear item y sub&iacute;tem</title>
    <!-- Estilos css -->
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/style.css">
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
<!-- Registro de items -->
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-12 col-sm-8 col-md-4 col-xl-4 p-4 mt-5">
                <form class="form p-3 rounded border shadow" method="POST">
                    <h3 class="text-center" >Registro de items</h3>

                    <?php
                        include("../crud/model/connection.php");
                        include("../crud/controller/registro_items.php");
                    ?>


                    <div class="form form-group">
                        <label class=" mb-1">Nombre</label>
                        <input type="text" class=" label input  mb-1"  placeholder="Ingrese el nombre" name="item">
                    </div>

                    <div class="col-auto">
                        <button id="th" type="submit" class="btn text-light btn-dark mt-2" value="ok" name="btnGuardar">Agregar item</button>
                    </div>
                </form>
            </div>
            <!-- Fin de registro de items -->

            <!-- Inicio del CRUD items -->
            <div class="col-12 col-sm-12 col-md-8 col-xl-7 p-4 mt-5">
            <div class="overflow-auto">
            <?php
            include("../crud/model/connection.php");
            $sql = $con->query("SELECT * FROM item");
            ?>
                <table class="table table-striped table-hover text-center text-white" id="myTable">
                    <thead>
                        <tr>
                            
                            <th scope="col" id="th" class="text-center">Nombre</th>
                            <th scope="col" id="th" class="text-center">Editar</th>
                        </tr>
                    </thead>
                        <tbody id="myTable">
                            <?php
                                while($datos=$sql->fetch_object()) {
                            ?>
                            <tr class="table-active">
                                <td id="td"><?=$datos->descripcion?></td>
                                <td id="td">
                                    <a class="btn btn-small btn-warning" href="./modificar_items.php?id=<?= $datos->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/> </svg></a>
                                </td>
                        <?php
                            }
                        ?> 
                        </tbody>
                </table>
            </div>
            </div>

        <!-- Fin del CRUD item-->


    <div class="container">
        <div class="row mt-5">
        <div class="col-12 col-sm-8 col-md-4 col-xl-4  p-4 mt-5">
            <form class="form p-3 rounded border shadow" method="POST">
                <h3 class="text-center" >Registro de items</h3>

                <?php
                    include("../crud/model/connection.php");
                    include("../crud/controller/registro_sub_items.php");
                ?>
                <div class="form form-group">
                    <label class="form-label mb-1">items</label>
                    <select id="td" class=" gn mb-1" name="id_item" aria-label="Default select example" placeholder="Tipo de roles">
                        <option class="form mb-1" list="listaRoles" id="exampleDataList" value="#" selected >Seleccione</option>
                        <option class="form mb-1" list="listaRoles" id="exampleDataList" value="1">Rol</option>
                        <option class="form mb-1" list="listaRoles" id="exampleDataList" value="2">Tipo documento</option>>
                    </select>
                    <div class="form form-group">
                    <label class=" mb-1">Nombre</label>
                    <input type="text" class=" label input  mb-1"  placeholder="Ingrese el nombre" name="descripcion">
                </div>
                </div>    
                <div class="col-auto">
                    <button id="th" type="submit" class="btn text-light btn-dark mt-2" value="ok" name="GuardarSubItem">Agregar subitem</button>
                </div>
            </form>
    </div>

            <!-- Inicio del CRUD Sub_items -->
            <div class="col-12 col-sm-12 col-md-8 col-xl-7 p-4 mt-5">
            <div class="overflow-auto">
            <?php
            include("../crud/model/connection.php");
            $sql_sub = $con->query("SELECT * FROM sub_item");
            
            ?>
                <table class="table table-striped rounded border table-hover text-center text-white" id="myTable">
                    <thead>
                        <tr>
                            
                            <th scope="col" id="th" class=" text-center">Nombre</th>
                            <th scope="col" id="th" class=" text-center">Tipo</th>
                            <th scope="col" id="th" class=" text-center">Editar</th>
                        </tr>
                    </thead>
                        <tbody id="myTable">
                        
                        <?php
                        
                            while($datos=$sql_sub->fetch_object()) {
                        
                        ?>
                            <tr class="table-active">
                                <td id="td"><?=$datos->id_item?></td>
                                <td id="td"><?=$datos->descripcion?></td>
                                <td id="td">
                                    <a class="btn btn-small btn-warning" href="../pages/modificar_sub_items.php?id=<?= $datos->id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/> </svg></a>
                                </td>
                            <?php
                            }
                            ?> 
                        </tbody>
                </table>
                </div>
            </div>
                


                <!-- Fin del CRUD  Sub_items -->
        </div>
    </div>
    


</body>
</html>

<?php
    include("../componentes/footer.php");
    ?>