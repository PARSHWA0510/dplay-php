<?php date_default_timezone_set('Asia/Kolkata');  $today_datetime = date('Y-m-d H:i:s');  $today_date = date('Y-m-d'); $today_time = date('H:i:s'); ?>
<?php $todaydatetime = date('Y-m-d H:i:s'); $user_id = $_SESSION['user_id']; ?>
<?php $pageName = basename($_SERVER['PHP_SELF']); 
$ureurl=mysqli_query($con,"select * from website_url");
$rowurl=mysqli_fetch_array($ureurl);
$siteurl_link = $rowurl['url_link']; 
?>
<?php   
    function isMobileDevice() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
    ?>
<?php if(isMobileDevice()) { ?>
<style>
.breadcrumb {
	padding: 10px 0 !important;
}
.breadcrumb h1 { margin-bottom:5px !important; }
</style>
<?php } ?>
<style>
a.tooltipt1 {outline:none; }

a.tooltipt1:hover {text-decoration:none;} 
a.tooltipt1 span {
    z-index:10;display:none; padding:5px;
    margin-top:0px; margin-left:-50px;
    width:200px; text-align:left;
}
a.tooltipt1:hover span{
    display:inline; position:absolute; color:#111;
    border:1px solid #DCA; background:#fffAF0;}
.callout {z-index:20;position:absolute;top:30px;border:0;left:-12px;}
    
/*CSS3 extras*/
a.tooltipt1 span
{
    border-radius:4px;
    box-shadow: 5px 5px 8px #CCC;
}

a.tooltipt2 {outline:none; }

a.tooltipt2:hover {text-decoration:none;} 
a.tooltipt2 span {
    z-index:10;display:none; padding:5px;
    margin-top:0px; margin-left:-50px;
    width:200px; text-align:left;
}
a.tooltipt2:hover span{
    display:inline; position:absolute; color:#111;
    border:1px solid #DCA; background:#fffAF0;}
.callout {z-index:20;position:absolute;top:30px;border:0;left:-12px;}
    
/*CSS3 extras*/
a.tooltipt2 span
{
    border-radius:4px;
    box-shadow: 5px 5px 8px #CCC;
}
</style>
<header class="header <?php if($pageName == 'indexz.php') { ?> header-trans <?php } else { ?> header-sticky <?php } ?>">
<div class="container-fluid">
  <nav class="navbar navbar-expand-lg header-nav">
    <?php 
if($pageName == 'venue-detail.php') 
{ 
$id = $_GET['id'];
$ure=mysqli_query($con,"select * from venue_master where seo_url = '$id'");
$row=mysqli_fetch_array($ure);
$company_logo = $row['logo_img']; 
$company_name = $row['name']; 
}
else
{
$ure=mysqli_query($con,"select * from company_master");
$row=mysqli_fetch_array($ure);
$company_logo = $row['company_logo']; 

}
?>
    <div class="navbar-header"> <a id="mobile_btn" href="javascript:void(0);"> <span class="bar-icon"> <span></span> <span></span> <span></span> </span> </a> <a href="<?php echo $siteurl_link; ?>/" class="navbar-brand logo"> <img src="<?php echo $siteurl_link; ?>/images/<?php echo $company_logo; ?>" class="img-fluid"  style=" <?php if(isMobileDevice()) { ?> height:60px; <?php } else { ?> height:80px; <?php } ?> "> </a> <span style=" <?php if(isMobileDevice()) { ?> font-size:18px; <?php } else { ?> font-size:24px; <?php } ?> font-weight:bold"><?php echo $company_name; ?></span> </div>
    <div class="main-menu-wrapper">
      <div class="menu-header"> <a href="<?php echo $siteurl_link; ?>/" class="menu-logo"> <img src="<?php echo $siteurl_link; ?>/images/<?php echo $company_logo; ?>"  style="width:80px" class="img-fluid"> </a> <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a> </div>
      <ul class="main-nav">
        <li><a href="<?php echo $siteurl_link; ?>/">Home</a></li>
        <li><a href="<?php echo $siteurl_link; ?>/dplay-venue.php">Venue</a></li>
        <li><a href="<?php echo $siteurl_link; ?>/dplay-events.php">Events</a></li>
        <li><a href="<?php echo $siteurl_link; ?>/dplay-coach.php">Coach</a></li>
        <li><a href="<?php echo $siteurl_link; ?>/blog.php">Blog</a></li>
        <li class="has-submenu"> <a href="#">About Us <i class="fas fa-chevron-down"></i></a>
          <ul class="submenu">
            <li><a href="<?php echo $siteurl_link; ?>/about-us.php">About Us</a></li>
            <li><a href="<?php echo $siteurl_link; ?>/services.php">Our Services</a></li>
            <li><a href="<?php echo $siteurl_link; ?>/testimonials.php">Testimonials</a></li>
            <li><a href="<?php echo $siteurl_link; ?>/contact-us.php">Contact Us</a></li>
          </ul>
        </li>
        <?php if($user_id == '') { ?>
        <li class="login-link"> <a href="<?php echo $siteurl_link; ?>/register.php">Sign Up</a> </li>
        <li class="login-link"> <a href="<?php echo $siteurl_link; ?>/login.php">Sign In</a> </li>
        <?php } else { ?>
        <li class="login-link"> <a href="<?php echo $siteurl_link; ?>/my-profile.php">My Profile</a> </li>
        <li class="login-link"> <a href="<?php echo $siteurl_link; ?>/logout.php">Logout</a> </li>
        <?php } ?>
      </ul>
    </div>
    <ul class="nav header-navbar-rht">
      <li class="nav-item">
        <div class="nav-link btn btn-white log-register" style="margin-right:10px;"><a href="<?php echo $siteurl_link; ?>/contact-us.php">Host Venue</a> </div>
        <?php if($user_id == '') { ?>
        <div class="nav-link btn btn-white log-register"> <a href="<?php echo $siteurl_link; ?>/login.php"><span><i class="feather-users"></i></span>Login</a> / <a href="register.php">Register</a> </div>
        <?php } else { ?>
        <div class="nav-link btn btn-white log-register" style="padding: 7px 10px; margin-right: 10px;"> <a href="<?php echo $siteurl_link; ?>/court-payment.php"><img src="<?php echo $siteurl_link; ?>/images/cart.png"  style="width:30px;" /></a> </div>
        <div class="nav-link btn btn-white log-register"> <a href="<?php echo $siteurl_link; ?>/my-profile.php"><span><i class="feather-users"></i></span>My Profile</a> / <a href="<?php echo $siteurl_link; ?>/logout.php">Logout</a> </div>
        <?php } ?>
      </li>
      <?php /*?><li class="nav-item"> <a class="nav-link btn btn-secondary" href="register-dplay-venue.php"><span><i class="feather-check-circle"></i></span>List Your Venue</a> </li><?php */?>
    </ul>
  </nav>
</div>
</header>
