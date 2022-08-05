<?php
    session_start();
        require "../config/config.php";

        
        $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
        $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
    
        $check_user = mysqli_query($conn, "SELECT * FROM users_info where username='$username'");

        if(mysqli_num_rows($check_user) == 0) {
            echo "No user found!";
        }else {
            $result = mysqli_fetch_array($check_user);
            $db_password = $result['hashed_password'];
            $full_name = $result['full_name'];
            $username = $result['username'];
            $email = $result['email'];
            

            if(password_verify($password, $db_password )) {
                echo "Correct password";
            
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $username;
                $_SESSION['full_name'] = $full_name;

                
                $select = mysqli_query($conn, "SELECT (id) FROM users_info WHERE username='$username'");
                $result = mysqli_fetch_array($select);

                $db_id = $result['id'];
                $_SESSION['db_id'] = $db_id;
            }else {
                echo "Incorrect password";
            }
        }



  

