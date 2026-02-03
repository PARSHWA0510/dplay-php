<?php date_default_timezone_set('Asia/Kolkata');  $today_datetime = date('Y-m-d H:i:s');  $today_date = date('Y-m-d'); $today_time = date('H:i:s'); $todaydatetime = date('Y-m-d H:i:s'); ?>
<?php $user_type = $_SESSION['user_type']; ?>
<style>
.lefticon {
	width:21px;
	height:21px;
	margin-top:5px;
	margin-right:5px;
	margin-left:5px;
}
.nav-item {
	border-bottom:solid 0.5px #f5f5f5;
}
</style>
<div class="sidebar sidebar-left">
  <ul class="nav flex-column">
    <li class="nav-item"> <a href="dashboard.php" class="nav-link dropdwown-toggle"><img src="icon/dashboard-img.png" class="lefticon" /><span>Dashboard</span></a> </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/manage-user-img.png" class="lefticon" /><span>Manage User</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="admin_master.php"><i class="material-icons icon"></i><span>Admin Master</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="employee_master.php"><i class="material-icons icon"></i><span>Employee Master</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="company_master.php"><i class="material-icons icon"></i><span>Company Profile</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="software_backup.php"><i class="material-icons icon"></i><span>Software Backup</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="api_email.php"><i class="material-icons icon"></i><span>API & Email</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="charges_master.php"><i class="material-icons icon"></i><span>Charges Master</span></a></li>
      </ul>
    </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/manage-master-img.png" class="lefticon" /><span>Manage Master</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="sport_type.php"><i class="material-icons icon"></i><span>Type of Sport</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="surface_type.php"><i class="material-icons icon"></i><span>Surface Type </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="amenities_master.php"><i class="material-icons icon"></i><span>Amenities Master</span></a></li>
      </ul>
    </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/manage-website-img.png" class="lefticon" /><span>Manage Website</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="homepage_title.php"><i class="material-icons icon"></i><span>Homepage Title</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="homepage_des0.php"><i class="material-icons icon"></i><span>Homepage How Work</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="homepage_des1.php"><i class="material-icons icon"></i><span>Homepage Description 1</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="service_master.php"><i class="material-icons icon"></i><span>Service Master </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="homepage_des2.php"><i class="material-icons icon"></i><span>Homepage Description 2</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="aboutus_master.php"><i class="material-icons icon"></i><span>About Us Master </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="features_master.php"><i class="material-icons icon"></i><span>Features Master </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="home_become_member.php"><i class="material-icons icon"></i><span>Become Member </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="homepage_des3.php"><i class="material-icons icon"></i><span>Homepage Description 3</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="faqs_master.php"><i class="material-icons icon"></i><span>Faq's Master</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="testimonial_master.php"><i class="material-icons icon"></i><span>Testimonial Master</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="blog_category.php"><i class="material-icons icon"></i><span>Blog Category</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="blog_master.php"><i class="material-icons icon"></i><span>Blog Master</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="policypage_master.php"><i class="material-icons icon"></i><span>Policy Page Master</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="seo_master.php"><i class="material-icons icon"></i><span>SEO Master</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="page_register.php"><i class="material-icons icon"></i><span>Register Page</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="page_login.php"><i class="material-icons icon"></i><span>Login Page</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="page_forgotpass.php"><i class="material-icons icon"></i><span>Forgot Password Page</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="page_otp.php"><i class="material-icons icon"></i><span>OTP Page</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="page_resetpass.php"><i class="material-icons icon"></i><span>Reset Password Page</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="subscribe_newsletter.php"><i class="material-icons icon"></i><span>Subscribe to Newsletter</span></a></li>
      </ul>
    </li>
    <?php /*?><li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/package-img.png" class="lefticon" /><span>Package</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="package_manager.php"><i class="material-icons icon"></i><span>Venue Manager</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="package_user.php"><i class="material-icons icon"></i><span>User </span></a></li>
      </ul>
    </li><?php */?>
    <li class="nav-item"> <a href="promocode_master.php" class="nav-link dropdwown-toggle"><img src="icon/manage-promocode-img.png" class="lefticon" /><span>Manage Promocode</span></a> </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/manage-venue-img.png" class="lefticon" /><span>Manage Venue</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="venue_master.php"><i class="material-icons icon"></i><span>New Venue</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="venue_list.php"><i class="material-icons icon"></i><span>Venue List</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="manager_master.php"><i class="material-icons icon"></i><span>Venue Manager</span></a></li>
      </ul>
    </li>
    <li class="nav-item"> <a href="court_master.php" class="nav-link dropdwown-toggle"><img src="icon/view-court-img.png" class="lefticon" /><span>View Court</span></a> </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/court-payment-img.png" class="lefticon" /><span>Court Payment</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="payment_court_pending.php"><i class="material-icons icon"></i><span>Pending </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="payment_court_completed.php"><i class="material-icons icon"></i><span>Completed </span></a></li>
      </ul>
    </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/membership-payment-img.png" class="lefticon" /><span>Membership Payment</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="payment_membership_pending.php"><i class="material-icons icon"></i><span>Pending </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="payment_membership_completed.php"><i class="material-icons icon"></i><span>Completed </span></a></li>
      </ul>
    </li>
    <li class="nav-item"> <a href="refund_court.php" class="nav-link dropdwown-toggle"><img src="icon/view-court-img.png" class="lefticon" /><span>Court Refund</span></a> </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/view-coach-img.png" class="lefticon" /><span>Manage Coach</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="coach_master.php"><i class="material-icons icon"></i><span>Manage Coach</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="payment_coach_completed.php"><i class="material-icons icon"></i><span>Coach Booked</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="coach_inquiry.php"><i class="material-icons icon"></i><span>Coach Inquiry</span></a></li>
      </ul>
    </li>
        <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/manage-event-img.png" class="lefticon" /><span>Manage Event</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="event_category.php"><i class="material-icons icon"></i><span>Event Category </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="event_accessories.php"><i class="material-icons icon"></i><span>Event Accessories </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="event_master.php"><i class="material-icons icon"></i><span>New Event </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="event_list.php"><i class="material-icons icon"></i><span>Event List </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="payment_event_completed.php"><i class="material-icons icon"></i><span>Event Booked </span></a></li>
      </ul>
    </li>
    <li class="nav-item"> <a href="payment_master.php" class="nav-link dropdwown-toggle"><img src="icon/court-payment-img.png" class="lefticon" /><span>Payment Manager</span></a> </li>

    <li class="nav-item"> <a href="customer_master.php" class="nav-link dropdwown-toggle"><img src="icon/view-customer-img.png" class="lefticon" /><span>View Customer</span></a> </li>

    <li class="nav-item"> <a href="subscribe_master.php" class="nav-link dropdwown-toggle"><img src="icon/manage-subscriber-img.png" class="lefticon" /><span>Manage Subscriber</span></a> </li>
    <li class="nav-item"> <a href="contactus_inquiry.php" class="nav-link dropdwown-toggle"><img src="icon/contact-inquiry-img.png" class="lefticon" /><span>Contact Inquiry</span></a> </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/manage-review-img.png" class="lefticon" /><span>Manage Review</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="venue_review.php"><i class="material-icons icon"></i><span>Venue </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="coach_review.php"><i class="material-icons icon"></i><span>Coach </span></a></li>
      </ul>
    </li>
    <li class="nav-item"> <a href="newsletter_master.php" class="nav-link dropdwown-toggle"><img src="icon/contact-inquiry-img.png" class="lefticon" /><span>Newsletter Email</span></a> </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/manage-report-img.png" class="lefticon" /><span>Manage Report</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="report_subscription_based.php"><i class="material-icons icon"></i><span>Subscription Based </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="report_slotwise_commission_based.php"><i class="material-icons icon"></i><span>Slotwise Commission Based </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="report_d2d_court.php"><i class="material-icons icon"></i><span>D2D Court Booking </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="report_d2d_membership.php"><i class="material-icons icon"></i><span>D2D Membership Booking </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="report_d2d_event.php"><i class="material-icons icon"></i><span>D2D Event Booked </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="report_d2d_coach.php"><i class="material-icons icon"></i><span>D2D Coach Booked </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="report_d2d_cafeorder.php"><i class="material-icons icon"></i><span>D2D Cafe Order </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="report_d2d_expense.php"><i class="material-icons icon"></i><span>D2D Expense </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="report_d2d_income_expense.php"><i class="material-icons icon"></i><span>D2D Income/Expense </span></a></li>
      </ul>
    </li>
    <li class="nav-item"> <a href="logout.php" class="nav-link dropdwown-toggle"><img src="icon/logout-img.png" class="lefticon" /><span>Logout</span></a> </li>
  </ul>
</div>
<?php /*?><li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><i class="material-icons icon">assignment</i> <span>Other Pages</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li class="nav-item"> <a href="signin1.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Sign in</span></a> <a href="signin2.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Sign in 2</span></a> <a href="signup1.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Sign up</span></a> <a href="signup2.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Sign up 2</span></a> <a href="error1.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Error</span></a> <a href="error-4041.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>404</span></a> <a href="error-4042.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>404 2</span></a> <a href="error-5001.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>500</span></a> <a href="error-5002.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>500 2</span></a> <a href="comming-soon1.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Comming Soon</span></a> <a href="comming-soon2.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Comming Soon 2</span></a> <a href="faqs1.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>FAQs</span></a> <a href="faqs2.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>FAQs 2</span></a> </li>
      </ul>
    </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><i class="material-icons icon">equalizer</i> <span>Charts & Map</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li class="nav-item"> <a href="chartjs.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Chart js</span></a> <a href="sparklines.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Sparklines</span></a> <a href="vectormap-blocks.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>jVector map</span></a> </li>
      </ul>
    </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><i class="material-icons icon">devices</i> <span>Layouts</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li class="nav-item"> <a href="boxed-layout.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Boxed layout</span></a> <a href="full-width.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Full width</span></a> <a href="colors.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Color Scheme</span></a> </li>
      </ul>
    </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><i class="material-icons icon">insert_emoticon</i> <span>Icons</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li class="nav-item"> <a href="material-icons.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Material Icons</span></a> <a href="icon-style.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Icons Style</span></a> </li>
      </ul>
    </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><i class="material-icons icon">business_center</i> <span>Controls</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li class="nav-item"> <a href="card-blocks.html" class="nav-link  pink-gradient-active"><i class="material-icons icon"></i> <span>Card Blocks</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="carousel-blocks.html"><i class="material-icons icon"></i> <span>Carousel Blocks</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="chart-blocks.html"><i class="material-icons icon"></i> <span>Charts Blocks</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="chat-blocks.html"><i class="material-icons icon"></i> <span>Chat Blocks</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="event-blocks.html"><i class="material-icons icon"></i> <span>Event Blocks</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="large-dropdown.html"><i class="material-icons icon"></i> <span>Large Dropdowns</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="file-blocks.html"><i class="material-icons icon"></i> <span>File Blocks</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="media-blocks.html"><i class="material-icons icon"></i> <span>Media Blocks</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="navbar-blocks.html"><i class="material-icons icon"></i> <span>Navbar Block</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="news-blocks.html"><i class="material-icons icon"></i> <span>News Blocks</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="pricing-blocks.html"><i class="material-icons icon"></i> <span>Pricing Blocks</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="product-blocks.html"><i class="material-icons icon"></i> <span>Product Blocks</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="progress-range-blocks.html"><i class="material-icons icon"></i> <span>Progress and Range</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="rating-blocks.html"><i class="material-icons icon"></i> <span>Rating Blocks</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="summary-blocks.html"><i class="material-icons icon"></i> <span>Summary Blocks</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="timeline-blocks.html"><i class="material-icons icon"></i> <span>Timeline Blocks</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="user-blocks.html"><i class="material-icons icon"></i> <span>User Blocks</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="userlist-blocks.html"><i class="material-icons icon"></i> <span>Userlist Blocks</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="wizard-blocks.html"><i class="material-icons icon"></i> <span>Wizard Blocks</span></a> </li>
        <li class="nav-item"> <a href="alerts.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Alerts</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="badges.html"><i class="material-icons icon"></i> <span>Badges</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="breadcrumb.html"><i class="material-icons icon"></i> <span>Breadcrumb</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="buttons.html"><i class="material-icons icon"></i> <span>Buttons</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="button-group.html"><i class="material-icons icon"></i> <span>Button Group</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="dropdown.html"><i class="material-icons icon"></i> <span>Dropdown</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="form-elements.html"><i class="material-icons icon"></i> <span>Form Elements</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="collapse.html"><i class="material-icons icon"></i> <span>Collapse</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="input-group.html"><i class="material-icons icon"></i> <span>Input Group</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="jumbotron.html"><i class="material-icons icon"></i> <span>Jumbotron</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="pagination.html"><i class="material-icons icon"></i> <span>Pagination</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="popover.html"><i class="material-icons icon"></i> <span>Popover</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="tooltip.html"><i class="material-icons icon"></i> <span>Tooltip</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="modal.html"><i class="material-icons icon"></i> <span>Modal</span></a> </li>
      </ul>
    </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><i class="material-icons icon">web</i> <span>Rich Controls</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li class="nav-item"> <a class="nav-link  pink-gradient-active" href="multiselect.html"><i class="material-icons icon"></i> <span>Multi Select</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="picker.html"><i class="material-icons icon"></i> <span>Picker</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="autocomplete.html"><i class="material-icons icon"></i> <span>AutoComplete</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="contextmenu.html"><i class="material-icons icon"></i> <span>Context Menu</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="editor.html"><i class="material-icons icon"></i> <span>Editor</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="toast-message.html"><i class="material-icons icon"></i> <span>Toast message</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="dragable_sortable.html"><i class="material-icons icon"></i> <span>Dragable Sortable</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="tourintro.html"><i class="material-icons icon"></i> <span>Tour Intro</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="dropzone.html"><i class="material-icons icon"></i> <span>DropZone</span></a> </li>
      </ul>
    </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><i class="material-icons icon">description</i> <span>Forms</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li class="nav-item"> <a href="form_credit_card.html" class="nav-link  pink-gradient-active"><i class="material-icons icon"></i> <span>Credit Card</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="form_donation.html"><i class="material-icons icon"></i> <span>Donation Form</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="form_authorization.html"><i class="material-icons icon"></i> <span>Authority Form</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="form_employee_review.html"><i class="material-icons icon"></i> <span>Employee Review</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="form_profile_info.html"><i class="material-icons icon"></i> <span>Profile</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="form_survay_review.html"><i class="material-icons icon"></i> <span>Survay Form</span></a> </li>
        <li class="nav-item"> <a class="nav-link pink-gradient-active" href="form_booking.html"><i class="material-icons icon"></i> <span>Booking Form</span></a> </li>
      </ul>
    </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><i class="material-icons icon">grid_on</i> <span>Tables</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li class="nav-item"> <a href="datatable.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>DataTable</span></a> <a href="footable.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>FooTable</span></a> <a href="table-blocks.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Table</span></a> </li>
      </ul>
    </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><i class="material-icons icon">domain</i> <span>Level 1</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li class="nav-item"> <a href="javascript:void(0);" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Level 2</span></a> </li>
        <li class="nav-item"> <a href="javascript:void(0);" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Level 2</span></a>
          <ul class="nav flex-column">
            <li class="nav-item"> <a href="javascript:void(0);" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Level 3</span></a> </li>
          </ul>
        </li>
      </ul>
    </li><?php */?>
