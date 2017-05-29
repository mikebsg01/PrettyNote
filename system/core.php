<?php
/**
 * Global Functions
 *
 */

function cstrtolower($str) {
  return mb_strtolower($str, 'UTF-8');
}

function cstrtoupper($str) {
  return mb_strtoupper($str, 'UTF-8');
}

function cucfirst($str) {
  $initial  = cstrtoupper(mb_substr($str, 0, 1));
  $ucfirst  = $initial . mb_substr($str, 1);
  return $ucfirst;
}

function capitalize($str) {
  return cucfirst(cstrtolower($str));
}

function filterData(array $data, $filter) {
  if (is_array($filter)) {
    $filterData = array_intersect_key($data, array_flip($filter));
    return $filterData;
  }
  return null;
}

/**
 * Global Libraries
 */

require_once __DIR__.'/../libraries/Collection/Collection.php';
require_once __DIR__.'/../libraries/Lang/Lang.php';

/**
 * App Class
 */
class App {
  public static function getCurrentAction() {
    return basename($_SERVER["SCRIPT_FILENAME"], ".php");
  }

  public static function pprint() {
    $i = 0;

    echo "<pre class=\"app-pprint\">\n";

    foreach (func_get_args() as $var) {
      if ($i > 0) {
        echo "\n";
      }

      var_dump($var);
      ++$i;
    }

    echo "</pre>\n";
  }
}
?>