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
                    <li><a href="events.php">Gallery</a></li>
                    <li class="active"><a href="contact.php">Contact Us</a></li>
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

  <section class="site-hero inner-page overlay" style="background-image: url(images/p.jpg)"
    data-stellar-background-ratio="0.6">
    <div class="container">
      <div class="row site-hero-inner justify-content-center align-items-center">
        <div class="col-md-10 text-center" data-aos="fade">
          <h1 class="heading mb-3">Contact Us </h1>
          <ul class="custom-breadcrumbs mb-4">
            <li><a href="index.html">Home</a></li>
            <li>&bullet;</li>
            <li>Contact</li>
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
  <section class="section contact-section" style="padding: 80px 0; background-color: #f9f6f2;">
    <div class="container">
      <div class="row justify-content-between">

        <!-- Left Column: Form -->
        <div class="col-md-7" data-aos="fade-up" style="padding-right: 40px;">
          <!-- Heading and paragraph aligned with form margins -->
          <div style="padding-left: 30px;">
            <h2 class="mb-4"
              style="font-family: 'Cormorant Garamond', serif; font-size: 36px; font-weight: 500; color: #1a1a1a; margin-bottom: 15px; font-style: italic; line-height: 1.2;">
              How can we help you?
            </h2>
            <p
              style="font-family: 'Roboto', sans-serif; color: #666; font-size: 16px; margin-bottom: 35px; line-height: 1.6;">
              Please send us your questions, comments and requests using the form below.
            </p>
          </div>

          <!-- Form with creamy background -->
          <form style="background: #f8f6f2; padding: 35px 30px; border-radius: 0; box-shadow: none;">
            <div style="display: flex; gap: 20px; margin-bottom: 25px;">
              <div style="flex: 1; position: relative;">
                <label
                  style="font-family: 'Roboto', sans-serif; color: #1a1a1a; font-weight: 500; margin-bottom: 10px; display: block; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">TITLE</label>
                <select
                  style="width: 100%; padding: 14px 15px; border: 1px solid #d0d0d0; border-radius: 2px; font-family: 'Roboto', sans-serif; color: #333; font-size: 15px; appearance: none; background: white;">
                  <option>Mr.</option>
                  <option>Mrs.</option>
                  <option>Ms.</option>
                  <option>Dr.</option>
                </select>
                <span style="position: absolute; right: 15px; top: 43px; pointer-events: none; color: #999;">▼</span>
              </div>
              <div style="flex: 1;">
                <label
                  style="font-family: 'Roboto', sans-serif; color: #1a1a1a; font-weight: 500; margin-bottom: 10px; display: block; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">FIRST
                  NAME</label>
                <input type="text"
                  style="width: 100%; padding: 14px 15px; border: 1px solid #d0d0d0; border-radius: 2px; font-family: 'Roboto', sans-serif; color: #333; font-size: 15px; background: white;">
              </div>
            </div>

            <div style="margin-bottom: 25px;">
              <label
                style="font-family: 'Roboto', sans-serif; color: #1a1a1a; font-weight: 500; margin-bottom: 10px; display: block; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">LAST
                NAME</label>
              <input type="text"
                style="width: 100%; padding: 14px 15px; border: 1px solid #d0d0d0; border-radius: 2px; font-family: 'Roboto', sans-serif; color: #333; font-size: 15px; background: white;">
            </div>

            <div style="margin-bottom: 25px;">
              <label
                style="font-family: 'Roboto', sans-serif; color: #1a1a1a; font-weight: 500; margin-bottom: 10px; display: block; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">PHONE
                NUMBER</label>
              <input type="text"
                style="width: 100%; padding: 14px 15px; border: 1px solid #d0d0d0; border-radius: 2px; font-family: 'Roboto', sans-serif; color: #333; font-size: 15px; background: white;">
            </div>

            <div style="margin-bottom: 25px;">
              <label
                style="font-family: 'Roboto', sans-serif; color: #1a1a1a; font-weight: 500; margin-bottom: 10px; display: block; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">EMAIL
                ADDRESS</label>
              <input type="email"
                style="width: 100%; padding: 14px 15px; border: 1px solid #d0d0d0; border-radius: 2px; font-family: 'Roboto', sans-serif; color: #333; font-size: 15px; background: white;">
            </div>

            <div style="margin-bottom: 25px;">
              <label
                style="font-family: 'Roboto', sans-serif; color: #1a1a1a; font-weight: 500; margin-bottom: 10px; display: block; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">MESSAGE</label>
              <textarea rows="5"
                style="width: 100%; padding: 14px 15px; border: 1px solid #d0d0d0; border-radius: 2px; font-family: 'Roboto', sans-serif; color: #333; font-size: 15px; resize: vertical; background: white;"></textarea>
            </div>

            <div style="margin-bottom: 30px;">
              <label
                style="font-family: 'Roboto', sans-serif; color: #1a1a1a; font-weight: 500; margin-bottom: 10px; display: block; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">ACCEPTANCE</label>
              <div style="display: flex; align-items: flex-start;">
                <input type="checkbox" style="margin-right: 12px; margin-top: 3px;">
                <span style="font-family: 'Roboto', sans-serif; color: #666; font-size: 14px; line-height: 1.5;">
                  I have read and agree to the Privacy Policy and given consent for the above.
                </span>
              </div>
            </div>
            <button type="submit" onmouseover="this.style.background='#a67c52'; this.style.color='white'"
              onmouseout="this.style.background='transparent'; this.style.color='#a67c52'"
              style="background: transparent; color: #a67c52; font-family: 'Roboto', sans-serif; font-weight: 500; padding: 14px 35px; border: 2px solid #a67c52; border-radius: 2px; cursor: pointer; font-size: 15px; letter-spacing: 0.5px; text-transform: uppercase; transition: all 0.3s ease;">Send
              Message</button>
          </form>
        </div>

        <!-- Right Column: Contact Details with Border -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100"
          style="border: 1px solid #e1e1e1; padding: 30px 25px; height: fit-content; background:#f9f6f2;">
          <h2 class="mb-4"
            style="font-family: 'Cormorant Garamond', serif; font-size: 22px; font-weight: 500; color: #1a1a1a; font-style: italic;"">
          CONTACT DETAILS
        </h2>
        
        <div style=" margin-bottom: 30px;">
            <div style="display: flex; align-items: flex-start; margin-bottom: 18px;">
              <i class="fa fa-map-marker"
                style="color: #a67c52; font-size: 16px; margin-right: 15px; margin-top: 4px;"></i>
              <p style="font-family: 'Roboto', sans-serif; color: #666; font-size: 15px; line-height: 1.6; margin: 0;">
                No. 72, Ocean View Road,<br>
                Mount Lavinia, Colombo, Sri Lanka
              </p>
            </div>
            <div style="display: flex; align-items: center; margin-bottom: 18px;">
              <i class="fa fa-phone" style="color: #a67c52; font-size: 16px; margin-right: 15px;"></i>
              <p style="font-family: 'Roboto', sans-serif; color: #666; font-size: 15px; margin: 0;">
                <a href="tel:+94912225123" style="color: #666; text-decoration: none;">(+94) 912225123</a>
              </p>
            </div>
            <div style="display: flex; align-items: center; margin-bottom: 0;">
              <i class="fa fa-envelope" style="color: #a67c52; font-size: 16px; margin-right: 15px;"></i>
              <p style="font-family: 'Roboto', sans-serif; color: #666; font-size: 15px; margin: 0;">
                <a href="mailto:sweetpeach@gmail.com"
                  style="color: #a67c52; text-decoration: none;">sweetpeach@gmail.com</a>
              </p>
            </div>
        </div>

        <div style="margin-bottom: 30px; padding-top: 20px; border-top: 1px solid #e1e1e1;">
          <h4
            style="font-family: 'Cormorant Garamond', serif; font-size: 18px; font-weight: 500; color: #1a1a1a; margin-bottom: 15px; font-style: italic;">
            Event Enquiries
          </h4>
          <p
            style="font-family: 'Roboto', sans-serif; color: #666; font-size: 15px; margin-bottom: 15px; line-height: 1.6;">
            For enquiries, further information and to book your event, please contact our Events team.
          </p>
          <ul style="font-family: 'Roboto', sans-serif; color: #666; font-size: 15px; padding-left: 20px; margin: 0;">
            <li style="margin-bottom: 8px; padding-left: 5px;"><a href="mailto:events@sweetpeach.com"
                style="color: #a67c52; text-decoration: none;">events@sweetpeach.com</a></li>
            <li style="margin-bottom: 0; padding-left: 5px;"><a href="mailto:meeting.concierge@sweetpeach.com"
                style="color: #a67c52; text-decoration: none;">meeting.concierge@sweetpeach.com</a></li>
          </ul>
        </div>

        <div style="padding-top: 20px; border-top: 1px solid #e1e1e1;">
          <h4
            style="font-family: 'Cormorant Garamond', serif; font-size: 18px; font-weight: 500; color: #1a1a1a; margin-bottom: 15px; font-style: italic;">
            Corporate Enquiries
          </h4>
          <p
            style="font-family: 'Roboto', sans-serif; color: #666; font-size: 15px; margin-bottom: 15px; line-height: 1.6;">
            For any corporate enquiries or further information, please contact our Sales team.
          </p>
          <ul style="font-family: 'Roboto', sans-serif; color: #666; font-size: 15px; padding-left: 20px; margin: 0;">
            <li style="margin-bottom: 0; padding-left: 5px;"><a href="mailto:sales@sweetpeach.com"
                style="color: #a67c52; text-decoration: none;">sales@sweetpeach.com</a></li>
          </ul>
        </div>
      </div>
    </div>
    </div>
  </section>



  <!-- People Also Ask Section -->
  <section class="section faq-section" style="padding: 60px 0; background-color: #fff;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <h2 class="text-center mb-5"
            style="font-family: 'Cormorant Garamond', serif; font-size: 32px; font-weight: 500; color: #1a1a1a; font-style: italic;">
            People Also Ask
          </h2>

          <div class="faq-container">
            <div class="faq-item" style="border-bottom: 1px solid #eaeaea; padding: 20px 0;">
              <div class="faq-question"
                style="display: flex; justify-content: space-between; align-items: center; cursor: pointer;">
                <h4
                  style="font-family: 'Roboto', sans-serif; font-size: 18px; font-weight: 500; color: #1a1a1a; margin: 0;">
                  What are the check-in and check-out times?
                </h4>
                <span class="faq-toggle" style="color: #a67c52; font-size: 18px;">✓</span>
              </div>
              <div class="faq-answer" style="margin-top: 15px; display: none;">
                <p
                  style="font-family: 'Roboto', sans-serif; color: #666; font-size: 16px; line-height: 1.6; margin: 0;">
                  Check-in time is at 2:00 PM and check-out is at 12:00 PM. Early check-in and late check-out may be
                  available upon request, subject to availability.
                </p>
              </div>
            </div>

            <div class="faq-item" style="border-bottom: 1px solid #eaeaea; padding: 20px 0;">
              <div class="faq-question"
                style="display: flex; justify-content: space-between; align-items: center; cursor: pointer;">
                <h4
                  style="font-family: 'Roboto', sans-serif; font-size: 18px; font-weight: 500; color: #1a1a1a; margin: 0;">
                  Do you offer airport transportation services?
                </h4>
                <span class="faq-toggle" style="color: #a67c52; font-size: 18px;">✓</span>
              </div>
              <div class="faq-answer" style="margin-top: 15px; display: none;">
                <p
                  style="font-family: 'Roboto', sans-serif; color: #666; font-size: 16px; line-height: 1.6; margin: 0;">
                  Yes, we offer airport transportation services for an additional fee. Please contact our concierge team
                  at least 48 hours in advance to arrange transportation.
                </p>
              </div>
            </div>

            <div class="faq-item" style="border-bottom: 1px solid #eaeaea; padding: 20px 0;">
              <div class="faq-question"
                style="display: flex; justify-content: space-between; align-items: center; cursor: pointer;">
                <h4
                  style="font-family: 'Roboto', sans-serif; font-size: 18px; font-weight: 500; color: #1a1a1a; margin: 0;">
                  Are pets allowed in the hotel?
                </h4>
                <span class="faq-toggle" style="color: #a67c52; font-size: 18px;">✓</span>
              </div>
              <div class="faq-answer" style="margin-top: 15px; display: none;">
                <p
                  style="font-family: 'Roboto', sans-serif; color: #666; font-size: 16px; line-height: 1.6; margin: 0;">
                  We welcome small pets (under 25 lbs) for an additional fee. Please inform us in advance if you plan to
                  bring a pet, as certain restrictions may apply.
                </p>
              </div>
            </div>

            <div class="faq-item" style="border-bottom: 1px solid #eaeaea; padding: 20px 0;">
              <div class="faq-question"
                style="display: flex; justify-content: space-between; align-items: center; cursor: pointer;">
                <h4
                  style="font-family: 'Roboto', sans-serif; font-size: 18px; font-weight: 500; color: #1a1a1a; margin: 0;">
                  Is parking available at the hotel?
                </h4>
                <span class="faq-toggle" style="color: #a67c52; font-size: 18px;">✓</span>
              </div>
              <div class="faq-answer" style="margin-top: 15px; display: none;">
                <p
                  style="font-family: 'Roboto', sans-serif; color: #666; font-size: 16px; line-height: 1.6; margin: 0;">
                  Yes, we offer complimentary valet parking for all hotel guests. Self-parking options are also
                  available in our secure underground garage.
                </p>
              </div>
            </div>

            <div class="faq-item" style="padding: 20px 0;">
              <div class="faq-question"
                style="display: flex; justify-content: space-between; align-items: center; cursor: pointer;">
                <h4
                  style="font-family: 'Roboto', sans-serif; font-size: 18px; font-weight: 500; color: #1a1a1a; margin: 0;">
                  Do you have wheelchair accessible rooms?
                </h4>
                <span class="faq-toggle" style="color: #a67c52; font-size: 18px;">✓</span>
              </div>
              <div class="faq-answer" style="margin-top: 15px; display: none;">
                <p
                  style="font-family: 'Roboto', sans-serif; color: #666; font-size: 16px; line-height: 1.6; margin: 0;">
                  Yes, we have several wheelchair accessible rooms with roll-in showers, grab bars, and other
                  accessibility features. Please specify your needs when making a reservation.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- JavaScript for FAQ toggle functionality -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const faqQuestions = document.querySelectorAll('.faq-question');

      faqQuestions.forEach(question => {
        question.addEventListener('click', function () {
          const answer = this.nextElementSibling;
          const toggle = this.querySelector('.faq-toggle');

          // Toggle answer visibility
          if (answer.style.display === 'block') {
            answer.style.display = 'none';
            toggle.textContent = '✓';
          } else {
            answer.style.display = 'block';
            toggle.textContent = '✕';
          }
        });
      });
    });
  </script>


  <section class="section bg-image overlay" style="background-image: url('images/v.jpg');">
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