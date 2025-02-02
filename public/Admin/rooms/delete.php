<?php
require_once "../../../config/DatabaseConnection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM rooms WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Gabim në SQL: " . $conn->error);
    }
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Dhoma u fshi me sukses!";
        header("Location: roomsAdmin.php");
        exit();
    } else {
        echo "Gabim gjatë fshirjes së dhomës.";
    }
    $stmt->close();
}
?>
