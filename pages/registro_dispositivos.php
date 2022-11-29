<?php
session_start();
$nombreCompleto = $_SESSION ['nombre_user'];
if (!isset($_SESSION['documento'])) {
    echo '<script>
        alert("Por favor inicie sesión");
        
    </script>';

    header("Location: ../index.php");
    include_once('../crud/model/connection.php');
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

    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/style.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/sb-admin-2.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;1,100&display=swap" rel="stylesheet">
</head>

<body class="nav">

    <?php
    include("../componentes/navbar_celador.php");
    $roles = $_SESSION ['roles'];
    switch ($roles) {
      case $roles==1:
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        break;
      default:
        echo "error de registro";
        break;
    }
    ?>
    <div class="container-fluid mt-5">
        <div class="row mt-5">
            <div class="col-12 p-7 mt-5 col-sm-10 col-md-6 col-xl-3 p-4  mt-5">
                <form class="form p-3 rounded border shadow" method="POST">
                    <h3 class="text-center">Buscar usuario</h3>
                    <?php
                    include("../crud/model/connection.php");
                    include("../crud-celador/registro_documento.php");
                    ?>
                    <div class="form form-group">
                        <label  class=" mb-1">Documento</label>
                        <input type="text" class=" label input  mb-1" placeholder="Ingrese # documento" name="documento" id="document">
                    </div>

                    <div class="col-auto">
                        <button type="button" class="btn text-light btn-dark mt-2 buscar-doc">Buscar</button>
                    </div>
                </form>
            </div>
            <div id="register"></div>
        <?php
        $nombre = null;
        $sql_regist = "SELECT *, sub_item.descripcion AS ROLES FROM personas inner JOIN sub_item ON personas.rol = sub_item.id;" ;
        $Query1 = mysqli_query($con,$sql_regist);
        if($Query1){
        if($row= mysqli_fetch_array($Query1)){
            $nombre =$row ['nombre'];
            $id_rol = $row ['rol'];
            $rol =$row ['ROLES'];
            $apellido = $row ['apellido'];
            $documen = $row ['documento'];
            
        }}
    ?>
                    <!-- Fin de formulario para registrar objetos -->

                    <!-- Inicio del CRUD -->
                    <div class="col-12 col-sm-12 col-md-9 col-xl-9 p-4 shadow mt-5 ml-auto mr-auto">
                        <div class="overflow-auto">
                            <?php
                            include("../crud/model/connection.php");
                            ?>
                            <table class="table table-striped text-center text-white" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col" id="th">Documento</th>
                                        <th scope="col" id="th">Apellido</th>
                                        <th scope="col" id="th">Nombre</th>
                                        <th scope="col" id="th">cargo</th>
                                        <th scope="col" id="th">Dispositivo</th>
                                        <th scope="col" id="th">Fecha ingreso</th>
                                        <th scope="col" id="th">Hora Ingreso</th>
                                        <th scope="col" id="th">Fecha Salida</th>
                                        <th scope="col" id="th">Hora Salida</th>
                                        <!-- <th scope="col" id="th">Observaci&oacute;n</th> -->

                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                    include("../crud/model/connection.php");
                                    $sql = $con->query(" SELECT * FROM objetos");
                                    while ($datos = $sql->fetch_object()) { ?>

                                        <tr class="table-active">
                                            <td id="td" ><?= $datos->documento ?></td>
                                            <td id="td" ><?= $datos->nombre ?></td>
                                            <td id="td" ><?= $datos->apellido ?></td>
                                            <td id="td" ><?= $datos->cargo ?></td>
                                            <td id="td" ><?= $datos->dispositivo ?></td>
                                            <td id="td" ><?= $datos->fecha ?></td>
                                            <td id="td" ><?= $datos->h_ingreso ?></td>
                                            <td id="td" >
                                                <?php if($datos->fecha_salida==NULL){?>
                                            <a href="#" class="btn btn-warning Salida" 
                                            value="btnModificar" id="Salida" id-salida="<?= $datos->id?>" onclick="iniciarSalida();">pendiente <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                                                <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                                                <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                                            </svg></a></td>
                                            <?php }else{
                                                echo $datos->fecha_salida;
                                            }?>
                                            </td>
                                            <td id="td"><?= $datos->h_salida ?></td>
 
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

<script src="../jquery/js/jquery.min.js"></script>
<script>
                iniciarSalida();

                function iniciarSalida() {
                    $(".Salida").click(function(e) {
                        
                        e.preventDefault();
                        var id = $(this).attr("id-salida");
                        var btn = $(this)[0];
                        btn.blur();
                        if (confirm("Desea registar la salida del dispositivo?")) {
                            $.ajax({
                                type: "POST",
                                url: "../crud-celador/salida.php",
                                data: 'id=' + id,
                                success: function(data) {
                                    alert(data, 1);
                                    window.location.reload()
                                }

                            });
                        } else {
                            alert("denegado");
                        }
                    });
                }
            </script>
<script>   
    formulario();
    
    
    function formulario(){
        $(".buscar-doc").click(function(e){
            let doc = $('#document').val();

            $.ajax({
                type: 'POST',
                url: '../crud-celador/php/ponerForm.php',
                data:{
                    'documento' :doc,
                },
                success: function(data) {
                    $("#register").html(data);
                }

            });
        });
    }

</script>
</html>

<?php
include("../componentes/footer.php");
?>