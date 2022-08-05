<?php

    require "../config/config.php";

    $full_name = trim(mysqli_real_escape_string($conn, $_POST['full_name']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
    $confirm_password = trim(mysqli_real_escape_string($conn, $_POST['confirm_password']));

   
    if($password == $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insert = mysqli_query($conn, "INSERT INTO users_info (full_name, email, username, hashed_password) VALUES('$full_name', '$email', '$username', '$hashed_password')");
        if($insert) {
            echo "Succesfully Registered!";

        }else {
            heaader('location: index.php');
        }
    }else {
        echo "Password do not match";
    }
    

    
   


   

