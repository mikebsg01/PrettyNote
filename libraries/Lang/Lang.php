<?php 
class Lang {

  protected $path = 'languages/';
  protected $lang = 'en';

  public function __construct($lang = null) {
    $this->path = __DIR__ . '/' . $this->path;

    if (!is_null($lang)) {
      $this->setLang($lang);
    }
  }

  public function setLang($lang) {
    if (is_string($lang)) {
      if (is_dir($this->path . $this->lang)) {
        $this->lang = $lang;
      } else {
        throw new Exception("Exception with message 'Cannot find the assigned language directory.'");
      }
    } else {
      throw new InvalidArgumentException("InvalidArgumentException with message 'The argument \$lang must be an string.'");
    }
    return $this;
  }

  public function get($key, $replacements = []) {
    if (is_string($key)) {
      $tmp = explode('.', $key);
      $file = $tmp[0];
      $filepath = $this->path . $this->lang . '/' . $file . '.php';

      if (file_exists($filepath)) {
        $line = include $filepath;

        for ($i = 1; $i < count($tmp); ++$i) {
          if (array_key_exists($tmp[$i], $line)) {
            $line = $line[$tmp[$i]];
          } else {
            return null;
          }
        }

        foreach ($replacements as $key => $value) {
          $line = str_replace(":$key", $value, $line);
        }
        return $line;
      } else {
        throw new Exception("Exception with message 'Cannot find language file.'");
      }
    } else {
      throw new InvalidArgumentException("InvalidArgumentException with message 'The argument \$key must be an string.'");
    }
  }
}

function trans($key, $replacements = [], $lang = null) {
  $lang = new Lang($lang);
  return $lang->get($key, $replacements);
}
?>