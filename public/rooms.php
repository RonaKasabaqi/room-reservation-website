<?php 
require_once "../config/DatabaseConnection.php";
$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Room Reservation Page</title>
    <link rel="stylesheet" href="./style.css" />
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
  />
  </head>

  <body>
    <div id="main">
      <nav class="navbar">
        <img src="images/logo.png" alt="" style="width: 200px; height: 35px; margin-left: 65px;">
        <ul class="menu">
          <li>
            <a href="index.php">Home</a>
          </li>
          <li><a href="rooms.php" class="active">Rooms</a></li>
          <li><a href="dining.html">Dining</a></li>
          <li><a href="#">Events</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <a class="login-button" href="log-in.php">Log in</a>
        </ul>
        <a class="book-button" href="booking.php">BOOK NOW</a>
      </nav>
      <div id="banner">
        <div class="myContainer">
          <div class="row relative">
            <img src="./images/05.jpg" alt="photo1" class="img-responsive" />
            <div class="bannerBox">
              <h2>"Where history and comfort come together"</h2>
              <p>
                Welcome to a place where history meets comfort! Immerse yourself
                in the rich heritage of the region while enjoying modern
                luxuries. Relax, unwind, and experience the charm of the past
                with all the comforts of today.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div id="secondNavbar">
        <div class="myContainer">
          <div class="row">
            <ul class="secondNav">
              <li class="active">
                <a href="#" class="active">Accommodation</a>
              </li>
              <li>
                <a href="#">Packages</a>
              </li>
              <li>
                <a href="#">Images</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div id="rooms-section">
            <div class="myContainer">
                <div class="row">
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="room-card">';
                            echo '<div class="room-image">';
                            echo '<img src="../' . htmlspecialchars($row["image"]) . '" alt="' . htmlspecialchars($row["name"]) . '" class="img-responsive" />';
                            echo '</div>';
                            echo '<div class="room-content">';
                            echo '<h5>' . htmlspecialchars($row["name"]) . '</h5>';
                            echo '<p>' . htmlspecialchars($row["description"]) . '</p>';
                            echo '<p><strong>Price:</strong> €' . htmlspecialchars($row["price"]) . ' / night</p>';
                            echo '<div class="customMargin">';
                            echo '<a href="#" class="roomButton">Discover more</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "<p>No rooms available.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>


      <div id="book">
        <div class="myContainer">
          <div class="row relative">
            <div class="book-section">
            <img
              src="./images/bookImage.png"
              alt="Book Your Escape"
              class="myimg-responsive"
            />
            <div class="textAbsolute text-center">
              <h5>Book Your Escape</h5>
              <p>
                Book Your Escape Discover luxury and comfort in our spacious
                rooms, featuring rustic elegance and a soothing ambiance. Don’t
                wait—reserve your unforgettable stay today!
              </p>
              <div class="customMargin">
                <a href="booking.php" class="roomButton">Book now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="slider-wrapper">
      <div class="swiper slider-container">
          <div class="swiper-wrapper">
              <?php
              $slides = [
                  ["img" => "./images/18-1.jpg", "title" => "Welcome to Paradise", "description" => "Discover luxury and beauty."],
                  ["img" => "./images/7-1.jpg", "title" => "Relax in Comfort", "description" => "Experience elegance and tranquility."],
                  ["img" => "./images/9-1.jpg", "title" => "Breathtaking Views", "description" => "Immerse yourself in nature."]
              ];
              
              foreach ($slides as $slide) {
                  echo '<div class="swiper-slide">';
                  echo '<img src="' . $slide["img"] . '" alt="' . $slide["title"] . '" />';
                  echo '<div class="slide-content">';
                  echo '<h3>' . $slide["title"] . '</h3>';
                  echo '<p>' . $slide["description"] . '</p>';
                  echo '</div>';
                  echo '</div>';
              }
              ?>
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
      </div>
  </div>
  
      <footer id="myFooter">
        <div class="myContainer">
          <div class="flexItems">
            <h5>FOLLOW US:</h5>
            <ul class="social">
              <li>
                <a href="#" target="_blank"
                  ><img src="./images/instagram.png" alt="instagram"
                /></a>
              </li>
              <li>
                <a href="#" target="_blank"
                  ><img src="./images/facebook.png" alt="facebook"
                /></a>
              </li>
              <li>
                <a href="#" target="_blank"
                  ><img src="./images/location.png " alt="location"
                /></a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
      <style>
        #rooms-section .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; 
    gap: 20px;
    align-items: stretch; 
}

.room-card {
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
}

.room-image img {
    width: 100%;
    height: 250px; 
    object-fit: cover;
    border-radius: 10px;
}


.room-content {
    flex-grow: 1; 
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.room-content h5 {
    font-size: 26px;
    font-weight: bold;
    margin-bottom: 12px;
}

.room-content p {
    font-size: 18px;
    line-height: 1.6;
    flex-grow: 1;
}

.roomButton {
    font-size: 18px;
    padding: 12px 24px;
    margin-top: auto; 
}

@media (max-width: 768px) {
    .room-card {
        flex-basis: 100%; 
    }
}
.slider-wrapper {
  max-width: 60%;
  margin: 30px auto;
   }
  .swiper-container {
     width: 50%;
   height: 100px;
   }                   
   .swiper-slide img {
     width: 100%;
    height: 100%;
    object-fit: cover;
  border-radius: 10px;
   }
 .book-section {
   display: flex;
  flex-direction: column;
   align-items: center;
    text-align: center;
     }
    
  .slider-wrapper {
     max-width: 60%;
    margin: 30px auto;
     }
        
  .swiper-container {
    width: 50%;
    height: 100px;
   }
        
    .swiper-slide img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 10px;
     }
    </style>
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.slider-container', {
            loop: true,
            autoplay: {
                delay: 3000,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    
    <script>
      const roomData = [
        {
          imgSrc: "./images/Rectangle 3.png",
          title: "Elegant Deluxe Double Room",
          description: `Indulge in luxury and comfort in our spacious Deluxe Double
            Room, featuring a blend of rustic charm and refined elegance.
            Thoughtfully designed to create a cozy ambiance, this room is the perfect
            retreat to relax and soak in the serene beauty of your surroundings.`,
        },
        {
          imgSrc: "./images/juniorImg.png",
          title: "Junior Suite",
          description: `Bring your loved ones and create unforgettable memories in our
            inviting Junior Suite. Looking for a peaceful moment alone? Step onto your
            private balcony, take in the charming view of our village below, and breathe
            in pure relaxation.`,
        },
        {
          imgSrc: "./images/seaViewImg.png",
          title: "Coastal Haven with Sea View",
          description: `Awaken to the breathtaking views of the Ionian Sea in our
            Coastal Haven. This suite features lofty ceilings, polished hardwood floors,
            and a vibrant color palette inspired by the local landscape, with warm tones
            of persimmon and white.`,
        },
      ];

      function updateContent(index) {
        const bannerImg = document.querySelector("#underNavbar img");
        const elegantText = document.querySelector("#elegant h5");
        const elegantDesc = document.querySelector("#elegant p");

        bannerImg.src = roomData[index].imgSrc;
        elegantText.textContent = roomData[index].title;
        elegantDesc.textContent = roomData[index].description;
      }

      document
        .querySelectorAll("#secondNavbar ul li a")
        .forEach((link, index) => {
          link.addEventListener("click", (e) => {
            e.preventDefault();

            document
              .querySelector("#secondNavbar ul li a.active")
              ?.classList.remove("active");
            link.classList.add("active");

            updateContent(index);
          });
        });
    </script>
  </body>
</html>
