<?php  
include('C:\xampp\htdocs\WebProveE\config\DatabaseConnection.php');
$sql = "SELECT * FROM content";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Error: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sidebar</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: rgba(13, 50, 45, 1);
            color: #ecf0f1;
            position: fixed;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar a {
            text-decoration: none;
            color: #ecf0f1;
            padding: 15px 20px;
            display: block;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color: rgb(8, 106, 93);
        }
        .sidebar a.active {
            background-color: #0d322d;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
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
        }
        button:hover {
            background-color: #0d322d;
        }
        button:active {
            background-color: #148567;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color:rgb(9, 133, 117);
            color:white;
        }
        .actions button {
            padding: 6px 12px; /* Smaller buttons */
            font-size: 14px;   /* Smaller text */
            margin-right: 8px; /* Space between buttons */
            border-radius: 4px; /* Rounded corners */
            margin-bottom:5px;
        }
        .actions .update {
            background-color:rgb(9, 133, 117);/* Green background for update */
        }
        .actions .delete {
            background-color:rgb(226, 9, 9);/* Red background for delete */
        }
        .actions a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <?php
            $menu_items = [
                ["Dashboard", "dashboard.php"],
                ["Users", "users/admin_users.php"],
                ["Reservations", "reservations/reservation.php"],
                ["Messages", "messages.php"],
                ["Settings", "settings.php"],
                ["Rooms", "rooms/roomsAdmin.php"],
                ["Services", "services/servicesAdmin.php"]
            ];            
            foreach ($menu_items as $item) {
                echo "<a href='" . $item[1] . "'>" . $item[0] . "</a>";
            }
        ?>
        <a href="logout.php" style="margin-top: auto; background-color:rgb(231, 41, 20);">Logout</a>
    </div>
    <div class="content">
        <h1>Welcome to Admin Dashboard</h1>
        <a href="rooms/create.php">
            <button>Create a New Room</button>
        </a>
        <a href="content/createContent.php">
            <button>Create a New Content</button>
        </a>
        <h2>Content from Admin</h2>
        
        <table>
            <tr>
                <th>Content ID</th>
                <th>Text Content</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            <?php
            // Shfaq të dhënat nga databaza
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . nl2br($row['text_content']) . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "<td>" . $row['updated_at'] . "</td>";
                echo "<td class='actions'>
                        <a href='content/updateContent.php?id=" . $row['id'] . "'><button class='update'>Update</button></a>
                        <a href='content/deleteContent.php?id=" . $row['id'] . "'><button class='delete'>Delete</button></a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
<?php
// Mbyll lidhjen me databazën
mysqli_close($conn);
?>