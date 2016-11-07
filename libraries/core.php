<?php 

/**
 * Global settings
 * @var array
 * ============================================== */

$app = [];

$app['title'] = $app['name'] = 'PrettyNote';

/**
 * Main functions
 * ============================================== */

function section($name) {
  global $app;

  $content = false;
  $file_path = 'templates/' . $name . '.php';

  if (file_exists($file_path)) {
    $include = include $file_path;
  } 
  else if (isset($app[$name])) {
    return $app[$name];
  }
  return false;
}

?>