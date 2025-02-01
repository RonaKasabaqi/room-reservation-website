<?php 
require_once "../../config/DatabaseConnection.php";

$sql = "SELECT id, name, description, image, price FROM rooms";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Dhomat</title>
    <style>
        .room-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .room {
            border: 1px solid #ddd;
            padding: 10px;
            width: 300px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
            background-color: #f9f9f9;
        }
        .room img {
            width: 100%;
            height: 200px; 
            object-fit: cover;
            border-radius: 5px;
        }
        .room h3 {
            font-size: 18px;
            margin: 10px 0;
        }
        .room p {
            max-height: 80px;
            overflow: auto; 
            text-overflow: ellipsis; 
            word-wrap: break-word; 
            padding: 5px;
            margin: 5px 0;
        }
        .buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .buttons button {
            padding: 8px 12px;
            border: none;
            background-color: #0d322d;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .buttons button:hover {
            background-color:rgb(37, 136, 123);
        }
        .delete-button {
            background-color: #dc3545;
        }
        .delete-button:hover {
            background-color: #a71d2a;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Dhomat e Disponueshme</h2>
    <div class="room-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='room'>";
                echo "<img src='../../" . $row["image"] . "' alt='" . $row["name"] . "'>";
                echo "<h3>" . $row["name"] . "</h3>";
                echo "<p>" . $row["description"] . "</p>";
                echo "<p><strong>Çmimi: </strong>€" . $row["price"] . " / nata</p>";
                echo "<div class='buttons'>";
                echo "<a href='edit.php?id=" . $row["id"] . "'><button>Redakto</button></a>";
                echo "<a href='delete.php?id=" . $row["id"] . "' onclick='return confirm(\"A jeni të sigurt që dëshironi të fshini këtë dhomë?\");'><button class='delete-button'>Fshi</button></a>";
                echo "</div>";
                
                echo "</div>";
            }
        } else {
            echo "<p style='text-align: center;'>Nuk ka dhoma të disponueshme.</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>