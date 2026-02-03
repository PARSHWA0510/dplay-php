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
		<div class="breadcrumb mb-0">
			<span class="primary-right-round"></span>
			<div class="container">
				<h1 class="text-white">My Order</h1>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li>My Order</li>
				</ul>
			</div>
		</div>
		<!-- /Breadcrumb -->
		<section class="booking-steps py-30">
			<div class="container">
				<ul class="d-xl-flex justify-content-center align-items-center">
					<li><h5><a href="court-detail.php"><span>1</span>Court List</a></h5></li>
					<li><h5><a href="coach-timedate.php"><span>2</span>Time & Date</a></h5></li>
					<li><h5><a href="coach-personalinfo.php"><span>3</span>Personal Information</a></h5></li>
					<li class="active"><h5><a href="coach-order-confirm.php"><span>4</span>Order Confirmation</a></h5></li>
					<li><h5><a href="coach-payment.php"><span>5</span>Payment</a></h5></li>
				</ul>
			</div>
		</section>

		<!-- Page Content -->
		<div class="content">
			<div class="container">
				<section class="card mb-40">
					<div class="text-center mb-40">
						<h3 class="mb-1">Order Confirmation</h3>
						<p class="sub-title">Booking confirmed. Contact support for changes/inquiries. Enjoy your coaching experience with us.</p>
					</div>
					
                    
				</section>
				<section class="card booking-order-confirmation">
					<h5 class="mb-3">Booking Details</h5>
					<ul class="booking-info d-lg-flex justify-content-start align-items-center">
						<li>
							<h6>Court Name</h6>
							<p>C Name</p>
						</li>
						<li>
							<h6>Appointment Date</h6>
							<p>Mon, May 27</p>
						</li>
						<li>
							<h6>Appointment Start time</h6>
							<p>05:25 AM</p>
						</li>
						<li>
							<h6>Appointment End time</h6>
							<p>06:25 AM</p>
						</li>
					</ul>
					<h5 class="mb-3">Contact  Information</h5>
					<ul class="contact-info d-lg-flex justify-content-start align-items-center">
						<li>
							<h6>Name</h6>
							<p>name Here</p>
						</li>
						<li>
							<h6>Contact Email Address</h6>
							<p><a href="" class="__cf_email__">abc@gmail.com</a></p>
						</li>
						<li>
							<h6>Phone Number</h6>
							<p>+91 98989 98989</p>
						</li>
					</ul>
					<h5 class="mb-3">Payment Information</h5>
					<ul class="payment-info d-lg-flex justify-content-start align-items-center">
						<li>
							<h6>Court Price</h6>
							<p class="primary-text">(Rs 150 * 3 hours)</p>
						</li>
						<li>
							<h6>Subtotal</h6>
							<p class="primary-text">Rs 350.00</p>
						</li>
					</ul>
				</section>
				<div class="text-center btn-row">
					<a class="btn btn-primary me-3 btn-icon" href="court-personalinfo.php"><i class="feather-arrow-left-circle me-1"></i> Back</a>
					<a class="btn btn-secondary btn-icon" href="court-payment.php">Next <i class="feather-arrow-right-circle ms-1"></i></a>
				</div>
			</div>
			<!-- /Container -->
		</div>
		<!-- /Page Content -->

		<!-- Footer -->
		
        <?php include 'footer.php' ?>
		<!-- /Footer -->

	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.1.min.js" type="19b33238896e10ab3b803725-text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/bootstrap.bundle.min.js" type="19b33238896e10ab3b803725-text/javascript"></script>

	<!-- Select JS -->
	<script src="assets/plugins/select2/js/select2.min.js" type="19b33238896e10ab3b803725-text/javascript"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js" type="19b33238896e10ab3b803725-text/javascript"></script>

<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="19b33238896e10ab3b803725-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b858e6cccbc188","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
