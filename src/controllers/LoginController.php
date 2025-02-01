<?php
require 'C:\xampp\htdocs\room-reservation-website\config\DatabaseConnection.php';

function login($conn, $email, $password) {
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
               
                session_start();
                $_SESSION["email"] = $row["email"];
                $_SESSION["fullname"] = $row["fullname"]; 
                return true;
            } else {
                return false; 
            }
        }
    }

    return false; 
}
?>
