<?php 
require_once 'conection.php';
require_once 'userdata.php';


class MessageView extends Userdata
{
    public function viewMsgSender()
    {
        $id = $_SESSION['id'];

        $result = $this->selectMsgDataSenderById($id);

        if ($result->num_rows == 0)
        {
            echo "<div class='err'>There is no messages with other user to show! :( </div>";
        }
        else 
        {
            while( $row = $result->fetch_assoc() )
            {
                //$username = $row['username'];
                $user_id = $row['friend_id'];
                $username = $this->selectUsernameById($user_id);

                echo "<div class='user-wrap'>";
                echo "<h3><a href='msg.php?id=$user_id'><i>$username</i></a></h3>";
                echo "</div>";
            }
        }
    }

    public function viewUsers($valuePass)
    {
        $value = $valuePass;
        $result = $this->selectUserBySearch($value);

        if ($result->num_rows == 0)
        {
            echo "<div class='err'>There is no users to show! :( </div>";
        }
        else 
        {
            while( $row = $result->fetch_assoc() )
            {
                $name = $row['name'];
                $username = $row['username'];
                
                $use_id = $this->selectUserById($username);

                echo "<div class='search-wrap'>";
                echo "<h3><a href='my_profile.php?use_id=$use_id'><i>$username($name)</i></a></h3>";
                echo "</div>";
            }
        }
    }
    
}

?>