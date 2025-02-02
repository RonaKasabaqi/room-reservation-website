<?php
include("../../../config/DatabaseConnection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_query = "DELETE FROM content WHERE id = $id";
    
    if (mysqli_query($conn, $delete_query)) {
        header("Location: ../dashboard.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    die("Invalid ID.");
}
?>
