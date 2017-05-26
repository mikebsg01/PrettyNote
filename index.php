<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Bienvenido a PrettyNote &middot; Inicio</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto|Sonsie+One" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css?v=<?=time()?>">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css?v=<?=time()?>">
</head>
<body>
<div id="page-login">
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
                  <a id="link-signup" href="#">
                    <span class="fa fa-user"></span>
                    Registrarse
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
<div id="page-index">
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
                  <a id="lbl-username" href="#">
                    ...
                  </a>
                </li>
                <li>
                  <a id="btn-logout" href="#">
                    Cerrar sesión
                    <span class="fa fa-sign-out"></span>
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
            <div class="grid-sp-12 grid-ta-8 grid-ta-offset-2">  
              <div class="textEditor grid-sp-12 box">
                <div class="grid-sp-12">
                  <div class="grid-sp-1">
                    <label class="lbl">Archivo: </label>
                  </div>
                  <div class="grid-sp-3">
                    <div class="input-container">
                      <select id="select-file">
                        <option value="">...</option>
                      </select>
                    </div>
                  </div>
                  <div class="pull-right">
                    <button id="btn-new-file" class="btn">
                      Nuevo archivo
                      <span class="fa fa-plus"></span>
                    </button>
                    <button id="btn-save-file" class="btn">
                      Guardar
                      <span class="fa fa-floppy-o"></span>
                    </button>
                  </div>
                </div>
                <div class="grid-sp-12">
                  <button id="btn-bold" class="btn"><b>N</b></button>
                  <button id="btn-cursive" class="btn"><i>C</i></button>
                  <button id="btn-underlined" class="btn"><u>S</u></button>
                  <button id="btn-insert-image" class="btn"><span class="fa fa-picture-o"></span></button>
                </div>
                <input type="hidden" id="file-number" name="file_number" value="0">
                <div id="text-area" contenteditable="true" class="textArea grid-sp-12">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<script type="text/javascript" src="assets/js/lightscript.js?v=<?=time()?>"></script>
<!--<script type="text/javascript" src="assets/js/ls.texteditor.js?v=<?=time()?>"></script>-->
<script type="text/javascript" src="assets/js/app.js?v=<?=time()?>"></script>
</body>
</html>