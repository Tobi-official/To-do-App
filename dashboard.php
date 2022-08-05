<?php
  session_start();
    require "config/config.php"; 
    require "function/functions.php";
  ensure_user_is_authenticated();

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard_style.css?ver=<?php echo microtime(); ?>">
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
                <a href="dashboard.php">Home</a>
                <a href="includes/my_tasks.php">My Tasks</a>
                <a href="includes/add_task.php">Add Task</a>
                <a href="includes/profile.php">Personal Data</a>
                <a href="">Notes</a>
                <a href="logout.php" class="logout_a"><button class="logout">Logout</button></a>

            </div>
        </div>
        <div class="main_body">
            <div class="content">
                <h1 class="myh1 h1_dash" id="h1">Welcome <?php echo $full_name; ?>!</h1>
                <h2>Your Username is <?php echo $username; ?></h2>
                <h2 class="myh2">Your Email is <?php echo $email; ?></h2>
            </div>
            <div class="profile_frame">
                <img src="images/profile/<?php if($image == '') { echo "profile.jpg"; }else { echo $image;}?>">
            </div>
            <div class="preview">
                <div class="preview_content ">
                    <a href="includes/profile.php">
                        <div class="preview_box a">
                            <p>Profile</p>
                        </div>
                    </a>
                </div>
                <div class="preview_content">
                    <a href="includes/edit_profile.php">
                        <div class="preview_box e">
                            <p>Setup</p>
                        </div>
                    </a>
                </div>
                <div class="preview_content">
                    <a href="includes/add_task.php">
                        <div class="preview_box c">
                            <p>Task</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="preview not">
                <div class="preview_content ">
                    <a href="#">
                        <div class="preview_box d">
                            <p>Users</p>
                        </div>
                    </a>
                </div>
                <div class="preview_content">
                    <a href="includes/my_tasks.php">
                        <div class="preview_box b">
                            <p>Tasks</p>
                        </div>
                    </a>
                </div>
                
                <div class="preview_content">
                    <a href="#">
                        <div class="preview_box f">
                            <p>feedback</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        <Script src="javascript/jquery.js"></Script>
        <Script src="javascript/dashboard.js"></Script>
</section>
</body>
</html>