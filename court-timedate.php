<!DOCTYPE html>
<html lang="en">
<head>
<?php 
$logoaddp=mysqli_query($con,"select * from company_master");
$logoaddsp=mysqli_fetch_array($logoaddp);
echo $google_analytic_code = $logoaddsp['google_analytic_code'];
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Venue Sport</title>
<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="assets/plugins/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="assets/plugins/owl-carousel/owl.theme.default.min.css">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<!-- Select CSS -->
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<!-- Feathericon CSS -->
<link rel="stylesheet" href="assets/css/feather.css">
<!-- Main CSS -->
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<!-- Main Wrapper -->
<div class="main-wrapper coach">
  <!-- Header -->
  <?php include 'header.php' ?>
  <!-- /Header -->
  <!-- Breadcrumb -->
  <div class="breadcrumb mb-0"> <span class="primary-right-round"></span>
    <div class="container">
      <h1 class="text-white">Book A Court</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>Book A Court</li>
      </ul>
    </div>
  </div>
  <!-- /Breadcrumb -->
  <section class="booking-steps py-30">
    <div class="container">
      <ul class="d-xl-flex justify-content-center align-items-center">
        <li>
          <h5><a href="court-detail.php"><span>1</span>Court List</a></h5>
        </li>
        <li class="active">
          <h5><a href="coach-timedate.php"><span>2</span>Time & Date</a></h5>
        </li>
        <li>
          <h5><a href="coach-personalinfo.php"><span>3</span>Personal Information</a></h5>
        </li>
        <li>
          <h5><a href="coach-order-confirm.php"><span>4</span>Order Confirmation</a></h5>
        </li>
        <li>
          <h5><a href="coach-payment.php"><span>5</span>Payment</a></h5>
        </li>
      </ul>
    </div>
  </section>
  <!-- Page Content -->
  <div class="content">
    <div class="container">
      <section class="card mb-40">
        <div class="text-center mb-40">
          <h3 class="mb-1">Time & Date</h3>
          <p class="sub-title">Book your training session at a time and date that suits your needs.
          <center>
          Select Date : 
          <select name="date" class="form-control" style="width:150px;">
          <option value="">15-05-2025</option>
          <option value="">20-05-2025</option>
          <option value="">21-05-2025</option>
          <option value="">22-05-2025</option>
          <option value="">23-05-2025</option>
          <option value="">24-05-2025</option>
          <option value="">25-05-2025</option>
          </select>
          </center>
          </p>
        </div>
        
      </section>
      <div class="row text-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-8">
          <div class="card time-date-card">
            <section class="booking-date">
              <div class="list-unstyled owl-carousel date-slider owl-theme mb-40">
                <div class="booking-date-item">
                  <h6>Monday</h6>
                  <p>Apr 24</p>
                </div>
                <div class="booking-date-item">
                  <h6>Tuesday</h6>
                  <p>Apr 25</p>
                </div>
                <div class="booking-date-item">
                  <h6>Wednesday</h6>
                  <p>Apr 26</p>
                </div>
                <div class="booking-date-item">
                  <h6>Thursday</h6>
                  <p>Apr 27</p>
                </div>
                <div class="booking-date-item">
                  <h6>Friday</h6>
                  <p>Apr 28</p>
                </div>
                <div class="booking-date-item">
                  <h6>Saturday</h6>
                  <p>Apr 29</p>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot"> <span>2:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot"> <span>2:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot"> <span>2:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot"> <span>2:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot"> <span>3:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot"> <span>3:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot"> <span>3:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot"> <span>3:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot"> <span>4:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot"> <span>4:00 PM<i class="fa-regular fa-check-circle"></i></span> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot"> <span>4:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot"> <span>4:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot"> <span>5:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot"> <span>5:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot active checked"> <span>5:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot"> <span>5:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot active"> <span>6:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot active"> <span>6:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot active checked"> <span>6:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot active"> <span>6:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot active"> <span>7:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot active"> <span>7:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot active checked"> <span>7:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
                <div class="col-12 col-sm-4 col-md-3">
                  <div class="time-slot active"> <span>7:00 PM</span><i class="fa-regular fa-check-circle"></i> </div>
                </div>
              </div>
            </section>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-4">
          <aside class="card booking-details">
            <h3 class="border-bottom">Booking Details</h3>
            <ul>
              <li><i class="feather-calendar me-2"></i>15, May 2025</li>
              <li><i class="feather-clock me-2"></i>05:00 PM to 07:00 PM</li>
              <li><i class="feather-clock me-2"></i>Total Hour : 3 Hrs</li>
            </ul>
            <div class="d-grid btn-block">
              <button type="button" class="btn btn-primary">Subtotal : Rs 200</button>
            </div>
          </aside>
        </div>
      </div>
      <div class="text-center btn-row"> <a class="btn btn-primary me-3 btn-icon" href="court-detail.php"><i class="feather-arrow-left-circle me-1"></i> Back</a> <a class="btn btn-secondary btn-icon" href="court-personalinfo.php">Next <i class="feather-arrow-right-circle ms-1"></i></a> </div>
    </div>
    <!-- /Container -->
  </div>
  <!-- /Page Content -->
  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <!-- Footer Join -->
      <div class="footer-join">
        <h2>We Welcome Your Passion And Expertise</h2>
        <p class="sub-title">Join our empowering sports community today and grow with us.</p>
        <a href="register.html" class="btn btn-primary"><i class="feather-user-plus"></i> Join With Us</a> </div>
      <!-- /Footer Join -->
      <!-- Footer Top -->
      <div class="footer-top">
        <div class="row">
          <div class="col-lg-2 col-md-6">
            <!-- Footer Widget -->
            <div class="footer-widget footer-menu">
              <h4 class="footer-title">Contact us</h4>
              <div class="footer-address-blk">
                <div class="footer-call"> <span>Toll free Customer Care</span>
                  <p>+017 123 456 78</p>
                </div>
                <div class="footer-call"> <span>Need Live Suppot</span>
                  <p><a href="https://dreamsports.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c0a4b2a5a1adb3b0afb2b4b380a5b8a1adb0aca5eea3afad">[email&#160;protected]</a></p>
                </div>
              </div>
              <div class="social-icon">
                <ul>
                  <li> <a href="javascript:void(0);" class="facebook" ><i class="fab fa-facebook-f"></i> </a> </li>
                  <li> <a href="javascript:void(0);" class="twitter" ><i class="fab fa-twitter"></i> </a> </li>
                  <li> <a href="javascript:void(0);" class="instagram" ><i class="fab fa-instagram"></i></a> </li>
                  <li> <a href="javascript:void(0);" class="linked-in" ><i class="fab fa-linkedin-in"></i></a> </li>
                </ul>
              </div>
            </div>
            <!-- /Footer Widget -->
          </div>
          <div class="col-lg-2 col-md-6">
            <!-- Footer Widget -->
            <div class="footer-widget footer-menu">
              <h4 class="footer-title">Quick Links</h4>
              <ul>
                <li> <a href="about-us.html">About us</a> </li>
                <li> <a href="services.html">Services</a> </li>
                <li> <a href="events.html">Events</a> </li>
                <li> <a href="blog-grid.html">Blogs</a> </li>
                <li> <a href="contact-us.html">Contact us</a> </li>
              </ul>
            </div>
            <!-- /Footer Widget -->
          </div>
          <div class="col-lg-2 col-md-6">
            <!-- Footer Widget -->
            <div class="footer-widget footer-menu">
              <h4 class="footer-title">Support</h4>
              <ul>
                <li> <a href="contact-us.html">Contact Us</a> </li>
                <li> <a href="faq.html">Faq</a> </li>
                <li> <a href="privacy-policy.html">Privacy Policy</a> </li>
                <li> <a href="terms-condition.html">Terms & Conditions</a> </li>
                <li> <a href="pricing.html">Pricing</a> </li>
              </ul>
            </div>
            <!-- /Footer Widget -->
          </div>
          <div class="col-lg-2 col-md-6">
            <!-- Footer Widget -->
            <div class="footer-widget footer-menu">
              <h4 class="footer-title">Other Links</h4>
              <ul>
                <li> <a href="coaches-grid.html">Coaches</a> </li>
                <li> <a href="listing-grid.html">Sports Venue</a> </li>
                <li> <a href="coach-details.html">Join As Coach</a> </li>
                <li> <a href="coaches-map.html">Add Venue</a> </li>
                <li> <a href="my-profile.html">My Account</a> </li>
              </ul>
            </div>
            <!-- /Footer Widget -->
          </div>
          <div class="col-lg-2 col-md-6">
            <!-- Footer Widget -->
            <div class="footer-widget footer-menu">
              <h4 class="footer-title">Our Locations</h4>
              <ul>
                <li> <a href="javascript:void(0);">Germany</a> </li>
                <li> <a href="javascript:void(0);">Russia</a> </li>
                <li> <a href="javascript:void(0);">France</a> </li>
                <li> <a href="javascript:void(0);">UK</a> </li>
                <li> <a href="javascript:void(0);">Colombia</a> </li>
              </ul>
            </div>
            <!-- /Footer Widget -->
          </div>
          <div class="col-lg-2 col-md-6">
            <!-- Footer Widget -->
            <div class="footer-widget footer-menu">
              <h4 class="footer-title">Download</h4>
              <ul>
                <li> <a href="#"><img src="assets/img/icons/icon-apple.svg" alt="Icon"></a> </li>
                <li> <a href="#"><img src="assets/img/icons/google-icon.svg" alt="Icon"></a> </li>
              </ul>
            </div>
            <!-- /Footer Widget -->
          </div>
        </div>
      </div>
      <!-- /Footer Top -->
    </div>
    <!-- Footer Bottom -->
    <div class="footer-bottom">
      <div class="container">
        <!-- Copyright -->
        <div class="copyright">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="copyright-text">
                <p class="mb-0">&copy; 2023 DreamSports  - All rights reserved.</p>
              </div>
            </div>
            <div class="col-md-6">
              <!-- Copyright Menu -->
              <div class="dropdown-blk">
                <ul class="navbar-nav selection-list">
                  <li class="nav-item dropdown">
                    <div class="lang-select"> <span class="select-icon"><i class="feather-globe"></i></span>
                      <select class="select">
                        <option>English (US)</option>
                        <option>UK</option>
                        <option>Japan</option>
                      </select>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <div class="lang-select"> <span class="select-icon"></span>
                      <select class="select">
                        <option>$ USD</option>
                        <option>$ Euro</option>
                      </select>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- /Copyright Menu -->
            </div>
          </div>
        </div>
        <!-- /Copyright -->
      </div>
    </div>
    <!-- /Footer Bottom -->
  </footer>
  <!-- /Footer -->
</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
<script data-cfasync="false" src="court-timedate.phpcdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="assets/js/jquery-3.7.1.min.js" type="e4eb4f411713e8cac3aaf691-text/javascript"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js" type="e4eb4f411713e8cac3aaf691-text/javascript"></script>
<!-- Select JS -->
<script src="assets/plugins/select2/js/select2.min.js" type="e4eb4f411713e8cac3aaf691-text/javascript"></script>
<!-- Owl Carousel JS -->
<script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="e4eb4f411713e8cac3aaf691-text/javascript"></script>
<!-- Custom JS -->
<script src="assets/js/script.js" type="e4eb4f411713e8cac3aaf691-text/javascript"></script>
<script src="court-timedate.phpcdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="e4eb4f411713e8cac3aaf691-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b858e34801c188","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
