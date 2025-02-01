<?php
require 'C:\xampp\htdocs\room-reservation-website\config\DatabaseConnection.php';

function Register($conn, $users){

    $fullname = $users["fullname"];
    $username = $users["username"];
    $email = $users["email"];
    $password = $users["password"];

    $sql = "insert into users (fullname, username, email, password) 
    values ('$fullname', '$username', '$email', '$password')";

    if(mysqli_query($conn, $sql)){
        return true;
    }else{
        echo "Error: ".mysqli_error($conn);
        return false;
    }

}
?>