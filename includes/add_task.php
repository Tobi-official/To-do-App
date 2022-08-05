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
                <a href="#">Add Tasks</a>
                <a href="my_tasks.php">My Tasks</a>
                <a href="#">Tasks Categories</a>
                <a href="../logout.php" class="logout_add_task"><button class="add_task_logout">Logout</button></a>

            </div>
        </div>
        <div class="add_task_main_body">
            <div class="add_tasks">
                <h2>Input Your To-Do</h2>
                    <div class="alert_container">
                        <div class="fail_msg">fail</div>
                        <div class="success_msg">success</div>
                    </div>
                <form action="#" id="add_task" method="POST">
                    <div class="flex_control">
                        <div class="flex-basis">
                            <div class="add_task_form_input">
                                <p>Tittle</p>
                                <input type="text" id="title" name="title" class="add_task_input_control" placeholder="title">
                            </div>
                            <div class="add_task_form_input">
                                <p for="name">Date</p>
                                <input type="date" id="date" name="date" class="add_task_input_control" required>
                            </div>
                            <div class="add_task_form_input">
                                <p for="name">Category</p>
                                <select name="category" id="category">
                                    <option value="Work">Work</option>
                                    <option value="Learning">Learning</option>
                                    <option value="Health">Health</option>
                                    <option value="Social">Social</option>
                                    <option value="Chores">Chores</option>
                                    <option value="Event">Event</option>
                                    <option value="Others" selected>Others</option>
                                </select>
                            </div>
                            <div class="add_task_form_input">
                                <p>Notes</p>
                                <input type="text" name="notes" id="notes" class="add_task_input_control">
                            </div>
                        </div>
                        <div class="flex1">
                            <div class="add_task_text_input">
                                <p>Task/To-Do</p>
                                <textarea name="task" class="add_task_text_area"id="task" cols="39" rows="13" autofocus></textarea><br>
                                <button class="add_task_btn" name="submit" id="submit">Add Task</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <Script src="../javascript/jquery.js"></Script>
        <Script src="../javascript/dashboard.js"></Script>
</section>
</body>
</html>