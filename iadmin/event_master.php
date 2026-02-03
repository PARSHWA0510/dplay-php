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
<script src="js/jquery-3.2.1.min.js"></script>
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
            <h2 class="content-color-primary page-title">Event Master</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content page title ends -->
  <!-- content page -->
  <div class="container mt-4 main-container">
    <?php 
if ($_POST['insert1'] || $_POST['insert2']) 
{
//$accessories_id = implode('@', (array)($_REQUEST['accessories_id'] ?? []));

	$code = rand(11111,99999);
  $sql=("INSERT INTO `event_master` (`cat_id`, `name`, `additional_info`, `status`, `address`, `state`, `city`, `user_id`, `code`, `sport_type`, `small_des`, `reg_fees`, `win_prize`, `start_datetime`, `end_datetime`, `reg_deadline`, `team_limit`, `max_team_size`, `seo_title`, `seo_keyword`, `seo_description`, `accessories_id`, `cp_name`, `cp_mobile`, `cp_email`, `ins_datetime`, `seo_url`, `event_model`, `subscription_start`, `subscription_end`, `commission`) VALUES ('".mysqli_real_escape_string($con,$_REQUEST['cat_id'])."','".mysqli_real_escape_string($con,$_REQUEST['name'])."','".mysqli_real_escape_string($con,$_REQUEST['additional_info'])."','1','".mysqli_real_escape_string($con,$_REQUEST['address'])."','".mysqli_real_escape_string($con,$_REQUEST['state'])."','".mysqli_real_escape_string($con,$_REQUEST['city'])."','$admin_id','$code','".mysqli_real_escape_string($con,$_REQUEST['sport_type'])."','".mysqli_real_escape_string($con,$_REQUEST['small_des'])."','".mysqli_real_escape_string($con,$_REQUEST['reg_fees'])."','".mysqli_real_escape_string($con,$_REQUEST['win_prize'])."','".mysqli_real_escape_string($con,$_REQUEST['start_datetime'])."','".mysqli_real_escape_string($con,$_REQUEST['end_datetime'])."','".mysqli_real_escape_string($con,$_REQUEST['reg_deadline'])."','".mysqli_real_escape_string($con,$_REQUEST['team_limit'])."','".mysqli_real_escape_string($con,$_REQUEST['max_team_size'])."','".mysqli_real_escape_string($con,$_REQUEST['seo_title'])."','".mysqli_real_escape_string($con,$_REQUEST['seo_keyword'])."','".mysqli_real_escape_string($con,$_REQUEST['seo_description'])."','$accessories_id','".mysqli_real_escape_string($con,$_REQUEST['cp_name'])."','".mysqli_real_escape_string($con,$_REQUEST['cp_mobile'])."','".mysqli_real_escape_string($con,$_REQUEST['cp_email'])."','$todaydatetime','".mysqli_real_escape_string($con,$_REQUEST['seo_url'])."','".mysqli_real_escape_string($con,$_REQUEST['event_model'])."','".mysqli_real_escape_string($con,$_REQUEST['subscription_start'])."','".mysqli_real_escape_string($con,$_REQUEST['subscription_end'])."','".mysqli_real_escape_string($con,$_REQUEST['commission'])."')");	 
 
	$z = mysqli_query($con,$sql);
	
	$id = mysqli_insert_id($con);


foreach($_POST['from_amt'] as $key=>$val)
						{
							if($val != '')
							{
								     $qry_main = "INSERT INTO `event_subscription_range` (`event_id` ,`from_amt` ,`to_amt` ,`commission_per`) VALUES ('$id','$val', '".$_POST['to_amt'][$key]."', '".$_POST['commission_per'][$key]."')";
								mysqli_query($con,$qry_main);
							}
						}
foreach($_POST['data_title'] as $key=>$val)
						{
							if($val != '')
							{
								     $qry_main = "INSERT INTO `event_data` (`data_title` ,`data_description` ,`data_max_player` ,`data_fees`,`event_id`) VALUES ('$val', '".$_POST['data_description'][$key]."', '".$_POST['data_max_player'][$key]."', '".$_POST['data_fees'][$key]."','$id')";
								mysqli_query($con,$qry_main);
							}
						}		

	foreach($_POST['lable_title'] as $key=>$val)
						{
							if($val != '')
							{
								     $qry_main = "INSERT INTO `event_lable` (`lable_title` ,`lable_required`,`event_id`) VALUES ('$val', '".$_POST['lable_required'][$key]."','$id')";
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
    $uupQry="UPDATE event_master SET image='$img1'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 }
 
 	if($img2 != '')
 {
    $uupQry="UPDATE event_master SET bgimage='$img2'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 }

$insert1 = $_POST['insert1'];
$insert2 = $_POST['insert2']; 

?>
<?php if($insert1 != '') { ?>
<script language="javascript">window.location.href="event_master.php";</script>
<?php } ?>
<?php if($insert2 != '') { ?>
<script language="javascript">window.location.href="event_categories.php?eid=<?php echo $id; ?>";</script>
<?php } ?>
<?php } ?>

<?php 
	$id = $_GET['uid'];

if ($_POST['update1'] || $_POST['update2']) 
{
//$accessories_id = implode('@', (array)($_REQUEST['accessories_id'] ?? []));

	
	$uupQry="UPDATE event_master SET  `cat_id` = '".mysqli_real_escape_string($con,$_REQUEST['cat_id'])."',`name` = '".mysqli_real_escape_string($con,$_REQUEST['name'])."', `additional_info` = '".mysqli_real_escape_string($con,$_REQUEST['additional_info'])."',`address` = '".mysqli_real_escape_string($con,$_REQUEST['address'])."',`state` = '".mysqli_real_escape_string($con,$_REQUEST['state'])."',`city` = '".mysqli_real_escape_string($con,$_REQUEST['city'])."',`sport_type` = '".mysqli_real_escape_string($con,$_REQUEST['sport_type'])."',`small_des` = '".mysqli_real_escape_string($con,$_REQUEST['small_des'])."',`reg_fees` = '".mysqli_real_escape_string($con,$_REQUEST['reg_fees'])."',`win_prize` = '".mysqli_real_escape_string($con,$_REQUEST['win_prize'])."',`start_datetime` = '".mysqli_real_escape_string($con,$_REQUEST['start_datetime'])."',`end_datetime` = '".mysqli_real_escape_string($con,$_REQUEST['end_datetime'])."',`reg_deadline` = '".mysqli_real_escape_string($con,$_REQUEST['reg_deadline'])."',`team_limit` = '".mysqli_real_escape_string($con,$_REQUEST['team_limit'])."',`max_team_size` = '".mysqli_real_escape_string($con,$_REQUEST['max_team_size'])."',`seo_title` = '".mysqli_real_escape_string($con,$_REQUEST['seo_title'])."',`seo_keyword` = '".mysqli_real_escape_string($con,$_REQUEST['seo_keyword'])."',`seo_description` = '".mysqli_real_escape_string($con,$_REQUEST['seo_description'])."',`accessories_id` = '$accessories_id',`cp_name` = '".mysqli_real_escape_string($con,$_REQUEST['cp_name'])."',`cp_mobile` = '".mysqli_real_escape_string($con,$_REQUEST['cp_mobile'])."',`cp_email` = '".mysqli_real_escape_string($con,$_REQUEST['cp_email'])."',`seo_url` = '".mysqli_real_escape_string($con,$_REQUEST['seo_url'])."',`event_model` = '".mysqli_real_escape_string($con,$_REQUEST['event_model'])."',`subscription_start` = '".mysqli_real_escape_string($con,$_REQUEST['subscription_start'])."',`subscription_end` = '".mysqli_real_escape_string($con,$_REQUEST['subscription_end'])."',`commission` = '".mysqli_real_escape_string($con,$_REQUEST['commission'])."' WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
  
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
    $uupQry="UPDATE event_master SET image='$img1'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 }

	if($img2 != '')
 {
    $uupQry="UPDATE event_master SET bgimage='$img2'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 }
  

foreach($_POST['from_amt'] as $key=>$val)
						{
							if($val != '')
							{
								     $qry_main = "INSERT INTO `event_subscription_range` (`event_id` ,`from_amt` ,`to_amt` ,`commission_per`) VALUES ('$id','$val', '".$_POST['to_amt'][$key]."', '".$_POST['commission_per'][$key]."')";
								mysqli_query($con,$qry_main);
							}
						}
						
foreach($_POST['data_title'] as $key=>$val)
						{
							if($val != '')
							{
								     $qry_main = "INSERT INTO `event_data` (`data_title` ,`data_description` ,`data_max_player` ,`data_fees`,`event_id`) VALUES ('$val', '".$_POST['data_description'][$key]."', '".$_POST['data_max_player'][$key]."', '".$_POST['data_fees'][$key]."','$id')";
								mysqli_query($con,$qry_main);
							}
						}		

	foreach($_POST['lable_title'] as $key=>$val)
						{
							if($val != '')
							{
								     $qry_main = "INSERT INTO `event_lable` (`lable_title` ,`lable_required`,`event_id`) VALUES ('$val', '".$_POST['lable_required'][$key]."','$id')";
								mysqli_query($con,$qry_main);
							}
						}		
	
 // exit();
$update1 = $_POST['update1'];
$update2 = $_POST['update2']; 

?>
<?php if($update1 != '') { ?>
<script language="javascript">window.location.href="event_list.php";</script>
<?php } ?>
<?php if($update2 != '') { ?>
<script language="javascript">window.location.href="event_categories.php?eid=<?php echo $id; ?>";</script>
<?php } ?>
<?php } ?>    <?php 
					$ure=mysqli_query($con,"select * from event_master where id = '$id'");
					$urow=mysqli_fetch_array($ure); ?>
    <div class="card mb-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
              <form autocomplete="off"  name="form" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="multicol-username">Event Category</label>
                      <select  class='form-control chosen_select' name="cat_id">
                        <?php 
							$coun=mysqli_query($con,"select * from event_category where status = '1' order by name asc");
							while($Fcoun=mysqli_fetch_array($coun)) { 
							 ?>
                        <option value="<?php echo $Fcoun[0]; ?>" <?php if($Fcoun[0] == $urow['cat_id']) echo 'selected="selected"';?>><?php echo $Fcoun['name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="multicol-username">Sport Type</label>
                      <select  class='form-control chosen_select' name="sport_type">
                        <option value="">Please Select</option>
                        <?php 
							$coun=mysqli_query($con,"select * from sport_type where status = '1' order by name asc");
							while($Fcoun=mysqli_fetch_array($coun)) { 
							 ?>
                        <option value="<?php echo $Fcoun['name']; ?>" <?php if($Fcoun['name'] == $urow['sport_type']) echo 'selected="selected"';?>><?php echo $Fcoun['name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <?php /*?><div class="col-md-6">
                    <div class="form-group">
                      <label for="multicol-username"> Event Accessories</label>
                      <?php $accessories_ids = explode('@',$urow['accessories_id']);   $ids = "'" . implode("','", $accessories_ids) . "'";  ?>
                      <select class="chosen_select form-control" data-placeholder="Choose a Accessories..." multiple="multiple" name="accessories_id[]">
                        <option value=""></option>
                        <?php $ures=mysqli_query($con,"select * from event_accessories where status = '1' and ref_id = '0' and user_id = '$admin_id' and id IN ($ids)  order by name asc");
								while($urows=mysqli_fetch_array($ures))
								{
								?>
                        <option value="<?php echo $urows[0]; ?>" selected="selected"> <?php echo $urows['name']; ?></option>
                        <?php } ?>
                        <?php $ures=mysqli_query($con,"select * from event_accessories where status = '1' and ref_id = '0' and user_id = '$admin_id' and id NOT IN ($ids)  order by name asc");
								while($urows=mysqli_fetch_array($ures))
								{
								?>
                        <option value="<?php echo $urows[0]; ?>"> <?php echo $urows['name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div><?php */?>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Event Title<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="name" onChange="showUser1(this.value)"  required value="<?php echo $urow['name']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for=""> SEO URL <span style="color:#FF0000">*</span></label>
                      <span id="txtHint1"><input class="form-control" name="seo_url"  required value="<?php echo $urow['seo_url']; ?>" type="text"></span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Small Description</label>
                      <input class="form-control" name="small_des" value="<?php echo $urow['small_des']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Registration Fees</label>
                      <input class="form-control" name="reg_fees" value="<?php echo $urow['reg_fees']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Winning Prize</label>
                      <input class="form-control" name="win_prize" value="<?php echo $urow['win_prize']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">From Date<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="start_datetime"  required value="<?php echo $urow['start_datetime']; ?>" type="datetime-local">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">To Date<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="end_datetime"  required value="<?php echo $urow['end_datetime']; ?>" type="datetime-local">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label> Image <span class="required">*</span></label>
                      <input class="form-control" name="img1"  type="file">
                      <?php $image = $urow['image'];
						  if($image != '') { ?>
                      <img src="../images/<?php echo $image; ?>" width="100" style="margin-top:5px;">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Background Image <span class="required">*</span></label>
                      <input class="form-control" name="img2"  type="file">
                      <?php $bgimage = $urow['bgimage']; if($bgimage != '') { ?>
                      <img src="../images/<?php echo $bgimage; ?>" width="100" style="margin-top:5px;">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Registration Deadline<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="reg_deadline"  required value="<?php echo $urow['reg_deadline']; ?>" type="datetime-local">
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <div class="form-group">
                      <label for="" style="font-size:12px">Team Limit<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="team_limit"  required value="<?php echo $urow['team_limit']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="">Max Team Size<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="max_team_size"  required value="<?php echo $urow['max_team_size']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for=""> Location<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="address"  required value="<?php echo $urow['address']; ?>" type="text">
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
                  <?php /*?><div class="col-sm-12">
                    <div class="form-group">
                      <label for="">Categories<span class="required">*</span></label>
                      <table class="table table-striped table-bordered table-lightfont"  width="100%" border="0" id="periodTable1">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Max Player</th>
                            <th>Fee</th>
                            <th></th>
                          </tr>
                          <?php								 
							$urezmm=mysqli_query($con,"select * from event_data where event_id = '$id' order by ABS(id) asc");
							while($urowmm=mysqli_fetch_array($urezmm))
							{ ?>
                          <tr class="">
                            <td><?php echo $urowmm['data_title']; ?></td>
                            <td><?php echo $urowmm['data_description']; ?></td>
                            <td><?php echo $urowmm['data_max_player']; ?></td>
                            <td><?php echo $urowmm['data_fees']; ?></td>
                            <td class="center"><a href="#" class='btn btn-mini btn-danger' onClick="performDelete('event_master.php?uid=<?php echo $id; ?>&otid=<?php echo $urowmm[0]; ?>'); return false;"><i class="icon-trash"></i></a> </td>
                          </tr>
                          <?php } ?>
                        </thead>
                        <tbody>
                          <tr>
                            <td><input class="form-control" name="data_title[]" type="text"></td>
                            <td><input class="form-control" name="data_description[]" type="text"></td>
                            <td><input class="form-control" name="data_max_player[]" type="text"></td>
                            <td><input class="form-control" name="data_fees[]" type="text"></td>
                            <td><a href="javascript:void(0)" class="btn btn-success" onClick="addBtnPeriod1()">+</a></td>
                          </tr>
                        </tbody>
                      </table>
                      <script type="text/javascript">
            function addBtnPeriod1() {
                var i = 1 + $("#periodTable1 tbody tr").length;
                $("#periodTable1 tbody").append('<tr><td><input class="form-control" name="data_title[]" type="text"></td><td><input class="form-control" name="data_description[]" type="text"></td><td><input class="form-control" name="data_max_player[]" type="text"></td><td><input class="form-control" name="data_fees[]" type="text"></td><td><div style="width:100px"><a class="btn btn-success" style="margin-left:5px" href="javascript:void(0)" onclick="addBtnPeriod1()">+</a>&nbsp;&nbsp;<a style="margin-left:5px" href="javascript:void(0)" class="remBtnPeriod1 btn btn-danger">-</a></div></td></tr>');
                date(i);
            }
            $("#periodTable1").on('click', '.remBtnPeriod1', function () {
                $(this).closest("tr").remove();
            });
				 </script>
                    </div>
                  </div><?php */?>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="">Contact Person Name</label>
                      <input class="form-control" name="cp_name" value="<?php echo $urow['cp_name']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="">Contact Person Contact</label>
                      <input class="form-control" name="cp_mobile" value="<?php echo $urow['cp_mobile']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="">Contact Person Email</label>
                      <input class="form-control" name="cp_email" value="<?php echo $urow['cp_email']; ?>" type="text">
                    </div>
                  </div>
				  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="">Event Comunity Lable Field</label>
                      <table class="table table-striped table-bordered table-lightfont"  width="100%" border="0" id="periodTable0">
                        <thead>
                          <tr>
                            <th>Lable/Field</th>
                            <th>Required ?</th>
                            <th></th>
                          </tr>
                          <?php								 
							$urezmm=mysqli_query($con,"select * from event_lable where event_id = '$id' order by ABS(id) asc");
							while($urowmm=mysqli_fetch_array($urezmm))
							{ ?>
                          <tr class="">
                            <td><?php echo $urowmm['lable_title']; ?></td>
                            <td><?php $lable_required = $urowmm['lable_required']; if($lable_required == '0') { echo 'No'; } else { echo 'Yes'; } ?></td>
                            <td class="center"><a href="#" class='btn btn-mini btn-danger' onClick="performDeletes('event_master.php?uid=<?php echo $id; ?>&lableid=<?php echo $urowmm[0]; ?>'); return false;"><i class="icon-trash"></i></a> </td>
                          </tr>
                          <?php } ?>
                        </thead>
                        <tbody>
                          <tr>
                            <td><input class="form-control" name="lable_title[]" type="text"></td>
                            <td><select name="lable_required[]" class="form-control select2" required id="select">
	                        <option value="0">No</option>
	                        <option value="1">Yes</option></select></td>
                            <td><a href="javascript:void(0)" class="btn btn-success" onClick="addBtnPeriod0()">+</a></td>
                          </tr>
                        </tbody>
                      </table>
                      <script type="text/javascript">
            function addBtnPeriod0() {
                var i = 1 + $("#periodTable0 tbody tr").length;
                $("#periodTable0 tbody").append('<tr><td><input class="form-control" name="lable_title[]" type="text"></td><td><select name="lable_required[]" class="form-control select2" required id="select"><option value="0">No</option><option value="1">Yes</option></select></td><td><div style="width:100px"><a class="btn btn-success" style="margin-left:5px" href="javascript:void(0)" onclick="addBtnPeriod0()">+</a>&nbsp;&nbsp;<a style="margin-left:5px" href="javascript:void(0)" class="remBtnPeriod0 btn btn-danger">-</a></div></td></tr>');
                date(i);
            }
            $("#periodTable0").on('click', '.remBtnPeriod0', function () {
                $(this).closest("tr").remove();
            });
				 </script>
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
                      <label for=""><strong>Event Model : </strong></label>
                      <input name="event_model"  required onclick = "showMessage311(2)"  type="radio"  value="subscription"  <?php if($urow['event_model'] == 'subscription') echo 'checked="checked"';?>/>
                      &nbsp;Subscription Based&nbsp;
                      <input name="event_model" required  onclick = "showMessage311(1)"  type="radio"  value="commission"  <?php if($urow['event_model'] == 'commission') echo 'checked="checked"';?>/>
                      &nbsp;Commission Based
                      <?php $event_model = $urow['event_model'];
if($event_model == 'commission') {  $x1 = 'block'; } else {  $x1 = 'none'; } 
if($event_model == 'subscription') {  $x2 = 'block'; } else {  $x2 = 'none'; } ?>
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
$urezmm=mysqli_query($con,"select * from event_subscription_range where event_id = '$id' order by ABS(id) asc");
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
                  <input type="submit" name="update1" value="Update" class="btn btn-primary">
                  <input type="submit" name="update2" value="Update & Go To Event Category" class="btn btn-success">
                  <?php 
}
else 
{
?>
                  <input type="submit" name="insert1" value="Insert" class="btn btn-primary">
                  <input type="submit" name="insert1" value="Insert & Go To Event Category" class="btn btn-success">
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
$dusr="delete from event_data where id = '$otid'";
$dre=mysqli_query($con,$dusr);
?>
              <script language="javascript">window.location.href="event_master.php?uid=<?php echo $uid; ?>";</script>
              <?php  }  ?>
<script>
function performDeletes(DestURL) { 
var ok = confirm("Are you sure you want to delete?"); 
if (ok) {location.href = DestURL;} 
return ok; 
} 
</script>
<?php  
$uid = $_GET['uid'];
$lableid = $_GET['lableid'];
 
if($lableid)
{
$dusr="delete from event_lable where id = '$lableid'";
$dre=mysqli_query($con,$dusr);
?>
              <script language="javascript">window.location.href="event_master.php?uid=<?php echo $uid; ?>";</script>
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
                    [0, "desc"]
                ]
            });
        });

    </script>
<!-- page specific script -->
</body>
</html>
