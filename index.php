<!-- web login -->
<?php
session_start();
if(isset($_SESSION['documento'])){
  header("Location: ../pages/homepage.php");
}

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Inicio De Sesi&oacute;n</title>
    <!-- link Css -->
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/style.css">
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/sb-admin-2.css">
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
  </head>
    <body class=" nav bg-light d-flex justify-content-center align-items-center vh-100">

      <!-- Inicio del login -->
        <form  method="post" action="./controller/controlador.php"
          class="bg-white p-5 rounded text-black shadow"
          style="width: 25rem">
        <div class=" d-flex justify-content-center">
          <img
            src="./bootstrap-5.0.2-dist/img/logo-de-SENA-png-Negro.png"
            alt="login-icon"
            style="height: 7rem"/>
      </div>
      <div class="mt-3 text-center fs-1 fw-bold">
        <h2 class="text-black">Iniciar Sesi&oacute;n</h2>
      </div>
      
      <div class="input-group mt-5">
        <div class="input-group-text">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
        </div>
        <input
          class="form-control bg-light btn-light border"
          type="text"
          placeholder="Username" 
          name="documento"/>
      </div>
      <div class="input-group mt-2">
      <div class="input-group mt-2">
        <div class="input-group-text">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
            <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
            </svg>
          </div>
        <input id="inputContraseña"
          class="form-control bg-light btn-light border"
          type="password"
          placeholder="Password"
          name="pass"/>
          <div class="mt-1 ml-1 ">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16" type="checkbox" onclick="myFuction()">
            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
          </svg>
          </div>
      </div>
      </div>
      <div class="pt-1">
        <a
          href="#"
          class=" text-decoration-none text-secondary fw-semibold fst-italic"
          style="font-size: 0.9rem"
          >¿Olvidaste tú contraseña?</a>
        </div>
        </div>
      </div>
      <button id="th"  type="submit" class="btn text-white btn-light w-100 mt-4 " name="btningresar"
      >Login</button>
    </form>
    <!-- Fin del login -->
  </body>
</html>

<script type="text/javascript">
  function myFuction(){
    var x = document.getElementById("inputContraseña");
    if (x.type==="password") {
      x.type="text";
    }else{
      x.type="password";
    }
  }

</script>
