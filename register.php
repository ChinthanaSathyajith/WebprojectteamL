<?php
session_start();
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("127.0.0.1", "root", "", "db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    if ($password !== $confirm_password) {
        $message = "Passwords do not match!";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (fullname, phone, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fullname, $phone, $email, $hashed_password);

        if ($stmt->execute()) {
            $message = "Registration successful! <a href='login.php'>Login here</a>";
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Sweet Peach - Register</title>
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
                <div class="col-6 col-lg-4 site-logo" data-aos="fade">
                    <a href="index.html">Sweet Peach</a>
                </div>
                <div class="col-6 col-lg-8">
                    <div class="site-menu-toggle js-site-menu-toggle" data-aos="fade">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="site-navbar js-site-navbar">
                        <nav role="navigation">
                            <div class="container">
                                <div class="row full-height align-items-center">
                                    <div class="col-md-6 mx-auto">
                                        <ul class="list-unstyled menu">
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="rooms.html">Rooms</a></li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="events.html">Gallery</a></li>
                                            <li class="active"><a href="register.php">Register</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="section register-section" id="next">
        <div class="container">
            <div class="row">
                <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                    <form action="register.php" method="post" class="bg-white p-md-5 p-4 mb-5 border">
                        <h2 class="mb-4">Register</h2>

                        <?php if($message != ""): ?>
                            <div class="alert alert-info"><?php echo $message; ?></div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="fullname">Full Name</label>
                                <input type="text" id="fullname" name="fullname" class="form-control" required />
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required />
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" id="confirm-password" name="confirm-password" class="form-control" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="submit" value="Register" class="btn btn-primary text-white font-weight-bold" />
                            </div>
                        </div>

                        <p>Already have an account? <a href="login.php">Login here</a></p>
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
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Rooms</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-5">
                    <ul class="list-unstyled link">
                        <li><a href="#">The Rooms &amp; Suites</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Restaurant</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-5 pr-md-5 contact-info">
                    <p>
                        <span class="d-block">
                            <span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span>
                        <span>No. 72, Ocean View Road, Mount Lavinia, Colombo, Sri Lanka</span>
                    </p>
                    <p>
                        <span class="d-block">
                            <span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span>
                        <span> (+94) 912225123</span>
                    </p>
                    <p>
                        <span class="d-block">
                            <span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span>
                        <span> sweetpeach@gmail.com</span>
                    </p>
                </div>
                <div class="col-md-3 mb-5">
                    <p>Sign up for our newsletter</p>
                    <form action="#" class="footer-newsletter">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email..." />
                            <button type="submit" class="btn">
                                <span class="fa fa-paper-plane"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row pt-5">
                <p class="col-md-6 text-left">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
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
