<?php
require_once 'C:\xampp\htdocs\room-reservation-website-1\src\controllers\RegisterController.php';
require_once 'C:\xampp\htdocs\room-reservation-website-1\config\DatabaseConnection.php';

$errors = [
    "fullname" => "",
    "username" => "",
    "email" => "",
    "password" => "",
    "confirmpassword" => "" 
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = trim($_POST["fullname"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirmpassword = trim($_POST["confirmpassword"]);
    $valid = true;

    if (empty($fullname)) {
        $errors["fullname"] = "Emri nuk mund të jetë bosh!";
        $valid = false;
    } elseif (strlen($fullname) < 3) {
        $errors["fullname"] = "Emri duhet të ketë të paktën 3 karaktere!";
        $valid = false;
    }

    if (empty($username)) {
        $errors["username"] = "Username nuk mund të jetë bosh!";
        $valid = false;
    }

    if (empty($email)) {
        $errors["email"] = "Email nuk mund të jetë bosh!";
        $valid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Formati i email-it është i pavlefshëm!";
        $valid = false;
    }

    if (empty($password)) {
        $errors["password"] = "Password nuk mund të jetë bosh!";
        $valid = false;
    } elseif (strlen($password) < 6) {
        $errors["password"] = "Password duhet të ketë të paktën 6 karaktere!";
        $valid = false;
    }

    if (empty($confirmpassword)) {
        $errors["confirmpassword"] = "Konfirmimi i fjalëkalimit nuk mund të jetë bosh!";
        $valid = false;
    } elseif ($password !== $confirmpassword) {
        $errors["confirmpassword"] = "Fjalëkalimi dhe konfirmimi i fjalëkalimit nuk përputhen!";
        $valid = false;
    }


    if (empty($password)) {
        $errors["password"] = "Password nuk mund të jetë bosh!";
        $valid = false;
    } elseif (strlen($password) < 6) {
        $errors["password"] = "Password duhet të ketë të paktën 6 karaktere!";
        $valid = false;
    }
    
    if ($valid) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $users = [
            "fullname" => $fullname,
            "username" => $username,
            "email" => $email,
            "password" => $hashedPassword 
        ];

        $response = Register($conn, $users);
        header("Location: http://localhost/room-reservation-website-1/public/log-in.php");
        exit();
    }
}
?>