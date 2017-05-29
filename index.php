<?php if (!file_exists('system/core.php')) exit("Sorry, has been ocurred an error trying to load the system.");

  require_once 'system/core.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Bienvenido a PrettyNote &middot; Inicio</title>
  <?php include 'templates/head.php' ?>
</head>
<body>
<div id="page-login">
  <div class="content-wrapper">
    <?php include 'templates/header.php' ?>
    <section>
      <div class="app-content">
        <div class="app-login container">
          <div class="grid-sp-12 content">
            <div class="grid-bd-4 grid-bd-offset-4">  
              <div class="login-container box grid-sp-12">
                <header>
                  <h1 class="text-center"> Iniciar sesión </h1>
                </header>
                <div class="grid-sp-12">
                  <div class="grid-sp-10 grid-sp-offset-1">
                    <form>
                      <div class="input-container">
                        <input type="text" id="input-username" placeholder="Usuario">
                      </div>
                      <div class="input-container">
                        <input type="password" id="input-password" placeholder="Contraseña">
                      </div>
                      <div class="input-container text-center">
                        <button id="btn-login" class="btn">Ingresar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php include 'templates/footer.php' ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
</body>
</html>