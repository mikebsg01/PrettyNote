$.plugin.textEditor = function() {
  var $textEditor = $(this),
      methods = {};

  methods = {
    keys: {
      'ENTER': '<br>'
    },
    enter: function() {
      var content = this.getContent();
      /*$textEditor.html(content + this.keys['ENTER']);
      this.getCaretPosition();*/
    },
    getCaretPosition: function() {
      var caretPos = 0, 
          selection, 
          range,
          currentNode;

      if (window.getSelection) {
        selection = window.getSelection();

        if (selection.rangeCount) {
          range = selection.getRangeAt(0);
          currentNode = range.commonAncestorContainer;
          caretPos = range.endOffset;
        }
      }

      if (typeof range !== "undefined" &&
          typeof selection !== "undefined" &&
          typeof currentNode !== "undefined") {
        range.setStart(currentNode.childNodes[0], caretPos);
        range.setEnd(currentNode.childNodes[0], caretPos);
        console.log(currentNode, currentNode.childNodes[0]);
        selection.removeAllRanges();
        selection.addRange(range);
      }
    },
    getContent: function() {
      return $textEditor.html();
    },
    processText: function() {
      /* alert("procesando texto..."); */
      console.log(methods.getContent());
    }
  };

/**
 * Lograr polimorfismo en el método attr para poder
 * ingresar arreglos como parametros y agregar y actualizar atributos
 * en una sola sentencia.
 */
  $textEditor.attr('class', 'textEditor');
  $textEditor.attr('contenteditable', 'true');
  $textEditor.attr('autofocus', 'true');
  $textEditor.attr('tabindex', '1');

  $textEditor.listen('keyup', function(event) {
    var $this = $(this);

    methods.processText();
  });

  /*$textEditor.listen('keydown', function(event) {
    var key = event.which;
    if (key == 13) {
      event.preventDefault();
      methods.enter();
    }
  });*/
};

$(window).listen('load', function() {
    $('btn-login').listen('click', function() {
      alert("Nombre: " + $('input-username').val() + '\n' +
            "Password: " + $('input-pw').val());
    });
    $('box1').textEditor();
});