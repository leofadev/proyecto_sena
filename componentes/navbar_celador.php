<!-- Menú del Celador -->
<link rel="stylesheet" href="../jquery/css/bootstrap.min.css">
<link rel="stylesheet" href="../jquery/css/dataTables.bootstrap5.min.css">
<nav  class=" nav fixed-top navbar navbar-expand-lg navbar-light bg-success mb-5">
    <div class="container-fluid">   
        <a class="navbar-brand" href="./homepage_celador.php">
            <img class="" src="../bootstrap-5.0.2-dist/img/Logo-sena-blanco.png" width="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"   style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                <li class="nav-item">
                <a class="nav-link text-white" href="../pages/homepage_celador.php">
                        Ingresar Usuario
                    </a>
                </li>
                    <a class="nav-link text-white" href="./registro_dispositivos.php">
                        Registro Dispositivos
                    </a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="#">
                        Listado Usuarios
                    </a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="#">
                        Listado Ingresos
                    </a>
                </li>
            </ul>
            <li class="nav-item dropdown">
                <button type="button" class="btn btn-success dropdown-toggle ml-5" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- icono de cerar sesión  --> opciones
                </button>
                <ul class="dropdown-menu">
                <?php
                                include("../crud/model/connection.php");
                                $documento = $_SESSION["documento"];
                                $sql = "SELECT `nombre`, `apellido` FROM `personas` WHERE `documento` = '$documento'";
                                $resultado = $con->query($sql);

                                while ($datos=$resultado->fetch_assoc()) {
                                    $nombre = $datos['nombre'];
                                    $apellido = $datos['apellido'];
                                
                            ?>
                        <li><a class="dropdown-item" href="#"><?php echo $nombre." ".$apellido;?></a></li>
                        <?php } ?>
                    <li><a class="dropdown-item" href="#">Cambiar contrase&nacute;a</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../pages/cerrar_sesion.php">Cerrar Sesi&oacute;n</a></li>
                </ul>
            </li>
    </div>
</div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>