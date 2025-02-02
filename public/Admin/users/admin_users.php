<?php
include("../../../config/DatabaseConnection.php");
session_start();
if (!isset($_SESSION["email"])) {
    echo "Ju nuk jeni i identifikuar. Ju lutemi <a href='../../log-in.php'>kyçuni këtu</a> për të vazhduar.";
    exit(); 
}
$perdoruesi = htmlspecialchars($_SESSION["fullname"] ?? $_SESSION["email"]);
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
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
            font-weight: 600;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #0d322d;
            color: white;
            font-weight: 600;
        }

        tr:hover {
            background: #f1f1f1;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .update-btn, .delete-btn {
            padding: 8px 12px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            font-size: 14px;
            transition: all 0.3s;
        }

        .update-btn {
            background: rgb(14, 91, 81);
        }

        .delete-btn {
            background: #dc3545;
        }

        .update-btn:hover {
            background: #0d322d;
        }

        .delete-btn:hover {
            background: #c82333;
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
    </style>
</head>
<body>

    <h2>User List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                <td><?php echo htmlspecialchars($row['username']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td class="action-buttons">
                    <a href="update_user.php?id=<?php echo $row['Id']; ?>" class="update-btn">Update</a>
                    <a href="delete_user.php?id=<?php echo $row['Id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <a href="../dashboard.php" class="back-button">← Back to Dashboard</a>

</body>
</html>
<?php mysqli_close($conn); ?>
