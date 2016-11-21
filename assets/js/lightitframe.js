function Selector(selector) {
  this.nodeElement = null; 
  return this.__constructor(selector);
}

Selector.prototype.__constructor = function(selector) {
  if ($.isSelector(selector)) {
    this.nodeElement = selector.nodeElement;
  } else if ($.isDOMElement(selector) && $.isDOMObject(selector)) {
    this.nodeElement = selector;
  } else if (selector === window) {
    this.nodeElement = selector;
  } else {
    this.nodeElement = document.getElementById(selector);
  }
}

Selector.prototype.listen = function(eventType, callback) {
    this.nodeElement.addEventListener(eventType, callback);
}

Selector.prototype.val = function(value) {
  if (value) {
    return this.nodeElement.value = value;
  }
  return this.nodeElement.value;
}

Selector.prototype.html = function(html) {
  if (html) {
    return this.nodeElement.innerHTML = html;
  }
  return this.nodeElement.innerHTML;
}

Selector.prototype.attr = function(name, value) {
  if (value) {
    this.nodeElement.setAttribute(name, value);
    return value;
  }
}

function $(selector) {
  return new Selector(selector);
}

$.isSelector = function(obj) {
  return obj instanceof Selector;
}

$.isDOMElement = function(obj) {
  return obj instanceof Node;
}

$.isDOMObject = function(obj) {
  return obj instanceof EventTarget;
}

$.plugin = Selector.prototype;