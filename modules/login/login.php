<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/estilos.css">
  <meta name="author" content="Renzo Nathaniel Tomàs" />
    <meta name="description" content="Inicio de sesion" />
    <link
      rel="icon"
      type="image/x-icon"
      href="../../img/Mi proyecto.png"
    />
  <title>Login</title>
</head>

<body>
  <section class="login">
    <div class="login-box">
      <div class="login-value">
        <form action="../login/login_post.php" method="post">
          <h2>Inicio de sesion</h2>
          <div class="login-input">
            <label for="username">Usuario
              <input type="text" name="username" id="username" placeholder="ingrese el usuario" required />
            </label>
          </div>
          <div class="login-input">
            <label for="password">Contrase&ntilde;a
              <input type="password" name="password" id="password" placeholder="ingrese la contrase&ntilde;a"
                required />
            </label>
          </div>
          <div class="forget">
            <a href="#">&iquest;Olvido la contrase&ntilde;a?</a>
          </div>
          <div class="forget">
            <a href="#">&iquest;Olvido el usuario?</a>
          </div>
          <button type="submit">Ingresar</button>
        </form>
        <?php if (isset($_GET['error'])) { ?>
          <?php if ($_GET['error'] == '1') { ?>
            <span class='errormsj'>
              Error:Usuario no encontrado
            </span>
          <?php } else { ?>
            <span class='errormsj'>
              Error:Contrase&ntilde;a incorrecta
            </span>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </section>
</body>

</html>