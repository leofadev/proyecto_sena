<!-- Menú del Celador -->
<nav class=" fixed-top navbar navbar-expand-lg navbar-light bg-light mb-5 bg-light">
<div class="container-fluid">
    <a class="navbar-brand" href="./homepage_celador.php">
    Celador
        <?php
        ?>
    </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"   style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link" href="./registro_dispositivos.php">
                        Registro Dispositivos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/listado.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Listado
                    </a>
                </li>
            <form class="d-flex ">
                <input id="myInput" class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
            </form>
        </ul>
    </div>
</div>
</nav>