<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require_once 'db_connect.php';

  $user_id = $_SESSION['user_id'];
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $room_type = $_POST['room_type'];
  $check_in = $_POST['check_in'];
  $check_out = $_POST['check_out'];

    $stmt = $conn->prepare("INSERT INTO booking (user_id, full_name, email, phone, room_type, check_in, check_out, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("issssss", $user_id, $full_name, $email, $phone, $room_type, $check_in, $check_out);

  if ($stmt->execute()) {
    $message = "Booking successful!";
  } else {
    $message = "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
?>

<!DOCTYPE html>
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
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="booking.php">Rooms</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="events.php">Gallery</a></li>
                    <li><a href="feedback.php">Feedbacks</a></li>
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

  <section class="section booking-section">
    <div class="container">
      <h2>Book a Room</h2>

      <?php if ($message != ""): ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
      <?php endif; ?>

      <form action="booking.php" method="post" class="bg-white p-md-5 p-4 mb-5 border">
        <div class="form-group">
          <label>Full Name</label>
          <input type="text" name="full_name" class="form-control" value="<?php echo $_SESSION['user_name']; ?>"
            required />
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" required />
        </div>
        <div class="form-group">
          <label>Phone</label>
          <input type="text" name="phone" class="form-control" required />
        </div>
        <div class="form-group">
          <label>Room Type</label>
          <select name="room_type" class="form-control" required>
            <option value="">Select a room</option>
            <option value="Single">Single</option>
            <option value="Double">Double</option>
            <option value="Suite">Suite</option>
          </select>
        </div>
        <div class="form-group">
          <label>Check-in Date</label>
          <input type="date" name="check_in" class="form-control" required />
        </div>
        <div class="form-group">
          <label>Check-out Date</label>
          <input type="date" name="check_out" class="form-control" required />
        </div>
        <div class="form-group">
          <input type="submit" value="Book Now" class="btn btn-primary text-white font-weight-bold" />
        </div>
      </form>
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
  <script src="js/bootstrap.min.js"></script>
</body>

</html>