<?php if (!file_exists('system/core.php')) exit('Sorry, has been ocurred an error trying to load the system.');

require_once 'system/Core.php';
require_once 'libraries/Validation/Validation.php';

if (isset($_POST['user']) and !empty($_POST['user'])) {
  $userRequest = filterData($_POST['user'], [
    'email',
    'password',
    'passwordConfirmation'
  ]);

  $validation = Validation::make($userRequest, [
    'email'                 => ['required', 'email'],
    'password'              => ['required', 'min' => 6],
    'passwordConfirmation'  => ['required', 'equalTo' => 'password']
  ]);

  if ($validation->fails()) {
    $errors = $validation->errors();
  } else {
    // VERIFY THE DATA IN THE DATABASE...
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Bienvenido a PrettyNote &middot; Registro</title>
  <?php include 'templates/head.php' ?>
</head>
<body>
<div id="page-signup">
  <div class="content-wrapper">
    <?php include 'templates/header.php' ?>
    <section>
      <div class="app-content">
        <div class="app-login container">
          <div class="grid-sp-12 content">
            <div class="grid-bd-4 grid-bd-offset-4">  
              <div class="signup-container box grid-sp-12">
                <header>
                  <h1 class="text-center"> Registro </h1>
                </header>
                <div class="grid-sp-12">
                  <div class="grid-sp-10 grid-sp-offset-1">
                    <form action="signup.php" method="POST">
                      <div class="input-container">
                        <input type="email" id="user-email" name="user[email]" placeholder="Correo electrónico" <?=(isset($userRequest['email']) ? "value=\"{$userRequest['email']}\"" : '')?>>
                        <?php if (isset($errors) and $errors->has('email')): ?>
                          <span class="lbl-error"><?= $errors->first('email') ?></span>
                        <?php endif; ?>
                      </div>
                      <div class="input-container">
                        <input type="password" id="user-password" name="user[password]" placeholder="Contraseña" <?=(isset($userRequest['password']) ? "value=\"{$userRequest['password']}\"" : '')?>>
                        <?php if (isset($errors) and $errors->has('password')): ?>
                          <span class="lbl-error"><?= $errors->first('password') ?></span>
                        <?php endif; ?>
                      </div>
                      <div class="input-container">
                        <input type="password" id="user-password-confirmation" name="user[passwordConfirmation]" placeholder="Confirm. Contraseña" <?=(isset($userRequest['passwordConfirmation']) ? "value=\"{$userRequest['passwordConfirmation']}\"" : '')?>>
                        <?php if (isset($errors) and $errors->has('passwordConfirmation')): ?>
                          <span class="lbl-error"><?= $errors->first('passwordConfirmation') ?></span>
                        <?php endif; ?>
                      </div>
                      <div class="input-container text-center">
                        <button id="btn-signup" class="btn" type="submit">Registrarme</button>
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