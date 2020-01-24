<?php

require_once 'conection.php';

class Userdata extends Dbconection
{
    //check if value is unique
    public function isUnique($columnName, $newValue)
    {
        $sql = "SELECT $columnName 
                FROM user
                WHERE $columnName = '$newValue';";

        $result = $this->connect()->query($sql);
        $num_rows = $result->num_rows;
        $reserved = true;
        
        if($num_rows > 0)
        {
            $reserved = true;
            return $reserved;
        }
        else
        {
            $reserved = false;
            return $reserved;
        }
    }

    // method for checking if username or email belongs to sesion id 
    public function checkValue($columnName, $newValue ,$id)
    {
        $sql = "SELECT $columnName, id
                FROM user
                WHERE id = $id AND $columnName = '$newValue';";

        $result = $this->connect()->query($sql);
        $values = $result->fetch_assoc();
        $id = $values['id'];
        
        return $id;
    }

    //METHODS FOR INSERT DATA IN DB

    // insert data in user table
    public function insertDataUser( $valueUsername, $valueEmail, $valuePass )
    {
        $sql = "INSERT INTO user (username, email, password ) 
                VALUES ('$valueUsername', '$valueEmail' , '$valuePass' ) 
                ;";

        $result = $this->connect()->query($sql);
        
    }

    //insert data in profile table
    public function insertDataProfile( $valID, $valueName, $valueLast, $valueDob, $valPic, $valCity, $valCountry)
    {
        $sql1 = "INSERT INTO profile ( user_id, first_name, last_name, dob, picture, city, country ) 
                VALUES ( $valID, '$valueName', '$valueLast' , '$valueDob', '$valPic', '$valCity', '$valCountry' ) 
                ;";

        $result1 = $this->connect()->query($sql1);  
    }

    //insert post in post table
    public function insertDataPost( $id, $text, $video )
    {
        $sql = "INSERT INTO post ( user_id, post, video ) 
        VALUES ( $id, '$text', '$video' ) 
        ;";

        $result = $this->connect()->query($sql);
    }

    //insert msg in msg table
    public function insertDataMsg( $id, $f_id , $text )
    {
        $sql = "INSERT INTO message ( user_id, friend_id, message ) 
        VALUES ( $id, $f_id, '$text' ) 
        ;";

        $result = $this->connect()->query($sql);
    }

    //METHODS FOR SELECT DATA

    // select user id by username value
    public function selectUserById($username)
    {
        $sql = "SELECT id 
                FROM user
                WHERE username = '$username'";

        $result = $this->connect()->query($sql);  
        $row = $result->fetch_assoc();
        $id = $row['id']; 
        return $id;
    }

    // select username by user id value
    public function selectUsernameById($id)
    {
        $sql = "SELECT username 
                FROM user
                WHERE id = '$id'";

        $result = $this->connect()->query($sql);  
        $row = $result->fetch_assoc();
        $username = $row['username']; 
        return $username;
    }

    // select picture link by user id value
    public function selectPictureById($id)
    {
        $sql = "SELECT picture 
                FROM profile
                WHERE user_id = '$id'";

        $result = $this->connect()->query($sql);  
        $row = $result->fetch_assoc();
        $link = $row['picture']; 
        return $link;
    }

    //select user profile info by id
    public function selectUserProfileDataById($id)
    {
        $sql = "SELECT *
                FROM profile
                INNER JOIN user
                ON user.id = profile.user_id
                WHERE profile.user_id = $id;
                ";
        $result = $this->connect()->query($sql);  
        return $result;  
    }

    // select post data for posts
    public function selectPostData()
    {
        $sql = "SELECT post.user_id,post.post,user.username, post.created_at
                FROM post
                INNER JOIN user
                ON user.id = post.user_id
                ORDER BY post.created_at DESC;
                ";
        $result = $this->connect()->query($sql);  
        return $result;  
    }

    // select post data for posts by id
    public function selectPostDataById($id)
    {
        $sql = "SELECT post.user_id,post.post,user.username, post.created_at
                FROM post
                INNER JOIN user
                ON user.id = post.user_id
                WHERE post.user_id = $id
                ORDER BY post.created_at DESC;
                ";
        $result = $this->connect()->query($sql);  
        return $result;  
    }
    
    // select msg distinct sender by id
    public function selectMsgDataSenderById($id)
    {
        $sql = "SELECT DISTINCT message.friend_id
                FROM message
                WHERE user_id = $id
                UNION
                SELECT DISTINCT user_id
                FROM message
                WHERE friend_id = $id";

        $result = $this->connect()->query($sql);  
        return $result;  
    }

    

    // select messages by id
    public function selectMsgDataInfoById($id, $idLoged)
    {
        $sql = "SELECT message.user_id, message.friend_id, message.message, message.created_at
                FROM message
                INNER JOIN user
                ON user.id = message.user_id
                WHERE message.user_id = $id AND message.friend_id = $idLoged OR message.user_id = $idLoged AND message.friend_id = $id
                ORDER BY message.created_at ASC;
                ";
        $result = $this->connect()->query($sql);  
        return $result;  
    }

    //select/search user by search
    public function selectUserBySearch($value)
    {
        $sql = "SELECT CONCAT(profile.first_name, ' ' , profile.last_name) AS name, user.username
                FROM profile
                INNER JOIN user
                ON user.id = profile.user_id
                WHERE profile.first_name LIKE '%$value%' 
                OR profile.last_name LIKE '%$value%' 
                OR user.username LIKE '%$value%';
                ";
        $result = $this->connect()->query($sql);  
        return $result;  
    }

    // METHODS FOR CHECKING DATA

    //if username and password exist in one row 
    public function exist($username, $pass)
    {
        $sql = "SELECT username,password 
                FROM user
                WHERE username = '$username' AND password = '$pass'";

        $result = $this->connect()->query($sql);  
        $num_rows = $result->num_rows;
        
        if( $num_rows > 0 )
        {
            return true;
        }
        else
        {
            return false;
        } 
    }

    //do I follow another user
    public function existFollow($firstId, $secondId)
    {
        $sql = "SELECT * 
                FROM follow 
                WHERE user_id = $firstId AND friend_id = $secondId";

        $result = $this->connect()->query($sql);  
        $num_rows = $result->num_rows; // 0 ili 1
        
        return $num_rows;
    }

    // METHODS FOR UPDATE DATA

    // update user info
    public function updateDataUser($username,$email,$pass,$id)
    {
        $sql ="UPDATE user
                SET username='$username', email = '$email', password = '$pass'
                WHERE id=$id;";
        $result = $this->connect()->query($sql);
    }

    // update user profile
    public function updateDataProfile($id, $f_name,$l_name, $dob, $city, $country )
    {
        $sql ="UPDATE profile
                SET user_id = $id ,first_name='$f_name', last_name='$l_name', dob = '$dob', city = '$city', country = '$country'
                WHERE user_id = $id;";
        $result = $this->connect()->query($sql);
    }

    // update user profile picture
    public function updateProfilePicture($id, $picture )
    {
        $sql ="UPDATE profile
                SET user_id = $id ,picture='$picture'
                WHERE user_id = $id;";
        $result = $this->connect()->query($sql);
    }

}

?>