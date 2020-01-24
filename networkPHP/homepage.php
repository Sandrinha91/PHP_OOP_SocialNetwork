<?php
    require_once 'header.php';
    require_once 'database/conection.php';
    require_once 'database/userdata.php';
    require_once 'database/update_follow.php';
    require_once 'database/view.php';
    require_once 'database/insert_update_db.php';
    require_once 'database/search_validator.php';
    require_once 'database/msg_view.php';
    
    // follow/unfolow btn action
    $n_o = new View();
    $id = $_SESSION['id'];

    if( !empty($_GET['delete']) )
    {
        // $friend_id = real_escape_string($_GET['delete']);
        $friend_id = $_GET['delete'];
        $action = $n_o->deleteFollow($id, $friend_id);
    }
    if( !empty($_GET['add']) )
    {
        $friend_id =$_GET['add'];
        $action = $n_o->addFollow($id, $friend_id);
    }
    if( !empty($_GET['use_id']) )
    {
        $id =$_GET['use_id'];
        header("location:my_profile.php?use_id=$id");
    }
    if( isset($_POST["post_it"]) )
    {
        $post = new InsertUpdate($_POST);
        $newPost = $post->addNewPost();
        //var_dump($post);
    }
    
?>
    <!-- NEW POST -->
    <div class='flex'>
        <div class='bc-wrap-post'>      
            <form method='POST'>
                <input type='text' name='text' placeholder='Hey, something new?' class='input'>
                <input type='submit' name='post_it' class='btn-input' value="Post">
            </form>
        </div>
    </div>

    <!-- SEARCH USER -->
    <div class='flex'>
        <div class='bc-wrap-post'>      
            <form method='POST'>
                <input type='text' name='user' placeholder='Looking for someone? Type username,email or name...' class='input'>
                <div class="err"> <?php echo $errors['user'] ?? '' ?> </div>
                <input type='submit' name='search' class='btn-input' value="Search">
                <?php
                    if( isset($_POST["search"]) )
                    {
                        $_POST = array('user'=> $_POST["user"]);
                        $n_so = new SearchValidator($_POST);
                        $errors = $n_so->validateForm();
                
                        if( empty($errors) )
                        {
                            $value = $_POST['user'];
                            $n_udo = new MessageView();
                            $result = $n_udo->viewUsers($value);
                        }
                    }
                ?>
            </form>
        </div>
    </div>

    <!-- VIEW ALL POST SECTION -->
    <?php
        $o = new View();
        $a = $o->viewPost();
    ?>
    

<?php
    require_once 'footer.php';
?>