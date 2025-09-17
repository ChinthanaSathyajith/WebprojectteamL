<?php
session_start();

?>

<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sweet Peach</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />
  <link rel="stylesheet" type="text/css"
    href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">
  <link rel="stylesheet" href="css/fancybox.min.css">

  <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">


  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <header class="site-header js-site-header">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-12" style="display: flex; align-items: center; justify-content: space-between;">
          <div class="site-logo" data-aos="slide" style="margin-right: 24px;"><a href="index.php">Sweet Peach</a></div>
          <div style="display: flex; align-items: center; gap: 600px;">
            <button id="bookingBtn"
              style="border:2px solid #000; background:transparent; color:#000; border-radius:2px; padding:8px 28px; margin:0; font-weight:700; cursor:pointer; transition:background 0.2s, color 0.2s, border-color 0.2s; text-transform:uppercase; letter-spacing:1px; font-size:16px; min-width:120px;"
              onclick="window.location.href='booking.php'">Book Your Stay</button>
            <div class="site-menu-toggle js-site-menu-toggle" data-aos="slide">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
        </div>
        <div style="display:none"></div>
        <div class="site-navbar js-site-navbar">
          <nav role="navigation">
            <div class="container">
              <div class="row full-height align-items-center">
                <div class="col-md-6 mx-auto">
                  <ul class="list-unstyled menu">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="booking.php">Rooms</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="events.php">Gallery</a></li>
                    <li><a href="feedback.php">Feedbacks</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <?php
                    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
                      echo '<li><a href="admin.php">Admin Page</a></li>';
                    }
                    if (isset($_SESSION['user_id'])) {
                      echo (' <li><a href="logout.php">Logout</a></li>');
                    } else {
                      echo ('<li><a href="register.php">Register</a></li>');
                      echo (' <li><a href="login.php">Login</a></li>');

                    }
                    ?>


                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
    </div>
    <script>
      var bookingBtn = document.getElementById('bookingBtn');
      function setBookingBtnColor(isScrolled) {
        if (isScrolled) {
          bookingBtn.style.borderColor = '#000';
          bookingBtn.style.color = '#000';
        } else {
          bookingBtn.style.borderColor = '#fff';
          bookingBtn.style.color = '#fff';
        }
      }
      function setBookingBtnResponsive() {
        if (window.innerWidth <= 600) {
          bookingBtn.style.padding = '6px 12px';
          bookingBtn.style.fontSize = '13px';
          bookingBtn.style.minWidth = '90px';
        } else {
          bookingBtn.style.padding = '8px 28px';
          bookingBtn.style.fontSize = '16px';
          bookingBtn.style.minWidth = '120px';
        }
      }
      bookingBtn.addEventListener('mouseover', function () {
        this.style.background = 'rgba(0,0,0,0.08)';
      });
      bookingBtn.addEventListener('mouseout', function () {
        this.style.background = 'transparent';
      });
      bookingBtn.addEventListener('click', function () {
        window.location.href = 'booking.php';
      });
      window.addEventListener('scroll', function () {
        var header = document.querySelector('.site-header');
        setBookingBtnColor(header.classList.contains('scrolled'));
      });
      window.addEventListener('resize', setBookingBtnResponsive);
      // Initial state
      var header = document.querySelector('.site-header');
      setBookingBtnColor(header.classList.contains('scrolled'));
      setBookingBtnResponsive();
    </script>
  </header>
  <!-- END head -->

  <section class="site-hero overlay" style="background-image: url(images/hero_4.jpg)"
    data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row site-hero-inner justify-content-center align-items-center">
        <div class="col-md-10 text-center" data-aos="fade-up">
          <span class="custom-caption text-uppercase text-white d-block mb-3">
            Where Comfort Meets Elegance – Your 5 <span class="fa fa-star text-primary"></span> Escape
          </span>
          <h1 class="heading">Creating Memories, One Stay at a Time</h1>


        </div>
      </div>
    </div>

    <a class="mouse smoothscroll" href="#next">
      <div class="mouse-icon">
        <span class="mouse-wheel"></span>
      </div>
    </a>
  </section>
  <!-- END section -->

  <section class="section bg-light pb-0">

  </section>

  <section class="py-5 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
          <figure class="img-absolute">
            <img src="images/food-1.jpg" alt="Image" class="img-fluid">
          </figure>
          <img src="images/img_1.jpg" alt="Image" class="img-fluid rounded">
        </div>
        <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
          <h2 class="heading">Welcome!</h2>
          <p class="mb-4">
            Discover the charm of Sri Lanka in a place where golden beaches, lush greenery, and warm hospitality come
            together. At our hotel, every moment is designed to give you comfort, relaxation, and unforgettable
            memories.
          </p>

          <p><a href="aboutus.php" class="btn btn-primary text-white py-2 mr-3">Learn More</a> <span
              class="mr-3 font-family-serif">

        </div>
      </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-7">
          <h2 class="heading" data-aos="fade-up">Rooms &amp; Suites</h2>
          <p data-aos="fade-up" data-aos-delay="100">Our carefully designed rooms and suites offer the perfect blend of
            comfort and elegance. Each space is thoughtfully crafted with modern amenities, warm interiors, and
            breathtaking views, ensuring your stay in Sri Lanka is nothing short of extraordinary.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-4" data-aos="fade-up">
          <a class="room">
            <figure class="img-wrap">
              <img src="images/img_1.jpg" alt="" class="img-fluid mb-3">
            </figure>
            <div class="p-3 text-center room-info">
              <h2>Single Room</h2>

            </div>
          </a>
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up">
          <a class="room">
            <figure class="img-wrap">
              <img src="images/img_2.jpg" alt="" class="img-fluid mb-3">
            </figure>
            <div class="p-3 text-center room-info">
              <h2>Family Room</h2>

            </div>
          </a>
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up">
          <a class="room">
            <figure class="img-wrap">
              <img src="images/img_3.jpg" alt="" class="img-fluid mb-3">
            </figure>
            <div class="p-3 text-center room-info">
              <h2>Presidential Room</h2>

            </div>
          </a>
        </div>


      </div>
    </div>
  </section>




  <section class="section bg-image overlay" style="background-image: url('images/hero_3.jpg');">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-7">
          <h2 class="heading text-white" data-aos="fade">Our Restaurant Menu</h2>
          <p class="text-white" data-aos="fade" data-aos-delay="100">From the heart of Sri Lanka, where spices and
            flavors come alive, our dishes celebrate the rich culinary heritage of the island. From fragrant rice and
            curry to savory hoppers and kottu roti, every meal tells a story of tradition and taste, crafted with fresh
            local ingredients and a touch of love.</p>
        </div>
      </div>
      <div class="food-menu-tabs" data-aos="fade">
        <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active letter-spacing-2" id="mains-tab" data-toggle="tab" href="#mains"
              aria-controls="mains" aria-selected="true">Our MAINS</a>
          </li>

        </ul>
        <div class="tab-content py-5" id="myTabContent">


          <div class="tab-pane fade show active text-left" id="mains" role="tabpanel" aria-labelledby="mains-tab">
            <div class="row">
              <div class="col-md-6">
                <div class="food-menu mb-5">
                  <span class="d-block text-primary h4 mb-3">$5.00</span>
                  <h3 class="text-white"><a class="text-white">Egg Hoppers&nbsp; &nbsp;</a></h3>
                  <p class="text-white text-opacity-7">Crispy-edged, soft rice flour pancakes with a perfectly cooked
                    egg in the center. A classic Sri Lankan treat!</p>
                </div>
                <div class="food-menu mb-5">
                  <span class="d-block text-primary h4 mb-3">$8.50</span>
                  <h3 class="text-white"><a class="text-white">Kottu</a></h3>
                  <p class="text-white text-opacity-7">Chopped roti stir-fried with vegetables, spices, and your choice
                    of meat—a flavorful Sri Lankan street food favorite!</p>
                </div>
                <div class="food-menu mb-5">
                  <span class="d-block text-primary h4 mb-3">$10.00</span>
                  <h3 class="text-white"><a class="text-white">Fish Ambul Thiyal</a></h3>
                  <p class="text-white text-opacity-7">Tangy, spicy fish curry made with goraka (a souring fruit) and
                    traditional Sri Lankan spices.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="food-menu mb-5">
                  <span class="d-block text-primary h4 mb-3">$16.00</span>
                  <h3 class="text-white"><a class="text-white">French Toast Combo</a></h3>
                  <p class="text-white text-opacity-7">Golden, buttery French toast served with fresh fruits and a
                    drizzle of syrup—a sweet and satisfying treat!</p>
                </div>
                <div class="food-menu mb-5">
                  <span class="d-block text-primary h4 mb-3">$8.35</span>
                  <h3 class="text-white"><a class="text-white">String Hoppers&nbsp;</a></h3>
                  <p class="text-white text-opacity-7">Steamed rice noodle nests, light and fluffy, perfect with curry
                    or sambol for an authentic Sri Lankan meal.</p>
                </div>
                <div class="food-menu mb-5">
                  <span class="d-block text-primary h4 mb-3">$7.00</span>
                  <h3 class="text-white"><a class="text-white">Chorizo &amp; Egg Omelet</a></h3>
                  <p class="text-white text-opacity-7">Fluffy eggs cooked with spicy chorizo, creating a hearty and
                    flavorful start to your day.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- END section -->



  <section class="section blog-post-entry bg-light">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-7">
          <h2 class="heading" data-aos="fade-up">Visits Nearby,</h2>
          <p data-aos="fade-up">Located just a short drive from the bustling city of Colombo, our hotel puts you close
            to shopping, dining, and cultural landmarks. Explore vibrant streets, historic sites, and the lively coastal
            vibe, all while enjoying a peaceful retreat just outside the city.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="100">

          <div class="media media-custom d-block mb-4 h-100">
            <a class="mb-4 d-block"><img src="images/sigirya.jpg" alt="Image placeholder" class="img-fluid"></a>
            <div class="media-body">
              <span class="meta-post">~4 hours trip&nbsp;</span>
              <h2 class="mt-0 mb-3"><a>Sigirya</a></h2>
              <p>Discover the ancient rock fortress of Sigiriya, a UNESCO World Heritage site, famous for its stunning
                views, historic frescoes, and rich cultural heritage.</p>
            </div>
          </div>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="200">
          <div class="media media-custom d-block mb-4 h-100">
            <a class="mb-4 d-block"><img src="images/elephant.jpg" alt="Image placeholder" class="img-fluid"></a>
            <div class="media-body">
              <p> <span class="meta-post">~2 hours trip</span> </p>

              <h2 class="mt-0 mb-3"><a>Pinnawala Elephant Orphanage</a></h2>
              <p>Visit the famous Pinnawala Elephant Orphanage to see rescued elephants up close, watch them bathe in
                the river, and learn about Sri Lanka’s conservation efforts.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="300">
          <div class="media media-custom d-block mb-4 h-100">
            <a class="mb-4 d-block"><img src="images/mlbeach.jpg" alt="Image placeholder" class="img-fluid"></a>
            <div class="media-body">
              <span class="meta-post">~0.5 hours trip</span>
              <h2 class="mt-0 mb-3"><a>Mount Lavinia Beach</a></h2>
              <p>Mount Lavinia Beach offers golden sands, a refreshing sea breeze, and plenty of seaside restaurants to
                enjoy fresh seafood and stunning sunset views.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section bg-image overlay" style="background-image: url('images/hero_4.jpg');">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
          <h2 class="text-white font-weight-bold">A Best Place To Stay. Reserve Now!</h2>
        </div>
        <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
          <a href="booking.php" class="btn btn-outline-white-primary py-3 text-white px-5">Reserve Now</a>
        </div>
      </div>
    </div>
  </section>

  <footer class="section footer-section">
    <div class="container">
      <div class="row mb-4">
        <div class="col-md-3 mb-5">
          <ul class="list-unstyled link">
            <li><a href="aboutus.php">About Us</a></li>

            <li><a href="">Privacy Policy</a></li>
            <li><a href="booking.php">Rooms</a></li>
          </ul>
        </div>
        <div class="col-md-3 mb-5">
          <ul class="list-unstyled link">
            <li><a href="events.php">Our gallery</a></li>

            <li><a href="contact.php">Contact Us</a></li>

          </ul>
        </div>
        <div class="col-md-3 mb-5 pr-md-5 contact-info">
          <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span> No.
              72, Ocean View Road, Mount Lavinia, Colombo, Sri Lanka</span></p>
          <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span>
              (+94) 912225123</span></p>
        </div>
        <div class="col-md-3 mb-5">
          <p>Sign up for our newsletter</p>
          <form class="footer-newsletter">
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email...">
              <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button><br>
              <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span>
                  sweetpeach@gmail.com</span></p>

            </div>
          </form>
        </div>
      </div>
      <div class="row pt-5">
        <p class="col-md-6 text-left">

          Copyright &copy;
          <script>document.write(new Date().getFullYear());</script> All rights reserved
        </p>

        <p class="col-md-6 text-right social">
          <a href="https://www.tripadvisor.com/"><span class="fa fa-tripadvisor"></span></a>
          <a href="https://www.facebook.com/"><span class="fa fa-facebook"></span></a>
          <a href="https://x.com/"><span class="fa fa-twitter"></span></a>
          <a href="https://www.linkedin.com/home?originalSubdomain=lk"><span class="fa fa-linkedin"></span></a>

        </p>
      </div>
    </div>
  </footer>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>


  <script src="js/aos.js"></script>

  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>



  <script src="js/main.js"></script>
</body>

</html>