<?php
$docu = $_SESSION['documento'];
  $sql_rol=(" SELECT rol FROM personas WHERE documento='$docu'");
  $query= mysqli_query($con,$sql_rol);
if($row = mysqli_fetch_array($query)){
   echo $rol = $row['rol'];
   switch ($rol) {
    case $rol==1:
      include("../componentes/navbar.php");
      break;
    case $rol==2:
      include("../componentes/navbar_celador.php");
      break;     
    
    default:
      echo "error de registro";
      break;
    }
}
  ?>