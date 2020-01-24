<?php

class Dbconection
{
    private $servername;
    private $username;
    private $password;
    private $database;

    public function connect()
    {
        $this->servername = 'localhost';
        $this->username = 'videoman';
        $this->password = 'videoman123';
        $this->database = 'network';

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        return $conn;
    }

    // public function conect()
    // {
    //     $link = mysql_connect( $this->servername, $this->username, $this->password, $this->database );
    //     return $link;
    // }
    
}




?>