<?php
class Collection {
  
  private $values = [];

  public function __construct(array $values = []) {
    $this->values = $values;
  }

  public function push($val) {
    array_push($this->values, $val);
    return $this;
  }

  public function put($key, $val) {
    $this->values[$key] = $val;
    return $this;
  }

  public function has($key) {
    return isset($this->values[$key]);
  }

  public function get($key) {
    if ($this->has($key)) {
      return $this->values[$key];
    }
    return null;
  }

  public function first($callback = null) {
    if (is_string($callback)) {
      $content = $this->get($callback);
      
      if ($content instanceof Collection) {
        return $content->first();
      } else if (is_array($content)) {
        return current($content);
      } else {
        return null;
      }
    }
    return current($this->values);
  }

  public function all() {
    return $this->values;
  }

  public function count() {
    return count($this->values);
  }
}

function collect(array $values = []) {
  return new Collection($values);
}
?>