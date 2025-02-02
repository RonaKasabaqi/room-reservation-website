<?php
include("../../../config/DatabaseConnection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM content WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    die("Invalid ID.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text_content = mysqli_real_escape_string($conn, $_POST['text_content']);
    $update_query = "UPDATE content SET text_content = '$text_content', updated_at = CURRENT_TIMESTAMP WHERE id = $id";
    
    if (mysqli_query($conn, $update_query)) {
        header("Location: ../dashboard.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Content</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        h1 {
            color: #0d322d;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        label {
            font-size: 16px;
            margin-bottom: 10px;
            display: block;
        }
        textarea {
            width: 100%;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            resize: vertical;
        }
        button {
            background-color: #0d322d;
            color: white;
            padding: 12px 24px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
            width: 100%;
        }
        button:hover {
            background-color: #148567;
        }
        .back-button {
            margin-top: 20px;
            background-color: #0d322d;
            color: white;
            padding: 12px 24px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
            width: 100%;
        }
        .back-button:hover {
            background-color: #148567;
        }
    </style>
</head>
<body>
    <h1>Update Content</h1>
    <form method="POST" action="">
        <label for="text_content">Update Content:</label><br>
        <textarea name="text_content" id="text_content" rows="10" cols="50" required><?php echo $row['text_content']; ?></textarea><br>
        <button type="submit">Update Content</button>
    </form>
    <a href="../dashboard.php">
        <button class="back-button">Back to Dashboard</button>
    </a>
</body>
</html>

<?php
// Mbyll lidhjen me databazën
mysqli_close($conn);
?>
