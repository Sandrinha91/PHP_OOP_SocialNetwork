<?php 
require_once 'conection.php';
require_once 'userdata.php';
require_once 'user_validator.php';

class InsertUpdate extends UserValidator
{
  // INSERT DATA IN TABLES

  // insert data in user table
  public function addValuesToUser()
  {
    if ( empty($this->getErrors()) )
    {
      $this->insertDataUser(
        $this->data['username'],
        $this->data['email'],
        $this->data['password']
      );
    }
  }

  // insert data in profile table
  public function addValuesToProfile()
  {
    $username = $this->data['username'];
    $valId = $this->selectUserById($username);

    $valPic = null;
    $valCity = null; 
    $valCountry = null;

    if ( empty($this->errors) )
    {
      $this->insertDataProfile(
        $valId,
        $this->data['name'],
        $this->data['lastName'],
        $this->data['dob'],
        $valPic,
        $valCity,
        $valCountry
      );
    }
  }

  //insert new post in post table
  public function addNewPost()
  {
    $text = $this->data['text'];
    if ( empty($text) )
    {
      echo "<div class='warning'>Post can not be empty!</div>";
    }
    else
    {
      $id = $_SESSION['id'];
      $video = null;

      $this->insertDataPost(
        $id,
        $text,
        $video
      );
    }
    
  }

  // UPDATE DATA IN TABLES
  public function updateValuesToUser()
  {
    $id = $_SESSION['id'];
    if ( empty($this->getErrors()) )
    {
      $this->updateDataUser(
        $this->data['username'],
        $this->data['email'],
        $this->data['password'],
        $id
      );
    }
  }

  public function updateValuesToProfile()
  {
    $id = $_SESSION['id'];
    
    
    if ( empty($this->getErrors()) )
    {
      $this->updateDataProfile(
        $id,
        $this->data['name'],
        $this->data['lastName'],
        $this->data['dob'],
        $this->data['city'],
        $this->data['country']
      );
    }
  }

  
  
}

?>