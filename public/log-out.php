<?php
session_start();
require_once 'C:\xampp\htdocs\room-reservation-website\src\validations\LoginValidation.php';


// Kontrollon nëse përdoruesi është i kyçur
if (!isset($_SESSION['user_id'])) {
    header("Location: log-in.php");
    exit();
}


// Logout script
if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
    setcookie('user_logged_in', '', time() - 3600, '/');
    header("Location: log-in.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #d1d1d1;
        }
        .text-center {
            text-align: center;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            position: fixed;
            background-color: white;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 10;
        }
        .menu {
            list-style-type: none;
            display: flex;
            gap: 40px;
            padding: 0px;
            margin: 0px;
            margin-left: auto;
        }
        .menu a {
            text-decoration: none;
            color: rgba(13, 50, 45, 1);
            font-size: 20px;
            position: relative;
        }
        .book-button {
            background-color: rgba(13, 50, 45, 1);
            color: white;
            padding: 15px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 13px;
            margin-left: 12%;
            margin-right: 50px;
            border: none;
        }
    </style>
</head>
<body>
    <div id="main">
        <nav class="navbar">
            <img src="images/logo.png" alt="" style="width: 200px; height: 35px; margin-left: 65px;">
            <ul class="menu">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="rooms.php">Rooms</a></li>
                <li><a href="#">Dining</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <a class="login-button" href="log-in.php">Log in</a>
                <a class="book-button" href="?logout=true">Logout</a>
            </ul>
        </nav>
    </div>
</body>
</html>