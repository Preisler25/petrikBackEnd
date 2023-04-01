<?php

class PasswordValidation {
  
  private $minLength = 8;
  private $minLowercase = 1;
  private $minUppercase = 1;
  private $minDigits = 1;
  private $minSpecialChars = 1;

  public function validate($password) {
    $errors = array();

    if (strlen($password) < $this->minLength) {
      $errors[] = "Password must be at least " . $this->minLength . " characters long";
    }

    if (preg_match_all("/[a-z]/", $password) < $this->minLowercase) {
      $errors[] = "Password must contain at least " . $this->minLowercase . " lowercase letter(s)";
    }

    if (preg_match_all("/[A-Z]/", $password) < $this->minUppercase) {
      $errors[] = "Password must contain at least " . $this->minUppercase . " uppercase letter(s)";
    }

    if (preg_match_all("/[0-9]/", $password) < $this->minDigits) {
      $errors[] = "Password must contain at least " . $this->minDigits . " digit(s)";
    }

    if (preg_match_all("/[^\w\s]/", $password) < $this->minSpecialChars) {
      $errors[] = "Password must contain at least " . $this->minSpecialChars . " special character(s)";
    }

    return new PasswordStrength(count($errors) == 0, $errors);
  }
}

class PasswordStrength {
  private $isValid;
  private $errors;

  public function __construct($isValid, $errors) {
    $this->isValid = $isValid;
    $this->errors = $errors;
  }

  public function isValid() {
    return $this->isValid;
  }

  public function getErrors() {
    return $this->errors;
  }
}

?>
