<?php
    require_once 'header.php';
    require_once 'database/conection.php';
    require_once 'database/userdata.php';
    require_once 'database/update_follow.php';
    require_once 'database/view.php';
    require_once 'database/insert_update_db.php';
    require_once 'database/msg_validate.php';
    
    
    //$id = $_SESSION['id'];
    $id = $_GET['use_id'];

    if( isset($_POST["sendMsg"]) )
    {
        $_POST = array('msg'=> $_POST["msg"]);
        $msgVal = new MsgValidate($_POST);
        $errors = $msgVal->validateForm();
        $id = $_GET['use_id'];
        $id_log = $_SESSION['id'];

        if( empty($errors) )
        {
            $msg = $_POST['msg'];
            $msgVal->insertDataMsg($id_log, $id ,$msg);
            //header("location:my_profile.php?id=$id");
            echo "<div class='success'>Mesage sent!!! :)</div>";
            echo "<div class='success'><a href='msg.php?id=$id'>Go to Chat</a></div>";
        }
    }
?>
<?php
    $link_pic = new Userdata();
    $link = $link_pic->selectPictureById($id);
?>
    <div class='flex-2'>
        <div class='user-box'>
            <?php
                if( empty($link)  )
                {
                    echo "<img src='01.png'>";
                }
                else 
                {
                    echo "<img src='$link'>";
                }
            ?>
            <div class='user-data'>
                <?php
                    $o1 = new View();
                    $a = $o1->viewProfileDataById($id);
                ?>
            </div>
            <!-- send msg to user-->
            <form action="" method='POST'>
                <textarea name="msg" id="" cols="30" placeholder='Your Message...'></textarea>
                <br><br>
                <a href="my_profile.php">
                    <input type="submit" name='sendMsg' value='Send' class='btn sml'>
                </a>
            </form>
        </div>
        <div class='post-box'>
        <?php
            $o = new View();
            $a = $o->viewPostById($id);
        ?>
        </div>
    </div>


<?php
    require_once 'footer.php';
?>