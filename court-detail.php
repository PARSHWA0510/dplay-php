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
				<h1 class="text-white">Book A Court</h1>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li>Book A Court</li>
				</ul>
			</div>
		</div>
		<!-- /Breadcrumb -->
		<section class="booking-steps py-30">
			<span class="primary-right-round"></span>
			<div class="container">
				<ul class="d-xl-flex justify-content-center align-items-center">
					<li class="active"><h5><a href="court-detail.php"><span>1</span>Court List</a></h5></li>
					<li><h5><a href="coach-timedate.php"><span>2</span>Time & Date</a></h5></li>
					<li><h5><a href="coach-personalinfo.php"><span>3</span>Personal Information</a></h5></li>
					<li><h5><a href="coach-order-confirm.php"><span>4</span>Order Confirmation</a></h5></li>
					<li><h5><a href="coach-payment.php"><span>5</span>Payment</a></h5></li>
				</ul>
			</div>
		</section>

		<!-- Page Content -->
		<div class="content book-cage">
			<div class="container">
				
				<section class="text-center coach-types">
					<div class="border-block">


						<div class="table-responsive">
										<table class="table table-borderless datatable">
											<thead class="thead-light">
												<tr>
												   <th>Court Name</th>
												   <th>Location</th>
												   <th>Amount</th>
												   <th>Max Guest</th>
												   <th>Additional Guests</th>
												   <th>Added On</th>
												   <th>Details</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm  flex-shrink-0"><img class="avatar-img" src="assets/img/booking/booking-01.jpg" alt="User"></a>
															<span class="table-head-name flex-grow-1">
																<a href="#">Leap Sports Academy</a>
																<span>Court 1</span>
															</span>
														</h2>
													</td>
													<td>Vejalpur</td>
													<td><span class="pay-dark">Rs 150</span></td>	
													<td >1</td>
													<td>2</td>
													<td>Mon, Jul 12</td>
													<td class="text-pink view-detail-pink"><a href="court-timedate.php"><i class="feather-eye"></i>View Details</a></td>
													
													
												</tr>
                                                
                                                <tr>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm  flex-shrink-0"><img class="avatar-img" src="assets/img/booking/booking-01.jpg" alt="User"></a>
															<span class="table-head-name flex-grow-1">
																<a href="#">Leap Sports Academy</a>
																<span>Court 1</span>
															</span>
														</h2>
													</td>
													<td>Vejalpur</td>
													<td><span class="pay-dark">Rs 150</span></td>	
													<td >1</td>
													<td>2</td>
													<td>Mon, Jul 12</td>
													<td class="text-pink view-detail-pink"><a href="court-timedate.php"><i class="feather-eye"></i>View Details</a></td>
													
													
												</tr>
                                                <tr>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm  flex-shrink-0"><img class="avatar-img" src="assets/img/booking/booking-01.jpg" alt="User"></a>
															<span class="table-head-name flex-grow-1">
																<a href="#">Leap Sports Academy</a>
																<span>Court 1</span>
															</span>
														</h2>
													</td>
													<td>Vejalpur</td>
													<td><span class="pay-dark">Rs 150</span></td>	
													<td >1</td>
													<td>2</td>
													<td>Mon, Jul 12</td>
													<td class="text-pink view-detail-pink"><a href="court-timedate.php"><i class="feather-eye"></i>View Details</a></td>
													
													
												</tr>
                                                <tr>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm  flex-shrink-0"><img class="avatar-img" src="assets/img/booking/booking-01.jpg" alt="User"></a>
															<span class="table-head-name flex-grow-1">
																<a href="#">Leap Sports Academy</a>
																<span>Court 1</span>
															</span>
														</h2>
													</td>
													<td>Vejalpur</td>
													<td><span class="pay-dark">Rs 150</span></td>	
													<td >1</td>
													<td>2</td>
													<td>Mon, Jul 12</td>
													<td class="text-pink view-detail-pink"><a href="court-timedate.php"><i class="feather-eye"></i>View Details</a></td>
													
													
												</tr>
                                                <tr>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm  flex-shrink-0"><img class="avatar-img" src="assets/img/booking/booking-01.jpg" alt="User"></a>
															<span class="table-head-name flex-grow-1">
																<a href="#">Leap Sports Academy</a>
																<span>Court 1</span>
															</span>
														</h2>
													</td>
													<td>Vejalpur</td>
													<td><span class="pay-dark">Rs 150</span></td>	
													<td >1</td>
													<td>2</td>
													<td>Mon, Jul 12</td>
													<td class="text-pink view-detail-pink"><a href="court-timedate.php"><i class="feather-eye"></i>View Details</a></td>
													
													
												</tr> 
											</tbody>
										</table>
									</div>
					</div>
					
				</section>
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
	<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.1.min.js" type="6284b2f55dba56798410e9b4-text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/bootstrap.bundle.min.js" type="6284b2f55dba56798410e9b4-text/javascript"></script>

	<!-- Select JS -->
	<script src="assets/plugins/select2/js/select2.min.js" type="6284b2f55dba56798410e9b4-text/javascript"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js" type="6284b2f55dba56798410e9b4-text/javascript"></script>

<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="6284b2f55dba56798410e9b4-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b856c0fdf8a8b0","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>

</html>
