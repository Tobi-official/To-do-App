<?php
    session_start();
  require "../config/config.php";

   $db_id = $_SESSION['db_id'];

    $full_name = trim(mysqli_real_escape_string($conn, $_POST['full_name']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
    $country = trim(mysqli_real_escape_string($conn, $_POST['country']));
    $edit_bio = trim(mysqli_real_escape_string($conn, $_POST['edit_bio']));
    if(isset($_FILES['profile_img'])) {
    
        $profile = $_FILES['profile_img'];
   
        $file_name = $_FILES['profile_img']['name'];
        $file_temp_name = $_FILES['profile_img']['tmp_name'];
        $file_size = $_FILES['profile_img']['size'];
        $file_error = $_FILES['profile_img']['error'];
        $file_type = $_FILES['profile_img']['type'];
    
        $file_ext_array = explode('.', $file_name);
        $file_ext = end($file_ext_array);
    
        $allowed_ext = array('jpg','png', 'gif', 'jpeg');
        $new_file_name = uniqid().".".$file_ext;
        $file_destination = "../images/profile/$new_file_name";
    
        if(in_array($file_ext, $allowed_ext)) {
            if($file_size < 1048567) {
                $select = mysqli_query($conn, "SELECT (hashed_password) FROM users_info WHERE id='$db_id' ");
                
                    if($select) {
                        $result = mysqli_fetch_array($select);
    
                        $db_password = $result['hashed_password'];
    
                        if(password_verify($password, $db_password)) {
                            $update = mysqli_query($conn, "UPDATE users_info SET full_name='$full_name', email='$email', username='$username', profile='$new_file_name', bio='$edit_bio', country='$country' WHERE id='$db_id'");
                            if($update) {
                                if(move_uploaded_file($file_temp_name, $file_destination)) {
                                    echo "succesfully Updated!";
                                }else{
                                    echo "Failed!";
                                }
                            }else {
                                echo "Update Failed";
                            }
                        }else {
                            echo "Password is incorrect";
                        }
    
                    }else {
                        header('location: index.php');
                    }
            
                }else {
                    echo "Image is greater than 1mb";
                }  
                }else {
                echo "You cannot upload a file of this type.";
            }
    
    }else {
       
     $select = mysqli_query($conn, "SELECT (hashed_password) FROM users_info WHERE id='$db_id' ");
                
        if($select) {
            $result = mysqli_fetch_array($select);

            $db_password = $result['hashed_password'];

            if(password_verify($password, $db_password)) {
                $update = mysqli_query($conn, "UPDATE users_info SET full_name='$full_name', email='$email', username='$username', bio='$edit_bio', country='$country' WHERE id='$db_id'");
                if($update) {
                    echo "succesfully Updated!";
                }else {
                    echo "Update Failed";
                }
            }else {
                echo "Password is incorrect";
            }

        }else {
            header('location: index.php');
        }
    }
         
    
    
    







    







     
 
    