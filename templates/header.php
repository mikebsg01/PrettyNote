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
            <?php if (App::getCurrentAction() != 'index'): ?>
              <li>
                <a id="link-login" href="index.php">
                  <span class="fa fa-user"></span>
                  Ingresar
                </a>
              </li>
            <?php endif; ?>
            <?php if (App::getCurrentAction() != 'signup'): ?>
              <li>
                <a id="link-signup" href="signup.php">
                  <span class="fa fa-user"></span>
                  Registrarse
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>