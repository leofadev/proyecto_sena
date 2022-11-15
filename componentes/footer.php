<footer id="footer" class="container-fluid mt-4 p-3">
    <div id="footer" class="container">
            
            <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-xl-4 text-center">
                <!-- Logo del Sena  -->
                <img src="../bootstrap-5.0.2-dist/img/logo-de-SENA-png-Negro.png" alt="Logo" width="80">
            </div>
                <div class=" text-black col-12 col-sm-12 col-md-6 col-xl-6">
                    <h4 class="text-center">&copy;Developers</h4>
                    <div class="row">
                    <div class="col-6 text-right">
                    <!-- GITHUB de Pinto -->
                    <a class="text-secondary navbar-brand" href="https://github.com/leofadev"> &copy;Leonardo Pinto</a>
            </div>
            <div class="col-6 text-left">
                    <!-- GITHUB de Camargo -->
                    <a class="text-secondary navbar-brand" href="https://github.com/geovanny-star">&copy;Geovanny Camargo</a>
            </div>
            </div>
                    </div>
                </div>
</div>
</footer>


<!-- Codigo JavaScript -->
<script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
<!-- Buscador -->
<script src="../jquery/js/jquery-3.6.1.min.js"></script>
<script src="../jquery/js/jquery-3.5.1.js"></script>
<script src="../jquery/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready( function () {
    $('#myTable').DataTable({"language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontró nada - lo siento",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            'search':'Buscar',
            'paginate':{
                'next':'Siguiente',
                'previous':'Anterior'
            }
        }
    });
} );

    </script>