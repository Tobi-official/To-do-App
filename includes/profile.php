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
    <link rel="stylesheet" href="../css/dashboard_style.css?ver=<?php echo microtime(); ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <section class="container">
    <div id="hamburger_menu">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
        </div>
        <div class="nav" id="dashboard_nav">
            <div class="navlist">
                <a href="../dashboard.php">Home</a>
                <a href="edit_profile.php">Setup profile</a>
                <a href="edit_profile.php">Edit profile</a>
                <a href="">Personal Data</a>
                <a href="../logout.php" class="logout_a"><button class="logout">Logout</button></a>

            </div>
        </div>
        <div class="main_body">
            <div class="content">
                <h1 class="myh1" id="h1"><?php echo $full_name; ?></h1>
                <h2>Your Username is <?php echo $username; ?></h2>
                <h2>Your Email is <?php echo $email; ?></h2>
            </div>
            <div class="profile_frame">
                <img src="../images/profile/<?php if($image == '') { echo "profile.jpg"; }else { echo $image;}?>">
            </div>
           <div class="profile_content">
                <form action="" class="bio_form">
                    <div class="form_data">
                        <h3>Bio</h3>
                        <textarea name="" id="bio" class="input_control" cols="40" rows="15" readonly><?php if($bio == "") {echo "Hey! I am". " " .$full_name; } else {echo $bio;} ?></textarea>
                    </div>
                </form>
                <form action="" class="data_form">
                    <h3>Personal Data</h3>
                    <div class="form_data">
                            <p>Fullname</p>
                            <input type="text" value="<?php echo $full_name; ?>" class="input_control"readonly>
                        </div>
                        <div class="form_data">
                            <p>Email</p>
                            <input type="text" value="<?php echo $email  ?>" class="input_control"readonly>
                        </div>
                        <div class="form_data">
                            <p>Username</p>
                            <input type="text" value="<?php echo $username; ?>" class="input_control"readonly>
                        </div>
                        <div class="form_data">
                            <p>Country</p>
                            <input type="text" value="<?php echo $country;  ?>" class="input_control"readonly>
                        </div>
                      
                </form>
           </div>
        </div>
        
        <Script src="../javascript/jquery.js"></Script>
        <Script src="../javascript/dashboard.js"></Script>
</section>
</body>
</html>