<?php
    session_start();
    // require_once __DIR__ . '/database/database.php';
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) { 
        header("Location: login.php"); 
        exit; 
    } 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopfinity - Main</title>
    <link rel="stylesheet" href="./bootstrap//css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="./images/Shopfinity.png">
</head>
<body>
    <?php include 'header.php'?>

    <?php include 'content.php'?>

    <?php include 'footer.php'?>
</body>
</html>