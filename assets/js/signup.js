$(window).event('load', function() {

  if (typeof localStorage["session_start"] !== "undefined") {
    window.location = 'index.php';
  } else {
    var $linkLogin = $('link-login'),
        $inputUsername = $('input-username'),
        $inputPassword = $('input-password'),
        $inputPasswordConfirm = $('input-password-confirm'),
        $btnSignup = $('btn-signup');

    $linkLogin.event('click', function(event) {
      event.preventDefault();
      window.location = 'index.php';
    });

    $btnSignup.event('click', function(event) {
      event.preventDefault();
      var username = $inputUsername.val().toLowerCase(),
          password = $inputPassword.val(),
          passwordConfirm = $inputPasswordConfirm.val();

      if (username == "" || password == "" || passwordConfirm == "") {
        alert("¡Debe llenar todos los campos!");
      } else {
        if (typeof localStorage[username] === "undefined") {
          if (password == passwordConfirm) {
            localStorage[username] = password;
            localStorage["session_start"] = username;
            alert("¡Usuario registrado! :)");
            window.location = 'index.php';
          } else {
            alert("¡Las contraseñas no coinciden!");
          }
        } else {
          alert("¡El usuario ya existe!");
        }
      }
    })
  }
});