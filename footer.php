<footer class="footer">
  <div class="container">
    <!-- Footer Join -->
    <div class="footer-join">
      <h2>We Welcome Your Passion And Expertise</h2>
      <p class="sub-title">Join our empowering sports community today and grow with us.</p>
      <a href="<?php echo $siteurl_link; ?>/register.php" class="btn btn-primary"><i class="feather-user-plus"></i> Join With Us</a> </div>
    <!-- /Footer Join -->
    <!-- Footer Top -->
    <?php if(isMobileDevice()) { ?>
    <style>
.footer-widget { margin-bottom:10px !important; }  .footer-title { margin-bottom:10px !important; } 
</style>
    <?php } ?>
    <div class="footer-top">
      <div class="row">
        <div class="col-lg-2 col-md-6" <?php if(isMobileDevice()) { ?> style="width:50%" <?php } ?>>
          <!-- Footer Widget -->
          <div class="footer-widget <?php if(isMobileDevice()) { } else { ?> footer-menu <?php } ?>">
            <h4 class="footer-title">Quick Links</h4>
            <ul>
              <li> <a href="<?php echo $siteurl_link; ?>/about-us.php">About us</a> </li>
              <li> <a href="<?php echo $siteurl_link; ?>/services.php">Services</a> </li>
              <li> <a href="<?php echo $siteurl_link; ?>/dplay-events.php">Events</a> </li>
              <li> <a href="<?php echo $siteurl_link; ?>/blog.php">Blogs</a> </li>
              <li> <a href="<?php echo $siteurl_link; ?>/contact-us.php">Contact us</a> </li>
            </ul>
          </div>
          <!-- /Footer Widget -->
        </div>
        <div class="col-lg-3 col-md-6" <?php if(isMobileDevice()) { ?> style="width:50%" <?php } ?>>
          <!-- Footer Widget -->
          <div class="footer-widget <?php if(isMobileDevice()) { } else { ?> footer-menu <?php } ?>">
            <h4 class="footer-title">Support</h4>
            <ul>
              <li> <a href="<?php echo $siteurl_link; ?>/faq.php">Faq</a> </li>
              <li> <a href="<?php echo $siteurl_link; ?>/privacy-policy.php">Privacy Policy</a> </li>
              <li> <a href="<?php echo $siteurl_link; ?>/terms-condition.php">Terms & Conditions</a> </li>
              <li> <a href="<?php echo $siteurl_link; ?>/refund-policy.php">Refund Policy</a> </li>
              <li> <a href="<?php echo $siteurl_link; ?>/shipping-policy.php">Shipping Policy</a> </li>
            </ul>
          </div>
          <!-- /Footer Widget -->
        </div>
        <div class="col-lg-2 col-md-6" <?php if(isMobileDevice()) { ?> style="width:50%" <?php } ?>>
          <!-- Footer Widget -->
          <div class="footer-widget <?php if(isMobileDevice()) { } else { ?> footer-menu <?php } ?>">
            <h4 class="footer-title">Other Links</h4>
            <ul>
              <li> <a href="<?php echo $siteurl_link; ?>/dplay-venue.php">Sports Venue</a> </li>
              <li> <a href="<?php echo $siteurl_link; ?>/dplay-coach.php">Coaches</a> </li>
              <li> <a href="<?php echo $siteurl_link; ?>/login.php">Login</a> </li>
              <li> <a href="<?php echo $siteurl_link; ?>/register.php">Register</a> </li>
            </ul>
          </div>
          <!-- /Footer Widget -->
        </div>
        <div class="col-lg-2 col-md-6" <?php if(isMobileDevice()) { ?> style="width:50%" <?php } ?>>
          <!-- Footer Widget -->
          <div class="footer-widget <?php if(isMobileDevice()) { } else { ?> footer-menu <?php } ?>">
            <h4 class="footer-title">Our Locations</h4>
            <ul>
              <?php 
			  $coun=mysqli_query($con,"select distinct(city) from venue_master where status = '1' order by rand() limit 5");
			  while($Fcoun=mysqli_fetch_array($coun)) { ?>
              <a href="<?php echo $siteurl_link; ?>/venue-search.php?city=<?php echo $Fcoun['city']; ?>">&nbsp;<?php echo $Fcoun['city']; ?></a>
              <?php } ?>
            </ul>
          </div>
          <!-- /Footer Widget -->
        </div>
        <div class="col-lg-3 col-md-6" <?php if(isMobileDevice()) { ?> style="width:50%" <?php } ?>>
          <!-- Footer Widget -->
          <?php 
			$ure=mysqli_query($con,"select * from company_master");
			$row=mysqli_fetch_array($ure); ?>
          <div class="footer-widget <?php if(isMobileDevice()) { } else { ?> footer-menu <?php } ?>">
            <h4 class="footer-title">Contact us</h4>
            <div class="footer-address-blk">
              <div class="footer-call"> <span>Customer Care No</span>
                <p><?php echo $row['mobile1']; ?></p>
              </div>
              <div class="footer-call"> <span>Need email Suppot</span>
                <p><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></p>
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
        <?php /*?><div class="col-lg-2 col-md-6">
          <!-- Footer Widget -->
          <div class="footer-widget <?php if(isMobileDevice()) { } else { ?> footer-menu <?php } ?>">
            <h4 class="footer-title">Download</h4>
            <ul>
              <li> <a href="#"><img src="assets/img/icons/icon-apple.svg" alt="Apple"></a> </li>
              <li> <a href="#"><img src="assets/img/icons/google-icon.svg" alt="Google"></a> </li>
            </ul>
          </div>
          <!-- /Footer Widget -->
        </div><?php */?>
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
              <p class="mb-0">Copyrights &copy; <?php echo date('Y'); ?> DPlays  - All rights reserved.</p>
            </div>
          </div>
          <div class="col-md-6"> </div>
        </div>
      </div>
      <!-- /Copyright -->
    </div>
  </div>
  <!-- /Footer Bottom -->
</footer>
<?php if(isMobileDevice()) { ?>
<style>
.footer-menu li{  float: left; width: 25%; }
</style>
<link href="footericon/modules/css/style.css" type="text/css" rel="stylesheet" media="screen" id="main-style" />
<?php $pg = basename($_SERVER['PHP_SELF']); ?>
<?php if($pg == 'venue-detail.php') { ?>
<div class="footer-menu circular" style="background-color:#e5e1e1">
  <ul>
    <li> <a href="#bookcourt"> <img src="images/booknow.png" style="height:25px;" /> <span>Book Court</span> </a> </li>
    <li> <a href="#bookmembership"> <img src="images/view-coach-img.png" style="height:25px;" /> <span>Membership</span> </a> </li>
    <li> <a href="#callnow"> <img src="images/callnow.png" style="height:25px;" /> <span>Call Now</span> </a> </li>
    <li> <a href="login.php"> <img src="images/manage-master-img.png" style="height:25px;" /> <span>Account</span> </a> </li>
  </ul>
</div>
<?php } else { ?>
<div class="footer-menu circular" style="background-color:#e5e1e1">
  <ul>
    <li> <a href="<?php echo $siteurl_link; ?>/dplay-venue.php" > <img src="images/manage-venue-img.png" style="height:25px;" /> <span>Venue</span> </a> </li>
    <li> <a href="<?php echo $siteurl_link; ?>/dplay-coach.php" > <img src="images/view-coach-img.png" style="height:25px;" /> <span>Coach</span> </a> </li>
    <li> <a href="<?php echo $siteurl_link; ?>/dplay-events.php" > <img src="images/manage-event-img.png" style="height:25px;" /> <span>Event</span> </a> </li>
    <li> <a href="<?php echo $siteurl_link; ?>/login.php"> <img src="images/manage-master-img.png" style="height:25px;" /> <span>Account</span> </a> </li>
  </ul>
</div>
<?php } ?>
<?php } ?>
