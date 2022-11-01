
<footer>
    <nav class=" nav fixed-button navbar navbar-expand-lg navbar-light bg-light p-5">
            <div class="col-4 text-center">
                <!-- Logo del Sena -->
                <img src="../bootstrap-5.0.2-dist/img/logo-sena-verde.png" alt="Logo" width="50" >
            </div>
            <div class="row">
            <div class="col-6 text-right">
                    <!-- GITHUB de Pinto-->
                    <a class="navbar-brand" href="https://github.com/leofadev"> &copy;Leonardo Pinto</a>
            </div>
            <div class="col-6 text-right">
                    <!-- GITHUB de Camargo -->
                    <a class="navbar-brand" href="https://github.com/geovanny-star">&copy;Geovanny Camargo</a>
            </div>
            </div>
    </nav>
</footer>

<!-- Codigo JavaScript -->
<script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
<!-- Buscador -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                    $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#myTable tr").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
            </script>