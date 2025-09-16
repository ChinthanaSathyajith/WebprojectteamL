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

  <!-- Theme Style -->
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="booking.php">Rooms</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li class="active"><a href="events.php">Gallery</a></li>
                    <li><a href="contact.php">Contact Us</a></li>

                    <?php
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

  <section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)"
    data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row site-hero-inner justify-content-center align-items-center">
        <div class="col-md-10 text-center" data-aos="fade">
          <h1 class="heading mb-3">Gallery & Events</h1>
          <ul class="custom-breadcrumbs mb-4">
            <li><a href="index.html">Home</a></li>
            <li>&bullet;</li>
            <li>Gallery & Events</li>
          </ul>
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




  <section class="section blog-post-entry bg-light" id="next">
    <div class="container">

      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="100">

          <div class="media media-custom d-block mb-4 h-100">
            <a href="#" class="mb-4 d-block"><img src="images/image1.jpg" alt="Image placeholder" class="img-fluid"></a>
            <div class="media-body">
              <span class="meta-post">February 26, 2026</span>
              <h2 class="mt-0 mb-3"><a href="#">Sunday Brunch Buffet</a></h2>
              <p>Start your Sunday with a delicious buffet featuring live cooking, fresh fruits, and sweet desserts in a
                cozy atmosphere.</p>
            </div>
          </div>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="200">
          <div class="media media-custom d-block mb-4 h-100">
            <a href="#" class="mb-4 d-block"><img src="images/image2.jpg" alt="Image placeholder" class="img-fluid"></a>
            <div class="media-body">
              <span class="meta-post">February 26, 2026</span>
              <h2 class="mt-0 mb-3"><a href="#">Candlelight Dinner With Your Loved One</a></h2>
              <p>A romantic evening with a private candlelit setup, gourmet dishes, and soft music for couples</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="300">
          <div class="media media-custom d-block mb-4 h-100">
            <a href="#" class="mb-4 d-block"><img src="images/image3.jpg" alt="Image placeholder" class="img-fluid"></a>
            <div class="media-body">
              <span class="meta-post">February 26, 2026</span>
              <h2 class="mt-0 mb-3"><a href="#">Live Music Fridays</a></h2>
              <p>Relax and unwind with soulful live performances while sipping your favorite drinks.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="100">

          <div class="media media-custom d-block mb-4 h-100">
            <a href="#" class="mb-4 d-block"><img src="images/image4.jpg" alt="Image placeholder" class="img-fluid"></a>
            <div class="media-body">
              <span class="meta-post">February 26, 2026</span>
              <h2 class="mt-0 mb-3"><a href="#">Corporate Gatherings</a></h2>
              <p>Modern spaces with full catering services, perfect for meetings, workshops, and business events.</p>
            </div>
          </div>

        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="200">
          <div class="media media-custom d-block mb-4 h-100">
            <a href="#" class="mb-4 d-block"><img src="images/image5.jpg" alt="Image placeholder" class="img-fluid"></a>
            <div class="media-body">
              <span class="meta-post">February 26, 2026</span>
              <h2 class="mt-0 mb-3"><a href="#">Art & Photography Exhibitions</a></h2>
              <p>Discover creative artworks and photography displayed by local talents in our gallery.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="300">
          <div class="media media-custom d-block mb-4 h-100">
            <a href="#" class="mb-4 d-block"><img src="images/image6.jpg" alt="Image placeholder" class="img-fluid"></a>
            <div class="media-body">
              <span class="meta-post">February 26, 2026</span>
              <h2 class="mt-0 mb-3"><a href="#">30 Great Ideas On Private Celebrations</a></h2>
              <p>rom weddings to birthdays, we create personalized setups to make your day unforgettable.</p>
            </div>
          </div>
        </div>
      </div>


    </div>
  </section>

  <section class="section slider-section bg-light">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-7">
          <h2 class="heading" data-aos="fade-up">Photos</h2>
          <p data-aos="fade-up" data-aos-delay="100">Nestled in the heart of comfort, Sweet Peach Hotel captures
            timeless moments. Each corner tells a story of elegance, warmth, and unforgettable memories waiting to be
            cherished.Our gallery brings together glimpses of luxury, tranquility, and the vibrant spirit of your
            perfect getaway.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="slider-item">
              <a href="images/slider-1.jpg" data-fancybox="images" data-caption="Caption for this image"><img
                  src="images/slider-1.jpg" alt="Image placeholder" class="img-fluid"></a>
            </div>
            <div class="slider-item">
              <a href="images/slider-2.jpg" data-fancybox="images" data-caption="Caption for this image"><img
                  src="images/slider-2.jpg" alt="Image placeholder" class="img-fluid"></a>
            </div>
            <div class="slider-item">
              <a href="images/slider-3.jpg" data-fancybox="images" data-caption="Caption for this image"><img
                  src="images/slider-3.jpg" alt="Image placeholder" class="img-fluid"></a>
            </div>
            <div class="slider-item">
              <a href="images/slider-4.jpg" data-fancybox="images" data-caption="Caption for this image"><img
                  src="images/slider-4.jpg" alt="Image placeholder" class="img-fluid"></a>
            </div>
            <div class="slider-item">
              <a href="images/slider-5.jpg" data-fancybox="images" data-caption="Caption for this image"><img
                  src="images/slider-5.jpg" alt="Image placeholder" class="img-fluid"></a>
            </div>
            <div class="slider-item">
              <a href="images/slider-6.jpg" data-fancybox="images" data-caption="Caption for this image"><img
                  src="images/slider-6.jpg" alt="Image placeholder" class="img-fluid"></a>
            </div>
            <div class="slider-item">
              <a href="images/slider-7.jpg" data-fancybox="images" data-caption="Caption for this image"><img
                  src="images/slider-7.jpg" alt="Image placeholder" class="img-fluid"></a>
            </div>
            <div class="slider-item">
              <a href="images/slider-8.jpg" data-fancybox="images" data-caption="Caption for this image"><img
                  src="images/slider-8.jpg" alt="Image placeholder" class="img-fluid"></a>
            </div>
            <div class="slider-item">
              <a href="images/slider-9.jpg" data-fancybox="images" data-caption="Caption for this image"><img
                  src="images/slider-9.jpg" alt="Image placeholder" class="img-fluid"></a>
            </div>
            <div class="slider-item">
              <a href="images/slider-10.jpg" data-fancybox="images" data-caption="Caption for this image"><img
                  src="images/slider-10.jpg" alt="Image placeholder" class="img-fluid"></a>
            </div>
            <div class="slider-item">
              <a href="images/slider-11.jpg" data-fancybox="images" data-caption="Caption for this image"><img
                  src="images/slider-11.jpg" alt="Image placeholder" class="img-fluid"></a>
            </div>
          </div>
          <!-- END slider -->
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