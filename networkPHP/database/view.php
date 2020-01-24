<?php 
require_once 'conection.php';
require_once 'userdata.php';
require_once 'update_follow.php';

class View extends UpdateFollow
{
    public function viewPost()
    {
        $posts = $this->selectPostData();

        if ($posts->num_rows == 0)
        {
            echo "<div class='err'>There is no posts to show! :( </div>";
        }
        else 
        {
            while( $row = $posts->fetch_assoc() )
            {
                $username = $row['username'];
                $post = $row['post'];
                $created = $row['created_at'];
                $id = $_SESSION['id'];
                $friend_id = $row['user_id'];

                $link_pic = new Userdata();
                $link = $link_pic->selectPictureById($friend_id);
                //var_dump($link);

                echo "<div class='flex'>";

                    echo "<div class='bc-wrap'>";

                        echo "<div class='row'>";
                            echo "<div class='row1'>";
                                echo "<div class='user-img'>";
                                    if( empty($link)  )
                                    {
                                        echo "<img src='01.png'>";
                                    }
                                    else 
                                    {
                                        echo "<img src='$link'>";
                                    }
                                    
                                echo "</div>";
                                echo "<div class='username'>";
                                    // if( $friend_id == $id )
                                    // {
                                    //     echo "<h3><a href='my_profile.php'>$username</a></h3>";
                                    // }
                                    // else {
                                    //     // echo "<h3><a href='my_profile.php'>$username</a></h3>";
                                    //     echo "<h3><a href='my_profile.php?$friend_id'>$username</a></h3>";
                                    // }
                                    echo "<h3><a href='my_profile.php?use_id=$friend_id'>$username</a></h3>";
                                echo "</div>";
                            echo "</div>";
                            echo "<div class='btn-wrap'>";
                                // follow or unfollow
                                if( $friend_id != $id )
                                {
                                    if( $this->existFollow($id, $friend_id) == 0 )
                                    {
                                        if( $this->existFollow($friend_id, $id) == 0 )
                                        {
                                            echo "<button class='btn'><a href='homepage.php?add=$friend_id'>FOLLOW</a></button>";
                                        }
                                        else 
                                        {
                                            echo "<button class='btn'><a href='homepage.php?add=$friend_id'>FOLLOW BACK</a></button>";
                                        }
                                    }
                                    else 
                                    {
                                        echo "<button class='btn'><a href='homepage.php?delete=$friend_id'>UNFOLLOW</a></button>";
                                    }
                                }
                                
                            echo "</div>";
                        echo "</div>";

                        echo "<div class='bc-post'>";
                            echo "<p>$post</p>";
                        echo "</div>";
                        echo "<small>" . $created . "</small>";
                    echo "</div>";

                echo "</div>";

                
            }    
        }
        
    }

    public function viewPostById($id)
    {
        //$id = $_SESSION['id'];
        $posts = $this->selectPostDataById($id);

        if ($posts->num_rows == 0)
        {
            echo "<div class='err'>There is no posts to show! :( </div>";
        }
        else 
        {
            while( $row = $posts->fetch_assoc() )
            {
                $username = $row['username'];
                $post = $row['post'];
                $created = $row['created_at'];
                $id = $row['user_id'];
                $link_pic = new Userdata();
                $link = $link_pic->selectPictureById($id);

                echo "<div class='flex'>";

                    echo "<div class='bc-wrap'>";

                        echo "<div class='row'>";
                            echo "<div class='row1'>";
                                echo "<div class='user-img'>";
                                if( empty($link)  )
                                    {
                                        echo "<img src='01.png'>";
                                    }
                                else 
                                    {
                                        echo "<img src='$link'>";
                                    }
                                echo "</div>";
                                echo "<div class='username'>";
                                    echo "<h3>$username</h3>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";

                        echo "<div class='bc-post'>";
                            echo "<p>$post</p>";
                        echo "</div>";
                        echo "<small>" . $created . "</small>";
                    echo "</div>";
                echo "</div>"; 
            }    
        } 
    }


    public function viewProfileDataById($id)
    {
        //$id = $_SESSION['id'];
        $profile_info = $this->selectUserProfileDataById($id);

        if ($profile_info->num_rows == 0)
        {
            echo "<div class='err'>There is no profile data to show! :( </div>";
        }
        else 
        {
            while( $row = $profile_info->fetch_assoc() )
            {
                $username = $row['username'];
                $f_name = $row['first_name'];
                $l_name = $row['last_name'];
                $dob = $row['dob'];
                $mail = $row['email'];

                echo "<div class='flex'>";
                    echo "<div class='bc-wrap'>";

                        echo "<div class='bc-post'>";
                            echo "<h3>$f_name $l_name</h3>";
                        echo "</div>";
                        echo "<div class='bc-post'>";
                            echo "<p>$mail</p>";
                        echo "</div>";
                        echo "<div class='bc-post'>";
                            echo "<p>$dob</p>";
                        echo "</div>";
        
                    echo "</div>";
                echo "</div>"; 
            }    
        } 
    }
    
}

?>