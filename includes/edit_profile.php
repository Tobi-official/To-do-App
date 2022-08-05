<?php
     session_start();
   
     require "../function/functions.php";
     ensure_user_is_authenticated_dash();
     require "../config/config.php"; 
     $db_id = $_SESSION['db_id'];
 
     $select = mysqli_query($conn, "SELECT * FROM users_info WHERE id='$db_id'");
     $result = mysqli_fetch_array($select);
 
     $image = $result['profile'];
     $full_name = $result['full_name'];
     $username = $result['username'];
     $email = $result['email'];
     $country = $result['country'];
     $bio = $result['bio'];
?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/dashboard_style.css?ver=<?php echo microtime(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
    <section class="container">
    <div id="hamburger_menu">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
        </div>
        <div class="nav" id="dashboard_nav">
            <div class="navlist">
                <a href="../dashboard.php">Home</a>
                <a href="">Setup profile</a>
                <a href="">Edit profile</a>
                <a href="">Personal Data</a>
                <a href="../logout.php" class="logout_a"><button class="logout">Logout</button></a>
                
            </div>
        </div>
        <div class="main_body">
          
           <div class="edit_profile">
            <h2>Edit your profile</h2>
                    <div class="message_container">
                        <div class="fail_msg"></div>
                        <div class="success_msg"></div>
                    </div>
                <form id="edit_profile" method="POST" enctype="multipart/form-data">
                    
                        <h3 class="h3">Personal Data</h3>
                        <div class="edit_form">
                                <p>Fullname</p>
                                <input type="text" value="<?php echo $full_name; ?>" name="full_name" id="full_name" class="edit_control" required>
                            </div>
                            <div class="edit_form">
                                <p>Email</p>
                                <input type="text" value="<?php echo $email  ?>" name="email" id="email" class="edit_control" required>
                            </div>
                            <div class="edit_form">
                                <p>Username</p>
                                <input type="text" value="<?php echo $username; ?>" name="username" id="username" class="edit_control" required>
                            </div>
                            <div class="edit_form">
                                <p>Country</p>
                                <input type="text" value="<?php if($country == "") {echo ""; } else {echo $country;} ?>" name="country" id="country" class="edit_control" placeholder="Select your country">
                            </div>
                            
                            <div class="edit_form">
                                <p>Upload image<span class="ext_allowed">allowed ext: (gif, jpg, png, jpeg)</span></p>
                                
                                <input type="file" id="profile_picture" name="profile_picture" class="edit_control">
                            </div>
                            <div class="edit_form">
                                <h3 class="bio_h3">Bio</h3>
                                <textarea name="edit_bio" id="edit_bio" class="edit_control" cols="40" rows="15"><?php if($bio == "") {echo "Hey! I am". " " .$full_name; } else {echo $bio;} ?></textarea>
                            </div>
                          
                            <div class="edit_form">
                                <p>Password</p>
                                <input type="text"  name="password" id="password" class="edit_control" placeholder="Enter your password" required>
                            </div>
                            <div class="edit_form">
                                <input type="submit" name="update" id="update" class="update_btn" value="Update">
                            </div>

                </form>
           </div>
        </div>
        
        <Script src="../javascript/jquery.js"></Script>
        <Script src="../javascript/dashboard.js"></Script>
</section>
</body>
</html>