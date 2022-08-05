<?php
    session_start();
        require "../config/config.php";

        
        $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
        $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
    
        $check_user = mysqli_query($conn, "SELECT * FROM users_info where email='$email' ");

        
        if(mysqli_num_rows($check_user) == 0) {
            echo "Invalid Email address!";
        }else {
            $result = mysqli_fetch_array($check_user);
           

            $db_password = $result['hashed_password'];
            $username = $result['username'];
            $full_name = $result['full_name'];
            
            if(password_verify($password, $db_password )) {
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $username;
                $_SESSION['full_name'] = $full_name;

                $select = mysqli_query($conn, "SELECT (id) FROM users_info WHERE email='$email'");
                $result = mysqli_fetch_array($select);

                $db_id = $result['id'];
                $_SESSION['db_id'] = $db_id;
                
               echo "Correct password";
            }else {
                echo "Incorrect password";
            }
        }




