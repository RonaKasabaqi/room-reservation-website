<?php
include("../../../config/DatabaseConnection.php");
session_start();
if (!isset($_SESSION["email"])) {
    echo "Ju nuk jeni i identifikuar. Ju lutemi <a href='../../log-in.php'>kyçuni këtu</a> për të vazhduar.";
    exit(); 
}
$perdoruesi = htmlspecialchars($_SESSION["fullname"] ?? $_SESSION["email"]);

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== 1) {
    header("Location: ../log-in.php");
    exit();
}
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $description = trim($_POST["description"]);
    $price = trim($_POST["price"]);

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $target_dir = "../../../public/images/";
        $file_name = time() . "_" . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ["jpg", "jpeg", "png", "gif"];

        if (in_array($file_type, $allowed_types)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_path = "public/images/" . $file_name;

                if ($conn->connect_error) {
                    die("Database connection error: " . $conn->connect_error);
                }

                $sql = "INSERT INTO rooms (name, description, image, price) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    die("SQL error: " . $conn->error);
                }
                $stmt->bind_param("sssd", $name, $description, $image_path, $price);

                if ($stmt->execute()) {
                    $message = "Room added successfully!";
                } else {
                    $message = "Error adding room.";
                }
                $stmt->close();
            } else {
                $message = "Error uploading file.";
            }
        } else {
            $message = "Invalid file format!";
        }
    } else {
        $message = "Please upload an image!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Room</title>
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to right, #f8f9fa, #e3f2fd);
        text-align: center;
        margin: 50px;
    }

    h2 {
        color: #0d322d;
        font-size: 26px;
        margin-bottom: 20px;
        font-weight: 600;
    }

    form {
        background: white;
        max-width: 420px;
        margin: 0 auto;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(8, 106, 93, 0.3);
        transition: all 0.3s ease-in-out;
        border: 1px solid rgb(8, 106, 93);
    }

    form:hover {
        box-shadow: 0 8px 20px rgba(8, 106, 93, 0.4);
        transform: scale(1.02);
    }

    label {
        display: block;
        margin-top: 15px;
        font-weight: 600;
        color: #0d322d;
        font-size: 15px;
    }

    input, textarea {
        width: calc(100% - 20px);
        padding: 12px;
        margin-top: 8px;
        border: 1px solid rgb(8, 106, 93);
        border-radius: 6px;
        font-size: 16px;
        transition: border 0.3s ease-in-out;
    }

    input:focus, textarea:focus {
        border-color: rgb(8, 106, 93);
        outline: none;
        box-shadow: 0 0 8px rgba(8, 106, 93, 0.5);
    }

    button {
        background: linear-gradient(135deg, rgb(8, 106, 93), #0d322d);
        color: white;
        padding: 14px 18px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        margin-top: 20px;
        cursor: pointer;
        width: 100%;
        transition: background 0.3s ease-in-out, transform 0.2s ease;
    }

    button:hover {
        background: linear-gradient(135deg, #0d322d, rgb(8, 106, 93));
        transform: scale(1.05);
    }

    .back-button {
        background-color: #064420; /* Dark green */
        color: white;
        padding: 10px 15px;
        font-size: 14px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        margin-top: 15px;
        transition: background 0.3s ease-in-out;
    }

    .back-button:hover {
        background-color: #04351a;
    }

    .success-message {
        color: green;
        font-weight: bold;
        font-size: 16px;
        margin-top: 15px;
    }
    </style>
</head>
<body>
    <h2>Add a New Room</h2>
    <form action="create.php" method="post" enctype="multipart/form-data">
        <label>Room Name:</label>
        <input type="text" name="name" required><br>

        <label>Price (€):</label>
        <input type="number" step="0.01" name="price" required><br>

        <label>Description:</label>
        <textarea name="description" required></textarea><br>

        <label>Image:</label>
        <input type="file" name="image" required><br>

        <button type="submit">Add Room</button>
    </form>

    <a href="../dashboard.php" class="back-button">← Back to Dashboard</a>

    <p class="<?php echo ($message == "Room added successfully!") ? 'success-message' : ''; ?>">
        <?php echo $message; ?>
    </p>
</body>
</html>

