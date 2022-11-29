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
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/plugins/sweetAlert/dist/sweetalert2.min.css">
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
          type="text" id="age" onkeypress="return valideKey(event);"
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
          <div class="input-group mt-2">
            <h6 class="ml-3 text-decoration-none text-secondary fw-semibold fst-italic">Ver contraseña</h6>
            <input class="ml-1 mb-1" type="checkbox" onclick="myFuction()" >
          </div>
            
      </div>
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
		function valideKey(evt){
			
			// code is the decimal ASCII representation of the pressed key.
			var code = (evt.which) ? evt.which : evt.keyCode;
			
			if(code==8) { // backspace.
			  return true;
			} else if(code>=48 && code<=57) { // is a number.
			  return true;
			} else{ // other keys.
			  return false;
			}
		}
		</script>

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
<script src="./bootstrap-5.0.2-dist/plugins/sweetAlert/dist/sweetalert2.all.min.js"></script>
