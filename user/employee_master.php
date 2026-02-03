<?php  error_reporting(0);
session_start();
ob_start();
include('../config.php');
  $admin_id = $_SESSION['admin_id'];
  $company_id = $_SESSION['company_id'];
if($admin_id == '' || $company_id == '')
{
?>
<script>window.location.href="index.php";</script>
<?php } ?>
<!doctype html>
<html lang="en">
<head>
<title>Sport CRM Panel</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
<!-- favicons -->
<link rel="apple-touch-icon" href="img/favicon-apple.png">
<link rel="icon" href="img/favicon.png">
<!-- Material design icons CSS -->
<link rel="stylesheet" href="vendor/materializeicon/material-icons.css">
<!-- aniamte CSS -->
<link rel="stylesheet" href="vendor/animatecss/animate.css">
<!-- swiper carousel CSS -->
<link rel="stylesheet" href="vendor/swiper/css/swiper.min.css">
<!-- daterange CSS -->
<link rel="stylesheet" href="vendor/bootstrap-daterangepicker-master/daterangepicker.css">
<!-- dataTable CSS -->
<link rel="stylesheet" href="vendor/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
<!-- jvector map CSS -->
<link rel="stylesheet" href="vendor/jquery-jvectormap/jquery-jvectormap-2.0.3.css">
<!-- app CSS -->
<link id="theme" rel="stylesheet" href="css/purplesidebar.css" type="text/css">
<link href="icon_fonts_assets/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
</head>
<body class="fixed-header sidebar-right-close">
<!-- page loader -->
<!-- page loader ends  -->
<div class="wrapper">
  <!-- main header -->
  <?php include 'header.php' ?>
  <?php include 'left.php' ?>
  <?php include 'right.php' ?>
  <!-- setting sidebar ends -->
  <!-- content page title -->
  <div class="container-fluid bg-light-opac">
    <div class="row">
      <div class="container my-3 main-container">
        <div class="row align-items-center">
          <div class="col">
            <h2 class="content-color-primary page-title">Employee Master</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content page title ends -->
  <!-- content page -->
  <div class="container mt-4 main-container">
    <?php 
if ($_POST['insert']) 
{
	
	$join_date = date("Y-m-d", strtotime($_REQUEST['join_date']));
	
  $sql=("INSERT INTO `user_master` (`username`, `password`, `name`, `contact1`, `contact2`, `email1`, `salary`, `status`, `user_type`, `join_date`, `photo`, `address`, `change_pwd`, `a1`, `a2`, `a3`, `a4`, `b1`, `b2`, `b3`, `b4`, `c1`, `c2`, `c3`, `c4`, `d1`, `d2`, `d3`, `d4`, `e1`, `e2`, `e3`, `e4`, `f1`, `f2`, `f3`, `f4`, `g1`, `g2`, `g3`, `g4`, `h1`, `h2`, `h3`, `h4`, `i1`, `i2`, `i3`, `i4`, `j1`, `j2`, `j3`, `j4`, `k1`, `k2`, `k3`, `k4`, `l1`, `l2`, `l3`, `l4`, `m1`, `m2`, `m3`, `m4`, `aadharcard_no`, `aadharcard_docs_front`, `aadharcard_docs_back`, `pancard_no`, `pancard_docs`, `bank_name`, `bank_acno`, `bank_ifsc`, `bank_upload`, `prv_pf`, `prv_esic`, `prv_mediclaim`, `prv_exp`, `prv_upload`, `data_access`, `right_service`, `right_quot`, `right_dispatch`, `right_closelead`,`right_drawing`,`report_1`,`report_2`,`report_3`,`report_4`,`report_5`,`designation`,`dob`,`manager_id`) VALUES ('".mysqli_real_escape_string($con,$_REQUEST['username'])."', '".mysqli_real_escape_string($con,$_REQUEST['password'])."', '".mysqli_real_escape_string($con,$_REQUEST['name'])."', '".mysqli_real_escape_string($con,$_REQUEST['contact1'])."', '".mysqli_real_escape_string($con,$_REQUEST['contact2'])."', '".mysqli_real_escape_string($con,$_REQUEST['email1'])."', '".mysqli_real_escape_string($con,$_REQUEST['salary'])."', '1', 'venue_employee', '$join_date', '".mysqli_real_escape_string($con,$_REQUEST['photo'])."', '".mysqli_real_escape_string($con,$_REQUEST['address'])."', '".mysqli_real_escape_string($con,$_REQUEST['change_pwd'])."','".mysqli_real_escape_string($con,$_REQUEST['a1'])."', '".mysqli_real_escape_string($con,$_REQUEST['a2'])."', '".mysqli_real_escape_string($con,$_REQUEST['a3'])."', '".mysqli_real_escape_string($con,$_REQUEST['a4'])."', '".mysqli_real_escape_string($con,$_REQUEST['b1'])."', '".mysqli_real_escape_string($con,$_REQUEST['b2'])."', '".mysqli_real_escape_string($con,$_REQUEST['b3'])."', '".mysqli_real_escape_string($con,$_REQUEST['b4'])."', '".mysqli_real_escape_string($con,$_REQUEST['c1'])."', '".mysqli_real_escape_string($con,$_REQUEST['c2'])."', '".mysqli_real_escape_string($con,$_REQUEST['c3'])."', '".mysqli_real_escape_string($con,$_REQUEST['c4'])."', '".mysqli_real_escape_string($con,$_REQUEST['d1'])."', '".mysqli_real_escape_string($con,$_REQUEST['d2'])."', '".mysqli_real_escape_string($con,$_REQUEST['d3'])."', '".mysqli_real_escape_string($con,$_REQUEST['d4'])."', '".mysqli_real_escape_string($con,$_REQUEST['e1'])."', '".mysqli_real_escape_string($con,$_REQUEST['e2'])."', '".mysqli_real_escape_string($con,$_REQUEST['e3'])."', '".mysqli_real_escape_string($con,$_REQUEST['e4'])."', '".mysqli_real_escape_string($con,$_REQUEST['f1'])."', '".mysqli_real_escape_string($con,$_REQUEST['f2'])."', '".mysqli_real_escape_string($con,$_REQUEST['f3'])."', '".mysqli_real_escape_string($con,$_REQUEST['f4'])."', '".mysqli_real_escape_string($con,$_REQUEST['g1'])."', '".mysqli_real_escape_string($con,$_REQUEST['g2'])."', '".mysqli_real_escape_string($con,$_REQUEST['g3'])."', '".mysqli_real_escape_string($con,$_REQUEST['g4'])."', '".mysqli_real_escape_string($con,$_REQUEST['h1'])."', '".mysqli_real_escape_string($con,$_REQUEST['h2'])."', '".mysqli_real_escape_string($con,$_REQUEST['h3'])."', '".mysqli_real_escape_string($con,$_REQUEST['h4'])."', '".mysqli_real_escape_string($con,$_REQUEST['i1'])."', '".mysqli_real_escape_string($con,$_REQUEST['i2'])."', '".mysqli_real_escape_string($con,$_REQUEST['i3'])."', '".mysqli_real_escape_string($con,$_REQUEST['i4'])."', '".mysqli_real_escape_string($con,$_REQUEST['j1'])."', '".mysqli_real_escape_string($con,$_REQUEST['j2'])."', '".mysqli_real_escape_string($con,$_REQUEST['j3'])."', '".mysqli_real_escape_string($con,$_REQUEST['j4'])."', '".mysqli_real_escape_string($con,$_REQUEST['k1'])."', '".mysqli_real_escape_string($con,$_REQUEST['k2'])."', '".mysqli_real_escape_string($con,$_REQUEST['k3'])."', '".mysqli_real_escape_string($con,$_REQUEST['k4'])."', '".mysqli_real_escape_string($con,$_REQUEST['l1'])."', '".mysqli_real_escape_string($con,$_REQUEST['l2'])."', '".mysqli_real_escape_string($con,$_REQUEST['l3'])."', '".mysqli_real_escape_string($con,$_REQUEST['l4'])."', '".mysqli_real_escape_string($con,$_REQUEST['m1'])."', '".mysqli_real_escape_string($con,$_REQUEST['m2'])."', '".mysqli_real_escape_string($con,$_REQUEST['m3'])."', '".mysqli_real_escape_string($con,$_REQUEST['m4'])."', '".mysqli_real_escape_string($con,$_REQUEST['aadharcard_no'])."', '".mysqli_real_escape_string($con,$_REQUEST['aadharcard_docs_front'])."', '".mysqli_real_escape_string($con,$_REQUEST['aadharcard_docs_back'])."', '".mysqli_real_escape_string($con,$_REQUEST['pancard_no'])."', '".mysqli_real_escape_string($con,$_REQUEST['pancard_docs'])."', '".mysqli_real_escape_string($con,$_REQUEST['bank_name'])."', '".mysqli_real_escape_string($con,$_REQUEST['bank_acno'])."', '".mysqli_real_escape_string($con,$_REQUEST['bank_ifsc'])."', '".mysqli_real_escape_string($con,$_REQUEST['bank_upload'])."', '".mysqli_real_escape_string($con,$_REQUEST['prv_pf'])."', '".mysqli_real_escape_string($con,$_REQUEST['prv_esic'])."', '".mysqli_real_escape_string($con,$_REQUEST['prv_mediclaim'])."', '".mysqli_real_escape_string($con,$_REQUEST['prv_exp'])."', '".mysqli_real_escape_string($con,$_REQUEST['prv_upload'])."', '".mysqli_real_escape_string($con,$_REQUEST['data_access'])."', '".mysqli_real_escape_string($con,$_REQUEST['right_service'])."', '".mysqli_real_escape_string($con,$_REQUEST['right_quot'])."', '".mysqli_real_escape_string($con,$_REQUEST['right_dispatch'])."','".mysqli_real_escape_string($con,$_REQUEST['right_closelead'])."','".mysqli_real_escape_string($con,$_REQUEST['right_drawing'])."','".mysqli_real_escape_string($con,$_REQUEST['report_1'])."','".mysqli_real_escape_string($con,$_REQUEST['report_2'])."','".mysqli_real_escape_string($con,$_REQUEST['report_3'])."','".mysqli_real_escape_string($con,$_REQUEST['report_4'])."','".mysqli_real_escape_string($con,$_REQUEST['report_5'])."','".mysqli_real_escape_string($con,$_REQUEST['designation'])."','".mysqli_real_escape_string($con,$_REQUEST['dob'])."','$admin_id')");	 
 
$z = mysqli_query($con,$sql);
		
		
	$id = mysqli_insert_id($con);
  
 	$img0 = $_FILES['img0']['name'];
	if($img0 != '')
	{
	$img0 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img0']['name']));
 	$tmp_name=$_FILES["img0"]["tmp_name"];
	$pr="../images/";
	$pr0=$pr.$img0;
	move_uploaded_file($tmp_name,$pr0);
	}
	
	$img1 = $_FILES['img1']['name'];
	if($img1 != '')
	{
	$img1 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img1']['name']));
 	$tmp_name=$_FILES["img1"]["tmp_name"];
	$pr="../images/";
	$pr1=$pr.$img1;
	move_uploaded_file($tmp_name,$pr1);
	}
	
	
	$img2 = $_FILES['img2']['name'];
	if($img2 != '')
	{
	$img2 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img2']['name']));
 	$tmp_name=$_FILES["img2"]["tmp_name"];
	$pr="../images/";
	$pr2=$pr.$img2;
	move_uploaded_file($tmp_name,$pr2);
	}

	$img3 = $_FILES['img3']['name'];
	if($img3 != '')
	{
	$img3 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img3']['name']));
 	$tmp_name=$_FILES["img3"]["tmp_name"];
	$pr="../images/";
	$pr3=$pr.$img3;
	move_uploaded_file($tmp_name,$pr3);
	}


	$img4 = $_FILES['img4']['name'];
	if($img4 != '')
	{
	$img4 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img4']['name']));
 	$tmp_name=$_FILES["img4"]["tmp_name"];
	$pr="../images/";
	$pr4=$pr.$img4;
	move_uploaded_file($tmp_name,$pr4);
	}
	
	$img5 = $_FILES['img5']['name'];
	if($img5 != '')
	{
	$img5 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img5']['name']));
 	$tmp_name=$_FILES["img5"]["tmp_name"];
	$pr="../images/";
	$pr5=$pr.$img5;
	move_uploaded_file($tmp_name,$pr5);
	}

	if($img0 != '')
 	{
    $uupQry="UPDATE user_master SET aadharcard_docs_front='$img0'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 	}


	if($img1 != '')
 	{
    $uupQry="UPDATE user_master SET aadharcard_docs_back='$img1'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 	}
 
 	if($img2 != '')
 	{
    $uupQry="UPDATE user_master SET pancard_docs='$img2'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 	}
  	if($img3 != '')
 	{
    $uupQry="UPDATE user_master SET bank_upload='$img3'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 	}
  	if($img4 != '')
 	{
    $uupQry="UPDATE user_master SET prv_upload='$img4'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
	}
  
  	if($img5 != '')
 	{
    $uupQry="UPDATE user_master SET photo='$img5'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 	}
?>
    <script language="javascript">window.location.href="employee_master.php";</script>
    <?php 
} 

	$id = $_GET['uid'];

	if(isset($_REQUEST['update'])) 
  	{
  	

	
	$uupQry="UPDATE user_master SET `username` = '".mysqli_real_escape_string($con,$_REQUEST['username'])."', `password` = '".mysqli_real_escape_string($con,$_REQUEST['password'])."', `name` = '".mysqli_real_escape_string($con,$_REQUEST['name'])."', `contact1` = '".mysqli_real_escape_string($con,$_REQUEST['contact1'])."', `contact2` = '".mysqli_real_escape_string($con,$_REQUEST['contact2'])."', `email1` = '".mysqli_real_escape_string($con,$_REQUEST['email1'])."', `salary` = '".mysqli_real_escape_string($con,$_REQUEST['salary'])."',   `address` = '".mysqli_real_escape_string($con,$_REQUEST['address'])."', `change_pwd` = '".mysqli_real_escape_string($con,$_REQUEST['change_pwd'])."',`a1` = '".mysqli_real_escape_string($con,$_REQUEST['a1'])."', `a2` = '".mysqli_real_escape_string($con,$_REQUEST['a2'])."', `a3` = '".mysqli_real_escape_string($con,$_REQUEST['a3'])."', `a4` = '".mysqli_real_escape_string($con,$_REQUEST['a4'])."', `b1` = '".mysqli_real_escape_string($con,$_REQUEST['b1'])."', `b2` = '".mysqli_real_escape_string($con,$_REQUEST['b2'])."', `b3` = '".mysqli_real_escape_string($con,$_REQUEST['b3'])."', `b4` = '".mysqli_real_escape_string($con,$_REQUEST['b4'])."', `c1` = '".mysqli_real_escape_string($con,$_REQUEST['c1'])."', `c2` = '".mysqli_real_escape_string($con,$_REQUEST['c2'])."', `c3` = '".mysqli_real_escape_string($con,$_REQUEST['c3'])."', `c4` = '".mysqli_real_escape_string($con,$_REQUEST['c4'])."', `d1` = '".mysqli_real_escape_string($con,$_REQUEST['d1'])."', `d2` = '".mysqli_real_escape_string($con,$_REQUEST['d2'])."', `d3` = '".mysqli_real_escape_string($con,$_REQUEST['d3'])."', `d4` = '".mysqli_real_escape_string($con,$_REQUEST['d4'])."', `e1` = '".mysqli_real_escape_string($con,$_REQUEST['e1'])."', `e2` = '".mysqli_real_escape_string($con,$_REQUEST['e2'])."', `e3` = '".mysqli_real_escape_string($con,$_REQUEST['e3'])."', `e4` = '".mysqli_real_escape_string($con,$_REQUEST['e4'])."', `f1` = '".mysqli_real_escape_string($con,$_REQUEST['f1'])."', `f2` = '".mysqli_real_escape_string($con,$_REQUEST['f2'])."', `f3` = '".mysqli_real_escape_string($con,$_REQUEST['f3'])."', `f4` = '".mysqli_real_escape_string($con,$_REQUEST['f4'])."', `g1` = '".mysqli_real_escape_string($con,$_REQUEST['g1'])."', `g2` = '".mysqli_real_escape_string($con,$_REQUEST['g2'])."', `g3` = '".mysqli_real_escape_string($con,$_REQUEST['g3'])."', `g4` = '".mysqli_real_escape_string($con,$_REQUEST['g4'])."', `h1` = '".mysqli_real_escape_string($con,$_REQUEST['h1'])."', `h2` = '".mysqli_real_escape_string($con,$_REQUEST['h2'])."', `h3` = '".mysqli_real_escape_string($con,$_REQUEST['h3'])."', `h4` = '".mysqli_real_escape_string($con,$_REQUEST['h4'])."', `i1` = '".mysqli_real_escape_string($con,$_REQUEST['i1'])."', `i2` = '".mysqli_real_escape_string($con,$_REQUEST['i2'])."', `i3` = '".mysqli_real_escape_string($con,$_REQUEST['i3'])."', `i4` = '".mysqli_real_escape_string($con,$_REQUEST['i4'])."', `j1` = '".mysqli_real_escape_string($con,$_REQUEST['j1'])."', `j2` = '".mysqli_real_escape_string($con,$_REQUEST['j2'])."', `j3` = '".mysqli_real_escape_string($con,$_REQUEST['j3'])."', `j4` = '".mysqli_real_escape_string($con,$_REQUEST['j4'])."', `k1` = '".mysqli_real_escape_string($con,$_REQUEST['k1'])."', `k2` = '".mysqli_real_escape_string($con,$_REQUEST['k2'])."', `k3` = '".mysqli_real_escape_string($con,$_REQUEST['k3'])."', `k4` = '".mysqli_real_escape_string($con,$_REQUEST['k4'])."', `l1` = '".mysqli_real_escape_string($con,$_REQUEST['l1'])."', `l2` = '".mysqli_real_escape_string($con,$_REQUEST['l2'])."', `l3` = '".mysqli_real_escape_string($con,$_REQUEST['l3'])."', `l4` = '".mysqli_real_escape_string($con,$_REQUEST['l4'])."', `m1` = '".mysqli_real_escape_string($con,$_REQUEST['m1'])."', `m2` = '".mysqli_real_escape_string($con,$_REQUEST['m2'])."', `m3` = '".mysqli_real_escape_string($con,$_REQUEST['m3'])."', `m4` = '".mysqli_real_escape_string($con,$_REQUEST['m4'])."', `aadharcard_no` = '".mysqli_real_escape_string($con,$_REQUEST['aadharcard_no'])."', `aadharcard_docs_front` = '".mysqli_real_escape_string($con,$_REQUEST['aadharcard_docs_front'])."', `aadharcard_docs_back` = '".mysqli_real_escape_string($con,$_REQUEST['aadharcard_docs_back'])."', `pancard_no` = '".mysqli_real_escape_string($con,$_REQUEST['pancard_no'])."', `pancard_docs` = '".mysqli_real_escape_string($con,$_REQUEST['pancard_docs'])."', `bank_name` = '".mysqli_real_escape_string($con,$_REQUEST['bank_name'])."', `bank_acno` = '".mysqli_real_escape_string($con,$_REQUEST['bank_acno'])."', `bank_ifsc` = '".mysqli_real_escape_string($con,$_REQUEST['bank_ifsc'])."', `bank_upload` = '".mysqli_real_escape_string($con,$_REQUEST['bank_upload'])."', `prv_pf` = '".mysqli_real_escape_string($con,$_REQUEST['prv_pf'])."', `prv_esic` = '".mysqli_real_escape_string($con,$_REQUEST['prv_esic'])."', `prv_mediclaim` = '".mysqli_real_escape_string($con,$_REQUEST['prv_mediclaim'])."', `prv_exp` = '".mysqli_real_escape_string($con,$_REQUEST['prv_exp'])."', `prv_upload` = '".mysqli_real_escape_string($con,$_REQUEST['prv_upload'])."', `data_access` = '".mysqli_real_escape_string($con,$_REQUEST['data_access'])."', `right_service` = '".mysqli_real_escape_string($con,$_REQUEST['right_service'])."', `right_quot` = '".mysqli_real_escape_string($con,$_REQUEST['right_quot'])."', `right_dispatch` = '".mysqli_real_escape_string($con,$_REQUEST['right_dispatch'])."', `right_closelead` = '".mysqli_real_escape_string($con,$_REQUEST['right_closelead'])."', `right_drawing` = '".mysqli_real_escape_string($con,$_REQUEST['right_drawing'])."', `report_1` = '".mysqli_real_escape_string($con,$_REQUEST['report_1'])."', `report_2` = '".mysqli_real_escape_string($con,$_REQUEST['report_2'])."', `report_3` = '".mysqli_real_escape_string($con,$_REQUEST['report_3'])."', `report_4` = '".mysqli_real_escape_string($con,$_REQUEST['report_4'])."', `report_5` = '".mysqli_real_escape_string($con,$_REQUEST['report_5'])."', `designation` = '".mysqli_real_escape_string($con,$_REQUEST['designation'])."', `dob` = '".mysqli_real_escape_string($con,$_REQUEST['dob'])."' WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
  
 	$img0 = $_FILES['img0']['name'];
	if($img0 != '')
	{
	$img0 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img0']['name']));
 	$tmp_name=$_FILES["img0"]["tmp_name"];
	$pr="../images/";
	$pr0=$pr.$img0;
	move_uploaded_file($tmp_name,$pr0);
	}
	
	$img1 = $_FILES['img1']['name'];
	if($img1 != '')
	{
	$img1 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img1']['name']));
 	$tmp_name=$_FILES["img1"]["tmp_name"];
	$pr="../images/";
	$pr1=$pr.$img1;
	move_uploaded_file($tmp_name,$pr1);
	}
	
	
	$img2 = $_FILES['img2']['name'];
	if($img2 != '')
	{
	$img2 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img2']['name']));
 	$tmp_name=$_FILES["img2"]["tmp_name"];
	$pr="../images/";
	$pr2=$pr.$img2;
	move_uploaded_file($tmp_name,$pr2);
	}

	$img3 = $_FILES['img3']['name'];
	if($img3 != '')
	{
	$img3 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img3']['name']));
 	$tmp_name=$_FILES["img3"]["tmp_name"];
	$pr="../images/";
	$pr3=$pr.$img3;
	move_uploaded_file($tmp_name,$pr3);
	}


	$img4 = $_FILES['img4']['name'];
	if($img4 != '')
	{
	$img4 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img4']['name']));
 	$tmp_name=$_FILES["img4"]["tmp_name"];
	$pr="../images/";
	$pr4=$pr.$img4;
	move_uploaded_file($tmp_name,$pr4);
	}
	
	$img5 = $_FILES['img5']['name'];
	if($img5 != '')
	{
	$img5 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img5']['name']));
 	$tmp_name=$_FILES["img5"]["tmp_name"];
	$pr="../images/";
	$pr5=$pr.$img5;
	move_uploaded_file($tmp_name,$pr5);
	}

	if($img0 != '')
 	{
    $uupQry="UPDATE user_master SET aadharcard_docs_front='$img0'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 	}


	if($img1 != '')
 	{
    $uupQry="UPDATE user_master SET aadharcard_docs_back='$img1'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 	}
 
 	if($img2 != '')
 	{
    $uupQry="UPDATE user_master SET pancard_docs='$img2'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 	}
  	if($img3 != '')
 	{
    $uupQry="UPDATE user_master SET bank_upload='$img3'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 	}
  	if($img4 != '')
 	{
    $uupQry="UPDATE user_master SET prv_upload='$img4'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
	}
  
  	if($img5 != '')
 	{
    $uupQry="UPDATE user_master SET photo='$img5'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 	}
 // exit();
	?>
    <script language="javascript">window.location.href="employee_master.php";</script>
    <?php  } ?>
    <?php 
					$ure=mysqli_query($con,"select * from user_master where id = '$id'");
					$urow=mysqli_fetch_array($ure); ?>
    <div class="card mb-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
              <form autocomplete="off"  name="form" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""><strong class="btn btn-mini btn-success">Basic Employee Detail</strong> </label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Join Date </label>
                      <input placeholder="DD-MM-YYYY" class="form-control" name="join_date"  value="<?php if($id == '') { echo date('Y-m-d'); } else { echo $urow['join_date']; } ?>" type="date" >
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Employee Name<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="name"  value="<?php echo $urow['name']; ?>" required type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Username<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="username"  value="<?php echo $urow['username']; ?>" required type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Password<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="password"  value="<?php echo $urow['password']; ?>" required type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Contact No 1<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="contact1"  value="<?php echo $urow['contact1']; ?>" required type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Contact No 2</label>
                      <input class="form-control" name="contact2"  value="<?php echo $urow['contact2']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Email</label>
                      <input class="form-control" name="email1"  value="<?php echo $urow['email1']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Employee Photo</label>
                      <input class="form-control"  name="img5" type="file">
                      <?php if($id) { ?>
                      <img src="../images/<?php echo $urow['photo']; ?>" width="100"  />
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Employee Address</label>
                      <textarea name="address" class="form-control" style="width:100%; height:40px"><?php echo $urow['address']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Date of Birth</label>
                      <input class="form-control datepicker2" placeholder="DD-MM-YYYY"  name="dob"  value="<?php echo $urow['dob']; ?>" type="date">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""><strong class="btn btn-mini btn-success">Employee Document</strong> </label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Aadhar Card No<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="aadharcard_no"  value="<?php echo $urow['aadharcard_no']; ?>" required  type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Aadhar Card Front Upload<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="img0"  type="file">
                      <?php $aadharcard_docs_front = $urow['aadharcard_docs_front'];
						  if($aadharcard_docs_front != '') { ?>
                      <a href="../images/<?php echo $aadharcard_docs_front; ?>" target="_blank" class="btn btn-mini btn-success">View</a>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Aadhar Card Back Upload<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="img1"  type="file">
                      <?php $aadharcard_docs_back = $urow['aadharcard_docs_back'];
						  if($aadharcard_docs_back != '') { ?>
                      <a href="../images/<?php echo $aadharcard_docs_back; ?>" target="_blank" class="btn btn-mini btn-success">View</a>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group"> </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Pan Card No </label>
                      <input class="form-control" name="pancard_no"  value="<?php echo $urow['pancard_no']; ?>"  type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Pan Card Upload </label>
                      <input class="form-control" name="img2"  type="file">
                      <?php $pancard_docs = $urow['pancard_docs'];
						  if($pancard_docs != '') { ?>
                      <a href="../images/<?php echo $pancard_docs; ?>" target="_blank" class="btn btn-mini btn-success">View</a>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""><strong class="btn btn-mini btn-success">Employee Bank Detail</strong> </label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Bank Name </label>
                      <input class="form-control" name="bank_name"  value="<?php echo $urow['bank_name']; ?>"  type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> A/C No </label>
                      <input class="form-control" name="bank_acno"  value="<?php echo $urow['bank_acno']; ?>"  type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> IFSC Code </label>
                      <input class="form-control" name="bank_ifsc"  value="<?php echo $urow['bank_ifsc']; ?>"  type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Passbook/Cheque Upload </label>
                      <input class="form-control" name="img3"  type="file">
                      <?php $bank_upload = $urow['bank_upload'];
						  if($bank_upload != '') { ?>
                      <a href="../images/<?php echo $bank_upload; ?>" target="_blank" class="btn btn-mini btn-success">View</a>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""><strong class="btn btn-mini btn-success">User Rights</strong> </label>
                    </div>
                  </div>
                    <?php 
				    $urer=mysqli_query($con,"select * from user_master where id = '$admin_id'");
				    $urowr=mysqli_fetch_array($urer);
					$right_a4r = $urowr['a4']; 
					$right_b4r = $urowr['b4']; 
					$right_c4r = $urowr['c4']; 
					$right_d4r = $urowr['d4']; 
					$right_e4r = $urowr['e4']; 
					$right_f4r = $urowr['f4']; 
					$right_g4r = $urowr['g4']; 
					$right_h4r = $urowr['h4']; 
					$right_i4r = $urowr['i4']; 
 ?>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <table width="" border="0">
                      	<?php if($right_a4r == '1') { ?>
                        <tr>
                          <td><strong>Manage Membership </strong></td>
                          <td>&nbsp;&nbsp;
                            <?php /*?><input name="a1" type="checkbox"   value="1" <?php if($urow['a1'] == '1') echo 'checked="checked"';?> class="limiter"/>
                            &nbsp;Insert&nbsp;
                            <input name="a2"    type="checkbox"   value="1" <?php if($urow['a2'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Update&nbsp;
                            <input name="a3"    type="checkbox"   value="1" <?php if($urow['a3'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Delete&nbsp;<?php */?>
                            <input name="a4"    type="checkbox"   value="1" <?php if($urow['a4'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;View&nbsp; </td>
                        </tr>
                        <?php } ?>
                      	<?php if($right_b4r == '1') { ?>
                        <tr>
                          <td><strong>Manage Coach </strong></td>
                          <td>&nbsp;&nbsp;
                            <?php /*?><input name="b1" type="checkbox"   value="1" <?php if($urow['b1'] == '1') echo 'checked="checked"';?> class="limiter"/>
                            &nbsp;Insert&nbsp;
                            <input name="b2"    type="checkbox"   value="1" <?php if($urow['b2'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Update&nbsp;
                            <input name="b3"    type="checkbox"   value="1" <?php if($urow['b3'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Delete&nbsp;<?php */?>
                            <input name="b4"    type="checkbox"   value="1" <?php if($urow['b4'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;View&nbsp; </td>
                        </tr>
                        <?php } ?>
                      	<?php if($right_c4r == '1') { ?>
                        <tr>
                          <td><strong>Manage Promocode </strong></td>
                          <td>&nbsp;&nbsp;
                            <?php /*?><input name="c1" type="checkbox"   value="1" <?php if($urow['c1'] == '1') echo 'checked="checked"';?> class="limiter"/>
                            &nbsp;Insert&nbsp;
                            <input name="c2"    type="checkbox"   value="1" <?php if($urow['c2'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Update&nbsp;
                            <input name="c3"    type="checkbox"   value="1" <?php if($urow['c3'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Delete&nbsp;<?php */?>
                            <input name="c4"    type="checkbox"   value="1" <?php if($urow['c4'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;View&nbsp; </td>
                        </tr>
                        <?php } ?>
                      	<?php if($right_d4r == '1') { ?>
                        <tr>
                          <td><strong>Manage Event </strong></td>
                          <td>&nbsp;&nbsp;
                            <?php /*?><input name="d1" type="checkbox"   value="1" <?php if($urow['d1'] == '1') echo 'checked="checked"';?> class="limiter"/>
                            &nbsp;Insert&nbsp;
                            <input name="d2"    type="checkbox"   value="1" <?php if($urow['d2'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Update&nbsp;
                            <input name="d3"    type="checkbox"   value="1" <?php if($urow['d3'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Delete&nbsp;<?php */?>
                            <input name="d4"    type="checkbox"   value="1" <?php if($urow['d4'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;View&nbsp; </td>
                        </tr>
                        <?php } ?>
                      	<?php if($right_e4r == '1') { ?>
                        <tr>
                          <td><strong>Equipment Rent </strong></td>
                          <td>&nbsp;&nbsp;
                            <?php /*?><input name="e1" type="checkbox"   value="1" <?php if($urow['e1'] == '1') echo 'checked="checked"';?> class="limiter"/>
                            &nbsp;Insert&nbsp;
                            <input name="e2"    type="checkbox"   value="1" <?php if($urow['e2'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Update&nbsp;
                            <input name="e3"    type="checkbox"   value="1" <?php if($urow['e3'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Delete&nbsp;<?php */?>
                            <input name="e4"    type="checkbox"   value="1" <?php if($urow['e4'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;View&nbsp; </td>
                        </tr>
                        <?php } ?>
                      	<?php if($right_f4r == '1') { ?>
                        <tr>
                          <td><strong>Manage Cafe </strong></td>
                          <td>&nbsp;&nbsp;
                            <?php /*?><input name="f1" type="checkbox"   value="1" <?php if($urow['f1'] == '1') echo 'checked="checked"';?> class="limiter"/>
                            &nbsp;Insert&nbsp;
                            <input name="f2"    type="checkbox"   value="1" <?php if($urow['f2'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Update&nbsp;
                            <input name="f3"    type="checkbox"   value="1" <?php if($urow['f3'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Delete&nbsp;<?php */?>
                            <input name="f4"    type="checkbox"   value="1" <?php if($urow['f4'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;View&nbsp; </td>
                        </tr>
                        <?php } ?>
                      	<?php if($right_g4r == '1') { ?>
                        <tr>
                          <td><strong>Manage Expense </strong></td>
                          <td>&nbsp;&nbsp;
                            <?php /*?><input name="g1" type="checkbox"   value="1" <?php if($urow['g1'] == '1') echo 'checked="checked"';?> class="limiter"/>
                            &nbsp;Insert&nbsp;
                            <input name="g2"    type="checkbox"   value="1" <?php if($urow['g2'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Update&nbsp;
                            <input name="g3"    type="checkbox"   value="1" <?php if($urow['g3'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Delete&nbsp;<?php */?>
                            <input name="g4"    type="checkbox"   value="1" <?php if($urow['g4'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;View&nbsp; </td>
                        </tr>
                        <?php } ?>
                      	<?php if($right_h4r == '1') { ?>
                        <tr>
                          <td><strong>Slot Disable </strong></td>
                          <td>&nbsp;&nbsp;
                            <?php /*?><input name="h1" type="checkbox"   value="1" <?php if($urow['h1'] == '1') echo 'checked="checked"';?> class="limiter"/>
                            &nbsp;Insert&nbsp;
                            <input name="h2"    type="checkbox"   value="1" <?php if($urow['h2'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Update&nbsp;
                            <input name="h3"    type="checkbox"   value="1" <?php if($urow['h3'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Delete&nbsp;<?php */?>
                            <input name="h4"    type="checkbox"   value="1" <?php if($urow['h4'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;View&nbsp; </td>
                        </tr>
                        <?php } ?>
                      	<?php if($right_i4r == '1') { ?>
                        <tr>
                          <td><strong>Manage Employee/Staff </strong></td>
                          <td>&nbsp;&nbsp;
                            <?php /*?><input name="i1" type="checkbox"   value="1" <?php if($urow['i1'] == '1') echo 'checked="checked"';?> class="limiter"/>
                            &nbsp;Insert&nbsp;
                            <input name="i2"    type="checkbox"   value="1" <?php if($urow['i2'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Update&nbsp;
                            <input name="i3"    type="checkbox"   value="1" <?php if($urow['i3'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Delete&nbsp;<?php */?>
                            <input name="i4"    type="checkbox"   value="1" <?php if($urow['i4'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;View&nbsp; </td>
                        </tr>
                        <?php } ?>
                        <?php /*?>
                        <tr>
                          <td><strong>Production </strong></td>
                          <td>&nbsp;&nbsp;
                            <input name="j1" type="checkbox"   value="1" <?php if($urow['j1'] == '1') echo 'checked="checked"';?> class="limiter"/>
                            &nbsp;Insert&nbsp;
                            <input name="j2"    type="checkbox"   value="1" <?php if($urow['j2'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Update&nbsp;
                            <input name="j3"    type="checkbox"   value="1" <?php if($urow['j3'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Delete&nbsp;
                            <input name="j4"    type="checkbox"   value="1" <?php if($urow['j4'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;View&nbsp; </td>
                        </tr>
                        <tr>
                          <td><strong>Return </strong></td>
                          <td>&nbsp;&nbsp;
                            <input name="k1" type="checkbox"   value="1" <?php if($urow['k1'] == '1') echo 'checked="checked"';?> class="limiter"/>
                            &nbsp;Insert&nbsp;
                            <input name="k2"    type="checkbox"   value="1" <?php if($urow['k2'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Update&nbsp;
                            <input name="k3"    type="checkbox"   value="1" <?php if($urow['k3'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;Delete&nbsp;
                            <input name="k4"    type="checkbox"   value="1" <?php if($urow['k4'] == '1') echo 'checked="checked"';?>  class="limiter" />
                            &nbsp;View&nbsp; </td>
                        </tr><?php */?>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="form-buttons-w">
                  <?php
                        if($id)
						{
						?>
                  <input type="submit" name="update" value="Update" class="btn btn-primary">
                  <?php 
}
else 
{
?>
                  <input type="submit" name="insert" value="Insert" class="btn btn-primary">
                  <input value="Cancel" name="cancel" type="reset" class="btn btn-danger">
                  <?php } ?>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
              <div class="table-responsive">
                <table class="table " id="dataTables-example">
                  <thead>
                    <tr>
                      <th> Employee  Name </th>
                      <th> Contact/Email </th>
                      <th> Username</th>
                      <th> Password</th>
                      <th> Status </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								 
						$ure=mysqli_query($con,"select * from user_master where user_type = 'venue_employee' and manager_id = '$admin_id'");
						while($urow=mysqli_fetch_array($ure))
						 {
						?>
                    <tr class="showtr">
                      <td><?php echo $urow['name']; ?> </td>
                      <td><?php echo $urow['contact1']; ?><br/>
                        <?php echo $urow['contact2']; ?><br/>
                        <?php echo $urow['email1']; ?> </td>
                      <td><?php echo $urow['username']; ?></td>
                      <td><?php echo $urow['password']; ?></td>
                      <td><div class="material-switch">
                          <input id="someSwitchOptionSuccess<?php echo $urow[0]; ?>" value="<?php echo $urow[0]; ?>" name="someSwitchOption001" type="checkbox" <?php if($urow['status']=='1') { echo"checked"; }?> onClick="status_cng(this.value);"/>
                          <label for="someSwitchOptionSuccess<?php echo $urow[0]; ?>" class="label-success"></label>
                        </div></td>
                      <td class="center"><a class="btn btn-mini btn-success" href="employee_master.php?uid=<?php echo $urow[0]; ?>" title=""><i class="icon-pencil"></i></a> <a href="#" id="<?php echo $urow[0]; ?>" class="delete btn btn-mini btn-danger" title="Delete" ><i class="icon-trash"></i></a> </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <script>
function status_cng(value)
{
    var pid = value;
    $.ajax({
        type:"POST",
        data:"pid="+pid,
        url:"employee_master.php",
        cache:false,
        success:function()
        {
        }
    });
}
</script>
                <?php 
if($_POST['pid'])
{
$pid=$_POST['pid'];
$ure=mysqli_query($con,"select * from user_master where id = '$pid'");
$urow=mysqli_fetch_array($ure);
$ostatus = $urow['status'];
if($ostatus == '1') { $status = '0'; } else { $status = '1'; }
$uupQry="UPDATE user_master SET status='$status' WHERE id='$pid'";
$uuresult=mysqli_query($con,$uupQry);
}
?>
                <script src="js/jquery.min.js"></script>
                <script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;
if(confirm("Are you sure you want to Delete?"))
{
 $.ajax({
   type: "POST",
   url: "employee_master.php",
   data: info,
   success: function(){
 }
});
  $(this).parents(".showtr").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});
});
</script>
                <?php 
if($_POST['id'])
{
$id=$_POST['id'];
$delete = "DELETE FROM user_master WHERE id = '$id'";
mysqli_query($con, $delete);
}
?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content page ends -->
</div>
<?php include 'footer.php' ?>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="vendor/bootstrap-4.1.3/js/bootstrap.min.js"></script>
<!-- Cookie jquery file -->
<script src="vendor/cookie/jquery.cookie.js"></script>
<!-- sparklines chart jquery file -->
<script src="vendor/sparklines/jquery.sparkline.min.js"></script>
<!-- Circular progress gauge jquery file -->
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<!-- Swiper carousel jquery file -->
<script src="vendor/swiper/js/swiper.min.js"></script>
<!-- Chart js jquery file -->
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/chartjs/utils.js"></script>
<!-- DataTable jquery file -->
<script src="vendor/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script src="vendor/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
<!-- datepicker jquery file -->
<script src="vendor/bootstrap-daterangepicker-master/moment.js"></script>
<script src="vendor/bootstrap-daterangepicker-master/daterangepicker.js"></script>
<!-- jVector map jquery file -->
<script src="vendor/jquery-jvectormap/jquery-jvectormap.js"></script>
<script src="vendor/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- circular progress file -->
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<!-- Application main common jquery file -->
<script src="js/main.js"></script>
<!-- page specific script -->
<script>
        "use strict"
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                "order": [
                    [3, "desc"]
                ]
            });
        });

    </script>
<!-- page specific script -->
</body>
</html>
