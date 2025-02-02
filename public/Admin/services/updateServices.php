<?php 
require_once "../../../config/DatabaseConnection.php";
session_start();

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== 1) {
    header("Location: ../log-in.php");
    exit();
}
$message = "";
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM services WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $service = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = trim($_POST["title"]);
        $description = trim($_POST["description"]);
        $link = trim($_POST["link"]);
        $image = $service['image'];  

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

        $sql = "UPDATE services SET title = ?, description = ?, image = ?, link = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $title, $description, $image, $link, $id);

        if ($stmt->execute()) {
            header("Location: updateServices.php?id=$id&success=1");
            exit();
        } else {
            $message = "Error updating the service.";
        }
    }
} else {
    header("Location: servicesAdmin.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Service</title>
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
            border: 1px solid rgb(8, 106, 93);
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
        }

        button {
            background-color:  #0d322d;
            color: white;
            padding: 14px 18px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            width: 100%;
        }
        .small-button {
            padding: 10px 14px;
            font-size: 14px;
            width: auto;
            background-color:  #0d322d;

        }
        button:hover {
            background-color:  #0d322d;
        }
    </style>
</head>
<body>
    <h2>Update Service Information</h2>
    
    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <p style="color: green;">Service updated successfully!</p>
    <?php endif; ?>
    
    <form action="updateServices.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($service['title']); ?>" required><br>

        <label>Description:</label>
        <textarea name="description" required><?php echo htmlspecialchars($service['description']); ?></textarea><br>

        <label>Link:</label>
        <input type="text" name="link" value="<?php echo htmlspecialchars($service['link']); ?>" required><br>

        <label>Image:</label>
        <input type="file" name="image"><br>
        <img src="../../../<?php echo $service['image']; ?>" width="100px"><br>

        <button type="submit">Update Service</button>
    </form>

    <a href="servicesAdmin.php">
        <button type="button" class="small-button">Go Back</button>
    </a>

    <p><?php echo $message; ?></p>
</body>
</html>
