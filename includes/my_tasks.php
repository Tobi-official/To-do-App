<?php
    session_start();
    require "../function/functions.php";
    require "../config/config.php";
    ensure_user_is_authenticated_dash();

    $db_id = $_SESSION['db_id'];
?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard_style.css?ver=<?php echo microtime(); ?>">
    <title>Profile</title>
</head>
<body>
    <section class="add_task_container">
        <div class="add_task_nav">
            <div class="add_task_navlist">
                <a href="../dashboard.php">Home</a>
                <a href="add_task.php">Add Tasks</a>
                <a href="my_tasks.php">My Tasks</a>
                <a href="#">Tasks Categories</a>
                <a href="../logout.php" class="logout_add_task"><button class="add_task_logout">Logout</button></a>

            </div>
        </div>
        <div class="add_task_main_body">
            <div class="add_tasks">
                 <h2>My Tasks</h2>
                    
                <?php echo my_tasks(); ?>
                
            </div>
               
        </div>
        
        <Script src="../javascript/jquery.js"></Script>
        <Script src="../javascript/dashboard.js"></Script>
</section>
</body>
</html>