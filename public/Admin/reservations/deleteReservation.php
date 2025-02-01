<?php
require_once "../../../config/DatabaseConnection.php";

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM reservations WHERE id = $id";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: reservation.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
