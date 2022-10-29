<!-- web login -->
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link rel="stylesheet"  href="./styles_Imgs_js/css/Style.css">
    <title>Inicio De Sesi&oacute;n</title>
  </head>
    <body class=" d-flex justify-content-center align-items-center vh-100">

      <!-- Inicio del login -->
        <form method="post" action="./controller/controlador.php"
          class="bg-white p-5 rounded-5 text-secondary shadow"
          style="width: 25rem">
        <div class=" d-flex justify-content-center">
          <img
            src="./login/img/logo.png"
            alt="login-icon"
            style="height: 7rem"/>
      </div>
      <div class="mt-3 text-center fs-1 fw-bold">
        Iniciar Sesi&oacute;n
      </div>

      <div class="input-group mt-5">
        <div class="input-group-text">
          <img
            src="./login/img/user_logo.png"
            alt="username-icon"
            style="height: 1rem"/>
        </div>
        <input
          class="form-control bg-light"
          type="text"
          placeholder="Username" 
          name="documento"/>
      </div>
      <div class="input-group mt-2">
        <div class="input-group-text">
          <img
            src="./login/img/pass_logo.png"
            alt="password-icon"
            style="height: 1rem"/>
        </div>
        <input
          class="form-control bg-light"
          type="password"
          placeholder="Password"
          name="pass"/>
      </div>
      <div class="pt-1">
        <a
          href="#"
          class=" text-decoration-none text-secondary fw-semibold fst-italic"
          style="font-size: 0.9rem"
          >Forgot your password?</a>
        </div>
      </div>
      <input type="submit" class="btn bg-success text-white w-100 mt-4 fw-semibold shadow-sm" name="btningresar"
      value="Login">
    </form>
    <!-- Fin del login -->
  </body>
</html>
