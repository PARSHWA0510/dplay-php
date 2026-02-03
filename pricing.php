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
	<div class="main-wrapper pricing-page">

		<!-- Header -->
		
        <?php include 'header.php' ?>
		<!-- /Header -->

		<!-- Breadcrumb -->
		<div class="breadcrumb breadcrumb-list mb-0">
			<span class="primary-right-round"></span>
			<div class="container">
				<h1 class="text-white">Pricing</h1>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li>Pricing</li>
				</ul>
			</div>
		</div>
		<!-- /Breadcrumb -->

		<!-- Page Content -->
		<div class="content">
			<!-- Featured Plans -->
			<section class="featured-plan">
				<div class="container">
					<div class="section-heading">
						<h2>We Have Excellent Plans For You.</h2>
						<p class="sub-title">Choose monthly or yearly plans for uninterrupted access to our premium badminton facilities. Join us and experience convenient excellence.</p>
					</div>
					<div class="interset-btn">
						<div class="status-toggle d-inline-flex align-items-center">
							Monthly
							<input type="checkbox" id="status_1" class="check">
							<label for="status_1" class="checktoggle">checkbox</label>
							Yearly
						</div>
					</div>
					<div class="price-wrap">
						<div class="row d-flex justify-content-center">
							<div class="col-lg-4 d-flex col-md-6">

								<!-- Price Card -->
							    <div class="price-card flex-fill ">
									<div class="price-head">
										<img  src="assets/img/icons/price-01.svg" alt="Price">
										<h3>Professoinal</h3>						
									</div>	
									<div class="price-body">
										<div class="per-month">
											<h2><sup>$</sup><span>60.00</span></h2>
											<span>Per Month</span>
										</div>
										<div class="features-price-list">
											<h5>Features</h5>
											<p>Everything in our free Upto 10 users. </p>
											<ul>
												<li class="active"><i class="feather-check-circle"></i>Included : Quality checked by envato</li>
												<li class="active"><i class="feather-check-circle"></i>Included : Future updates</li>
												<li class="active"><i class="feather-check-circle"></i>Technical Support</li>
												<li class="inactive"><i class="feather-x-circle"></i>Add Listing </li>
												<li class="inactive"><i class="feather-x-circle"></i>Approval of Listing</li>
											</ul>
										</div>
										<div class="price-choose">
											<a href="javascript:;" class="btn viewdetails-btn">Choose Plan</a>
										</div>
										<div class="price-footer">
											<p class="mb-0">Use, by you or one client, in a single end product which end users.  charged for. The total price includes the item price and a buyer fee.</p>
										</div>							
									</div>							
							    </div>
								<!-- /Price Card -->

							</div>
							<div class="col-lg-4 d-flex col-md-6">

								<!-- Price Card -->
							    <div class="price-card flex-fill">
									<div class="price-head expert-price">
										<img  src="assets/img/icons/price-02.svg" alt="Price">
										<h3>Expert</h3>	
										<span>Recommended</span>					
									</div>	
									<div class="price-body">
										<div class="per-month">
											<h2><sup>$</sup><span>60.00</span></h2>
											<span>Per Month</span>
										</div>
										<div class="features-price-list">
											<h5>Features</h5>
											<p>Everything in our free Upto 10 users. </p>
											<ul>
												<li class="active"><i class="feather-check-circle"></i>Included : Quality checked by envato</li>
												<li class="active"><i class="feather-check-circle"></i>Included : Future updates</li>
												<li class="active"><i class="feather-check-circle"></i>Technical Support</li>
												<li class="inactive"><i class="feather-x-circle"></i>Add Listing </li>
												<li class="inactive"><i class="feather-x-circle"></i>Approval of Listing</li>
											</ul>
										</div>
										<div class="price-choose active-price">
											<a href="javascript:;" class="btn viewdetails-btn">Choose Plan</a>
										</div>
										<div class="price-footer">
											<p class="mb-0">Use, by you or one client, in a single end product which end users.  charged for. The total price includes the item price and a buyer fee.</p>
										</div>							
									</div>							
							    </div>
								<!-- /Price Card -->
								
							</div>
							<div class="col-lg-4 d-flex col-md-6">

								<!-- Price Card -->
							    <div class="price-card flex-fill">
									<div class="price-head">
										<img  src="assets/img/icons/price-03.svg" alt="Price">
										<h3>Enterprise</h3>						
									</div>	
									<div class="price-body">
										<div class="per-month">
											<h2><sup>$</sup><span>990.00</span></h2>
											<span>Per Month</span>
										</div>
										<div class="features-price-list">
											<h5>Features</h5>
											<p>Everything in our free Upto 10 users. </p>
											<ul>
												<li class="active"><i class="feather-check-circle"></i>Included : Quality checked by envato</li>
												<li class="active"><i class="feather-check-circle"></i>Included : Future updates</li>
												<li class="active"><i class="feather-check-circle"></i>Technical Support</li>
												<li class="active"><i class="feather-check-circle"></i>Add Listing </li>
												<li class="active"><i class="feather-check-circle"></i>Approval of Listing</li>
											</ul>
										</div>
										<div class="price-choose">
											<a href="javascript:;" class="btn viewdetails-btn">Choose Plan</a>
										</div>
										<div class="price-footer">
											<p class="mb-0">Use, by you or one client, in a single end product which end users.  charged for. The total price includes the item price and a buyer fee.</p>
										</div>							
									</div>							
							    </div>
								<!-- /Price Card -->
								
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Featured Plans -->
		</div>
		<!-- /Page Content -->
		<!-- Footer -->
		
        <?php include 'footer.php' ?>
		<!-- /Footer -->
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="assets/js/jquery-3.7.1.min.js" type="0ab8512404a1191dea007cf4-text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/bootstrap.bundle.min.js" type="0ab8512404a1191dea007cf4-text/javascript"></script>

	<!-- Select JS -->
	<script src="assets/plugins/select2/js/select2.min.js" type="0ab8512404a1191dea007cf4-text/javascript"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js" type="0ab8512404a1191dea007cf4-text/javascript"></script>

<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="0ab8512404a1191dea007cf4-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b85701cf89c188","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>

</html>
