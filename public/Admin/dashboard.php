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
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <?php
            $menu_items = [
                ["Dashboard", "dashboard.php"],
                ["Users", "users.php"],
                ["Reservations", "reservations.php"],
                ["Messages", "messages.php"],
                ["Settings", "settings.php"],
                ["Rooms", "roomsAdmin.php"] 
            ];            
            foreach ($menu_items as $item) {
                echo "<a href='" . $item[1] . "'>" . $item[0] . "</a>";
            }
        ?>
        <a href="logout.php" style="margin-top: auto; background-color:rgb(231, 41, 20);">Logout</a>
    </div>
    <div class="content">
        <h1>Welcome to Admin Dashboard</h1>
        <a href="create.php">
            <button>Create a New Room</button>
        </a>
    </div>
</body>
</html>
