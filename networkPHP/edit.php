<?php
    require_once 'header.php';
    require_once 'database/conection.php';
    require_once 'database/userdata.php';
    require_once 'database/update_follow.php';
    require_once 'database/view.php';
    require_once 'database/insert_update_db.php'; 
    require_once 'database/edit_validate.php'; 

    require_once 'database/picture_validate.php'; 

    
    $id = $_SESSION['id'];

    if( isset($_POST["register"]) )
        {
            $validation = new EditValidate($_POST);
            $errors = $validation->validateForm(); 
            
            // $test = $validation->validatePicture(); 
            // var_dump($validation);
            // var_dump($test);             
    
            //updateValuesToUser()
            $validation->updateValuesToUser();
            $validation->updateValuesToProfile();

        }

    

    if( isset($_FILES['file']) )
    {
        $fileUpload = new PictureValidate();
        //var_dump($_FILES['file']);

        //upload a file
        $fileUpload->uploadFiles($_FILES['file']);
    }
    
        $userinfo = new Userdata();
        $result = $userinfo->selectUserProfileDataById($id);
        $values = $result->fetch_assoc();
        
        $username = $values['username'];
        $email = $values['email'];
        $pass = $values['password'];
        $repass = $values['password'];
        $f_name = $values['first_name'];
        $l_name = $values['last_name'];
        $dob = $values['dob'];
        $city = $values['city'];
        $country = $values['country'];
?>
    <!-- CHANGE PICTURE -->
    <div class='flex-2'>

        <div class='picture-wrap'>
            <div>
                <?php
                    $link_pic = new Userdata();
                    $link = $link_pic->selectPictureById($id);
                    
                    //var_dump($link);
                    if( empty($link)  )
                        {
                            echo "<img src='01.png'>";
                        }
                    else 
                        {
                            echo "<img src='$link'>";
                        }
                ?>
            </div>
            <form action="" method='post' enctype="multipart/form-data">
                    <label>Chose another profile picture:</label>
                    <br><br>
                    <input type="file" name="file" accept="image/*" class='file'>
                    <span class="err"> <?php echo $errors['picture'] ?? '' ?> </span>
                    <br><br>
                    <input type="submit" name="change" value="Potvrdi" class="btn sml">
            </form>
        </div>

    <!-- REGISTER SECTION -->
        <div class="register">
            <form action="" method="POST" >
                <label>Ime: </label>
                <input type="text" name="name" value='<?php echo $f_name ?>'>
                <span class="err"> <?php echo $errors['name'] ?? '' ?> </span>
                <br><br>
                <label>Prezime: </label>
                <input type="text" name="lastName" value='<?php echo $l_name ?>'>
                <span class="err"> <?php echo $errors['lastName'] ?? '' ?> </span>
                <br><br>
                <label>Datum rođenja:</label>
                <input type="date" name="dob" value='<?php echo $dob ?>'>
                <span class="err"> <?php  ?> </span>
                <br><br>
                <label>Korisničko ime:</label>
                <input type="text" name="username" value='<?php echo $username ?>'>
                <span class="err"> <?php echo $errors['username'] ?? '' ?> </span>
                <br><br>
                <label>City:</label>
                <input type="text" name="city" value='<?php echo $city ?>'>
                <span class="err"> <?php echo $errors['city'] ?? '' ?> </span>
                <br><br>
                <label>Country:</label>
                <input type="text" name="country" value='<?php echo $country ?>'>
                <span class="err"> <?php echo $errors['country'] ?? '' ?> </span>
                <br><br>
                <label>E-mail:</label>
                <input type="text" name="email" value='<?php echo $email ?>'>
                <span class="err"> <?php echo $errors['email'] ?? '' ?> </span>
                <br><br>
                <label>Lozinka:</label>
                <input type="password" name="password" value='<?php echo $pass ?>'>
                <span class="err"> <?php echo $errors['password'] ?? '' ?> </span>
                <br><br>
                <label>Potvrdite lozinku:</label>
                <input type="password" name="repassword" value='<?php echo $repass ?>'>
                <span class="err"> <?php echo $errors['repassword'] ?? '' ?> </span>
                <br><br>
                <input type="submit" name="register" value="Potvrdi" class="btn sml">
            </form>
        </div>

    </div>
<?php
    require_once 'footer.php';
?>