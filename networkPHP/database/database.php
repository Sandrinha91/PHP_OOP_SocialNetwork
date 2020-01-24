<?php

    $servername = 'localhost';
    $username = 'videoman';
    $password = 'videoman123';


    $conn = new mysqli( $servername, $username, $password );

    if( $conn->connect_error)
    {
        die("Neuspesna konekcija:" . $conn->connect_error);
    }

    $conn->set_charset('utf8');

    $sql = "CREATE DATABASE network CHARACTER SET utf16 COLLATE utf16_slovenian_ci;";   

    $sql .= "CREATE TABLE IF NOT EXISTS network.user
            (
                id INT UNSIGNED AUTO_INCREMENT,
                username VARCHAR(50) NOT NULL,
                email VARCHAR(50) NOT NULL,
                password VARCHAR(50) NOT NULL,
                PRIMARY KEY(id)
            ) ENGINE = InnoDB;";


    $sql .= "CREATE TABLE IF NOT EXISTS network.profile
            (
                id INT UNSIGNED AUTO_INCREMENT,
                user_id INT UNSIGNED NOT NULL UNIQUE,
                first_name VARCHAR(50) NOT NULL,
                last_name VARCHAR(90) NOT NULL,
                picture varbinary(2150),
                dob DATE,
                city VARCHAR(50),
                country VARCHAR(50),
                PRIMARY KEY(id),
                FOREIGN KEY(user_id) REFERENCES user(id) 
            ) ENGINE = InnoDB;";

    $sql .= "CREATE TABLE IF NOT EXISTS network.follow
            (
                id INT UNSIGNED AUTO_INCREMENT,
                user_id INT UNSIGNED NOT NULL,
                friend_id INT UNSIGNED NOT NULL,
                PRIMARY KEY(id),
                FOREIGN KEY (user_id) REFERENCES user(id),
                FOREIGN KEY (friend_id) REFERENCES user(id) 
            ) ENGINE = InnoDB;";

    $sql .= "CREATE TABLE IF NOT EXISTS network.message
            (
                id INT UNSIGNED AUTO_INCREMENT,
                user_id INT UNSIGNED NOT NULL,
                friend_id INT UNSIGNED NOT NULL,
                message VARCHAR(200),
                PRIMARY KEY(id),
                FOREIGN KEY (user_id) REFERENCES user(id),
                FOREIGN KEY (friend_id) REFERENCES user(id),
                created_at timestamp NOT NULL DEFAULT current_timestamp
            ) ENGINE = InnoDB;";

    $sql .= "CREATE TABLE IF NOT EXISTS network.post
            (
                id INT UNSIGNED AUTO_INCREMENT,
                user_id INT UNSIGNED,
                post VARCHAR(250),
                video VARCHAR(250),
                PRIMARY KEY(id),
                FOREIGN KEY post(user_id) REFERENCES user(id),
                created_at timestamp NOT NULL DEFAULT current_timestamp
            ) ENGINE = InnoDB;";

    if($conn->multi_query($sql))
    {
        echo "Uspesno izvrseni upiti.";
    }
    else
    {
        echo "Greska:" .  $conn->error;
    }



?>