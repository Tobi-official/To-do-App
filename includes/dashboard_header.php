<?php
    session_start();
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $full_name = $_SESSION['full_name'];
    
    require "../config/config.php";
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