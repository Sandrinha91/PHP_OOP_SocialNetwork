<?php
    session_start();

    require_once "database/conection.php";

    //provera da li je logovan
    if(empty($_SESSION['id']))
    {
        header('Location: index.php');
    }  
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Aleksandra Velev">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/content.css">
    <link rel="stylesheet" href="css/profile.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Frendify | Homepage </title>
</head>
<body>
<!-- Hello message -->
    <?php
        echo "<div class='helo'><p>Welcome" . " " . " " . $_SESSION['name'] . "!!!</p></div>";
        $id= $_SESSION['id'];
    ?>
<!-- Header section -->
    <header class="subhelo">
        <h3><span><i class="fas fa-users"></i> Friendify</span></h3>
    </header> 
    <div class="wrap">
        <div class='menu'>
            <ul>
                <li><a href="homepage.php"><i class="fas fa-home"></i> Homepage</a></li>
                <li><a href="my_profile.php?use_id=<?php echo $id ?>"><i class="fas fa-user-circle"></i> My Profile</a></li>
                <li><a href="edit.php"><i class="fas fa-list-ul"></i> Edit profile</a></li>
                <li><a href="msg.php"><i class="fas fa-comments"></i> Messages</a></li>
                <li><a href="log_out.php"><i class="fas fa-user-alt-slash"></i> Log Out</a></li>
            </ul>
        </div>
    </div>
    
