<?php 
session_start();
if (!isset($_SESSION["email"])) {
    echo "Ju nuk jeni i identifikuar. Ju lutemi <a href='log-in.php'>kyçuni këtu</a> për të vazhduar.";
    exit(); 
}
$perdoruesi = htmlspecialchars($_SESSION["fullname"] ?? $_SESSION["email"]);
echo "<script>
    alert('Mirë se vini, $perdoruesi!');
</script>";
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
                <li><a href="dining.php">Dining</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <a class="register-button" href="register.html">Register</a>
                <a class="login-button" href="log-in.html">Log in</a>
            </ul>
            <a class="book-button" href="#">BOOK NOW</a>
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
            <h1>Welcome to Your Perfect Escape!</h1><br><br>
            <p> Our hotel rooms at Velvære are designed with comfort and style in mind, offering a peaceful escape with stunning views of Albania’s breathtaking coastline. 
            Each room is furnished with modern amenities, including plush bedding, free Wi-Fi, air conditioning, and flat-screen TVs to ensure a relaxing stay.
            Many rooms feature private balconies, where guests can enjoy morning coffee or an evening sunset overlooking the Adriatic or Ionian Sea. </br></br>
            Whether you’re staying in a cozy standard room, a spacious suite, or a luxurious sea-view room, each accommodation provides a harmonious blend of elegance and convenience.
            Room service is available for those who prefer dining in privacy, and our attentive staff is on hand to cater to any additional needs, ensuring a seamless experience from check-in to departure.</p><br><br>
            <button>ABOUT US</button>
        </div>
            <img src="images/part2.jpeg" alt="part2" id="part2" width="220px" height="400px">
        </div>
        <hr>
        <div class="services">
            <h2>OUR SERVICES</h2>
            <p>Discover the perfect space for your stay.</p>
            <p>Each room offers a unique blend of comfort and luxury, carefully designed to provide a memorable experience.</p>
            <div class="service">
                <?php
                $services = [
                    ["image" => "images/service1.png", "title" => "Rooms", "text" => "Experience the ultimate in luxury and relaxation in our deluxe spacious room features rustic and elegant decor, providing you with the perfect ambiance to unwind and enjoy the natural beauty of the surroundings.", "link" => "rooms.php"],
                    ["image" => "images/service2.png", "title" => "Events", "text" => "Velvære provides the perfect setting for events, from intimate gatherings to large celebrations. With elegant spaces, scenic views, and a dedicated team to handle every detail, we ensure a memorable and seamless experience for every occasion.", "link" => "#"],
                    ["image" => "images/service3.png", "title" => "Dining", "text" => "Dining at Velvære is a culinary experience, with our restaurant serving a variety of Albanian and international dishes crafted from fresh, local ingredients. Guests can enjoy meals in a stylish setting or unwind at the beachside bar with signature cocktails and light bites.", "link" => "#"],
                ];

                foreach ($services as $service): ?>
                <div class="rooms">
                    <img src="<?php echo $service['image']; ?>" alt="<?php echo $service['title']; ?>" width="400px" height="380px">
                    <div class="room-text">
                        <h2><?php echo $service['title']; ?></h2>
                        <p><?php echo $service['text']; ?> <a href="<?php echo $service['link']; ?>">&#8594;</a></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
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