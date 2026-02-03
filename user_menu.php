<style>.iconsize { width: 50px !important; height: 50px !important; } </style>
<ul>
  <li> <a href="my-profile.php" > <img src="icon/manage-master-img.png" alt="Icon" class="iconsize"> <span>Profile</span> </a> </li>
  <li> <a href="my-court.php"> <img src="icon/view-court-img.png" alt="Icon" class="iconsize"> <span>Courts</span> </a> </li>
  <li> <a href="my-membership.php" > <img src="icon/membership-payment-img.png" alt="Icon" class="iconsize"> <span>Membership</span> </a> </li>
  <li> <a href="my-coach.php" > <img src="icon/view-coach-img.png" alt="Icon" class="iconsize"> <span>Coach</span> </a> </li>
  <li> <a href="my-event.php" > <img src="icon/manage-event-img.png" alt="Icon" class="iconsize"> <span>Event</span> </a> </li>
  <li> <a href="my-favorite-dplay-venue.php"> <img src="icon/Favorite-venue.png" alt="Icon" class="iconsize"> <span>Favorite Venue</span> </a> </li>
  <li> <a href="my-password.php"> <img src="icon/manage-website-img.png" alt="Icon" class="iconsize"> <span>Change Password</span> </a> </li>
  <?php $user_type = $_SESSION['user_type']; if($user_type == 'coach') { ?>
  <li> <a href="my-batch.php" > <img src="icon/mybatch.jpg" alt="Icon" class="iconsize"> <span>My Batch</span> </a> </li>
  <li> <a href="my-batch-user.php" > <img src="icon/package-img.png" alt="Icon" class="iconsize"> <span>My Batch User</span> </a> </li>
  <li> <a href="my-coach-earning.php" > <img src="icon/court-payment-img.png" alt="Icon" class="iconsize"> <span>My Earning</span> </a> </li>
  <li> <a href="my-coach-inquiry.php" > <img src="icon/view-customer-img.png" alt="Icon" class="iconsize"> <span>My Inquiry</span> </a> </li>
  <?php } ?>
</ul>
<?php /*?>class="active"<?php */?>
