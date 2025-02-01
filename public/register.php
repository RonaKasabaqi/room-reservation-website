<?php
require_once 'C:\xampp\htdocs\room-reservation-website\src\validations\RegisterValidation.php';
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
        .error {
            color: red;
            font-size: 10px;
            position: absolute;
            left: 0;
            width: 100%;
            text-align: left;
        }
        input {
            display: block;
            margin-bottom: 10px;
            padding: 8px;
            width: 300px;
            position: relative;
        }
        .form-group {
            margin-bottom: 15px;
            position: relative;
        }
        .menu {
            list-style-type: none;
            display: flex;
            gap: 40px;
            padding: 0;
            margin: 0;
            margin-left: auto;
        }
        .menu a {
            text-decoration: none;
            color: rgba(13, 50, 45, 1);
            font-size: 20px;
            position: relative;
        }
        .menu a:after {
            position: absolute;
            content: "";
            width: 0;
            height: 1px;
            background: rgba(13, 50, 45, 1);
            bottom: 0;
            left: 0;
            transition: all 0.4s ease;
        }
        .menu a.active::after,
        .menu a:hover::after {
            width: 100%;
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
        .form-container button {
            background-color: rgba(13, 50, 45, 1);
            color: white;
            border-radius: 4px;
            width: 100%;
            height: 35px;
        }
        .form-container input, .form-container select, textarea {
            width: calc(100% - 8px);
            padding: 10px;
            margin: 0 auto;
            border: 1px solid #ccc;
            border-radius: 3px;
            display: block;
            font-size: 10px;
        }
        .form-container {
            width: 320px;
            padding: 35px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border: rgba(13, 50, 45, 1);
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .form-container button:hover {
            background-color: rgb(2, 107, 93);
            cursor: pointer;
        }
        .form-container h1 {
            color: rgba(13, 50, 45, 1);
        }
        .error {
    color: red;
    font-size: 11px;
    margin-left:3px;

}

    </style>
</head>
<body>
    <div id="main">
        <nav class="navbar">
            <img src="images/logo.png" alt="Logo" style="width: 200px; height: 35px; margin-left: 65px;">
            <ul class="menu">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="rooms.php">Rooms</a></li>
                <li><a href="#">Dining</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <a class="login-button" href="log-in.php">Log in</a>
            </ul>
            <a class="book-button" href="#">BOOK NOW</a>
        </nav>
    </div>
    <div class="form-container">
        <form action="register.php" method="POST">
        <h1>Register</h1>
        <div class="form-group">
            <input type="text" name="fullname" placeholder="Full Name" value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>">
            <span class="error"><?php echo $errors['fullname'] ?? ''; ?></span>
        </div>
        <div class="form-group">
            <input type="text" name="username" placeholder="Username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
            <span class="error"><?php echo $errors['username'] ?? ''; ?></span>
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            <span class="error"><?php echo $errors['email'] ?? ''; ?></span>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password">
            <span class="error"><?php echo $errors['password'] ?? ''; ?></span>
        </div>
        <div class="form-group">
            <input type="password" name="confirmpassword" placeholder="Confirm Password">
            <span class="error"><?php echo $errors['confirmpassword'] ?? ''; ?></span>
        </div>
        <button type="submit">Register</button>
        </form>
        <p class="login-link">Already have an account? <a href="log-in.php">Log in</a></p>
    </div>
</body>
</html>
