<?php
session_start();
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
    <title>Sweet Peach - Feedback</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
    <!-- Navbar  -->
    <!-- <header class="site-header js-site-header">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-12" style="display: flex; align-items: center; justify-content: space-between;">
          <div class="site-logo" data-aos="slide"><a href="index.php">Sweet Peach</a></div>
          <div style="display: flex; align-items: center; gap: 600px;">
            <button id="bookingBtn"
              style="border:2px solid #000; background:transparent; color:#000; border-radius:2px; padding:8px 28px; font-weight:700; cursor:pointer;"
              onclick="window.location.href='booking.php'">Book Your Stay</button>
            <div class="site-menu-toggle js-site-menu-toggle" data-aos="slide">
              <span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
          </div>
        </div>
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
                    <li><a href="contact.php">Contact Us</a></li>
                    <li class="active"><a href="feedback.php">Feedback</a></li>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '<li><a href="logout.php">Logout</a></li>';
                    } else {
                        echo '<li><a href="register.php">Register</a></li>';
                        echo '<li><a href="login.php">Login</a></li>';
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
  </header> -->

    <!-- Feedback Section -->
    <div class="container feedback-section" style="margin-top: 50px;">
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

    <!-- ✅ Footer (Copied from index.php) -->
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
    <script src="js/bootstrap.min.js"></script>
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