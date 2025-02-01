<?php
require_once "../../../config/DatabaseConnection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE Id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Përdoruesi u fshi me sukses!";
    } else {
        echo "Gabim gjatë fshirjes së përdoruesit.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
header("Location: admin_users.php");
exit();
?>
