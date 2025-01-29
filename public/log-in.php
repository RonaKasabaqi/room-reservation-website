<?php require_once 'C:\xampp\htdocs\room-reservation-website\src\validations\LoginValidation.php'; ?>
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
            margin: 0px auto;
            border: 1px solid #ccc;
            border-radius: 3px;
            display: block;
            font-size: 10px;
            margin-bottom: 25px;
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
            font-size: 12px;
            margin-bottom: 15px;
        }
        .register-link {
            margin-top: 15px;
            font-size: 12px;
            color: rgb(91, 91, 91);
        }
        .register-link a {
            text-decoration: none;
            font-weight: bold;
            color: black;
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
            </ul>
            <a class="book-button" href="#">BOOK NOW</a>
        </nav>
    </div>
    <div class="form-container">
        <form method="POST" action="">
            <h1>Log in</h1>
            <?php if (!empty($error)): ?>
                <div class="error"> <?= htmlspecialchars($error) ?> </div>
            <?php endif; ?>
            <input type="text" name="email" id="email" placeholder="Email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            <input type="password" name="password" id="password" placeholder="Password">
            <button type="submit">Log in</button>
        </form>
        <p class="register-link">Don't have an account? <a href="register.php">Sign up</a></p>
    </div>
</body>
</html>
