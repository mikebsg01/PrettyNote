<?php
class Validation {

  protected $availableRules = [
    'required',
    'min',
    'equalTo',
    'email'
  ];

  protected $data;
  protected $fieldRules;
  protected $errorCollection;
  protected $lang = 'en';

  function __construct(array $data, array $fieldRules, $lang = null) {
    $this->errorCollection = collect();
    $this->lang = is_null($lang) ? $this->lang : $lang;
    $this->setData($data)->setFieldRules($fieldRules)->run();
  }

  protected function setData(array $data) {
    $this->data = $data;
    return $this;
  }

  protected function setFieldRules(array $fieldRules) {
    $this->fieldRules = [];

    foreach ($fieldRules as $field => $rules) {
      foreach ($rules as $rule => $options) {
        if (is_int($rule)) {
          $options = cstrtolower($options);
          $this->fieldRules[$field][$options] = true;
        } else {
          $rule = cstrtolower($rule);
          $this->fieldRules[$field][$rule] = $options;
        }
      }
    }
    return $this;
  }

  protected function ruleExists($rule) {
    if (is_string($rule)) {
      return in_array(
        cstrtolower($rule), 
        array_map("cstrtolower", $this->availableRules)
      );
    }
    return false;
  }

  protected function run() {
    foreach ($this->fieldRules as $field => $rules) {
      foreach ($rules as $rule => $options) {
        if (is_string($rule) and $this->ruleExists($rule)) {
          $this->validate($field, $rule, $options);
        }
      }
    }
  }

  protected function errorFound($field, $rule) {
    $oldValue = $this->errorCollection->get($field) ?: collect();
    $message = trans("validation.$rule", ['field' => $field], $this->lang);

    if (is_array($message)) {
      $message = current($message);
    }

    $newValue = $oldValue->put(
      $rule, $message
    );

    $this->errorCollection->put($field, $newValue);
  }

  public function errors() {
    return $this->errorCollection;
  }

  public function isSetField($field) {
    return isset($this->data[$field]);
  }

  public function getFieldValue($field) {
    if ($this->isSetField($field)) {
      return $this->data[$field];
    }

    return null;
  }

  public function isEmpty($field) {
    return empty($this->data[$field]);
  }

  public function validateRequired($field) {
    if ($this->isEmpty($field)) {
      return false;
    }
    return true;
  }

  public function validateMin($field, $min) {
    if ($this->isEmpty($field)) {
      return false;
    } else {
      $fieldValue = $this->getFieldValue($field);

      if (is_string($fieldValue) and strlen($fieldValue) < $min) {
        return false;
      }
    }
    return true;
  }

  public function validateEqualTo($field, $fieldToCompare) {
    if (!$this->isSetField($fieldToCompare)) {
      return false;
    } else{ 
      $fieldValue = $this->getFieldValue($field);

      if ($fieldValue != $this->getFieldValue($fieldToCompare)) {
        return false;
      }
    }
    return true;
  }

  public function validateEmail($field, $withErrorMessage = false) {
    $fieldValue = $this->getFieldValue($field);
    return filter_var($fieldValue, FILTER_VALIDATE_EMAIL);
  }

  public function validate($field, $rule, $options = true) {
    $callMethod = "validate$rule";

    if (method_exists($this, $callMethod)) {
      $result = (is_bool($options) and $options) ?
                $this->{$callMethod}($field) :
                $this->{$callMethod}($field, $options);

      if (!$result) {
        $this->errorFound($field, $rule);
      }
    } else {
      throw new BadMethodCallException("BadMethodCallException with message 'Method [$callMethod] does not exist.'");
    }
  }

  public function fails() {
    if ($this->errors()->count() > 0) {
      return true;
    }
    return false;
  }

  public static function make(array $data, array $fieldRules, $lang = 'en') {
    return new Validation($data, $fieldRules, $lang);
  }
}
?>