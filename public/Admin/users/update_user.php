<?php
include("../../../config/DatabaseConnection.php");
session_start();
if (!isset($_SESSION["email"])) {
    echo "Ju nuk jeni i identifikuar. Ju lutemi <a href='../../log-in.php'>kyçuni këtu</a> për të vazhduar.";
    exit(); 
}
$perdoruesi = htmlspecialchars($_SESSION["fullname"] ?? $_SESSION["email"]);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE Id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET fullname=?, username=?, email=? WHERE Id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $fullname, $username, $email, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Përdoruesi u përditësua me sukses!";
        header("Location: admin_users.php");
        exit();
    } else {
        echo "Gabim gjatë përditësimit.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Përditësimi i Përdoruesit</title>
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

        input {
            width: calc(100% - 20px);
            padding: 12px;
            margin-top: 8px;
            border: 1px solid rgb(8, 106, 93);
            border-radius: 6px;
            font-size: 16px;
            transition: border 0.3s ease-in-out;
        }

        input:focus {
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
    </style>
</head>
<body>
    <h2>Përditëso Përdoruesin</h2>
    <form action="" method="POST">
        <label>Emri i Plotë:</label>
        <input type="text" name="fullname" value="<?php echo htmlspecialchars($user['fullname']); ?>" required>

        <label>Username:</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

        <button type="submit">Përditëso</button>
    </form>
</body>
</html>

