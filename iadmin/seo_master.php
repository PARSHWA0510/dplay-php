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
            <h2 class="content-color-primary page-title">SEO Master</h2>
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
	
  $sql=("INSERT INTO `seo_master` ( `page_name`,  `seo_title`, `seo_keyword`, `seo_description`, `status`, `additional_info`) VALUES ( '".mysqli_real_escape_string($con,$_REQUEST['page_name'])."','".mysqli_real_escape_string($con,$_REQUEST['seo_title'])."', '".mysqli_real_escape_string($con,$_REQUEST['seo_keyword'])."', '".mysqli_real_escape_string($con,$_REQUEST['seo_description'])."','1', '".mysqli_real_escape_string($con,$_REQUEST['additional_info'])."')");	 
 
$z = mysqli_query($con,$sql);
	
	$id = mysqli_insert_id($con);
		
	$img1 = $_FILES['img1']['name'];
	if($img1 != '')
	{
	$img1 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img1']['name']));
 	$tmp_name=$_FILES["img1"]["tmp_name"];
	$pr="../images/";
	$pr1=$pr.$img1;
	move_uploaded_file($tmp_name,$pr1);
	}
	

	if($img1 != '')
 {
    $uupQry="UPDATE seo_master SET image='$img1'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 }

?>
    <script language="javascript">window.location.href="seo_master.php";</script>
    <?php 
} 

	$id = $_GET['uid'];

	if(isset($_REQUEST['update'])) 
  	{
  	

	
	$uupQry="UPDATE seo_master SET  `page_name` = '".mysqli_real_escape_string($con,$_REQUEST['page_name'])."', `seo_title` = '".mysqli_real_escape_string($con,$_REQUEST['seo_title'])."',`seo_keyword` = '".mysqli_real_escape_string($con,$_REQUEST['seo_keyword'])."',`seo_description` = '".mysqli_real_escape_string($con,$_REQUEST['seo_description'])."',`additional_info` = '".mysqli_real_escape_string($con,$_REQUEST['additional_info'])."' WHERE id='$id'";
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
	

	if($img1 != '')
 {
    $uupQry="UPDATE seo_master SET image='$img1'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 }
  

 // exit();
	?>
    <script language="javascript">window.location.href="seo_master.php";</script>
    <?php  } ?>
    <?php 
					$ure=mysqli_query($con,"select * from seo_master where id = '$id'");
					$urow=mysqli_fetch_array($ure); ?>
    <div class="card mb-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
              <form autocomplete="off"  name="form" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for=""> SEO Page<span style="color:#FF0000">*</span></label>
                      <select  class='form-control chosen_select' required name="page_name">
                        <option value="">Please Select</option>
                        <option value="Home" <?php if('Home' == $urow['page_name']) echo 'selected="selected"';?>>Home</option>
                        <option value="About Us" <?php if('About Us' == $urow['page_name']) echo 'selected="selected"';?>>About Us</option>
                        <option value="Service Main" <?php if('Service Main' == $urow['page_name']) echo 'selected="selected"';?>>Service Main</option>
						<option value="Blog Main" <?php if('Blog Main' == $urow['page_name']) echo 'selected="selected"';?>>Blog Main</option>
						<option value="Coach Main" <?php if('Coach Main' == $urow['page_name']) echo 'selected="selected"';?>>Coach Main</option>
						<option value="Venue Main" <?php if('Venue Main' == $urow['page_name']) echo 'selected="selected"';?>>Venue Main</option>
                        <option value="Event Main" <?php if('Event Main' == $urow['page_name']) echo 'selected="selected"';?>>Event Main</option>
                        <option value="Testimonial" <?php if('Testimonial' == $urow['page_name']) echo 'selected="selected"';?>>Testimonial</option>
                        <option value="Contact Us" <?php if('Contact Us' == $urow['page_name']) echo 'selected="selected"';?>>Contact Us</option>
						<option value="Faqs" <?php if('Faqs' == $urow['page_name']) echo 'selected="selected"';?>>Faqs</option>
                        <option value="Login" <?php if('Login' == $urow['page_name']) echo 'selected="selected"';?>>Login</option>
                        <option value="Register" <?php if('Register' == $urow['page_name']) echo 'selected="selected"';?>>Register</option>
                        <option value="Forgot Password" <?php if('Forgot Password' == $urow['page_name']) echo 'selected="selected"';?>>Forgot Password</option>
                        <option value="Book A Court" <?php if('Book A Court' == $urow['page_name']) echo 'selected="selected"';?>>Book A Court</option>
                        <option value="Court Re-Book" <?php if('Court Re-Book' == $urow['page_name']) echo 'selected="selected"';?>>Court Re-Book</option>
                        <option value="Court Refund" <?php if('Court Refund' == $urow['page_name']) echo 'selected="selected"';?>>Court Refund</option>
                        <option value="Event Payment" <?php if('Event Payment' == $urow['page_name']) echo 'selected="selected"';?>>Event Payment</option>
                        <option value="Membership Payment" <?php if('Membership Payment' == $urow['page_name']) echo 'selected="selected"';?>>Membership Payment</option>
                        <option value="Coach Payment" <?php if('Coach Payment' == $urow['page_name']) echo 'selected="selected"';?>>Coach Payment</option>
                        <option value="Event Payment" <?php if('Event Payment' == $urow['page_name']) echo 'selected="selected"';?>>Event Payment</option>
                        <option value="My Profile" <?php if('My Profile' == $urow['page_name']) echo 'selected="selected"';?>>My Profile</option>
                        <option value="My Membership" <?php if('My Membership' == $urow['page_name']) echo 'selected="selected"';?>>My Membership</option>
                        <option value="My Court" <?php if('My Court' == $urow['page_name']) echo 'selected="selected"';?>>My Court</option>
                        <option value="My Password" <?php if('My Password' == $urow['page_name']) echo 'selected="selected"';?>>My Password</option>
                        <option value="My Favorite Venue" <?php if('My Favorite Venue' == $urow['page_name']) echo 'selected="selected"';?>>My Favorite Venue</option>
                        <option value="My Batch" <?php if('My Batch' == $urow['page_name']) echo 'selected="selected"';?>>My Batch</option>
                        <option value="My Batch User" <?php if('My Batch User' == $urow['page_name']) echo 'selected="selected"';?>>My Batch User</option>
                        <option value="My Batch Attendance" <?php if('My Batch Attendance' == $urow['page_name']) echo 'selected="selected"';?>>My Batch Attendance</option>
                        <option value="My Coach" <?php if('My Coach' == $urow['page_name']) echo 'selected="selected"';?>>My Coach</option>
                        <option value="My Coach Attendance" <?php if('My Coach Attendance' == $urow['page_name']) echo 'selected="selected"';?>>My Coach Attendance</option>
                        <option value="My Event" <?php if('My Event' == $urow['page_name']) echo 'selected="selected"';?>>My Event</option>
                      </select>
                   </div>
                  </div>
                  
                  <div class="col-sm-8"></div>
                  
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
                      <th> Page Name </th>
                      <th> Title </th>
                      <th> Keyword </th>
                      <th> Description </th>
                      <th> Status </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								 
						$ure=mysqli_query($con,"select * from seo_master");
						while($urow=mysqli_fetch_array($ure))
						 {
						?>
                    <tr class="showtr">
                      <td><?php echo $urow['page_name']; ?> </td>
                      <td><?php echo $urow['seo_title']; ?> </td>
                      <td><?php echo $urow['seo_keyword']; ?> </td>
                      <td><?php echo $urow['seo_description']; ?> </td>
                      <td><div class="material-switch">
                          <input id="someSwitchOptionSuccess<?php echo $urow[0]; ?>" value="<?php echo $urow[0]; ?>" name="someSwitchOption001" type="checkbox" <?php if($urow['status']=='1') { echo"checked"; }?> onClick="status_cng(this.value);"/>
                          <label for="someSwitchOptionSuccess<?php echo $urow[0]; ?>" class="label-success"></label>
                        </div></td>
                      <td class="center"><a class="btn btn-mini btn-success" href="seo_master.php?uid=<?php echo $urow[0]; ?>" title=""><i class="icon-pencil"></i></a> <a href="#" id="<?php echo $urow[0]; ?>" class="delete btn btn-mini btn-danger" title="Delete" ><i class="icon-trash"></i></a> </td>
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
        url:"seo_master.php",
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
$ure=mysqli_query($con,"select * from seo_master where id = '$pid'");
$urow=mysqli_fetch_array($ure);
$ostatus = $urow['status'];
if($ostatus == '1') { $status = '0'; } else { $status = '1'; }
$uupQry="UPDATE seo_master SET status='$status' WHERE id='$pid'";
$uuresult=mysqli_query($con,$uupQry);
}
?>
                <script src="js/jquery-3.2.1.min.js"></script>
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
   url: "seo_master.php",
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
$delete = "DELETE FROM seo_master WHERE id = '$id'";
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
