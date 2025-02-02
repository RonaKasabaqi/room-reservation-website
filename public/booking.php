<?php  
include 'C:\xampp\htdocs\room-reservation-website-1\config\DatabaseConnection.php';
$sqlRooms = "SELECT id, name FROM rooms";
$resultRooms = mysqli_query($conn, $sqlRooms);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = mysqli_real_escape_string($conn, $_POST['fname']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $roomType = mysqli_real_escape_string($conn, $_POST['roomType']);
    $bedType = mysqli_real_escape_string($conn, $_POST['bedType']);
    $noOfRooms = (int)$_POST['noOfRooms'];
    $mealPlan = mysqli_real_escape_string($conn, $_POST['mealPlan']);
    $checkIn = mysqli_real_escape_string($conn, $_POST['checkIn']);
    $checkOut = mysqli_real_escape_string($conn, $_POST['checkOut']);

    if (empty($firstName) || empty($lastName) || empty($email) || empty($country) || empty($phone) || 
        empty($roomType) || empty($bedType) || $noOfRooms <= 0 || empty($mealPlan) || empty($checkIn) || empty($checkOut)) {
        echo "Gabim: Të gjitha fushat janë të detyrueshme!";
    } else {
        $sql = "INSERT INTO reservations 
                (first_name, last_name, email, country, phone, room_type, bed_type, number_of_rooms, meal_plan, check_in, check_out) 
                VALUES ('$firstName', '$lastName', '$email', '$country', '$phone', '$roomType', '$bedType', '$noOfRooms', '$mealPlan', '$checkIn', '$checkOut')";
        
        if (mysqli_query($conn, $sql)) {
            echo "Rezervimi u ruajt me sukses!";
        } else {
            echo "Gabim: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 900px; margin: 50px auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); }
        h2 { text-align: center; }
        .form-row { display: flex; justify-content: space-between; }
        .form-column { width: 48%; }
        label { font-weight: bold; margin-top: 10px; display: block; }
        input, select { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; }
        button { width: 100%; background: #0d322d; color: white; border: none; padding: 10px; margin-top: 10px; border-radius: 5px; cursor: pointer; }
        button:hover { background: #0a2b26; }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background:  #0a2b26;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-button:hover { background: #333; }
    </style>
</head>
<body>
<a href="index.php" class="back-button">Go Back</a>
    <div class="container">
        <h2>Reservation Form</h2>
        <form method="POST" action="">
            <div class="form-row">
                <div class="form-column">
                    <label for="fname">First Name*</label>
                    <input type="text" id="fname" name="fname" required>

                    <label for="lname">Last Name*</label>
                    <input type="text" id="lname" name="lname" required>

                    <label for="email">Email*</label>
                    <input type="email" id="email" name="email" required>

                    <label for="country">Country*</label>
                    <select id="country" name="country" required>
                        <option value="Albania">Albania</option>
                        <option value="United States">United States</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Germany">Germany</option>
                    </select>

                    <label for="phone">Phone Number*</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                
                <div class="form-column">
                    <label for="roomType">Type Of Room*</label>
                    <select id="roomType" name="roomType" required>
                        <?php while ($row = mysqli_fetch_assoc($resultRooms)) { ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php } ?>
                    </select>

                    <label for="bedType">Bedding Type*</label>
                    <select id="bedType" name="bedType" required>
                        <option value="Single">Single</option>
                        <option value="Double">Double</option>
                        <option value="Triple">Triple</option>
                    </select>

                    <label for="noOfRooms">Number of Rooms*</label>
                    <select id="noOfRooms" name="noOfRooms" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>

                    <label for="mealPlan">Meal Plan*</label>
                    <select id="mealPlan" name="mealPlan" required>
                        <option value="Room only">Room only</option>
                        <option value="Breakfast">Breakfast</option>
                        <option value="Half Board">Half Board</option>
                        <option value="Full Board">Full Board</option>
                    </select>

                    <label for="checkIn">Check-In*</label>
                    <input type="date" id="checkIn" name="checkIn" required>

                    <label for="checkOut">Check-Out*</label>
                    <input type="date" id="checkOut" name="checkOut" required>
                </div>
            </div>
            <button type="submit">Submit Reservation</button>
        </form>
    </div>
</body>
</html>
