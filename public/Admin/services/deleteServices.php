<?php
require_once "../../../config/DatabaseConnection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM services WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Gabim në SQL: " . $conn->error);
    }
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Shërbimi u fshi me sukses!";
        header("Location: servicesAdmin.php");
        exit();
    } else {
        echo "Gabim gjatë fshirjes së shërbimit.";
    }
    $stmt->close();
}
?>
