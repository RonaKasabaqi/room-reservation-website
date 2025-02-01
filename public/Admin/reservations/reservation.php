<?php
require_once "../../../config/DatabaseConnection.php";

$sql = "SELECT * FROM reservations";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations</title>
    <style>
    body { 
        font-family: Arial, sans-serif; 
        background: #f4f4f4; 
        margin: 0; 
        padding: 20px; 
        text-align: center;
    }

    h2 { 
        text-align: center; 
    }

    table { 
        width: 100%; 
        border-collapse: collapse; 
        margin-top: 20px; 
        background-color: white; 
        border: 1px solid #ddd; 
    }

    table, th, td { 
        border: 1px solid #ddd; 
    }

    th, td { 
        padding: 10px; 
        text-align: left; 
    }

    th { 
        background-color: #f2f2f2; 
    }

    button { 
        background: #0d322d; 
        color: white; 
        padding: 8px 15px; 
        border: none; 
        border-radius: 5px; 
        cursor: pointer; 
        font-size: 14px;
    }

    button:hover { 
        background: #0a2b26; 
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
            margin-top: 20px;
            transition: background 0.3s ease-in-out;
        }

        .back-button:hover {
            background-color: #04351a;
        }
</style>
</head>
<body>
    <div class="container">
        <h2>Reservations</h2>

        <?php
        if (mysqli_num_rows($result) > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Phone Number</th>
                        <th>Type of Room</th>
                        <th>Bedding Type</th>
                        <th>Number of Rooms</th>
                        <th>Meal Plan</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Actions</th>
                    </tr>";

            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['first_name'] . "</td>
                        <td>" . $row['last_name'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['country'] . "</td>
                        <td>" . $row['phone'] . "</td>
                        <td>" . $row['room_type'] . "</td>
                        <td>" . $row['bed_type'] . "</td>
                        <td>" . $row['number_of_rooms'] . "</td>
                        <td>" . $row['meal_plan'] . "</td>
                        <td>" . $row['check_in'] . "</td>
                        <td>" . $row['check_out'] . "</td>
                        <td>
                            <a href='updateReservation.php?edit=" . $row['id'] . "'><button>Edit</button></a>
                            <a href='deleteReservation.php?delete=" . $row['id'] . "'><button>Delete</button></a>
                        </td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No reservations available!</p>";
        }
        ?>

<a href="../dashboard.php" class="back-button">← Back to Dashboard</a>
    </div>
</body>
</html>

