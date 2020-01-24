<?php 
require_once 'conection.php';
require_once 'userdata.php';

class LoginValidator extends Userdata
{
  protected $data;
  private $errors = [];
  private static $fields = ['l_username', 'l_password'];

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
  public function validateLoginForm()
    {
        foreach(LoginValidator::$fields as $field)
        {
            if(!array_key_exists($field, $this->data))
            {
                trigger_error("'$field' is not present in the data");
                return;
            }
        }

        $this->loginValidate();
        
        return $this->errors;
    }

    // LOGIN VALIDATION
    private function loginValidate()
    {
      $username = trim($this->data['l_username']);
      $pass = trim($this->data['l_password']);
  
      if( $this->exist($username, $pass) !== false)
      {
        
        $id = $this->selectUserById($username);
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $username;
        header("Location: homepage.php"); 
      } 
      else
      {
        $this->addError('l_username', 'Wrong username or password!');
        $this->addError('l_password', 'Wrong username or password!');
      }
    }

  //FUNCTION FOR ARRAY OF ERRORS(if some validation block code register an error, the same is added to array)
  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
  
}

?>