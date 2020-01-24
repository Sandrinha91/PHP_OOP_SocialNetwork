<?php
    require_once 'header.php';
    require_once 'database/conection.php';
    require_once 'database/userdata.php';
    require_once 'database/update_follow.php';
    require_once 'database/view.php';
    require_once 'database/insert_update_db.php'; 
    require_once 'database/edit_validate.php'; 

    require_once 'database/picture_validate.php'; 
    require_once 'database/msg_view.php';
    
    require_once 'database/msg_validate.php';

    
    $id = $_SESSION['id'];

    if( isset($_POST["send"]) )
    {
        $_POST = array('msg'=> $_POST["msg"]);
        $msgVal = new MsgValidate($_POST);
        $errors = $msgVal->validateForm();
        $id_f = $_GET['id'];
        $id = $_SESSION['id'];

        if( empty($errors) )
        {
            $msg = $_POST['msg'];
            $msgVal->insertDataMsg($id, $id_f ,$msg);
            header("location:msg.php?id=$id_f");
        }
    }

?>
    <!-- MSG SENDER NAME -->
    <div class='flex-2'>
        <div class='picture-wrap'>
            <div>
                <?php
                $msg = new MessageView();
                $msgView =  $msg->viewMsgSender();
                
                ?>
            </div>
        </div>

    <!-- MSG WITH SELECTED USER -->
        <div class="msg-wrap">
            <div>
                <?php
                    if( !empty($_GET['id']) )
                    {
                        $id_f = $_GET['id'];
                        $msg_view = new MessageView();
                        $result = $msg_view->selectMsgDataInfoById($id_f, $id);
                        if ($result->num_rows == 0)
                        {
                            echo "<div class='err'>There is no messages with this users to show! :( </div>";
                        }
                        else 
                        {
                            while( $row = $result->fetch_assoc() )
                            {
                                $user_id = $row['user_id'];
                                $msg = $row['message'];
                                $created_at = $row['created_at'];
                                $o = new Userdata();
                                $u_name = $o->selectUsernameById($user_id);
                                
                                echo "<div class='user-wrap'>";
                                echo "<h3><i>$u_name</i></h3>";
                                echo "<p>$msg</p>";
                                echo "<small>$created_at</small>";
                                echo "</div>";
                            }
                        }
                    }
                ?>

                <form action="" method="POST"  class='msg-box'>
                    <textarea name="msg" id="" cols="10"></textarea>
                    <br><br>
                    <div class="err"> <?php echo $errors['msg'] ?? '' ?> </div>
                    <a href="msg.php?$f_id=<?php echo $id_f ?? ''?> ">
                    <input type="submit" name="send" value="Send" class="msg-btn"></a>
                </form>
            </div>   
        </div>
    </div>
<?php
    require_once 'footer.php';
?>