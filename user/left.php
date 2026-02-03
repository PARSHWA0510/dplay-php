<?php date_default_timezone_set('Asia/Kolkata');  $today_datetime = date('Y-m-d H:i:s');  $today_date = date('Y-m-d'); $today_time = date('H:i:s'); ?>
<?php   $user_type = $_SESSION['user_type']; 
		
		$z=("select * from user_master where id = '$admin_id'");
		$ureemp = mysqli_query($con,$z);
		$urowemp=mysqli_fetch_array($ureemp);
		$right_a1 = $urowemp['a1']; 
		$right_a2 = $urowemp['a2']; 
		$right_a3 = $urowemp['a3']; 
		$right_a4 = $urowemp['a4']; 
		$right_b1 = $urowemp['b1']; 
		$right_b2 = $urowemp['b2']; 
		$right_b3 = $urowemp['b3']; 
		$right_b4 = $urowemp['b4']; 
		$right_c1 = $urowemp['c1']; 
		$right_c2 = $urowemp['c2']; 
		$right_c3 = $urowemp['c3']; 
		$right_c4 = $urowemp['c4']; 
		$right_d1 = $urowemp['d1']; 
		$right_d2 = $urowemp['d2']; 
		$right_d3 = $urowemp['d3']; 
		$right_d4 = $urowemp['d4']; 
		$right_e1 = $urowemp['e1']; 
		$right_e2 = $urowemp['e2']; 
		$right_e3 = $urowemp['e3']; 
		$right_e4 = $urowemp['e4']; 
		$right_f1 = $urowemp['f1']; 
		$right_f2 = $urowemp['f2']; 
		$right_f3 = $urowemp['f3']; 
		$right_f4 = $urowemp['f4']; 
		$right_g1 = $urowemp['g1']; 
		$right_g2 = $urowemp['g2']; 
		$right_g3 = $urowemp['g3']; 
		$right_g4 = $urowemp['g4']; 
		$right_h1 = $urowemp['h1']; 
		$right_h2 = $urowemp['h2']; 
		$right_h3 = $urowemp['h3']; 
		$right_h4 = $urowemp['h4']; 
		$right_i1 = $urowemp['i1']; 
		$right_i2 = $urowemp['i2']; 
		$right_i3 = $urowemp['i3']; 
		$right_i4 = $urowemp['i4']; 
		$right_j1 = $urowemp['j1']; 
		$right_j2 = $urowemp['j2']; 
		$right_j3 = $urowemp['j3']; 
		$right_j4 = $urowemp['j4']; 
		$right_k1 = $urowemp['k1']; 
		$right_k2 = $urowemp['k2']; 
		$right_k3 = $urowemp['k3']; 
		$right_k4 = $urowemp['k4']; 
		$right_l1 = $urowemp['l1']; 
		$right_l2 = $urowemp['l2']; 
		$right_l3 = $urowemp['l3']; 
		$right_l4 = $urowemp['l4']; 
		$right_m1 = $urowemp['m1']; 
		$right_m2 = $urowemp['m2']; 
		$right_m3 = $urowemp['m3']; 
		$right_m4 = $urowemp['m4']; 
		$right_n1 = $urowemp['n1']; 
		$right_n2 = $urowemp['n2']; 
		$right_n3 = $urowemp['n3']; 
		$right_n4 = $urowemp['n4']; 
		$right_o1 = $urowemp['o1']; 
		$right_o2 = $urowemp['o2']; 
		$right_o3 = $urowemp['o3']; 
		$right_o4 = $urowemp['o4']; 
		$right_p1 = $urowemp['p1']; 
		$right_p2 = $urowemp['p2']; 
		$right_p3 = $urowemp['p3']; 
		$right_p4 = $urowemp['p4']; 
		$right_q1 = $urowemp['q1']; 
		$right_q2 = $urowemp['q2']; 
		$right_q3 = $urowemp['q3']; 
		$right_q4 = $urowemp['q4']; 
		$right_r1 = $urowemp['r1']; 
		$right_r2 = $urowemp['r2']; 
		$right_r3 = $urowemp['r3']; 
		$right_r4 = $urowemp['r4']; 
		$right_s1 = $urowemp['s1']; 
		$right_s2 = $urowemp['s2']; 
		$right_s3 = $urowemp['s3']; 
		$right_s4 = $urowemp['s4']; 
		$venue_id = $urowemp['venue_id'];
?>
<style>
.lefticon { width:21px; height:21px; margin-top:5px; margin-right:5px; margin-left:5px; }
.nav-item { border-bottom:solid 0.5px #f5f5f5; }
</style>

<div class="sidebar sidebar-left">
  <ul class="nav flex-column">
    <li class="nav-item"> <a href="dashboard.php" class="nav-link dropdwown-toggle"><img src="icon/manage-master-img.png" class="lefticon" /> <span>Dashboard</span></a> </li>
    <?php if($user_type == 'manager') { ?>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/manage-master-img.png" class="lefticon" />  <span>Manage Master</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="venue_manger.php"><i class="material-icons icon"></i><span>My Venue</span></a></li>
        <?php if($right_i4 == '1') { ?>
        <li><a class="nav-link pink-gradient-active" href="employee_master.php"><i class="material-icons icon"></i><span>Staff Master</span></a></li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>
    <?php if($right_a4 == '1') { ?>
    <li class="nav-item"> <a href="package_user.php" class="nav-link dropdwown-toggle"><img src="icon/membership-payment-img.png" class="lefticon" /> <span>Manage Membership</span></a> </li>
    <?php } ?>
    <?php if($user_type == 'manager') { ?>
    <li class="nav-item"> <a href="court_master.php" class="nav-link dropdwown-toggle"><img src="icon/view-court-img.png" class="lefticon" /> <span>Manage Court</span></a> </li>
    <?php } ?>
	<?php if($right_h4 == '1') { ?>
    <li class="nav-item"> <a href="slot_disable.php" class="nav-link dropdwown-toggle"><img src="icon/manage-subscriber-img.png" class="lefticon" /> <span>Slot Disable</span></a> </li>
    <?php } ?>
    <?php if($right_b4 == '1') { ?>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/view-coach-img.png" class="lefticon" /> <span>Manage Coach</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="coach_master.php"><i class="material-icons icon"></i><span>Manage Coach </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="coach_booked.php"><i class="material-icons icon"></i><span>Booked Coach </span></a></li>
      </ul>
    </li>
    <?php } ?>
    <li class="nav-item"> <a href="court_booking.php" class="nav-link dropdwown-toggle"><img src="icon/manage-subscriber-img.png" class="lefticon" /> <span>Offline Court Booking</span></a> </li>
    <li class="nav-item"> <a href="court_rebook.php" class="nav-link dropdwown-toggle"><img src="icon/contact-inquiry-img.png" class="lefticon" /> <span>Court ReBook Request</span></a> </li>
    <li class="nav-item"> <a href="discount_master.php" class="nav-link dropdwown-toggle"><img src="icon/manage-subscriber-img.png" class="lefticon" /> <span>Flat Discount</span></a> </li>

    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/court-payment-img.png" class="lefticon" /> <span>Court Payment</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="payment_court_pending.php"><i class="material-icons icon"></i><span>Pending </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="payment_court_completed.php"><i class="material-icons icon"></i><span>Completed </span></a></li>
      </ul>
    </li>
    <?php if($right_a4 == '1') { ?>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/membership-payment-img.png" class="lefticon" /> <span>Membership Payment</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="payment_membership_pending.php"><i class="material-icons icon"></i><span>Pending </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="payment_membership_completed.php"><i class="material-icons icon"></i><span>Completed </span></a></li>
      </ul>
    </li>
    <?php } ?>
    <?php /*?><?php if($right_c4 == '1') { ?>
    <li class="nav-item"> <a href="promocode_master.php" class="nav-link dropdwown-toggle"><img src="icon/manage-master-img.png" class="lefticon" /> <span>Manage Promocode</span></a> </li>
    <?php } ?><?php */?>
    <?php if($right_d4 == '1') { ?>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/manage-event-img.png" class="lefticon" /> <span>Manage Event</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="event_accessories.php"><i class="material-icons icon"></i><span>Event Accessories </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="event_master.php"><i class="material-icons icon"></i><span>Manage Event </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="event_list.php"><i class="material-icons icon"></i><span>Event List</span></a></li>
        <li><a class="nav-link pink-gradient-active" href="payment_event_completed.php"><i class="material-icons icon"></i><span>Event Booked </span></a></li>
      </ul>
    </li>
    <?php } ?>
    <?php if($right_e4 == '1') { ?>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/manage-master-img.png" class="lefticon" /> <span>Equipment Rent</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="equipment_master.php"><i class="material-icons icon"></i><span>Manage Equipment </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="equipment_rented.php"><i class="material-icons icon"></i><span>Rent Equipment </span></a></li>
      </ul>
    </li>
    <?php } ?>
    <?php if($right_f4 == '1') { ?>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/manage-promocode-img.png" class="lefticon" /> <span>Manage Cafe</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="product_master.php"><i class="material-icons icon"></i><span>Cafe Product </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="customer_order.php"><i class="material-icons icon"></i><span>New Order </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="customer_order_list.php"><i class="material-icons icon"></i><span>Order List </span></a></li>
      </ul>
    </li>
    <?php } ?>
    <?php if($right_g4 == '1') { ?>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/court-payment-img.png" class="lefticon" /> <span>Manage Expense</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="expense_category.php"><i class="material-icons icon"></i><span>Expense Category </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="expense_master.php"><i class="material-icons icon"></i><span>New Expense </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="expense_list.php"><i class="material-icons icon"></i><span>Expense List </span></a></li>
      </ul>
    </li>
    <?php } ?>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/manage-website-img.png" class="lefticon" /> <span>Manage Inquiry</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li><a class="nav-link pink-gradient-active" href="venue_inquiry.php"><i class="material-icons icon"></i><span>Venue </span></a></li>
        <li><a class="nav-link pink-gradient-active" href="coach_inquiry.php"><i class="material-icons icon"></i><span>Coach </span></a></li>
      </ul>
    </li>

    <li class="nav-item"> <a href="customer_master.php" class="nav-link dropdwown-toggle"><img src="icon/view-customer-img.png" class="lefticon" /> <span>View Customer</span></a> </li>
    
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/manage-report-img.png" class="lefticon" /> <span>Manage Report</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
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
<?php /*?><li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><img src="icon/manage-master-img.png" class="lefticon" /> <span>Other Pages</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li class="nav-item"> <a href="signin1.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Sign in</span></a> <a href="signin2.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Sign in 2</span></a> <a href="signup1.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Sign up</span></a> <a href="signup2.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Sign up 2</span></a> <a href="error1.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Error</span></a> <a href="error-4041.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>404</span></a> <a href="error-4042.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>404 2</span></a> <a href="error-5001.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>500</span></a> <a href="error-5002.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>500 2</span></a> <a href="comming-soon1.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Comming Soon</span></a> <a href="comming-soon2.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Comming Soon 2</span></a> <a href="faqs1.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>FAQs</span></a> <a href="faqs2.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>FAQs 2</span></a> </li>
      </ul>
    </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"><i class="material-icons icon">equalizer</i> <span>Charts & Map</span><i class="material-icons icon arrow">expand_more</i></a>
      <ul class="nav flex-column">
        <li class="nav-item"> <a href="chartjs.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Chart js</span></a> <a href="sparklines.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>Sparklines</span></a> <a href="vectormap-blocks.html" class="nav-link pink-gradient-active"><i class="material-icons icon"></i> <span>jVector map</span></a> </li>
      </ul>
    </li>
    <li class="nav-item"> <a href="javascript:void(0);" class="nav-link dropdwown-toggle"> <span>Layouts</span><i class="material-icons icon arrow">expand_more</i></a>
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
<SCRIPT language=Javascript>
      
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
       
   </SCRIPT>
