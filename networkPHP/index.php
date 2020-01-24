<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Aleksandra Velev">
    <title> Friendify | Welcome</title>
    <link rel="stylesheet" href="css/welcome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <?php
        session_start(); 
        require_once "database/userdata.php";
        require_once "database/user_validator.php";
        require_once "database/insert_update_db.php";
        require_once "database/login_validator.php";

        if(isset($_POST["log_in"]))
        {
            $_POST = array('l_username'=> $_POST["l_username"], 'l_password'=> $_POST["l_password"]);
            $loginVal = new LoginValidator($_POST);
            $errors = $loginVal->validateLoginForm();
        }
        // if( isset($_POST["register"]) )
        else
        {
            if( isset($_POST["register"]) )
            {
                $validation = new InsertUpdate($_POST);
                $errors = $validation->validateForm();                 
    
                //save data to database
                $validation->addValuesToUser();
                $validation->addValuesToProfile();
            }
        }        
    ?> 

    <!-- COVER SECTION -->
    <div class="cover">
        
    </div>
    <div class='overlay'><h2><i class="fab fa-battle-net"></i> Friendify</h2></div>

    <!-- BUTTON SECTION -->
    <div class="sub-cover flex-2">
        <button class="btn click1">Uloguj me</button>
        <button class="btn click2">Registruj me</button>
    </div>

    <!-- LOGIN SECTION -->
    <div class="login">
        <div class="center">
            <div class="x">x</div>
            <form action="" method="POST">
                <div class= 'row'>
                    <div class= 'col1'><label>Korisničko ime: </label></div>
                    <div class= 'col2'><input type="text" name="l_username">
                    <span class="err"> <?php echo $errors['l_username'] ?? '' ?> </span></div>
                    
                </div>

                <div class= 'row'>
                    <div class= 'col1'><label>Lozinka:</label></div>
                    <div class= 'col2'><input type="password" name="l_password"></div>
                    <span class="err"> <?php echo $errors['l_password'] ?? '' ?> </span>
                </div>
                
                <input type="submit" name="log_in" value="Prijavi se" class="btn">
            </form>
        </div>
    </div>

    <!-- REGISTER SECTION -->
    <div class="register">
        <div class="center">
            <div class="x1">x</div>

            <form action="" method="POST">
                <label>Ime: </label>
                <input type="text" name="name">
                <span class="err"> <?php echo $errors['name'] ?? '' ?> </span>
                <br><br>
                <label>Prezime: </label>
                <input type="text" name="lastName">
                <span class="err"> <?php echo $errors['lastName'] ?? '' ?> </span>
                <br><br>
                <label>Datum rođenja:</label>
                <input type="date" name="dob">
                <span class="err"> <?php  ?> </span>
                <br><br>
                <label>Korisničko ime:</label>
                <input type="text" name="username">
                <span class="err"> <?php echo $errors['username'] ?? '' ?> </span>
                <br><br>
                <label>E-mail:</label>
                <input type="text" name="email">
                <span class="err"> <?php echo $errors['email'] ?? '' ?> </span>
                <br><br>
                <label>Lozinka:</label>
                <input type="password" name="password">
                <span class="err"> <?php echo $errors['password'] ?? '' ?> </span>
                <br><br>
                <label>Potvrdite lozinku:</label>
                <input type="password" name="repassword">
                <span class="err"> <?php echo $errors['repassword'] ?? '' ?> </span>
                <br><br>
                <input type="submit" name="register" value="Potvrdi" class="btn">
            </form>
        </div>
    </div>

    <!-- <script src="js/naslovna.js"></script> -->
    
</body>
</html>