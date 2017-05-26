<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Bienvenido a PrettyNote &middot; Registro</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto|Sonsie+One" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css?v=<?=time()?>">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css?v=<?=time()?>">
</head>
<body>
<div id="page-signup">
  <div class="content-wrapper">
    <header>
      <div class="container app-header">
        <div class="header-container grid-sp-12 grid-ds-10 grid-ds-offset-1 grid-bd-8 grid-bd-offset-2">    
          <div class="grid-sp-12 grid-ta-3 grid-ta-offset-1 grid-ds-4 grid-ds-offset-0">
            <a href="#">
              <h1 class="title">PrettyNote <span class="fa fa-bookmark"></span></h1>
            </a>
            <button id="menu-button" class="menu-btn btn pull-right">
              <span class="fa fa-bars"></span>
            </button>
          </div>
          <div class="grid-sp-12 grid-ta-8 grid-ds-8">
            <nav id="navbar" class="navbar">
              <ul>
                <li>
                  <a id="link-login" href="#">
                    <span class="fa fa-user"></span>
                    Ingresar
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <section>
      <div class="app-content">
        <div class="app-login container">
          <div class="grid-sp-12 content">
            <div class="grid-bd-4 grid-bd-offset-4">  
              <div class="login-container box grid-sp-12">
                <header>
                  <h1 class="text-center"> Registro </h1>
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
                      <div class="input-container">
                        <input type="password" id="input-password-confirm" placeholder="Confirm. Contraseña">
                      </div>
                      <div class="input-container text-center">
                        <button id="btn-signup" class="btn">Ingresar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <footer>
                <div class="box grid-sp-12">
                  <p class="text-center">Copyright © 2016 · Developer: Michael Serrato · <a href="mailto:mikebsg01@gmail.com">mikebsg01@gmail.com</a> · All Rights Reserved.</p>
                </div>
              </footer>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<script type="text/javascript" src="assets/js/lightscript.js?v=<?=time()?>"></script>
<script type="text/javascript" src="assets/js/signup.js?v=<?=time()?>"></script>
</body>
</html>