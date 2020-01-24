<?php 
require_once 'conection.php';
require_once 'userdata.php';


class UpdateFollow extends Userdata
{
    public function addFollow($id, $f_id)
    {
        $sql = "INSERT INTO follow(user_id, friend_id)
                VALUES ($id, $f_id)";
        $result = $this->connect()->query($sql);
    }

    public function deleteFollow($id, $f_id)
    {
        $sql = "DELETE FROM follow
            WHERE user_id = $id
            AND friend_id = $f_id";
        $result = $this->connect()->query($sql);
    }
    
}

?>