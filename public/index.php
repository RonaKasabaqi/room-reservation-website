<?php 
include("../config/DatabaseConnection.php");
session_start();
if (!isset($_SESSION["email"])) {
    echo "Ju nuk jeni i identifikuar. Ju lutemi <a href='log-in.php'>kyçuni këtu</a> për të vazhduar.";
    exit(); 
}
$perdoruesi = htmlspecialchars($_SESSION["fullname"] ?? $_SESSION["email"]);
echo "<script>
    alert('Mirë se vini, $perdoruesi!');
</script>";
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
    <link rel="stylesheet" href="./style.css">
    <script src="script.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montaga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div id="main">
        <nav class="navbar">
            <img src="images/logo.png" alt="logo" style="width: 200px; height: 35px; margin-left: 65px;">
            <ul class="menu">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="rooms.php">Rooms</a></li>
                <li><a href="dining.html">Dining</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <a class="login-button" href="log-in.php">Log in</a>
            </ul>
            <a class="book-button" href="booking.php">BOOK NOW</a>
        </nav>
        <div class="slideshow-container">
            <?php
                $slides = [
                    ["img" => "images/photo1.jpg", "title" => "Spend Your Holiday", "desc" => "Discover Your Perfect Escape - Where Comfort Meets Luxury"],
                    ["img" => "images/Exclusive-Use.jpg", "title" => "Enjoy the Adventure", "desc" => "Embark on a journey filled with unforgettable moments and endless possibilities."],
                    ["img" => "images/view.jpg", "title" => "Discover new horizons", "desc" => "Experience the Thrill of Nature Like Never Before"]
                ];

                foreach ($slides as $slide) {
                    echo '<div class="mySlides fade">';
                    echo '<img src="' . $slide['img'] . '" alt="Photo">';
                    echo '<div class="text">';
                    echo '<h2>' . $slide['title'] . '</h2>';
                    echo '<p>' . $slide['desc'] . '</p>';
                    echo '<div class="buttons">';
                    echo '<button class="butoni1">Read More</button>';
                    echo '<button class="butoni2">Contact Us</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            ?>
            <a class="prev" onclick="changeSlide(-1)">❮</a>
            <a class="next" onclick="changeSlide(1)">❯</a>
        </div>
        <div class="container">
        <img src="images/part1.jpeg" alt="part1" id="part1" width="250px" height="600px">
        <div class="text1">
            <?php
            // Shfaq përmbajtjen nga databaza
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='content-item'>";
                echo "<p>" . nl2br($row['text_content']) . "</p>";
                echo "</div><hr>";
            }
            ?>
            <button>ABOUT US</button>
        </div>
        <img src="images/part2.jpeg" alt="part2" id="part2" width="220px" height="400px">
        </div>
        <div id="services-text">
    <h2>OUR SERVICES</h2>
    <p>Discover the perfect space for your stay.</p>
    <p>Each room offers a unique blend of comfort and luxury, carefully designed to provide a memorable experience.</p>
        </div>
        <div class="services">
    <?php
    $sql_services = "SELECT * FROM services";
$result_services = mysqli_query($conn, $sql_services);

if (!$result_services) {
    die("Error: " . mysqli_error($conn));
}

while ($service = mysqli_fetch_assoc($result_services)) {
    echo "<div class='service-card'>";
    echo "<div class='service-image'>";
    echo "<img src='../" . $service['image'] . "' alt='" . $service['title'] . "' class='img-responsive'>";
    echo "</div>";
    echo "<div class='service-content'>";
    echo "<h2>" . $service['title'] . "</h2>";
    echo "<p>" . $service['description'] . " <a href='" . $service['link'] . "'>&#8594;</a></p>";
    echo "</div>";
    echo "</div>";
}
?>
</div>
<style>
.service-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 20px;
    align-items: stretch;
}

.service-card {
    flex-basis: 48%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: center;
    padding: 30px;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
    background: white;
    min-height: 500px;
    margin-bottom: 30px; /* Shton hapësirë në fund të çdo karte */
}

.service-image img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 10px;
}

.service-content {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.service-content h2 {
    font-size: 26px;
    font-weight: bold;
    margin-bottom: 12px;
}

.service-content p {
    font-size: 18px;
    line-height: 1.6;
    flex-grow: 1;
}

@media (max-width: 768px) {
    .service-card {
        flex-basis: 100%;
    }
}
#services-text{
    text-align:center;
}

</style>
        <div class="comments">
            <div class="comment-1">
                <h2>Hear from Our Clients</h2>
                <p>" Our wedding reception here was beyond what we imagined! The team went above and beyond to make every detail perfect. 
                    The decor was elegant, the service was impeccable, and the views provided a magical backdrop.
                     Thank you for an unforgettable experience! "
                </p>
                <p>Emily and Daniel S., July 2024</p>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="part1">
                    <p>Connecting you to unforgettable stays and experiences</p>
                    <img src="images/logo.png" alt="logo" style="width: 200px; height: 35px; ">
                    <p>Stay in the loop with everything you need to know.</p>
                    <input class="email" id="email" name="email" placeholder="Enter your Email">
                    <button class="submit" id="submit">Submit</button>
                </div>
    
                <div class="part2">
                    <h2>Links</h2>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="rooms.php">Rooms</a></li>
                    <li><a href="#">Dining</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </div>
                
                <div class="part3">
                    <h2>Social</h2>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Youtube</a></li>
                </div>

                <div class="part4">
                    <h2>Contact Us</h2>
                    <li>+91 5695 225 255</li>
                    <li><a href="#">hotelname@gmail.com</a></li>
                    <li>Epidamn, Dhërmi Beachfront, 9422, Albania</li>
                </div>
            </div>
            <p class="rights-reserved">| © 2024 Velvære | All rights reserved |</p>
            <p><a href="login"></a>Administrator Login</p>
        </footer>
    </div>
    <script>
        let currentIndex = 0;
        function changeSlide(offset) {
        const slides = document.querySelectorAll(".mySlides"); 
        slides[currentIndex].style.display = "none"; 
        currentIndex = (currentIndex + offset + slides.length) % slides.length; 
        slides[currentIndex].style.display = "block"; 
        }
        document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll(".mySlides")[currentIndex].style.display = "block";
        });
    </script>
</body>
</html>
<?php
// Mbyll lidhjen me databazën
mysqli_close($conn);
?>