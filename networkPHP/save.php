<form action="" method="POST"  class='msg-box'>
                        <textarea name="msg" id="" cols="10"></textarea>
                        <br><br>
                        <div class="err"> <?php echo $errors['msg'] ?? '' ?> </div>
                        <a href="msg.php?$f_id=<?php echo $id_f ?? ''?> ">
                        <input type="submit" name="send" value="Send" class="msg-btn"></a>
                    </form>


SELECT message.friend_id
FROM message
WHERE user_id = 35
UNION
SELECT user_id
FROM message
WHERE friend_id = 35


SELECT DISTINCT message.friend_id
FROM message
WHERE user_id = 35
UNION
SELECT DISTINCT user_id
FROM message
WHERE friend_id = 35


SELECT user.username, message.friend_id
                FROM message
                INNER JOIN user
                ON user.id = message.user_id
                WHERE message.user_id = 35
UNION
SELECT user.username, message.user_id
                FROM message
                INNER JOIN user
                ON user.id = message.user_id
                WHERE message.friend_id = 35


                SELECT profile.first_name, profile.last_name, user.username
                FROM profile
                INNER JOIN user
                ON user.id = profile.user_id
                WHERE profile.first_name LIKE '%$value%' 
                OR profile.last_name LIKE '%$value%' 
                OR user.username LIKE '%$value%'



                SELECT CONCAT(profile.first_name, ' ' , profile.last_name) AS name, user.username
                FROM profile
                INNER JOIN user
                ON user.id = profile.user_id
                WHERE profile.first_name LIKE '%le%' 
                OR profile.last_name LIKE '%le%' 
                OR user.username LIKE '%le%'