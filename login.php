<?php
session_start();

if (isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit();
}
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require_once 'db_connect.php';

  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT id, fullname, password FROM users WHERE email=?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($id, $fullname, $hashed_password);

  if ($stmt->num_rows > 0) {
    $stmt->fetch();
    if (password_verify($password, $hashed_password)) {
      $_SESSION['user_id'] = $id;
      $_SESSION['user_name'] = $fullname;
      header("Location: index.php");
      exit();
    } else {
      $message = "Invalid Credentials!";
    }
  } else {
    $message = "Invalid Credentials!";
  }

  $stmt->close();
  $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Sweet Peach - Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/animate.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/aos.css" />
  <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
  <link rel="stylesheet" href="css/jquery.timepicker.css" />
  <link rel="stylesheet" href="css/fancybox.min.css" />
  <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css" />
  <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/style.css" />
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
                    <li><a href="events.php">Gallery</a></li>
                    <li><a href="feedback.php">Feedbacks</a></li>                  
                    <li><a href="contact.php">Contact Us</a></li>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                      echo (' <li><a href="logout.php">Logout</a></li>');
                    } else {
                      echo ('<li><a href="register.php">Register</a></li>');
                      echo (' <li><a class="active" href="login.php">Login</a></li>');

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

  <section class="section login-section" id="next">
    <div class="container">
      <div class="row">
        <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
          <form action="login.php" method="post" class="bg-white p-md-5 p-4 mb-5 border">
            <h2 class="mb-4">Login</h2>

            <?php if ($message != ""): ?>
              <div class="alert alert-danger"><?php echo $message; ?></div>
            <?php endif; ?>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" class="form-control" required />
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" class="form-control" required />
            </div>

            <div class="form-group">
              <input type="submit" value="Login" class="btn btn-primary text-white font-weight-bold" />
            </div>

            <p>Don't have an account? <a href="register.php">Register here</a></p>
          </form>
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