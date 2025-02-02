<?php  
require_once "../../../config/DatabaseConnection.php"; 


$sql = "SELECT id, image, title, description, link FROM services";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Services</title>
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


        .service-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }


        .service {
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


        .service img {
            width: 100%;
            height: 200px; 
            object-fit: cover;
            border-radius: 5px;
        }


        .service h3 {
            font-size: 18px;
            margin: 10px 0;
        }


        .service p {
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
            transition: background 0.3s ease-in-out;
        }


        .buttons button:hover {
            background-color: rgb(37, 136, 123);
        }


        .delete-button {
            background-color: #dc3545;
        }


        .delete-button:hover {
            background-color: #a71d2a;
        }


        .back-button {
            background-color:  #0d322d;
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
            background-color:rgb(20, 85, 77);
        }
        /* Updated styling for Add New Service button */
a button {
    background-color: #0d322d;  /* Dark green color */
    color: white;
    padding: 10px 20px;  /* Larger padding for a bigger button */
    font-size: 18px;  /* Bigger text */
    border: none;
    border-radius: 8px;
    cursor: pointer;
    margin-bottom: 30px;  /* Adds more space between the button and services section */
    display: inline-block;
    transition: background 0.3s ease-in-out;
}

a button:hover {
    background-color: rgb(20, 85, 77);  /* Slightly darker green on hover */
}
/* Styling for View More link */
.service a {
    color: #0d322d;  /* Dark green color */
    font-size: 14px;  /* Smaller font size */
    text-decoration: none;  /* Remove underline */
    transition: color 0.3s ease-in-out;
}

.service a:hover {
    color: rgb(20, 85, 77);  /* Slightly darker green on hover */
}

    </style>
</head>
<body>
    <h2>Manage Services</h2>
    <a href="createServices.php"><button>Add New Service</button></a>
    <div class="service-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='service'>";
                echo "<img src='../../../" . $row["image"] . "' alt='" . $row["title"] . "'>";
                echo "<h3>" . htmlspecialchars($row["title"]) . "</h3>";
                echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
                echo "<a href='" . $row["link"] . "' target='_blank'>View More</a>";
                
                echo "<div class='buttons'>";
                echo "<a href='updateServices.php?id=" . $row["id"] . "'><button>Edit</button></a>";
                echo "<a href='deleteServices.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this service?\");'><button class='delete-button'>Delete</button></a>";
                echo "</div>";
                
                echo "</div>";
            }
        } else {
            echo "<p style='text-align: center;'>No services available.</p>";
        }
        ?>
    </div>
    <a href="../dashboard.php" class="back-button">← Back to Dashboard</a>
</body>
</html>


<?php
$conn->close();
?>

