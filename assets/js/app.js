$(window).event('load', function() {
  var $loginPage = $('page-login'),
      $indexPage = $('page-index');

  if (typeof localStorage["session_start"] === "undefined") {
    $indexPage.addClass('hide');
    var $inputUsername = $('input-username'),
        $inputPassword = $('input-password'),
        $linksingup = $('link-signup');

    $linksingup.event('click', function(event) {
      event.preventDefault();
      window.location = 'signup.php';
    });

    $('btn-login').event('click', function(event) {
      event.preventDefault();
      var username = $inputUsername.val().toLowerCase(),
          password = $inputPassword.val();

      if (username == "" || password == "") {
        alert("¡Debe llenar todos los campos!");
      } else {
        if (typeof localStorage[username] !== "undefined") {
          if (localStorage[username] == password) {
            localStorage["session_start"] = username;
            location.reload();
          } else {
            alert("¡Contraseña incorrecta!")
          }
        } else {
          alert("¡El usuario no existe!");
        }
      }
    });
  } else {
    $loginPage.addClass('hide');
    var username = localStorage["session_start"],
        $btnLogout = $('btn-logout'),
        $lblUsername = $('lbl-username'),
        $btnBold = $('btn-bold'),
        $btnCursive = $('btn-cursive'),
        $btnUnderlined = $('btn-underlined'),
        $btnInsertImage = $('btn-insert-image'),
        $saveFile = $('btn-save-file'),
        $newFile = $('btn-new-file'),
        $fileNumber = $('file-number');
        $textArea = $('text-area'),
        $selectFile = $('select-file'),
        fileNumber = 0,
        newFileSaved = false;


    if (typeof localStorage[username + "_count"] === "undefined") {
      localStorage[username + "_count"] = 0;
    }

    fileNumber = parseInt(localStorage[username + "_count"]);

    $selectFile.html('');

    for (var i = 1; i <= fileNumber; ++i) {
      var element = document.createElement('option');
      element.innerHTML = "Documento " + i;
      element.setAttribute('id', 'document-'+i);
      $selectFile.nodeElement.appendChild(element);
    }

    $btnLogout.event('click', function(event) {
      event.preventDefault();
      delete localStorage["session_start"];
      location.reload();
    });

    $lblUsername.html(
      '<span class="fa fa-user"></span> ' +
      username
    );

    $btnBold.event('click', function(event) {
      event.preventDefault();
      document.execCommand('bold', false, null);
    });

    $btnCursive.event('click', function(event) {
      event.preventDefault();
      document.execCommand('italic', false, null);
    });

    $btnUnderlined.event('click', function(event) {
      event.preventDefault();
      document.execCommand('underline', false, null);
    });

    $btnInsertImage.event('click', function(event) {
      event.preventDefault();
      var u = prompt('ingresar url','http://');

      if (!u) {
        return;
      }

      document.execCommand('InsertImage', false, u);
    });

    $saveFile.event('click', function(event) {
      event.preventDefault();
      if (!newFileSaved) {
        fileNumber += 1;
        var element = document.createElement('option');
        element.innerHTML = "Documento " + fileNumber;
        element.setAttribute('id', 'document-'+fileNumber);
        $selectFile.nodeElement.appendChild(element);
        $selectFile.nodeElement.selectedIndex = fileNumber - 1;
        newFileSaved = true;
      }
      localStorage[username + "_count"] = fileNumber;
      localStorage[username + "_doc_" + fileNumber] = btoa($textArea.html());
      alert("¡Archivo guardado exitosamente! :)");
    });

    $newFile.event('click', function(event) {
      newFileSaved = false;
      $textArea.html('');
      alert("Creando nuevo archivo...");
    });

    $selectFile.event('change', function() {
      var indexChild = $selectFile.nodeElement.selectedIndex,
          documentId = $selectFile.nodeElement[indexChild].id.split('-')[1],
          file = atob(localStorage[username + "_doc_" + documentId]);
          $textArea.html(file);
    });
  }
});