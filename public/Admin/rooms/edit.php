<?php 
include("../../../config/DatabaseConnection.php");
session_start();
if (!isset($_SESSION["email"])) {
    echo "Ju nuk jeni i identifikuar. Ju lutemi <a href='../../log-in.php'>kyçuni këtu</a> për të vazhduar.";
    exit(); 
}
$perdoruesi = htmlspecialchars($_SESSION["fullname"] ?? $_SESSION["email"]);
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== 1) {
    // Përdoruesi nuk është i kyçur si admin, ridrejto te login.php
    header("Location: ../log-in.php");
    exit();
}
$message = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM rooms WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $room = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = trim($_POST["name"]);
        $description = trim($_POST["description"]);
        $price = trim($_POST["price"]);
        $image = $room['image'];  

        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $target_dir = "../../../public/images/";
            $file_name = basename($_FILES["image"]["name"]);
            $target_file = $target_dir . $file_name;
            $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $allowed_types = ["jpg", "jpeg", "png", "gif"];

            if (in_array($file_type, $allowed_types)) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image = "public/images/" . $file_name;
                }
            }
        }
        $sql = "UPDATE rooms SET name = ?, description = ?, image = ?, price = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssdi", $name, $description, $image, $price, $id);

        if ($stmt->execute()) {
            header("Location: edit.php?id=$id&success=1");
            exit();
        } else {
            $message = "Error updating the room.";
        }
    }
} else {
    echo "Invalid room ID.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Room</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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

        .small-button {
            padding: 10px 14px;
            font-size: 14px;
            width: auto;
        }

        p {
            color: #dc3545;
            font-weight: bold;
            margin-top: 15px;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <h2>Update Room Information</h2>
    
    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <p style="color: green;">Room updated successfully!</p>
    <?php endif; ?>
    
    <form action="edit.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <label>Room Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($room['name']); ?>" required><br>

        <label>Price (€):</label>
        <input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($room['price']); ?>" required><br>

        <label>Description:</label>
        <textarea name="description" required><?php echo htmlspecialchars($room['description']); ?></textarea><br>

        <label>Image:</label>
        <input type="file" name="image"><br>
        <img src="../../../<?php echo $room['image']; ?>" width="100px"><br>

        <button type="submit">Update Room</button>
    </form>

    <a href="roomsAdmin.php">
        <button type="button" class="small-button">Go Back</button>
    </a>

    <p><?php echo $message; ?></p>
</body>
</html>

