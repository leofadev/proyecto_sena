<!-- Este codigo realiza el registros de usuarios a la base de datos, en la tabla personas, y se visualizan de forma inmediata al cargar la pagina web -->
<?php
if(!empty($_POST["btnGuardar"])){
    if(!empty($_POST["tipo_documento"]) and !empty($_POST["documento"]) and !empty($_POST["correo"]) and !empty($_POST["nombre"]) and !empty($_POST["apellido"])  and !empty($_POST["rol"])){

    $tipo_documento=$_POST["tipo_documento"];
    $documento=$_POST["documento"];
    $correo=$_POST["correo"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $pass = password_hash($documento, PASSWORD_DEFAULT);
    $rol=$_POST["rol"];

        //Evitar que se duplique correos exixtentes
        $consulta = "SELECT * FROM personas WHERE correo = '$correo'";
        $verificar_correo = mysqli_query($con, $consulta);
        if(mysqli_num_rows($verificar_correo)>0){
            echo '<script>
                alert("El correo ya existe");
                window.location = "../pages/homepage.php";
            </script>
            
            ';
            exit();
        }
        //Evitar que se duplique documentos exixtentes
        $consulta_documento = "SELECT * FROM personas WHERE documento = '$documento'";
        $verificar_documento = mysqli_query($con, $consulta_documento);
        if(mysqli_num_rows($verificar_documento)>0){
            echo '<script>
                alert("El documento ya existe");
                window.location = "../pages/homepage.php";
            </script>
            
            ';
            exit();
        }
    $sql=$con->query("INSERT INTO personas( `tipo_documento`, `documento`, `correo`, `nombre`, `apellido`, `pass`, `rol`) VALUES('$tipo_documento','$documento','$correo','$nombre','$apellido','$pass','$rol')");




    if ($sql==1) {
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
        </svg>
        Persona Registrada Correctamente
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    } else {
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
        </svg>
        Error Al Registrar La Personas
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    
    } else {
        echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
        </svg>
        Alguno De Los Campos Está Vacio
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>        
        </div>';
    }
}
?>