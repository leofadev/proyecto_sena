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
    <title>cambiar clave</title>
        <!-- Estilos css -->
        <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/style.css">
        <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/sb-admin-2.css">
        <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>
<body class="nav">
    <?php
        include("../componentes/navbar.php");
        include("../crud/controller/modificar_clave.php");
    ?> 
    <!-- Formulario para cambiar contraseña -->
<div class="container">
    <div class="row mt-5">
        <div class="col-12 p-7 d-flex justify-content-center mt-5">
        <form class="form p-3 rounded border shadow" action="../crud/controller/modificar_clave.php" method="POST">
            <h2>Cambiar Contraseña</h2>
            
            <input type="password" name="op" class=" label input  mb-1" placeholder="Contraseña Actual" required><br>

            <input type="password" name="np" class=" label input  mb-1" placeholder="Nueva Contraseña" required>
            <br>

            <input type="password" name="c_np" class=" label input  mb-1" placeholder="Nueva Contraseña" required>
            <br>

            <button type="submit" name="btnPass" class="btn text-light btn-dark mt-2">Cambiar</button>
            <a href="../pages/cerrar_sesion.php" class="btn text-light btn-danger mt-2">Salir</a>
        </form>
        </div>
    </div>
</div>
<!-- Fin de formulario para cambiar contraseña -->
</body>
</html>