<?php
require_once 'C:\xampp\htdocs\room-reservation-website\src\controllers\LoginController.php';
require_once 'C:\xampp\htdocs\room-reservation-website\config\DatabaseConnection.php';

$error = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($email)) {
        $error = "Email nuk mund të jetë bosh!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Formati i email-it është i pavlefshëm!";
    } elseif (empty($password)) {
        $error = "Password nuk mund të jetë bosh!";
    } else {
        if (login($conn, $email, $password)) {
            header("Location: http://localhost/room-reservation-website/public/index.php");
            exit();
        } else {
            $error = "Incorrect email or password! Please try again or register.";
        }
    }
}
?>
