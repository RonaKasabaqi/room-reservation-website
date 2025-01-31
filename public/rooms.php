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
          <li><a href="dining.php">Dining</a></li>
          <li><a href="#">Events</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <a class="register-button" href="register.html">Register</a>
          <a class="login-button" href="log-in.php">Log in</a>
        </ul>
        <a class="book-button" href="#">BOOK NOW</a>
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

      <div id="underNavbar">
        <div class="myContainer">
          <div class="row relative">
            <div class="imageContainer">
              <img
                src="./images/Rectangle 3.png"
                alt="Photo"
                class="myimg-responsive"
              />
            </div>
          </div>
        </div>
      </div>
      <div id="elegant">
        <div class="myContainer">
          <div class="row">
            <div class="text-center elegant_text">
              <h5>Elegant Deluxe Double Room</h5>
              <p>
                Indulge in luxury and comfort in our spacious Deluxe Double
                Room, featuring a blend of rustic charm and refined elegance.
                Thoughtfully designed to create a cozy ambiance, this room is
                the perfect retreat to relax and soak in the serene beauty of
                your surroundings.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center customMargin">
        <a href="" class="roomButton">Discover more</a>
      </div>
      <div id="juniorSuite">
        <div class="myContainer">
          <div class="row">
            <div class="half">
              <img
                src="./images/juniorImg.png"
                alt="Junior Suite Image"
                class="img-responsive"
              />
            </div>
            <div class="half">
              <div class="text-center juniorText">
                <h5>Junior Suite</h5>
                <p>
                  Bring your loved ones and create unforgettable memories in our
                  inviting Junior Suite. Looking for a peaceful moment alone?
                  Step onto your private balcony, take in the charming view of
                  our village below, and breathe in pure relaxation.
                </p>
                <div class="customMargin">
                  <a href="" class="roomButton">Discover more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="seaView">
        <div class="myContainer">
          <div class="row">
            <div class="half">
              <div class="text-center seaText">
                <h5>Coastal Haven with Sea View</h5>
                <p>
                  Awaken to the breathtaking views of the Ionian Sea in our
                  Coastal Haven. This suite features lofty ceilings, polished
                  hardwood floors, and a vibrant color palette inspired by the
                  local landscape, with warm tones of persimmon and white.
                  Designed for comfort and relaxation, it offers generous space
                  and a chic atmosphere that captures the essence of an upscale
                  beachside retreat, making it the perfect getaway.
                </p>
                <div class="customMargin">
                  <a href="" class="roomButton">Discover more</a>
                </div>
              </div>
            </div>
            <div class="half">
              <img
                src="./images/seaViewImg.png"
                alt="Junior Suite Image"
                class="img-responsive"
              />
            </div>
          </div>
        </div>
      </div>
      <div id="grandeSuite">
        <div class="myContainer">
          <div class="row">
            <img
              src="./images/grandeSuiteImage.png"
              alt="Grande Suite Image"
              class="img-responsive"
            />
            <br />

            <div class="textGrande text-center">
              <h5>Grande Suite</h5>
              <p>
                Our Grande Suite is thoughtfully designed to reflect the
                stunning natural beauty of the surrounding landscape. With its
                warm wood tones, natural stone accents, and charming exposed
                ceiling beams, this suite offers a cozy and inviting atmosphere.
                It’s the perfect sanctuary for relaxation and enjoyment,
                blending comfort with elegant design.
              </p>
              <div class="customMargin">
                <a href="" class="roomButton">Discover more</a>
              </div>
            </div>
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
                <a href="" class="roomButton">Book now</a>
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
