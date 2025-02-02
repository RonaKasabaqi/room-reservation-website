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
if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
    $id = $_GET['edit'];

    $sql = "SELECT * FROM reservations WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Rezervimi nuk ekziston!";
        exit();
    }
} else {
    echo "ID-ja e dhomës nuk është e vlefshme!";
    exit();
}

if (isset($_POST['update'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $room_type = $_POST['room_type'];
    $bed_type = $_POST['bed_type'];
    $number_of_rooms = $_POST['number_of_rooms'];
    $meal_plan = $_POST['meal_plan'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

    $update_sql = "UPDATE reservations SET 
                    first_name = '$first_name', 
                    last_name = '$last_name', 
                    email = '$email', 
                    country = '$country', 
                    phone = '$phone', 
                    room_type = '$room_type', 
                    bed_type = '$bed_type', 
                    number_of_rooms = '$number_of_rooms', 
                    meal_plan = '$meal_plan', 
                    check_in = '$check_in', 
                    check_out = '$check_out' 
                    WHERE id = $id";

    if (mysqli_query($conn, $update_sql)) {
        echo "Rezervimi është përditësuar me sukses!";
    } else {
        echo "Gabim në përditësimin e rezervimit: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservation</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #f8f9fa, #e3f2fd);
            text-align: center;
            margin: 50px;
        }

        h1 {
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

        input, select {
            width: calc(100% - 20px);
            padding: 12px;
            margin-top: 8px;
            border: 1px solid rgb(8, 106, 93);
            border-radius: 6px;
            font-size: 16px;
            transition: border 0.3s ease-in-out;
        }

        input:focus, select:focus {
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
            text-decoration: none;
            background: rgb(8, 106, 93);
            color: white;
            border-radius: 6px;
            display: inline-block;
            margin-top: 15px;
        }

        .small-button:hover {
            background: #0d322d;
        }

        .go-back-btn {
            background-color:rgb(7, 125, 110); /* Gjelbër */
            color: white;
            padding: 12px 16px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 6px;
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .go-back-btn:hover {
            background-color:rgb(2, 53, 46); /* Gjelbër më i errët */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Reservation</h2>

        <form action="updateReservation.php?edit=<?php echo $row['id']; ?>" method="post">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo $row['last_name']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

            <label for="country">Country:</label>
            <input type="text" id="country" name="country" value="<?php echo $row['country']; ?>" required>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required>

            <label for="room_type">Room Type:</label>
            <select id="room_type" name="room_type" required>
                <option value="Single" <?php if ($row['room_type'] == 'Single') echo 'selected'; ?>>Single</option>
                <option value="Double" <?php if ($row['room_type'] == 'Double') echo 'selected'; ?>>Double</option>
                <option value="Suite" <?php if ($row['room_type'] == 'Suite') echo 'selected'; ?>>Suite</option>
            </select>

            <label for="bed_type">Bedding Type:</label>
            <select id="bed_type" name="bed_type" required>
                <option value="Single Bed" <?php if ($row['bed_type'] == 'Single Bed') echo 'selected'; ?>>Single Bed</option>
                <option value="Double Bed" <?php if ($row['bed_type'] == 'Double Bed') echo 'selected'; ?>>Double Bed</option>
            </select>

            <label for="number_of_rooms">Number of Rooms:</label>
            <input type="number" id="number_of_rooms" name="number_of_rooms" value="<?php echo $row['number_of_rooms']; ?>" required>

            <label for="meal_plan">Meal Plan:</label>
            <select id="meal_plan" name="meal_plan" required>
                <option value="Breakfast" <?php if ($row['meal_plan'] == 'Breakfast') echo 'selected'; ?>>Breakfast</option>
                <option value="Half Board" <?php if ($row['meal_plan'] == 'Half Board') echo 'selected'; ?>>Half Board</option>
                <option value="Full Board" <?php if ($row['meal_plan'] == 'Full Board') echo 'selected'; ?>>Full Board</option>
            </select>

            <label for="check_in">Check-in:</label>
            <input type="date" id="check_in" name="check_in" value="<?php echo $row['check_in']; ?>" required>

            <label for="check_out">Check-out:</label>
            <input type="date" id="check_out" name="check_out" value="<?php echo $row['check_out']; ?>" required>

            <button type="submit" name="update">Update Reservation</button>
        </form>

        <a href="reservation.php" class="go-back-btn">Go Back</a>
    </div>
</body>
</html>

