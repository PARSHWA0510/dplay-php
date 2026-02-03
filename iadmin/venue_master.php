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
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","company_master_getcity.php?q="+str,true);
xmlhttp.send();
}
</script>


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
<script language="javascript" type="text/javascript">  
function get1(nm,str)
{
	if (window.XMLHttpRequest)
  	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	
	xmlhttp.open("GET","venue_master_subscription1.php?checktbl="+nm+"&id="+str,true);
	xmlhttp.send();	
}
</script>
<script language="javascript" type="text/javascript">  
function get2(nm,str)
{
	if (window.XMLHttpRequest)
  	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	
	xmlhttp.open("GET","venue_master_subscription2.php?checktbl="+nm+"&id="+str,true);
	xmlhttp.send();	
}
</script>
<script language="javascript" type="text/javascript">  
function get3(nm,str)
{
	if (window.XMLHttpRequest)
  	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	
	xmlhttp.open("GET","venue_master_subscription3.php?checktbl="+nm+"&id="+str,true);
	xmlhttp.send();	
}
</script>
<script src="js/jquery-3.2.1.min.js"></script>
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
            <h2 class="content-color-primary page-title">Venue Master</h2>
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
$amenities = implode(',', (array)($_REQUEST['amenities'] ?? []));
$sport_type = implode(',', (array)($_REQUEST['sport_type'] ?? []));
	
  $sql=("INSERT INTO `venue_master` (`manager_id`, `name`,`seo_url`, `owner_name`, `email1`, `email2`, `contact1`, `contact2`, `google_map`, `address`, `state`, `city`, `about_venue`, `bank_name`, `branch_name`, `ac_no`, `ifsc_code`, `amenities`, `seo_title`, `seo_keyword`, `seo_description`, `status`, `additional_info`, `orderlist`, `small_des`, `venue_model`, `subscription_start`, `subscription_end`, `social_reddit`, `sport_type`, `ins_datetime`, `note_court`, `note_membership`) VALUES ('".mysqli_real_escape_string($con,$_REQUEST['manager_id'])."', '".mysqli_real_escape_string($con,$_REQUEST['name'])."','".mysqli_real_escape_string($con,$_REQUEST['seo_url'])."', '".mysqli_real_escape_string($con,$_REQUEST['owner_name'])."', '".mysqli_real_escape_string($con,$_REQUEST['email1'])."', '".mysqli_real_escape_string($con,$_REQUEST['email2'])."', '".mysqli_real_escape_string($con,$_REQUEST['contact1'])."', '".mysqli_real_escape_string($con,$_REQUEST['contact2'])."', '".mysqli_real_escape_string($con,$_REQUEST['google_map'])."', '".mysqli_real_escape_string($con,$_REQUEST['address'])."', '".mysqli_real_escape_string($con,$_REQUEST['state'])."', '".mysqli_real_escape_string($con,$_REQUEST['city'])."', '".mysqli_real_escape_string($con,$_REQUEST['about_venue'])."', '".mysqli_real_escape_string($con,$_REQUEST['bank_name'])."', '".mysqli_real_escape_string($con,$_REQUEST['branch_name'])."', '".mysqli_real_escape_string($con,$_REQUEST['ac_no'])."', '".mysqli_real_escape_string($con,$_REQUEST['ifsc_code'])."', '$amenities', '".mysqli_real_escape_string($con,$_REQUEST['seo_title'])."', '".mysqli_real_escape_string($con,$_REQUEST['seo_keyword'])."', '".mysqli_real_escape_string($con,$_REQUEST['seo_description'])."','1','".mysqli_real_escape_string($con,$_REQUEST['additional_info'])."','".mysqli_real_escape_string($con,$_REQUEST['orderlist'])."','".mysqli_real_escape_string($con,$_REQUEST['small_des'])."','".mysqli_real_escape_string($con,$_REQUEST['venue_model'])."','".mysqli_real_escape_string($con,$_REQUEST['subscription_start'])."','".mysqli_real_escape_string($con,$_REQUEST['subscription_end'])."','".mysqli_real_escape_string($con,$_REQUEST['social_reddit'])."','$sport_type','$todaydatetime','".mysqli_real_escape_string($con,$_REQUEST['note_court'])."','".mysqli_real_escape_string($con,$_REQUEST['note_membership'])."')");	 

	//exit();
 
	$z = mysqli_query($con,$sql);

	$id = mysqli_insert_id($con);

$manager_id = $_REQUEST['manager_id'];
$uupQry="UPDATE user_master SET `venue_id` = '$id'  WHERE id='$manager_id'";
$uuresult=mysqli_query($con,$uupQry);

	
	foreach($_POST['amenities'] as $key=>$val)
						{
							if($val != '')
							{
								$qry_main = "INSERT INTO `venue_amenities` (`venue_id` ,`amenities`) VALUES ('$id','$val')";
								mysqli_query($con,$qry_main);
							}
						}

	foreach($_POST['sport_type'] as $key=>$val)
						{
							if($val != '')
							{
								$qry_main = "INSERT INTO `venue_sporttype` (`venue_id` ,`sport_type`) VALUES ('$id','$val')";
								mysqli_query($con,$qry_main);
							}
						}


foreach($_POST['from_amt'] as $key=>$val)
						{
							if($val != '')
							{
								     $qry_main = "INSERT INTO `venue_subscription_range` (`venue_id` ,`from_amt` ,`to_amt` ,`commission_per`) VALUES ('$id','$val', '".$_POST['to_amt'][$key]."', '".$_POST['commission_per'][$key]."')";
								mysqli_query($con,$qry_main);
							}
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
	
	
	if($img1 != '')
 	{
    $uupQry="UPDATE venue_master SET photo='$img1'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 	}	

	if($img2 != '')
	{
    $uupQry="UPDATE venue_master SET logo_img='$img2'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 	}	
	
//	exit();
?>
    <script language="javascript">window.location.href="venue_master.php";</script>
    <?php 
} 

	$id = $_GET['uid'];

	if(isset($_REQUEST['update'])) 
  	{
  	
$amenities = implode(',', (array)($_REQUEST['amenities'] ?? []));
$sport_type = implode(',', (array)($_REQUEST['sport_type'] ?? []));

 $uupQry="UPDATE venue_master SET `orderlist` = '".mysqli_real_escape_string($con,$_REQUEST['orderlist'])."',`manager_id` = '".mysqli_real_escape_string($con,$_REQUEST['manager_id'])."', `name` = '".mysqli_real_escape_string($con,$_REQUEST['name'])."', `seo_url` = '".mysqli_real_escape_string($con,$_REQUEST['seo_url'])."', `owner_name` = '".mysqli_real_escape_string($con,$_REQUEST['owner_name'])."', `email1` = '".mysqli_real_escape_string($con,$_REQUEST['email1'])."', `email2` = '".mysqli_real_escape_string($con,$_REQUEST['email2'])."', `contact1` = '".mysqli_real_escape_string($con,$_REQUEST['contact1'])."', `contact2` = '".mysqli_real_escape_string($con,$_REQUEST['contact2'])."',   `google_map` = '".mysqli_real_escape_string($con,$_REQUEST['google_map'])."', `address` = '".mysqli_real_escape_string($con,$_REQUEST['address'])."',  `state` = '".mysqli_real_escape_string($con,$_REQUEST['state'])."',`city` = '".mysqli_real_escape_string($con,$_REQUEST['city'])."',`about_venue` = '".mysqli_real_escape_string($con,$_REQUEST['about_venue'])."',`bank_name` = '".mysqli_real_escape_string($con,$_REQUEST['bank_name'])."',`branch_name` = '".mysqli_real_escape_string($con,$_REQUEST['branch_name'])."',`ac_no` = '".mysqli_real_escape_string($con,$_REQUEST['ac_no'])."',`ifsc_code` = '".mysqli_real_escape_string($con,$_REQUEST['ifsc_code'])."',`amenities` = '$amenities',`seo_title` = '".mysqli_real_escape_string($con,$_REQUEST['seo_title'])."',`seo_keyword` = '".mysqli_real_escape_string($con,$_REQUEST['seo_keyword'])."',`seo_description` = '".mysqli_real_escape_string($con,$_REQUEST['seo_description'])."',`additional_info` = '".mysqli_real_escape_string($con,$_REQUEST['additional_info'])."',`small_des` = '".mysqli_real_escape_string($con,$_REQUEST['small_des'])."',`social_facebook` = '".mysqli_real_escape_string($con,$_REQUEST['social_facebook'])."',`social_instagram` = '".mysqli_real_escape_string($con,$_REQUEST['social_instagram'])."',`social_linkedin` = '".mysqli_real_escape_string($con,$_REQUEST['social_linkedin'])."',`social_x` = '".mysqli_real_escape_string($con,$_REQUEST['social_x'])."',`social_pinterest` = '".mysqli_real_escape_string($con,$_REQUEST['social_pinterest'])."',`social_youtube` = '".mysqli_real_escape_string($con,$_REQUEST['social_youtube'])."',`venue_model` = '".mysqli_real_escape_string($con,$_REQUEST['venue_model'])."',`subscription_start` = '".mysqli_real_escape_string($con,$_REQUEST['subscription_start'])."',`subscription_end` = '".mysqli_real_escape_string($con,$_REQUEST['subscription_end'])."',`social_reddit` = '".mysqli_real_escape_string($con,$_REQUEST['social_reddit'])."',`sport_type` = '$sport_type',`note_court` = '".mysqli_real_escape_string($con,$_REQUEST['note_court'])."',`note_membership` = '".mysqli_real_escape_string($con,$_REQUEST['note_membership'])."'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);

$manager_id = $_REQUEST['manager_id'];
$uupQry="UPDATE user_master SET `venue_id` = '$id'  WHERE id='$manager_id'";
$uuresult=mysqli_query($con,$uupQry);
//exit();
		
$delete = "DELETE FROM venue_amenities WHERE venue_id = '$id'";
mysqli_query($con, $delete);

	foreach($_POST['amenities'] as $key=>$val)
						{
							if($val != '')
							{
								$qry_main = "INSERT INTO `venue_amenities` (`venue_id` ,`amenities`) VALUES ('$id','$val')";
								mysqli_query($con,$qry_main);
							}
						}

$delete = "DELETE FROM venue_sporttype WHERE venue_id = '$id'";
mysqli_query($con, $delete);

	foreach($_POST['sport_type'] as $key=>$val)
						{
							if($val != '')
							{
								$qry_main = "INSERT INTO `venue_sporttype` (`venue_id` ,`sport_type`) VALUES ('$id','$val')";
								mysqli_query($con,$qry_main);
							}
						}

foreach($_POST['from_amt'] as $key=>$val)
						{
							if($val != '')
							{
								     $qry_main = "INSERT INTO `venue_subscription_range` (`venue_id` ,`from_amt` ,`to_amt` ,`commission_per`) VALUES ('$id','$val', '".$_POST['to_amt'][$key]."', '".$_POST['commission_per'][$key]."')";
								mysqli_query($con,$qry_main);
							}
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
	
	
	if($img1 != '')
 	{
    $uupQry="UPDATE venue_master SET photo='$img1'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 	}	

	if($img2 != '')
	{
    $uupQry="UPDATE venue_master SET logo_img='$img2'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 	}	

 // exit();
	?>
    <script language="javascript">window.location.href="venue_list.php";</script>
    <?php  } ?>
    <?php 
	  $ure=mysqli_query($con,"select * from venue_master where id = '$id'");
	  $urow=mysqli_fetch_array($ure); ?>
    <div class="card mb-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
              <form autocomplete="off"  name="form" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-1">
                    <div class="form-group">
                      <label for=""> No<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="orderlist"  required value="<?php echo $urow['orderlist']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-floating form-floating-outline">
                      <label for="multicol-username">Venue Manager Name<span style="color:#FF0000">*</span></label>
                      <select  class='form-control chosen_select' required name="manager_id">
                        <option value="">Please Select</option>
                        <?php 
							$coun=mysqli_query($con,"select * from user_master where user_type = 'manager' order by name asc");
							while($Fcoun=mysqli_fetch_array($coun)) { 
							 ?>
                        <option value="<?php echo $Fcoun[0]; ?>" <?php if($Fcoun[0] == $urow['manager_id']) echo 'selected="selected"';?>><?php echo $Fcoun['name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Venue Name<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="name" onChange="showUser1(this.value)"  required value="<?php echo $urow['name']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> SEO URL <span style="color:#FF0000">*</span></label>
                      <span id="txtHint1"><input class="form-control" name="seo_url"  required value="<?php echo $urow['seo_url']; ?>" type="text"></span>
                    </div>
                  </div>
                  
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Venue Owner<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="owner_name"  required value="<?php echo $urow['owner_name']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Email<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="email1" required  value="<?php echo $urow['email1']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Owner Email</label>
                      <input class="form-control" name="email2"  value="<?php echo $urow['email2']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Contact No<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="contact1" required value="<?php echo $urow['contact1']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Owner Contact No</label>
                      <input class="form-control" name="contact2"  value="<?php echo $urow['contact2']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="">Venue Small Description<span style="color:#FF0000">*</span></label>
                      <textarea name="small_des" class="form-control" required style="width:100%; height:100px"><?php echo $urow['small_des']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Venue Address<span style="color:#FF0000">*</span></label>
                      <textarea name="address" class="form-control" required style="width:100%; height:40px"><?php echo $urow['address']; ?></textarea>
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
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Google Map Link</label>
                      <input class="form-control" name="google_map"  value="<?php echo $urow['google_map']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Main Venue Photo</label>
                      <input class="form-control"  name="img1" type="file">
                      <?php $photo = $urow['photo']; if($photo != '') { ?>
                      <img src="../images/<?php echo $urow['photo']; ?>" width="100"  />
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Venue Logo</label>
                      <input class="form-control" name="img2"  type="file">
                      <?php $image = $urow['logo_img']; if($image != '') { ?>
                      <img src="../images/<?php echo $image; ?>" width="100" style="margin-top:5px;">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""> About Venue<span class="required">*</span></label>
                      <textarea name="about_venue" class="input-xlarge" required style="width:90%; height:150px"/>
                      <?php echo $urow['about_venue']; ?>
                      </textarea>
                      <script type="text/javascript">
					//<![CDATA[
		 
						// This call can be placed at any point after the
						// <textarea>, or inside a <head><script> in a
						// window.onload event handler.
						// Replace the <textarea id="editor"> with an CKEditor
						// instance, using default configurations.
						CKEDITOR.env.isCompatible = true;
						CKEDITOR.replace( 'about_venue' );
					//]]>
					</script>
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
                      <label for=""> Amenities</label>
                      <?php $amenities = explode(',',$urow['amenities']);   $ids = "'" . implode("','", $amenities) . "'";   ?>
                      <select class="chosen_select form-control" data-placeholder="Choose a Amenities..." multiple="multiple" name="amenities[]">
                        <option value=""></option>
                        <?php $ures=mysqli_query($con,"select * from amenities_master where status = '1' and name IN ($ids)  order by name asc");
								while($urows=mysqli_fetch_array($ures))
								{
								?>
                        <option value="<?php echo $urows['name']; ?>" selected="selected"> <?php echo $urows['name']; ?></option>
                        <?php } ?>
                        <?php $ures=mysqli_query($con,"select * from amenities_master where status = '1' and name NOT IN ($ids)  order by name asc");
								while($urows=mysqli_fetch_array($ures))
								{
								?>
                        <option value="<?php echo $urows['name']; ?>"> <?php echo $urows['name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
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
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Bank Name</label>
                      <input class="form-control" name="bank_name"  value="<?php echo $urow['bank_name']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Branch Name</label>
                      <input class="form-control" name="branch_name"  value="<?php echo $urow['branch_name']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> AC No</label>
                      <input class="form-control" name="ac_no"  value="<?php echo $urow['ac_no']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> IFSC Code</label>
                      <input class="form-control" name="ifsc_code"  value="<?php echo $urow['ifsc_code']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for=""> Facebook Link</label>
                      <input class="form-control" name="social_facebook"  value="<?php echo $urow['social_facebook']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for=""> Instagram Link</label>
                      <input class="form-control" name="social_instagram"  value="<?php echo $urow['social_instagram']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for=""> Linkedin Link</label>
                      <input class="form-control" name="social_linkedin"  value="<?php echo $urow['social_linkedin']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for=""> X Link</label>
                      <input class="form-control" name="social_x"  value="<?php echo $urow['social_x']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for=""> Pinterest Link</label>
                      <input class="form-control" name="social_pinterest"  value="<?php echo $urow['social_pinterest']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for=""> Youtube Link</label>
                      <input class="form-control" name="social_youtube"  value="<?php echo $urow['social_youtube']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label for=""> Reddit Link</label>
                        <input class="form-control" name="social_reddit"  value="<?php echo $row['social_reddit']; ?>" type="text">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">&nbsp;
                      </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Note - Book A Court</label>
                      <textarea name="note_court" class="form-control"  style="width:100%; height:100px"><?php echo $urow['note_court']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Note - Book A Membership</label>
                      <textarea name="note_membership" class="form-control"  style="width:100%; height:100px"><?php echo $urow['note_membership']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="">SEO Title</label>
                      <textarea name="seo_title" style="height:50px" class="form-control" onKeyUp="checkLen1(this.value)"><?php echo $urow['seo_title']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="">SEO Keyword</label>
                      <textarea name="seo_keyword" class="form-control" style="height:50px" onKeyUp="checkLen2(this.value)"><?php echo $urow['seo_keyword']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="">SEO Metatag/Description</label>
                      <textarea name="seo_description" class="form-control" style="height:50px"  onKeyUp="checkLen3(this.value)"><?php echo $urow['seo_description']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""><strong>Venue Model : </strong></label>
                      <input name="venue_model"  required onclick = "showMessage311(2)"  type="radio"  value="subscription"  <?php if($urow['venue_model'] == 'subscription') echo 'checked="checked"';?>/>
                      &nbsp;Subscription Based&nbsp;
                      <input name="venue_model" required  onclick = "showMessage311(1)"  type="radio"  value="commission"  <?php if($urow['venue_model'] == 'commission') echo 'checked="checked"';?>/>
                      &nbsp;Slotwise Commission Based
                      <?php $venue_model = $urow['venue_model'];
if($venue_model == 'commission') {  $x1 = 'block'; } else {  $x1 = 'none'; } 
if($venue_model == 'subscription') {  $x2 = 'block'; } else {  $x2 = 'none'; } ?>
                      <div id="fine411" style="display:<?php echo $x1; ?>">
                        <?php /*?> Enter Commission (%)
                        <input type="text" name="commission_per"   value="<?php echo $urow['commission_per']; ?>" style="width:150px" class="form-control thirtywidth"><?php */?>
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
$urezmm=mysqli_query($con,"select * from venue_subscription_range where venue_id = '$id' order by ABS(id) asc");
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
              <script>
function performDelete(DestURL) { 
var ok = confirm("Are you sure you want to delete?"); 
if (ok) {location.href = DestURL;} 
return ok; 
} 
</script>
              <?php  
 $uid = $_GET['uid'];
 $otid = $_GET['otid'];
 
 if($otid)
 {
         $dusr="delete from venue_subscription_range where id = '$otid'";
		$dre=mysqli_query($con,$dusr);
		
		?>
              <script language="javascript">window.location.href="venue_master.php?uid=<?php echo $uid; ?>";</script>
              <?php  }  ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content page ends -->
</div>
<?php include 'footer.php' ?>
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
                    [0, "asc"]
                ]
            });
        });

    </script>
<!-- page specific script -->
</body>
</html>
