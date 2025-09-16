<?php
$conn = new mysqli("127.0.0.1", "root", "", "db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all feedback
$result = $conn->query("
    SELECT f.feedback_text, f.created_at, u.fullname 
    FROM feedback f
    JOIN users u ON f.user_id = u.id
    ORDER BY f.created_at DESC
");
$feedbacks = $result->fetch_all(MYSQLI_ASSOC);
$conn->close();
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sweet Peach - Feedback</title>
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
    <style>
        .feedback-section {
            max-width: 800px;
            margin: 50px auto;
        }

        .feedback-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: transform 0.2s ease-in-out;
        }

        .feedback-card:hover {
            transform: translateY(-3px);
        }

        .feedback-author {
            font-weight: bold;
            font-size: 1rem;
        }

        .feedback-date {
            font-size: 0.85rem;
            color: gray;
        }
    </style>
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
                    <li  class="active"><a href="feedback.php">Feedbacks</a></li>
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

  <section class="site-hero overlay" style="background-image: url(images/feedback.jpg)"
    data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row site-hero-inner justify-content-center align-items-center">
        <div class="col-md-10 text-center" data-aos="fade-up">
          <span class="custom-caption text-uppercase text-white d-block mb-3">
          We Value Your Feedback – Share Your Experience With Us
          </span>
          <h1 class="heading">Feedbacks</h1>

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

  

    <section class="section">
    <div class="container feedback-section">
        <h2 class="text-center mb-4">What our customers say</h2>

        <?php if (empty($feedbacks)): ?>
            <p class="text-center text-muted">No feedback yet. Be the first to share your thoughts!</p>
        <?php else: ?>
            <?php foreach ($feedbacks as $fb): ?>
                <div class="feedback-card">
                    <p class="mb-2"><?php echo htmlspecialchars($fb['feedback_text']); ?></p>
                    <div class="d-flex justify-content-between">
                        <span class="feedback-author"><?php echo htmlspecialchars($fb['fullname']); ?></span>
                        <span class="feedback-date"><?php echo $fb['created_at']; ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- Post Feedback Button -->
        <div class="text-center">
            <button class="btn btn-primary mt-3" id="postFeedbackBtn">Post My Feedback</button>
        </div>
    </div>
</section>

    <!-- ✅ Feedback Modal -->
    <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="submit_feedback.php">
                    <div class="modal-header">
                        <h5 class="modal-title">Write Your Feedback</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <textarea name="feedback_text" class="form-control" rows="4" placeholder="Your feedback..."
                            required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
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
                    <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span>
                        No. 72, Ocean View Road, Mount Lavinia, Colombo, Sri Lanka</p>
                    <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span>
                        (+94) 912225123</p>
                </div>
                <div class="col-md-3 mb-5">
                    <p>Sign up for our newsletter</p>
                    <form class="footer-newsletter">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email...">
                            <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button><br>
                            <p><span class="d-block"><span
                                        class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span>
                                sweetpeach@gmail.com</p>
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
                    <a href="https://www.linkedin.com/home?originalSubdomain=lk"><span
                            class="fa fa-linkedin"></span></a>
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
    <script>
        document.getElementById("postFeedbackBtn").addEventListener("click", function () {
            <?php if (!isset($_SESSION['user_id'])): ?>
                window.location.href = "login.php";
            <?php else: ?>
                $('#feedbackModal').modal('show');
            <?php endif; ?>
        });
    </script>
</body>

</html>