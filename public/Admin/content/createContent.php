<?php 
include("../../../config/DatabaseConnection.php");
session_start();

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== 1) {
    header("Location: ../log-in.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text_content = $_POST['text_content'];

    $query = "INSERT INTO content (text_content, created_at) VALUES (?, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $text_content);

    if ($stmt->execute()) {
        echo "Content created successfully!";
        header('Location: ../dashboard.php'); 
        exit();
    } else {
        echo "Error creating content.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Content</title>
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
            color: #0d322d;
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
    <h1>Create New Content</h1>
    <form action="" method="POST">
        <label for="text_content">Enter Content:</label><br>
        <textarea name="text_content" id="text_content" rows="5" cols="40" required></textarea><br>
        <button type="submit">Create Content</button>
    </form>
    <a href="../dashboard.php">
        <button class="back-button">Back to Dashboard</button>
    </a>
</body>
</html>

<?php
mysqli_close($conn);
?>
