<?php
    session_start();
    require "../config/config.php";

    $db_id = $_SESSION['db_id'];

    $title = trim(mysqli_real_escape_string($conn, $_POST['title']));
    $date = trim(mysqli_real_escape_string($conn, $_POST['date']));
    $category = trim(mysqli_real_escape_string($conn, $_POST['category']));
    $notes = trim(mysqli_real_escape_string($conn, $_POST['notes']));
    $task = trim(mysqli_real_escape_string($conn, $_POST['task']));
    
    $insert = mysqli_query($conn, "INSERT INTO users_tasks (SN, title, date, category, notes, task) VALUES('$db_id', '$title', '$date', '$category', '$notes', '$task')");

    if($insert) {
        echo "Task Successfully Added";
    }else {
        echo "Failed";
    }