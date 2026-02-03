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
	<title>DreamSports</title>

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

	<!-- Select CSS -->
	<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

	<!-- Bootstrap DateTime Picker -->
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="assets/css/feather.css">

	<!-- Fancybox CSS -->
	<link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
	<div id="global-loader" >
		<div class="loader-img">
			<img src="assets/img/loader.png" class="img-fluid" alt="">
		</div>
	</div>

	<!-- Main Wrapper -->
	<div class="main-wrapper add-court venue-coach-details">

		<!-- Header -->
		
        <?php include 'header.php' ?>
		<!-- /Header -->

		<!-- Breadcrumb -->
		<div class="breadcrumb breadcrumb-list mb-0">
			<span class="primary-right-round"></span>
			<div class="container">
				<h1 class="text-white">List Your Court</h1>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li>List Your Court</li>
				</ul>
			</div>
		</div>
		<!-- /Breadcrumb -->		

		<!-- Page Content -->
		<div class="content">
			<div class="container">
				<!-- Row -->
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12">
						<div class="venue-options option-list-court white-bg">
							<ul class="clearfix">
								<li class="active"><a href="#basic-info">Basic Info</a></li>
								<li><a href="#venue-price">Venue Price</a></li>
								<li><a href="#availability">Availability</a></li>
								<li><a href="#overview">Overview</a></li>
								<li><a href="#includes">Includes</a></li>
								<li><a href="#rules">Rules</a></li>
								<li><a href="#amenities">Amenities</a></li>
								<li><a href="#gallery">Gallery</a></li>
								<li><a href="#location">Locations</a></li>
							</ul>
						</div>

						<!-- Accordian Contents -->
						<form action="#" class="accordion" id="accordionPanel">
							<div class="accordion-item mb-4" id="basic-info">
							    <h4 class="accordion-header" id="panelsStayOpen-basic-info">
							      	<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">Basic Info
							      	</button>
							    </h4>
							    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-basic-info">
							      	<div class="accordion-body">
							      		<div class="row">
							      			<div class="col-lg-6 col-md-6">
												<div class="input-space mb-0">
													<label for="court-name" class="form-label">Court Name <span>*</span></label>
													<input type="text" class="form-control" id="court-name" placeholder="Enter Court Name">
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="input-space mb-0">
													<label  class="form-label">Court Type <span>*</span></label>
													<select class="select">
														<option>Select Court Type</option>
														<option>Tornoto</option>
														<option>Texas</option>
													</select>
												</div>
											</div>
							      		</div>
							      	</div>
							    </div>
							</div>
							<div class="accordion-item mb-4" id="venue-price">
							    <h4 class="accordion-header" id="panelsStayOpen-venue-price">
							      	<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">Venue Price  <span>(USD)</span>
							      	</button>
							    </h4>
							    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-venue-price">
							      	<div class="accordion-body">
							      		<div class="row">
							      			<div class="col-lg-6 col-md-6">
												<div class="input-space">
													<label for="starting-price" class="form-label">Starting Price (Per Hour)</label>
													<input type="text" class="form-control" id="starting-price" placeholder="Enter Price">
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="input-space">
													<label for="name" class="form-label">Max Guests</label>
													<input type="text" class="form-control" id="max-guests" placeholder="Enter Max Number of Guests">
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="input-space mb-0">
													<label for="additional-guests" class="form-label">Additional Guests</label>
													<input type="text" class="form-control" id="additional-guests" placeholder="No Additional Guests">
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="input-space mb-0">
													<label for="name" class="form-label">Price of Extra Guest (Per Hour)</label>
													<input type="text" class="form-control" id="name" placeholder="Enter Price of Extra Guests">
												</div>
											</div>
							      		</div>
							      	</div>
							    </div>
							</div>
							<div class="accordion-item mb-4" id="availability">
							    <h4 class="accordion-header" id="panelsStayOpen-availability">
							      	<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">Availability
							      	</button>
							    </h4>
							    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-availability">
							      	<div class="accordion-body">
							      		<!-- Profile Availability -->
										<div class="row">
											<div class="col-md-12">
												<div class="profile-availability">
													<div class="select-days">
														<h4>Select Days</h4>
														<ul class="day-list">
															<li>
																<div class="day-selection">
																	<input type="checkbox" value="attach_link" id="select_days_1" name="day" checked>
																	<label for="select_days_1">
																		Mon
																	</label>
																</div>
															</li>
															<li>
																<div class="day-selection">
																	<input type="checkbox" value="attach_link" id="select_days_2" name="day">
																	<label for="select_days_2">
																		Tues
																	</label>
																</div>
															</li>
															<li>
																<div class="day-selection">
																	<input type="checkbox" value="attach_link" id="select_days_3" name="day">
																	<label for="select_days_3">
																		Wed
																	</label>
																</div>
															</li>
															<li>
																<div class="day-selection">
																	<input type="checkbox" value="attach_link" id="select_days_4" name="day">
																	<label for="select_days_4">
																		Thur
																	</label>
																</div>
															</li>
															<li>
																<div class="day-selection">
																	<input type="checkbox" value="attach_link" id="select_days_5" name="day">
																	<label for="select_days_5">
																		Fri
																	</label>
																</div>
															</li>
															<li>
																<div class="day-selection">
																	<input type="checkbox" value="attach_link" id="select_days_6" name="day">
																	<label for="select_days_6">
																		Sat
																	</label>
																</div>
															</li>
															<li>
																<div class="day-selection">
																	<input type="checkbox" value="attach_link" id="select_days_7" name="day">
																	<label for="select_days_7">
																		Sun
																	</label>
																</div>
															</li>
														</ul>
													</div>
													<div class="accordion setting-accordion">

														<!-- Monday -->
														<div class="accordion-item" id="day-monday">
															<div class="accordion-header">
																<div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#monday">
																	<div class="interset-btn empty-space">
																		<div class="status-toggle d-inline-flex align-items-center">
																			<input type="checkbox" id="status_1" class="check">
																			<label for="status_1" class="checktoggle">checkbox</label>
																		</div>
																	</div>
																	<span class="accord-title">Monday</span>
																	<a href="#">Edit</a>
																</div>
															</div>
															<div id="monday" class="accordion-collapse collapse">
																<div class="accordion-body">
																	<div class="row gx-2">
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">Duration <span class="text-danger">*</span></label>
																				<select class="select">
																					<option>1 Hrs</option>
																					<option>2 Hrs</option>
																					<option>3 Hrs</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">Start Time <span class="text-danger">*</span></label>
																				<div class="form-icon">
																					<input type="text" class="form-control datetimepicker1" placeholder="Select time">
																				</div>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">End Time  <span class="text-danger">*</span></label>
																				<div class="form-icon">
																					<input type="text" class="form-control datetimepicker1" placeholder="Select time">
																				</div>
																			</div>
																		</div>
																		<div class="col-md-12">
																			<h4>Available Timings</h4>
																			<div class="token-slot mt-2">
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input"  value="18">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="06:00 AM">06:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:00:00" data-end-time="15:20:00" data-session="1" name="token[]" value="19">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="07:00 AM">07:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:20:00" data-end-time="15:40:00" data-session="1" name="token[]" value="20">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="08:00 AM">08:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:40:00" data-end-time="16:00:00" data-session="1" name="token[]" value="21">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="09:00 AM">09:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:00:00" data-end-time="16:20:00" data-session="1" name="token[]" value="22">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="10:00 AM">10:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:20:00" data-end-time="16:40:00" data-session="1" name="token[]" value="23">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="11:00 PM">11:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:40:00" data-end-time="17:00:00" data-session="1" name="token[]" value="24">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="12:00 PM">12:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:00:00" data-end-time="17:20:00" data-session="1" name="token[]" value="25">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="01:00 PM">01:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:20:00" data-end-time="17:40:00" data-session="1" name="token[]" value="26">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="02:00 PM">02:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:40:00" data-end-time="18:00:00" data-session="1" name="token[]" value="27">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="03:00 PM">03:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:00:00" data-end-time="18:20:00" data-session="1" name="token[]" value="28">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="04:00 PM">04:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:20:00" data-end-time="18:40:00" data-session="1" name="token[]" value="29">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="05:00 PM">05:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:40:00" data-end-time="19:00:00" data-session="1" name="token[]" value="30">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="06:00 PM">06:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="19:00:00" data-end-time="19:20:00" data-session="1" name="token[]" value="31">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="07:00 PM">07:00 PM</span>
																					</label>
																				</div>
																			</div>
																			<div class=" save-time">
																				<a href="#">Save Timings</a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<!-- /Monday -->
							
														<!-- Tuesday -->
														<div class="accordion-item" id="day-tuesday">
															<div class="accordion-header">
																<div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#tuesday">
																	<div class="interset-btn empty-space">
																		<div class="status-toggle d-inline-flex align-items-center">
																			<input type="checkbox" id="status_2" class="check" checked>
																			<label for="status_2" class="checktoggle">checkbox</label>
																		</div>
																	</div>
																	<span class="accord-title">Tuesday</span>
																	<a href="#">Edit</a>
																</div>
															</div>
															<div id="tuesday" class="accordion-collapse collapse show">
																<div class="accordion-body">
																	<div class="row gx-2">
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">Duration <span class="text-danger">*</span></label>
																				<select class="select">
																					<option>1 Hrs</option>
																					<option>2 Hrs</option>
																					<option>3 Hrs</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">Start Time <span class="text-danger">*</span></label>
																				<div class="form-icon">
																					<input type="text" class="form-control datetimepicker1" placeholder="Select time">
																				</div>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">End Time  <span class="text-danger">*</span></label>
																				<div class="form-icon">
																					<input type="text" class="form-control datetimepicker1" placeholder="Select time">
																				</div>
																			</div>
																		</div>
																		<div class="col-md-12">
																			<h4>Available Timings</h4>
																			<div class="token-slot mt-2">
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input"  value="18">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="06:00 AM">06:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:00:00" data-end-time="15:20:00" data-session="1" name="token[]" value="19">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="07:00 AM">07:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:20:00" data-end-time="15:40:00" data-session="1" name="token[]" value="20">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="08:00 AM">08:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:40:00" data-end-time="16:00:00" data-session="1" name="token[]" value="21">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="09:00 AM">09:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:00:00" data-end-time="16:20:00" data-session="1" name="token[]" value="22">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="10:00 AM">10:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:20:00" data-end-time="16:40:00" data-session="1" name="token[]" value="23">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="11:00 PM">11:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:40:00" data-end-time="17:00:00" data-session="1" name="token[]" value="24">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="12:00 PM">12:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:00:00" data-end-time="17:20:00" data-session="1" name="token[]" value="25">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="01:00 PM">01:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:20:00" data-end-time="17:40:00" data-session="1" name="token[]" value="26">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="02:00 PM">02:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:40:00" data-end-time="18:00:00" data-session="1" name="token[]" value="27">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="03:00 PM">03:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:00:00" data-end-time="18:20:00" data-session="1" name="token[]" value="28">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="04:00 PM">04:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:20:00" data-end-time="18:40:00" data-session="1" name="token[]" value="29">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="05:00 PM">05:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:40:00" data-end-time="19:00:00" data-session="1" name="token[]" value="30">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="06:00 PM">06:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="19:00:00" data-end-time="19:20:00" data-session="1" name="token[]" value="31">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="07:00 PM">07:00 PM</span>
																					</label>
																				</div>
																			</div>
																			<div class="save-time">
																				<a href="#">Save Timings</a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<!-- /Tuesday -->
							
														<!-- Wednessday -->
														<div class="accordion-item" id="day-wednesday">
															<div class="accordion-header">
																<div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#wednesday">
																	<div class="interset-btn empty-space">
																		<div class="status-toggle d-inline-flex align-items-center">
																			<input type="checkbox" id="status_3" class="check">
																			<label for="status_3" class="checktoggle">checkbox</label>
																		</div>
																	</div>
																	<span class="accord-title">Wednesday</span>
																	<a href="#">Edit</a>
																</div>
															</div>
															<div id="wednesday" class="accordion-collapse collapse">
																<div class="accordion-body">
																	<div class="row gx-2">
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">Duration <span class="text-danger">*</span></label>
																				<select class="select">
																					<option>1 Hrs</option>
																					<option>2 Hrs</option>
																					<option>3 Hrs</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">Start Time <span class="text-danger">*</span></label>
																				<div class="form-icon">
																					<input type="text" class="form-control datetimepicker1" placeholder="Select time">
																				</div>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">End Time  <span class="text-danger">*</span></label>
																				<div class="form-icon">
																					<input type="text" class="form-control datetimepicker1" placeholder="Select time">
																				</div>
																			</div>
																		</div>
																		<div class="col-md-12">
																			<h4>Available Timings</h4>
																			<div class="token-slot mt-2">
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input"  value="18">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="06:00 AM">06:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:00:00" data-end-time="15:20:00" data-session="1" name="token[]" value="19">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="07:00 AM">07:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:20:00" data-end-time="15:40:00" data-session="1" name="token[]" value="20">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="08:00 AM">08:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:40:00" data-end-time="16:00:00" data-session="1" name="token[]" value="21">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="09:00 AM">09:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:00:00" data-end-time="16:20:00" data-session="1" name="token[]" value="22">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="10:00 AM">10:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:20:00" data-end-time="16:40:00" data-session="1" name="token[]" value="23">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="11:00 PM">11:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:40:00" data-end-time="17:00:00" data-session="1" name="token[]" value="24">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="12:00 PM">12:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:00:00" data-end-time="17:20:00" data-session="1" name="token[]" value="25">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="01:00 PM">01:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:20:00" data-end-time="17:40:00" data-session="1" name="token[]" value="26">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="02:00 PM">02:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:40:00" data-end-time="18:00:00" data-session="1" name="token[]" value="27">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="03:00 PM">03:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:00:00" data-end-time="18:20:00" data-session="1" name="token[]" value="28">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="04:00 PM">04:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:20:00" data-end-time="18:40:00" data-session="1" name="token[]" value="29">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="05:00 PM">05:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:40:00" data-end-time="19:00:00" data-session="1" name="token[]" value="30">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="06:00 PM">06:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="19:00:00" data-end-time="19:20:00" data-session="1" name="token[]" value="31">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="07:00 PM">07:00 PM</span>
																					</label>
																				</div>
																			</div>
																			<div class="save-time">
																				<a href="#">Save Timings</a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<!-- /Wednessday -->
							
														<!-- Thursday -->
														<div class="accordion-item" id="day-thursday">
															<div class="accordion-header">
																<div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#thursday">
																	<div class="interset-btn empty-space">
																		<div class="status-toggle d-inline-flex align-items-center">
																			<input type="checkbox" id="status_4" class="check">
																			<label for="status_4" class="checktoggle">checkbox</label>
																		</div>
																	</div>
																	<span class="accord-title">Thursday</span>
																	<a href="#">Edit</a>
																</div>
															</div>
															<div id="thursday" class="accordion-collapse collapse">
																<div class="accordion-body">
																	<div class="row gx-2">
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">Duration <span class="text-danger">*</span></label>
																				<select class="select">
																					<option>1 Hrs</option>
																					<option>2 Hrs</option>
																					<option>3 Hrs</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">Start Time <span class="text-danger">*</span></label>
																				<div class="form-icon">
																					<input type="text" class="form-control datetimepicker1" placeholder="Select time">
																				</div>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">End Time  <span class="text-danger">*</span></label>
																				<div class="form-icon">
																					<input type="text" class="form-control datetimepicker1" placeholder="Select time">
																				</div>
																			</div>
																		</div>
																		<div class="col-md-12">
																			<h4>Available Timings</h4>
																			<div class="token-slot mt-2">
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input"  value="18">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="06:00 AM">06:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:00:00" data-end-time="15:20:00" data-session="1" name="token[]" value="19">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="07:00 AM">07:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:20:00" data-end-time="15:40:00" data-session="1" name="token[]" value="20">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="08:00 AM">08:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:40:00" data-end-time="16:00:00" data-session="1" name="token[]" value="21">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="09:00 AM">09:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:00:00" data-end-time="16:20:00" data-session="1" name="token[]" value="22">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="10:00 AM">10:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:20:00" data-end-time="16:40:00" data-session="1" name="token[]" value="23">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="11:00 PM">11:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:40:00" data-end-time="17:00:00" data-session="1" name="token[]" value="24">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="12:00 PM">12:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:00:00" data-end-time="17:20:00" data-session="1" name="token[]" value="25">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="01:00 PM">01:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:20:00" data-end-time="17:40:00" data-session="1" name="token[]" value="26">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="02:00 PM">02:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:40:00" data-end-time="18:00:00" data-session="1" name="token[]" value="27">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="03:00 PM">03:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:00:00" data-end-time="18:20:00" data-session="1" name="token[]" value="28">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="04:00 PM">04:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:20:00" data-end-time="18:40:00" data-session="1" name="token[]" value="29">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="05:00 PM">05:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:40:00" data-end-time="19:00:00" data-session="1" name="token[]" value="30">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="06:00 PM">06:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="19:00:00" data-end-time="19:20:00" data-session="1" name="token[]" value="31">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="07:00 PM">07:00 PM</span>
																					</label>
																				</div>
																			</div>
																			<div class=" save-time">
																				<a href="#">Save Timings</a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<!-- /Thursday -->
							
														<!-- Friday -->
														<div class="accordion-item" id="day-friday">
															<div class="accordion-header">
																<div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#friday">
																	<div class="interset-btn empty-space">
																		<div class="status-toggle d-inline-flex align-items-center">
																			<input type="checkbox" id="status_5" class="check">
																			<label for="status_5" class="checktoggle">checkbox</label>
																		</div>
																	</div>
																	<span class="accord-title">Friday</span>
																	<a href="#">Edit</a>
																</div>
															</div>
															<div id="friday" class="accordion-collapse collapse">
																<div class="accordion-body">
																	<div class="row gx-2">
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">Duration <span class="text-danger">*</span></label>
																				<select class="select">
																					<option>1 Hrs</option>
																					<option>2 Hrs</option>
																					<option>3 Hrs</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">Start Time <span class="text-danger">*</span></label>
																				<div class="form-icon">
																					<input type="text" class="form-control datetimepicker1" placeholder="Select time">
																				</div>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">End Time  <span class="text-danger">*</span></label>
																				<div class="form-icon">
																					<input type="text" class="form-control datetimepicker1" placeholder="Select time">
																				</div>
																			</div>
																		</div>
																		<div class="col-md-12">
																			<h4>Available Timings</h4>
																			<div class="token-slot mt-2">
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input"  value="18">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="06:00 AM">06:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:00:00" data-end-time="15:20:00" data-session="1" name="token[]" value="19">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="07:00 AM">07:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:20:00" data-end-time="15:40:00" data-session="1" name="token[]" value="20">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="08:00 AM">08:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:40:00" data-end-time="16:00:00" data-session="1" name="token[]" value="21">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="09:00 AM">09:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:00:00" data-end-time="16:20:00" data-session="1" name="token[]" value="22">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="10:00 AM">10:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:20:00" data-end-time="16:40:00" data-session="1" name="token[]" value="23">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="11:00 PM">11:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:40:00" data-end-time="17:00:00" data-session="1" name="token[]" value="24">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="12:00 PM">12:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:00:00" data-end-time="17:20:00" data-session="1" name="token[]" value="25">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="01:00 PM">01:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:20:00" data-end-time="17:40:00" data-session="1" name="token[]" value="26">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="02:00 PM">02:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:40:00" data-end-time="18:00:00" data-session="1" name="token[]" value="27">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="03:00 PM">03:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:00:00" data-end-time="18:20:00" data-session="1" name="token[]" value="28">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="04:00 PM">04:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:20:00" data-end-time="18:40:00" data-session="1" name="token[]" value="29">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="05:00 PM">05:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:40:00" data-end-time="19:00:00" data-session="1" name="token[]" value="30">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="06:00 PM">06:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="19:00:00" data-end-time="19:20:00" data-session="1" name="token[]" value="31">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="07:00 PM">07:00 PM</span>
																					</label>
																				</div>
																			</div>
																			<div class="save-time">
																				<a href="#">Save Timings</a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<!-- /Friday -->
							
														<!-- Saturday -->
														<div class="accordion-item" id="day-saturday">
															<div class="accordion-header">
																<div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#saturday">
																	<div class="interset-btn empty-space">
																		<div class="status-toggle d-inline-flex align-items-center">
																			<input type="checkbox" id="status_6" class="check">
																			<label for="status_6" class="checktoggle">checkbox</label>
																		</div>
																	</div>
																	<span class="accord-title">Saturday</span>
																	<a href="#">Edit</a>
																</div>
															</div>
															<div id="saturday" class="accordion-collapse collapse">
																<div class="accordion-body">
																	<div class="row gx-2">
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">Duration <span class="text-danger">*</span></label>
																				<select class="select">
																					<option>1 Hrs</option>
																					<option>2 Hrs</option>
																					<option>3 Hrs</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">Start Time <span class="text-danger">*</span></label>
																				<div class="form-icon">
																					<input type="text" class="form-control datetimepicker1" placeholder="Select time">
																				</div>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">End Time  <span class="text-danger">*</span></label>
																				<div class="form-icon">
																					<input type="text" class="form-control datetimepicker1" placeholder="Select time">
																				</div>
																			</div>
																		</div>
																		<div class="col-md-12">
																			<h4>Available Timings</h4>
																			<div class="token-slot mt-2">
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input"  value="18">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="06:00 AM">06:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:00:00" data-end-time="15:20:00" data-session="1" name="token[]" value="19">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="07:00 AM">07:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:20:00" data-end-time="15:40:00" data-session="1" name="token[]" value="20">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="08:00 AM">08:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:40:00" data-end-time="16:00:00" data-session="1" name="token[]" value="21">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="09:00 AM">09:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:00:00" data-end-time="16:20:00" data-session="1" name="token[]" value="22">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="10:00 AM">10:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:20:00" data-end-time="16:40:00" data-session="1" name="token[]" value="23">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="11:00 PM">11:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:40:00" data-end-time="17:00:00" data-session="1" name="token[]" value="24">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="12:00 PM">12:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:00:00" data-end-time="17:20:00" data-session="1" name="token[]" value="25">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="01:00 PM">01:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:20:00" data-end-time="17:40:00" data-session="1" name="token[]" value="26">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="02:00 PM">02:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:40:00" data-end-time="18:00:00" data-session="1" name="token[]" value="27">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="03:00 PM">03:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:00:00" data-end-time="18:20:00" data-session="1" name="token[]" value="28">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="04:00 PM">04:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:20:00" data-end-time="18:40:00" data-session="1" name="token[]" value="29">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="05:00 PM">05:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:40:00" data-end-time="19:00:00" data-session="1" name="token[]" value="30">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="06:00 PM">06:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="19:00:00" data-end-time="19:20:00" data-session="1" name="token[]" value="31">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="07:00 PM">07:00 PM</span>
																					</label>
																				</div>
																			</div>
																			<div class="save-time">
																				<a href="#">Save Timings</a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<!-- /Saturday -->
														
														<!-- Sunday -->
														<div class="accordion-item" id="day-sunday">
															<div class="accordion-header">
																<div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#sunday">
																	<div class="interset-btn empty-space">
																		<div class="status-toggle d-inline-flex align-items-center">
																			<input type="checkbox" id="status_7" class="check">
																			<label for="status_7" class="checktoggle">checkbox</label>
																		</div>
																	</div>
																	<span class="accord-title">Sunday</span>
																	<a href="#">Edit</a>
																</div>
															</div>
															<div id="sunday" class="accordion-collapse collapse">
																<div class="accordion-body">
																	<div class="row gx-2">
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">Duration <span class="text-danger">*</span></label>
																				<select class="select">
																					<option>1 Hrs</option>
																					<option>2 Hrs</option>
																					<option>3 Hrs</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">Start Time <span class="text-danger">*</span></label>
																				<div class="form-icon">
																					<input type="text" class="form-control datetimepicker1" placeholder="Select time">
																				</div>
																			</div>
																		</div>
																		<div class="col-md-3">
																			<div class="duration-blk">
																				<label class="form-control-label">End Time  <span class="text-danger">*</span></label>
																				<div class="form-icon">
																					<input type="text" class="form-control datetimepicker1" placeholder="Select time">
																				</div>
																			</div>
																		</div>
																		<div class="col-md-12">
																			<h4>Available Timings</h4>
																			<div class="token-slot mt-2">
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input"  value="18">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="06:00 AM">06:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:00:00" data-end-time="15:20:00" data-session="1" name="token[]" value="19">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="07:00 AM">07:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:20:00" data-end-time="15:40:00" data-session="1" name="token[]" value="20">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="08:00 AM">08:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="15:40:00" data-end-time="16:00:00" data-session="1" name="token[]" value="21">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="09:00 AM">09:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:00:00" data-end-time="16:20:00" data-session="1" name="token[]" value="22">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="10:00 AM">10:00 AM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:20:00" data-end-time="16:40:00" data-session="1" name="token[]" value="23">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="11:00 PM">11:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="16:40:00" data-end-time="17:00:00" data-session="1" name="token[]" value="24">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="12:00 PM">12:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:00:00" data-end-time="17:20:00" data-session="1" name="token[]" value="25">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="01:00 PM">01:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:20:00" data-end-time="17:40:00" data-session="1" name="token[]" value="26">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="02:00 PM">02:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="17:40:00" data-end-time="18:00:00" data-session="1" name="token[]" value="27">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="03:00 PM">03:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:00:00" data-end-time="18:20:00" data-session="1" name="token[]" value="28">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="04:00 PM">04:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:20:00" data-end-time="18:40:00" data-session="1" name="token[]" value="29">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="05:00 PM">05:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="18:40:00" data-end-time="19:00:00" data-session="1" name="token[]" value="30">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="06:00 PM">06:00 PM</span>
																					</label>
																				</div>
																				<div class="form-check-inline visits me-0">
																					<label class="visit-btns">
																						<input type="checkbox" class="form-check-input" data-date="2021-05-21" data-timezone="Asia/Calcutta" data-start-time="19:00:00" data-end-time="19:20:00" data-session="1" name="token[]" value="31">
																						<span class="visit-rsn" data-bs-toggle="tooltip" title="07:00 PM">07:00 PM</span>
																					</label>
																				</div>
																			</div>
																			<div class="save-time">
																				<a href="#">Save Timings</a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<!-- /Sunday -->
													
													</div>
													<div class="save-changes text-sm-end">
														<a href="javascript:;" class="btn btn-primary reset-profile">Reset</a>
														<a href="javascript:;" class="btn btn-secondary save-profile">Save Change</a>
													</div>
												</div>	
											</div>
										</div>
										<!-- /Profile Availability -->
							      	</div>
							    </div>
							</div>
							<div class="accordion-item mb-4" id="overview">
							    <h4 class="accordion-header" id="panelsStayOpen-overview">
							      	<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="true" aria-controls="panelsStayOpen-collapseFour">Venue Overview
							      	</button>
							    </h4>
							    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-overview">
							      	<div class="accordion-body">
							      		<div class="row">
							      			<div class="col-12">
												<div class="">
													<label for="name" class="form-label">Overview of Venue</label>
													<textarea class="form-control" id="venue-overview" rows="9" placeholder="Enter Overview"></textarea>
												</div>
											</div>
							      		</div>
							      	</div>
							    </div>
							</div>
							<div class="accordion-item mb-4" id="includes">
							    <h4 class="accordion-header" id="panelsStayOpen-includes">
							      	<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">Includes
							      	</button>
							    </h4>
							    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-includes">
							      	<div class="accordion-body">
							        	<ul class="clearfix" >
							        		<li>
							        			<div class="form-check d-flex justify-content-start align-items-center">
													<div class="d-inline-block">
														<input class="form-check-input" type="checkbox" value="" id="includes1" checked>
													</div>
													<label class="form-check-label" for="includes1">Badminton Racket Unlimited</label>
												</div>
							        		</li>
							        		<li>
							        			<div class="form-check d-flex justify-content-start align-items-center">
													<div class="d-inline-block">
														<input class="form-check-input" type="checkbox" value="" id="includes2" checked>
													</div>
													<label class="form-check-label" for="includes2">Bats</label>
												</div>
							        		</li>
							        		<li>
							        			<div class="form-check d-flex justify-content-start align-items-center">
													<div class="d-inline-block">
														<input class="form-check-input" type="checkbox" value="" id="includes3" checked>
													</div>
													<label class="form-check-label" for="includes3">Hitting Machines</label>
												</div>
							        		</li>
							        		<li>
							        			<div class="form-check d-flex justify-content-start align-items-center">
													<div class="d-inline-block">
														<input class="form-check-input" type="checkbox" value="" id="includes4" checked>
													</div>
													<label class="form-check-label" for="includes4">Multiple Courts</label>
												</div>
							        		</li>
							        		<li>
							        			<div class="form-check d-flex justify-content-start align-items-center">
													<div class="d-inline-block">
														<input class="form-check-input" type="checkbox" value="" id="includes5" checked>
													</div>
													<label class="form-check-label" for="includes5">Spare Players</label>
												</div>
							        		</li>
							        		<li>
							        			<div class="form-check d-flex justify-content-start align-items-center">
													<div class="d-inline-block">
														<input class="form-check-input" type="checkbox" value="" id="includes6">
													</div>
													<label class="form-check-label" for="includes6">Instant Racket</label>
												</div>
							        		</li>
							        		<li>
							        			<div class="form-check d-flex justify-content-start align-items-center">
													<div class="d-inline-block">
														<input class="form-check-input" type="checkbox" value="" id="includes7">
													</div>
													<label class="form-check-label" for="includes7">Green Turfs</label>
												</div>
							        		</li>
							        	</ul>
							      	</div>
							    </div>
							</div>
							<div class="accordion-item mb-4" id="rules">
							    <h4 class="accordion-header" id="panelsStayOpen-rules">
							      	<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">Venue Rules
							      	</button>
							    </h4>
							    <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-rules">
							      	<div class="accordion-body">
							        	<div class="row">
							      			<div class="col-12">
												<div class="input-space">
													<input type="text" class="form-control rules-option" id="add-rules" placeholder="Enter Rules">
												</div>
												<div class="alert alert-danger error-add-rule">Input filed doesn't empty, must fill out the rule!</div>
												<ul class="rules-wraper"></ul>
												<a class="align-items-center add-rules"><i class="feather-plus-circle"></i>Add Rules</a>
											</div>
										</div>
							      	</div>
							    </div>
							</div>
							<div class="accordion-item mb-4" id="amenities">
							    <h4 class="accordion-header" id="panelsStayOpen-amenities">
							      	<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven">Amenities
							      	</button>
							    </h4>
							    <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-amenities">
							      	<div class="accordion-body">
							        	<ul class="d-md-flex align-items-center">
							        		<li>
							        			<div class="form-check d-flex justify-content-start align-items-center">
													<div class="d-inline-block">
														<input class="form-check-input" type="checkbox" value="" id="amenities1" checked>
													</div>
													<label class="form-check-label" for="amenities1">Parking</label>
												</div>
							        		</li>
							        		<li>
							        			<div class="form-check d-flex justify-content-start align-items-center">
													<div class="d-inline-block">
														<input class="form-check-input" type="checkbox" value="" id="amenities2" checked>
													</div>
													<label class="form-check-label" for="amenities2">Drinking Water</label>
												</div>
							        		</li>
							        		<li>
							        			<div class="form-check d-flex justify-content-start align-items-center">
													<div class="d-inline-block">
														<input class="form-check-input" type="checkbox" value="" id="amenities3" checked>
													</div>
													<label class="form-check-label" for="amenities3">First Aid</label>
												</div>
							        		</li>
							        		<li>
							        			<div class="form-check d-flex justify-content-start align-items-center">
													<div class="d-inline-block">
														<input class="form-check-input" type="checkbox" value="" id="amenities4">
													</div>
													<label class="form-check-label" for="amenities4">Change Room</label>
												</div>
							        		</li>
							        		<li>
							        			<div class="form-check d-flex justify-content-start align-items-center">
													<div class="d-inline-block">
														<input class="form-check-input" type="checkbox" value="" id="amenities5">
													</div>
													<label class="form-check-label" for="amenities5">Shower</label>
												</div>
							        		</li>
							        	</ul>
							      	</div>
							    </div>
							</div>
							<div class="accordion-item mb-4" id="gallery">
							    <h4 class="accordion-header" id="panelsStayOpen-gallery">
							      	<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false" aria-controls="panelsStayOpen-collapseEight">Gallery
							      	</button>
							    </h4>
							    <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-gallery">
							      	<div class="accordion-body">
							        	<div class="row">
							        		<div class="col-md-12">
												<div class="file-upload-text appointment-upload">
													<div class="input-space">
														<label class="form-label">Your Venue Images</label>
														<div class="file-upload">
															<img src="assets/img/icons/upload-icon.svg" class="img-fluid" alt="upload">
															<p>Upload Coaching Gallery </p>
															<input type="file" id="file-input" class="image-upload">
														</div>
													</div>
													<div class="upload-show-img">
														<div class="upload-images">
															<img src="assets/img/booking/booking-01.jpg" alt="Image">
															<a href="javascript:void(0);" class="btn btn-icon logo-hide-btn btn-sm"><i class="far fa-trash-alt"></i></a>
														</div>
														<div class="upload-images">
															<img src="assets/img/booking/booking-02.jpg" alt="Image">
															<a href="javascript:void(0);" class="btn btn-icon logo-hide-btn btn-sm"><i class="far fa-trash-alt"></i></a>
														</div>
														<div class="upload-images">
															<img src="assets/img/booking/booking-03.jpg" alt="Image">
															<a href="javascript:void(0);" class="btn btn-icon logo-hide-btn btn-sm"><i class="far fa-trash-alt"></i></a>
														</div>
													</div>
													<h5>Put the main picture as  first Image <br> Image Should be minimum 152 * 152 Supported File format JPG,PNG,SVG</h5>
												</div>
											</div>
							        	</div>
							      	</div>
							    </div>
							</div>
							<div class="accordion-item" id="location">
							    <h4 class="accordion-header" id="panelsStayOpen-location">
							      	<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseNine" aria-expanded="false" aria-controls="panelsStayOpen-collapseNine">Location
							      	</button>
							    </h4>
							    <div id="panelsStayOpen-collapseNine" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-location">
							      	<div class="accordion-body">
							      		<div class="row">
							      			<div class="col-lg-6 col-md-6">
												<div class="input-space">
													<label for="country" class="form-label">Country</label>
													<input type="text" class="form-control" id="country" placeholder="Enter Country">
												</div>
											</div>
											<div class="col-lg-6 col-md-6">
												<div class="input-space">
													<label for="city" class="form-label">City</label>
													<input type="text" class="form-control" id="city" placeholder="Enter City">
												</div>
											</div>
											<div class="col-12">
												<div class="input-space">
													<label for="street-address" class="form-label">Street Address <span>*</span></label>
													<input type="text" class="form-control" id="street-address" placeholder="Enter Street Address">
												</div>
											</div>
										</div>
										<div class="col-12">
											<label for="name" class="form-label">Map</label>
								        	<div class="google-maps">
											    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2967.8862835683544!2d-73.98256668525309!3d41.93829486962529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89dd0ee3286615b7%3A0x42bfa96cc2ce4381!2s132%20Kingston%20St%2C%20Kingston%2C%20NY%2012401%2C%20USA!5e0!3m2!1sen!2sin!4v1670922579281!5m2!1sen!2sin" height="445" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
											</div>
										</div>
							      	</div>
							    </div>
							</div>
							<div class="text-center btn-row">
								<a class="btn btn-secondary btn-icon" href="cage-order-confirm.html">Save Venue <i class="feather-arrow-right-circle ms-1"></i></a>
							</div>
						</form>
						<!-- Accordian Contents -->
					</div>
				</div>
				<!-- /Row -->
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
	<script src="assets/js/jquery-3.7.1.min.js" type="c9f863406d80e4be9d04d87d-text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/bootstrap.bundle.min.js" type="c9f863406d80e4be9d04d87d-text/javascript"></script>

	<!-- Select JS -->
	<script src="assets/plugins/select2/js/select2.min.js" type="c9f863406d80e4be9d04d87d-text/javascript"></script>

	<!-- Owl Carousel JS -->
	<script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="c9f863406d80e4be9d04d87d-text/javascript"></script>

	<!-- Bootstrap DateTime Picker -->
	<script src="assets/js/moment.min.js" type="c9f863406d80e4be9d04d87d-text/javascript"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js" type="c9f863406d80e4be9d04d87d-text/javascript"></script>

	<!-- Fancybox JS -->
	<script src="assets/plugins/fancybox/jquery.fancybox.min.js" type="c9f863406d80e4be9d04d87d-text/javascript"></script>

	<!-- Sticky Sidebar JS -->
	<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js" type="c9f863406d80e4be9d04d87d-text/javascript"></script>
	<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js" type="c9f863406d80e4be9d04d87d-text/javascript"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js" type="c9f863406d80e4be9d04d87d-text/javascript"></script>

<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="c9f863406d80e4be9d04d87d-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b856caaef2a8b0","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>

</html>
