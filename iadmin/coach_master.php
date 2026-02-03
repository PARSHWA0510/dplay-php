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
<link rel="stylesheet" href="vendor/chosen1.8/chosen.css">
<link id="theme" rel="stylesheet" href="css/purplesidebar.css" type="text/css">
<link href="icon_fonts_assets/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
function showUser1(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","seo_title.php?q="+str,true);
xmlhttp.send();
}
</script>
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
            <h2 class="content-color-primary page-title">Coach Master</h2>
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
$sport_type = implode(',', (array)($_REQUEST['sport_type'] ?? []));
	
    $sql=("INSERT INTO `user_master` (`username`, `password`, `name`, `contact1`, `contact2`, `email1`, `salary`, `status`, `user_type`, `join_date`, `photo`, `address`, `change_pwd`,`aadharcard_no`, `aadharcard_docs_front`, `aadharcard_docs_back`, `pancard_no`, `pancard_docs`, `bank_name`, `bank_acno`, `bank_ifsc`, `bank_upload`, `prv_pf`, `prv_esic`, `prv_mediclaim`, `prv_exp`, `prv_upload`, `data_access`, `right_service`, `right_quot`, `right_dispatch`, `right_closelead`,`venue_id`,`state`,`city`,`sport_type`,`coaching_fees`,`coaching_time`,`short_info`,`additional_info`,`dob`,`manager_id`,`start_date`,`end_date`,`seo_url`, `coach_model`, `subscription_start`, `subscription_end`, `commission`) VALUES ('".mysqli_real_escape_string($con,$_REQUEST['username'])."', '".mysqli_real_escape_string($con,$_REQUEST['password'])."', '".mysqli_real_escape_string($con,$_REQUEST['name'])."', '".mysqli_real_escape_string($con,$_REQUEST['contact1'])."', '".mysqli_real_escape_string($con,$_REQUEST['contact2'])."', '".mysqli_real_escape_string($con,$_REQUEST['email1'])."', '".mysqli_real_escape_string($con,$_REQUEST['salary'])."', '1', 'coach', '$join_date', '".mysqli_real_escape_string($con,$_REQUEST['photo'])."', '".mysqli_real_escape_string($con,$_REQUEST['address'])."', '".mysqli_real_escape_string($con,$_REQUEST['change_pwd'])."', '".mysqli_real_escape_string($con,$_REQUEST['aadharcard_no'])."', '".mysqli_real_escape_string($con,$_REQUEST['aadharcard_docs_front'])."', '".mysqli_real_escape_string($con,$_REQUEST['aadharcard_docs_back'])."', '".mysqli_real_escape_string($con,$_REQUEST['pancard_no'])."', '".mysqli_real_escape_string($con,$_REQUEST['pancard_docs'])."', '".mysqli_real_escape_string($con,$_REQUEST['bank_name'])."', '".mysqli_real_escape_string($con,$_REQUEST['bank_acno'])."', '".mysqli_real_escape_string($con,$_REQUEST['bank_ifsc'])."', '".mysqli_real_escape_string($con,$_REQUEST['bank_upload'])."', '".mysqli_real_escape_string($con,$_REQUEST['prv_pf'])."', '".mysqli_real_escape_string($con,$_REQUEST['prv_esic'])."', '".mysqli_real_escape_string($con,$_REQUEST['prv_mediclaim'])."', '".mysqli_real_escape_string($con,$_REQUEST['prv_exp'])."', '".mysqli_real_escape_string($con,$_REQUEST['prv_upload'])."', '".mysqli_real_escape_string($con,$_REQUEST['data_access'])."', '".mysqli_real_escape_string($con,$_REQUEST['right_service'])."', '".mysqli_real_escape_string($con,$_REQUEST['right_quot'])."', '".mysqli_real_escape_string($con,$_REQUEST['right_dispatch'])."','".mysqli_real_escape_string($con,$_REQUEST['right_closelead'])."','".mysqli_real_escape_string($con,$_REQUEST['venue_id'])."','".mysqli_real_escape_string($con,$_REQUEST['state'])."','".mysqli_real_escape_string($con,$_REQUEST['city'])."','$sport_type','".mysqli_real_escape_string($con,$_REQUEST['coaching_fees'])."','".mysqli_real_escape_string($con,$_REQUEST['coaching_time'])."','".mysqli_real_escape_string($con,$_REQUEST['short_info'])."','".mysqli_real_escape_string($con,$_REQUEST['additional_info'])."','".mysqli_real_escape_string($con,$_REQUEST['dob'])."','$admin_id','".mysqli_real_escape_string($con,$_REQUEST['start_date'])."','".mysqli_real_escape_string($con,$_REQUEST['end_date'])."','".mysqli_real_escape_string($con,$_REQUEST['seo_url'])."','".mysqli_real_escape_string($con,$_REQUEST['coach_model'])."','".mysqli_real_escape_string($con,$_REQUEST['subscription_start'])."','".mysqli_real_escape_string($con,$_REQUEST['subscription_end'])."','".mysqli_real_escape_string($con,$_REQUEST['commission'])."')");	 
 
$z = mysqli_query($con,$sql);
		
$id = mysqli_insert_id($con);
  
  foreach($_POST['sport_type'] as $key=>$val)
						{
							if($val != '')
							{
								$qry_main = "INSERT INTO `user_sporttype` (`coach_id` ,`sport_type`) VALUES ('$id','$val')";
								mysqli_query($con,$qry_main);
							}
						}


foreach($_POST['from_amt'] as $key=>$val)
						{
							if($val != '')
							{
								     $qry_main = "INSERT INTO `coach_subscription_range` (`coach_id` ,`from_amt` ,`to_amt` ,`commission_per`) VALUES ('$id','$val', '".$_POST['to_amt'][$key]."', '".$_POST['commission_per'][$key]."')";
								mysqli_query($con,$qry_main);
							}
						}

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
    <script language="javascript">window.location.href="coach_master.php";</script>
    <?php 
} 

	$id = $_GET['uid'];

	if(isset($_REQUEST['update'])) 
  	{
  	
	$date = date("Y-m-d", strtotime($_REQUEST['join_date']));
$sport_type = implode(',', (array)($_REQUEST['sport_type'] ?? []));
	
	  $uupQry="UPDATE user_master SET `username` = '".mysqli_real_escape_string($con,$_REQUEST['username'])."', `password` = '".mysqli_real_escape_string($con,$_REQUEST['password'])."', `name` = '".mysqli_real_escape_string($con,$_REQUEST['name'])."', `contact1` = '".mysqli_real_escape_string($con,$_REQUEST['contact1'])."', `contact2` = '".mysqli_real_escape_string($con,$_REQUEST['contact2'])."', `email1` = '".mysqli_real_escape_string($con,$_REQUEST['email1'])."', `salary` = '".mysqli_real_escape_string($con,$_REQUEST['salary'])."',   `address` = '".mysqli_real_escape_string($con,$_REQUEST['address'])."', `change_pwd` = '".mysqli_real_escape_string($con,$_REQUEST['change_pwd'])."', `aadharcard_no` = '".mysqli_real_escape_string($con,$_REQUEST['aadharcard_no'])."', `aadharcard_docs_front` = '".mysqli_real_escape_string($con,$_REQUEST['aadharcard_docs_front'])."', `aadharcard_docs_back` = '".mysqli_real_escape_string($con,$_REQUEST['aadharcard_docs_back'])."', `pancard_no` = '".mysqli_real_escape_string($con,$_REQUEST['pancard_no'])."', `pancard_docs` = '".mysqli_real_escape_string($con,$_REQUEST['pancard_docs'])."', `bank_name` = '".mysqli_real_escape_string($con,$_REQUEST['bank_name'])."', `bank_acno` = '".mysqli_real_escape_string($con,$_REQUEST['bank_acno'])."', `bank_ifsc` = '".mysqli_real_escape_string($con,$_REQUEST['bank_ifsc'])."', `bank_upload` = '".mysqli_real_escape_string($con,$_REQUEST['bank_upload'])."', `prv_pf` = '".mysqli_real_escape_string($con,$_REQUEST['prv_pf'])."', `prv_esic` = '".mysqli_real_escape_string($con,$_REQUEST['prv_esic'])."', `prv_mediclaim` = '".mysqli_real_escape_string($con,$_REQUEST['prv_mediclaim'])."', `prv_exp` = '".mysqli_real_escape_string($con,$_REQUEST['prv_exp'])."', `prv_upload` = '".mysqli_real_escape_string($con,$_REQUEST['prv_upload'])."', `data_access` = '".mysqli_real_escape_string($con,$_REQUEST['data_access'])."', `state` = '".mysqli_real_escape_string($con,$_REQUEST['state'])."', `city` = '".mysqli_real_escape_string($con,$_REQUEST['city'])."', `sport_type` = '$sport_type', `right_closelead` = '".mysqli_real_escape_string($con,$_REQUEST['right_closelead'])."', `venue_id` = '".mysqli_real_escape_string($con,$_REQUEST['venue_id'])."', `coaching_fees` = '".mysqli_real_escape_string($con,$_REQUEST['coaching_fees'])."', `coaching_time` = '".mysqli_real_escape_string($con,$_REQUEST['coaching_time'])."',  `additional_info` = '".mysqli_real_escape_string($con,$_REQUEST['additional_info'])."',`dob` = '".mysqli_real_escape_string($con,$_REQUEST['dob'])."',`short_info` = '".mysqli_real_escape_string($con,$_REQUEST['short_info'])."',`start_date` = '".mysqli_real_escape_string($con,$_REQUEST['start_date'])."',`end_date` = '".mysqli_real_escape_string($con,$_REQUEST['end_date'])."',`seo_url` = '".mysqli_real_escape_string($con,$_REQUEST['seo_url'])."',`coach_model` = '".mysqli_real_escape_string($con,$_REQUEST['coach_model'])."',`subscription_start` = '".mysqli_real_escape_string($con,$_REQUEST['subscription_start'])."',`subscription_end` = '".mysqli_real_escape_string($con,$_REQUEST['subscription_end'])."',`commission` = '".mysqli_real_escape_string($con,$_REQUEST['commission'])."' WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);

$delete = "DELETE FROM user_sporttype WHERE coach_id = '$id'";
mysqli_query($con, $delete);

foreach($_POST['sport_type'] as $key=>$val)
						{
							if($val != '')
							{
								$qry_main = "INSERT INTO `user_sporttype` (`coach_id` ,`sport_type`) VALUES ('$id','$val')";
								mysqli_query($con,$qry_main);
							}
						}

foreach($_POST['from_amt'] as $key=>$val)
						{
							if($val != '')
							{
								     $qry_main = "INSERT INTO `coach_subscription_range` (`coach_id` ,`from_amt` ,`to_amt` ,`commission_per`) VALUES ('$id','$val', '".$_POST['to_amt'][$key]."', '".$_POST['commission_per'][$key]."')";
								mysqli_query($con,$qry_main);
							}
						}
  	
	//exit();
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
    <script language="javascript">window.location.href="coach_master.php";</script>
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
                      <label for=""><strong class="btn btn-mini btn-success">Basic Detail</strong> </label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Join Date </label>
                      <input placeholder="DD-MM-YYYY" class="form-control" name="join_date"  value="<?php echo $urow['join_date'];  ?>" type="date" >
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Coach Name</label>
                      <input class="form-control" name="name" onChange="showUser1(this.value)"  value="<?php echo $urow['name']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for=""> SEO URL <span style="color:#FF0000">*</span></label>
                      <span id="txtHint1"><input class="form-control" name="seo_url"  required value="<?php echo $urow['seo_url']; ?>" type="text"></span>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Contact No 1</label>
                      <input class="form-control" name="contact1"  value="<?php echo $urow['contact1']; ?>" type="text">
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
                      <label for="">Photo</label>
                      <input class="form-control"  name="img5" type="file">
                      <?php if($id) { ?>
                      <img src="../images/<?php echo $urow['photo']; ?>" width="100"  />
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Address</label>
                      <textarea name="address" class="form-control" style="width:100%; height:40px"><?php echo $urow['address']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> State Name<span class="required">*</span></label>
                      <select name="state" class="form-control select2" required onChange="showUser(this.value)">
                        <option value="">Select State</option>
                        <?php
		$ures=mysqli_query($con,"select * from state_master order by statename asc");
		while($urows=mysqli_fetch_array($ures)) {?>
                        <option value="<?php echo $urows['statename']; ?>" <?php if($urows['statename'] == $urow['state']) echo 'selected="selected"';?>><?php echo $urows['statename']; ?>&nbsp;|&nbsp;<?php echo $urows['gst_code']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> City Name<span class="required">*</span></label>
                      <span id="txtHint">
                      <select name="city" class="form-control select2" required id="select">
                        <option value="">Select City</option>
                        <?php
		$ures=mysqli_query($con,"select * from city_master order by city asc");
		while($urows=mysqli_fetch_array($ures)) {?>
                        <option value="<?php echo $urows['city']; ?>"  <?php if($urows['city'] == $urow['city']) echo 'selected="selected"';?>><?php echo $urows['city']; ?></option>
                        <?php } ?>
                      </select>
                      <input type="hidden" name="placeof_supply" class="form-control halfwidth" value="<?php echo $row['placeof_supply']; ?>">
                      </span> </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""><strong class="btn btn-mini btn-success">Document</strong> </label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Aadhar Card No </label>
                      <input class="form-control" name="aadharcard_no"  value="<?php echo $urow['aadharcard_no']; ?>"  type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Aadhar Card Front Upload </label>
                      <input class="form-control" name="img0"  type="file">
                      <?php $aadharcard_docs_front = $urow['aadharcard_docs_front'];
						  if($aadharcard_docs_front != '') { ?>
                      <a href="../images/<?php echo $aadharcard_docs_front; ?>" target="_blank" class="btn btn-mini btn-success">View</a>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Aadhar Card Back Upload </label>
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
                      <label for=""><strong class="btn btn-mini btn-success">Other</strong> </label>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="">Subscription Fees </label>
                      <input class="form-control" name="coaching_fees"  required value="<?php echo $urow['coaching_fees']; ?>"  type="text">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for=""> Subscription Start </label>
                      <input class="form-control" name="start_date"  required value="<?php echo $urow['start_date']; ?>"  type="date">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for=""> Subscription End </label>
                      <input class="form-control" name="end_date"  required value="<?php echo $urow['end_date']; ?>"  type="date">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Username/Contact No </label>
                      <input class="form-control" name="username"  required value="<?php echo $urow['username']; ?>"  type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Password </label>
                      <input class="form-control" name="password" required  value="<?php echo $urow['password']; ?>"  type="text">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for=""> Sport Type</label>
                      <?php $sport_type = explode(',',$urow['sport_type']);   $ids = "'" . implode("','", $sport_type) . "'";  ?>
                      <select class="chosen_select form-control" data-placeholder="Choose a Sport Type..." multiple="multiple" name="sport_type[]">
                        <option value=""></option>
                        <?php $ures=mysqli_query($con,"select * from sport_type where status = '1' and name IN ($ids)  order by name asc");
								while($urows=mysqli_fetch_array($ures))
								{
								?>
                        <option value="<?php echo $urows['name']; ?>" selected="selected"> <?php echo $urows['name']; ?></option>
                        <?php } ?>
                        <?php $ures=mysqli_query($con,"select * from sport_type where status = '1' and name NOT IN ($ids)  order by name asc");
								while($urows=mysqli_fetch_array($ures))
								{
								?>
                        <option value="<?php echo $urows['name']; ?>"> <?php echo $urows['name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Short Information</label>
                      <textarea name="short_info" class="form-control" style="width:100%; height:40px"><?php echo $urow['short_info']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""> Additional Information<span class="required">*</span></label>
                      <textarea name="additional_info" class="input-xlarge" style="width:90%; height:150px"/>
                      <?php echo $urow['additional_info']; ?>
                      </textarea>
                      <script type="text/javascript">
					//<![CDATA[
		 
						// This call can be placed at any point after the
						// <textarea>, or inside a <head><script> in a
						// window.onload event handler.
						// Replace the <textarea id="editor"> with an CKEditor
						// instance, using default configurations.
						CKEDITOR.env.isCompatible = true;
						CKEDITOR.replace( 'additional_info' );
					//]]>
					</script>
                    </div>
                  </div>
                  
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""><strong>Coach Model : </strong></label>
                      <input name="coach_model"  required onclick = "showMessage311(2)"  type="radio"  value="subscription"  <?php if($urow['coach_model'] == 'subscription') echo 'checked="checked"';?>/>
                      &nbsp;Subscription Based&nbsp;
                      <input name="coach_model" required  onclick = "showMessage311(1)"  type="radio"  value="commission"  <?php if($urow['coach_model'] == 'commission') echo 'checked="checked"';?>/>
                      &nbsp;Commission Based
                      <?php $coach_model = $urow['coach_model'];
if($coach_model == 'commission') {  $x1 = 'block'; } else {  $x1 = 'none'; } 
if($coach_model == 'subscription') {  $x2 = 'block'; } else {  $x2 = 'none'; } ?>
                      <div id="fine411" style="display:<?php echo $x1; ?>">
                        Enter Commission (%)
                        <input type="text" name="commission" value="<?php echo $urow['commission']; ?>" style="width:150px" class="form-control thirtywidth">
                      </div>
                      <div id="fill411" style="display:<?php echo $x2; ?>">
                        <table class="table" border="1">
                          <tr>
                            <td>Start Date</td>
                            <td><input type="date" name="subscription_start"   value="<?php echo $urow['subscription_start']; ?>" style="width:150px" class="form-control thirtywidth"></td>
                            <td>End Date</td>
                            <td><input type="date" name="subscription_end"   value="<?php echo $urow['subscription_end']; ?>" style="width:150px" class="form-control thirtywidth"></td>
                            <?php /*?><td>Subscription Amount</td>
                            <td><input type="text" name="subscription_amt"   value="<?php echo $urow['subscription_amt']; ?>" style="width:150px" class="form-control thirtywidth"></td><?php */?>
                          </tr>
                        </table>
                        <table class="table table-striped table-bordered table-lightfont"  width="100%" border="0" id="periodTable1">
                          <thead>
                            <tr>
                              <th>From Amount</th>
                              <th>To Amount</th>
                              <th>Commission (%)</th>
                              <th></th>
                              <?php								 
$urezmm=mysqli_query($con,"select * from coach_subscription_range where coach_id = '$id' order by ABS(id) asc");
while($urowmm=mysqli_fetch_array($urezmm))
{  $count = $urowmm[0]; ?>
                            <tr class="">
                              <td><input class="form-control" value="<?php echo $urowmm['from_amt']; ?>" type="text" onChange="get1('<?php echo $count; ?>',this.value);"></td>
                              <td><input class="form-control" value="<?php echo $urowmm['to_amt']; ?>" type="text" onChange="get2('<?php echo $count; ?>',this.value);"></td>
                              <td><input style="width:80%; display:inline" class="form-control" value="<?php echo $urowmm['commission_per']; ?>" type="text" onChange="get3('<?php echo $count; ?>',this.value);">&nbsp;%</td>
                              <td class="center"><a href="#" class='btn btn-mini btn-danger' onClick="performDelete('venue_master.php?uid=<?php echo $id; ?>&otid=<?php echo $urowmm[0]; ?>'); return false;"><i class="icon-trash"></i></a> </td>
                            </tr>
                            <?php } ?>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input class="form-control" name="from_amt[]" type="text"></td>
                              <td><input class="form-control" name="to_amt[]" type="text"></td>
                              <td><input class="form-control" name="commission_per[]" type="text"></td>
                              <td><a href="javascript:void(0)" class="btn btn-success" onClick="addBtnPeriod1()">+</a></td>
                            </tr>
                          </tbody>
                        </table>
                        <script type="text/javascript">
            function addBtnPeriod1() {
                var i = 1 + $("#periodTable1 tbody tr").length;
                $("#periodTable1 tbody").append('<tr><td><input class="form-control" name="from_amt[]" type="text"></td><td><input class="form-control" name="to_amt[]" type="text"></td><td><input class="form-control" name="commission_per[]" type="text"></td><td><div style="width:100px"><a class="btn btn-success" style="margin-left:5px" href="javascript:void(0)" onclick="addBtnPeriod1()">+</a>&nbsp;&nbsp;<a style="margin-left:5px" href="javascript:void(0)" class="remBtnPeriod1 btn btn-danger">-</a></div></td></tr>');
                date(i);
            }
            $("#periodTable1").on('click', '.remBtnPeriod1', function () {
                $(this).closest("tr").remove();
            });
				 </script>
                      </div>
                      <script type = "text/javascript">
					function showMessage311(which) {
					if (which == 1) {
					document.getElementById("fine411").style.display = "block";
					document.getElementById("fill411").style.display = "none";
					}
					else {
					document.getElementById("fine411").style.display = "none";
					document.getElementById("fill411").style.display = "block";
					}
					}
					</script>
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
                      <th> Name </th>
                      <th> Contact </th>
                      <th> Email</th>
                      <th> Address</th>
                      <th> Photo </th>
                      <th> Status </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								 
						$ure=mysqli_query($con,"select * from user_master where user_type = 'coach'");
						while($urow=mysqli_fetch_array($ure))
						 {
						?>
                    <tr class="showtr">
                      <td><?php echo $urow['name']; ?> </td>
                      <td><?php echo $urow['contact1']; ?><br/>
                        <?php echo $urow['contact2']; ?></td>
                      <td><?php echo $urow['email1']; ?> </td>
                      <td><?php echo $urow['address']; ?></td>
                      <td><a class="btn btn-danger" href="coach_photo.php?id=<?php echo $urow[0]; ?>" style="padding:2px;">Photo</a></td>
                      <td><div class="material-switch">
                          <input id="someSwitchOptionSuccess<?php echo $urow[0]; ?>" value="<?php echo $urow[0]; ?>" name="someSwitchOption001" type="checkbox" <?php if($urow['status']=='1') { echo"checked"; }?> onClick="status_cng(this.value);"/>
                          <label for="someSwitchOptionSuccess<?php echo $urow[0]; ?>" class="label-success"></label>
                        </div></td>
                      <td class="center"><a class="btn btn-mini btn-success" href="coach_master.php?uid=<?php echo $urow[0]; ?>" title=""><i class="icon-pencil"></i></a> <a href="#" id="<?php echo $urow[0]; ?>" class="delete btn btn-mini btn-danger" title="Delete" ><i class="icon-trash"></i></a> </td>
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
        url:"coach_master.php",
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
   url: "coach_master.php",
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

$delete = "DELETE FROM coach_batch WHERE coach_id = '$id'";
mysqli_query($con, $delete);

$delete = "DELETE FROM coach_inquiry WHERE coach_id = '$id'";
mysqli_query($con, $delete);

$delete = "DELETE FROM coach_review WHERE coach_id = '$id'";
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
<script src="vendor/chosen1.8/chosen.jquery.min.js"></script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<!-- Application main common jquery file -->
<script src="js/main.js"></script>
<!-- page specific script -->
<script>
    "use script";
        $('.chosen_select').chosen();
    </script>
<script>
        "use strict"
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });

    </script>
<!-- page specific script -->
</body>
</html>
