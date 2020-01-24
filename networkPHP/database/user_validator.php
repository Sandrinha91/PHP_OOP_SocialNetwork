<?php 
require_once 'conection.php';
require_once 'userdata.php';

class UserValidator extends Userdata
{
  protected $data;
  private $errors = [];
  private static $fields = ['name', 'lastName', 'dob' , 'username', 'email', 'password', 'repassword'];

  public function __construct($post_data)
  {
    $this->data = $post_data;
  }

  //GET ERRORS
  public function getErrors()
  {
    return $this->errors;
  }

  // FORM VALIDATION
  public function validateForm()
    {
        foreach(self::$fields as $field)
        {
            if(!array_key_exists($field, $this->data))
            {
                trigger_error("'$field' is not present in the data");
                return;
            }
        }

        $this->validateName();
        $this->validateLastName();
        $this->validateUsername();
        $this->validateEmail();
        $this->validatePassword();
        return $this->errors;
    }

    // NAME VALIDATION
    private function validateName()
    {
      $val = trim($this->data['name']);
  
      if(empty($val))
      {
        $this->addError('name', 'Name cannot be empty');
      } 
      else 
      {
        if(is_numeric($val))
        {
          $this->addError('name','Name cant be alphanumeric');
        }
      }
    }

    // LAST NAME VALIDATION
    private function validateLastName()
    {
      $val = trim($this->data['lastName']);
  
      if(empty($val))
      {
        $this->addError('lastName', 'Last name cannot be empty');
      } 
      else 
      {
        if(is_numeric($val))
        {
          $this->addError('lastName','Last name cant be alphanumeric');
        }
      }
    }

  // USERNAME VALIDATION
  private function validateUsername()
  {
    
    $val = trim($this->data['username']);

    if(empty($val))
    {
      $this->addError('username', 'Username cannot be empty');
    } 
    elseif( $this->isUnique('username', $val) !== false )
    {
      $this->addError('username', 'Username must be unique, please choose another!');
    }
    else 
    {
      if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val))
      {
        $this->addError('username','username must be 6-12 chars & alphanumeric');
      }
    }
  }

  // EMAIL VALIDATION
  private function validateEmail()
  {
    $val = trim($this->data['email']);

    if(empty($val))
    {
      $this->addError('email', 'email cannot be empty');
    } 
    elseif( $this->isUnique('email', $val) !== false )
    {
      $this->addError('email', 'Email must be unique, please choose another!');
    }
    else 
    {
      if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
        $this->addError('email', 'email must be a valid email address');
      }
    }
  }

  // PASSWORD VALIDATION
  private function validatePassword()
  {
    $val = trim($this->data['password']);
    $val1 = trim($this->data['repassword']);

    if(empty($val))
    {
      $this->addError('password', 'Password cannot be empty');
    } 
    else 
    {
      if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val))
      {
        $this->addError('password','Passsword must be 6-12 chars & alphanumeric');
      }
    }
    // check if pass and re-pass are same
    if( $val1 != $val )
    {
        $this->addError('repassword','Passsword doesnt match!');
    }

  }

  // REPASSWORD VALIDATION
  private function validateRepassword()
  {
    $val = trim($this->data['repassword']);

    if(empty($val))
    {
      $this->addError('repassword', 'Password cannot be empty');
    } 
    else 
    {
      if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val))
      {
        $this->addError('repassword','Passsword must be 6-12 chars & alphanumeric');
      }
    }
  }

  //FUNCTION FOR ARRAY OF ERRORS(if some validation block code register an error, the same is added to array)
  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
  
}

?>