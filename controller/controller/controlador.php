<!-- Este codigo hace que segun el rol que tenga la persona en la base de datos, al momento de ingresar los datos le redirija a su pagina web correspondiente, ya sea administrador o ususario -->

<?php
session_start();
include "../crud/model/connection.php";

if(isset($_POST['btningresar']) && !empty($_POST["documento"]) && !empty($_POST["pass"])){
$documento= $_POST["documento"];
$pass=$_POST["pass"];
// $password_encriptado= password_hash($pass, PASSWORD_DEFAULT);
// $pass= hash('sha512', $pass);

  $sql="SELECT * FROM `personas` WHERE documento = $documento AND pass = $pass";
  $arreglosDatos = mysqli_query($con, $sql);
  $numeroRegistros = mysqli_num_rows($arreglosDatos);

  if($numeroRegistros>0){
    $_SESSION ['documento'] = $documento;
    

    if ($registro = mysqli_fetch_array($arreglosDatos)){
       $id = $registro['id'];
       $documento = $registro['tipo_documento'];
       $documento = $registro['documento'];
       $correo = $registro['correo'];
       $nombre = $registro['nombre'];
       $apellido = $registro['apellido']; 
       $pass= $registro['pass']; 
       $rol = $registro['rol']; 
    }

    //$consulta = "SELECT * FROM personas WHERE documento=$documento AND pass=$pass";

    switch ($rol) {
      case $rol==1:
        header('Location:../pages/homepage.php');
        break;
      case $rol==2:
        header('location:../pages/homepage_celador.php');
        break;     
      
      default:
        echo "error de registro";
        break;
    }
  }
  else{
    echo'<scrpit>
           alert("Usuario no existe, por favor verifica los datos introducidos");
           window.location= "./index.php";
         </scrpit>';
  }

}

?>
