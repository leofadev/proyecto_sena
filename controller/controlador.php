<!-- Este codigo hace que segun el rol que tenga la persona en la base de datos, al momento de ingresar los datos le redirija a su pagina web correspondiente, ya sea administrador o ususario -->

<?php
include'../crud/model/connection.php';

if(isset($_POST['btningresar']) && !empty($_POST["documento"]) && !empty($_POST["pass"])){
  $documento= $_POST["documento"];
  $pass=$_POST["pass"];
  
  $sql="SELECT * FROM `personas` WHERE documento = $documento";
  $arreglosDatos = mysqli_query($con, $sql);
  $numeroRegistros = mysqli_num_rows($arreglosDatos);
// CONDICIONAL PARA SABER SI EXISTE EL USUARIO
  if($numeroRegistros>0){
    while($registro = mysqli_fetch_array($arreglosDatos)){
      $contrasena= $registro['pass'];
      $rol = $registro['rol'];
    }
    // VERIFICAR LA CONTRASEÑA
    if(password_verify($pass, $contrasena)){
      session_start();
      $_SESSION ['documento'] = $documento;
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
    } else{  
      echo'<script>
        alert("contraseña incorrecta, por favor verifica los datos introducidos");
        window.location= "../index.php";
      </script>';
    }  
    
  } else{
 
  }
    
// if(){
//     if ($registro = mysqli_fetch_array($arreglosDatos)){
//       $id = $registro['id'];
//       $documento = $registro['tipo_documento'];
//       $documento = $registro['documento'];
//       $correo = $registro['correo'];
//       $nombre = $registro['nombre'];
//       $apellido = $registro['apellido']; 
//       $pass= $registro['pass']; 
//       $rol = $registro['rol']; 
//     }
//   }
//     //$consulta = "SELECT * FROM personas WHERE documento=$documento AND pass=$pass";

    
//   }
 

}

?>
