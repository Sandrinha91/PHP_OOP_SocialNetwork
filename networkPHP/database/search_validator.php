<?php 
require_once 'conection.php';
require_once 'userdata.php';
require_once 'user_validator.php';
require_once 'insert_update_db.php';

class SearchValidator extends InsertUpdate
{
  protected $data;
  private $errors = [];
  private static $fields = ['user'];

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

        $this->validateSearch();
        return $this->errors;
    }

  //COUNTRY VALIDATION   
  public function validateSearch()
  {
    $val = trim($this->data['user']);

    if(empty($val))
    {
      $this->addError('user', 'User cannot be empty!');
    } 
  }

  //FUNCTION FOR ARRAY OF ERRORS(if some validation block code register an error, the same is added to array)
  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
  
}

?>