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
 $amenities = implode(',',$_REQUEST['amenities']);
	
  $sql=("INSERT INTO `venue_master` (`manager_id`, `name`, `owner_name`, `email1`, `email2`, `contact1`, `contact2`, `google_map`, `address`, `state`, `city`, `about_venue`, `bank_name`, `branch_name`, `ac_no`, `ifsc_code`, `amenities`, `seo_title`, `seo_keyword`, `seo_description`, `status`, `additional_info`) VALUES ('".mysqli_real_escape_string($con,$_REQUEST['manager_id'])."', '".mysqli_real_escape_string($con,$_REQUEST['name'])."', '".mysqli_real_escape_string($con,$_REQUEST['owner_name'])."', '".mysqli_real_escape_string($con,$_REQUEST['email1'])."', '".mysqli_real_escape_string($con,$_REQUEST['email2'])."', '".mysqli_real_escape_string($con,$_REQUEST['contact1'])."', '".mysqli_real_escape_string($con,$_REQUEST['contact2'])."', '".mysqli_real_escape_string($con,$_REQUEST['google_map'])."', '".mysqli_real_escape_string($con,$_REQUEST['address'])."', '".mysqli_real_escape_string($con,$_REQUEST['state'])."', '".mysqli_real_escape_string($con,$_REQUEST['city'])."', '".mysqli_real_escape_string($con,$_REQUEST['about_venue'])."', '".mysqli_real_escape_string($con,$_REQUEST['bank_name'])."', '".mysqli_real_escape_string($con,$_REQUEST['branch_name'])."', '".mysqli_real_escape_string($con,$_REQUEST['ac_no'])."', '".mysqli_real_escape_string($con,$_REQUEST['ifsc_code'])."', '$amenities', '".mysqli_real_escape_string($con,$_REQUEST['seo_title'])."', '".mysqli_real_escape_string($con,$_REQUEST['seo_keyword'])."', '".mysqli_real_escape_string($con,$_REQUEST['seo_description'])."','1', '".mysqli_real_escape_string($con,$_REQUEST['additional_info'])."')");	 
 
$z = mysqli_query($con,$sql);
		
		

?>
    <script language="javascript">window.location.href="venue_master.php";</script>
    <?php 
} 

	$id = $_GET['uid'];

	if(isset($_REQUEST['update'])) 
  	{
  	
	 $amenities = implode(',',$_REQUEST['amenities']);
	
	$uupQry="UPDATE venue_master SET `manager_id` = '".mysqli_real_escape_string($con,$_REQUEST['manager_id'])."', `name` = '".mysqli_real_escape_string($con,$_REQUEST['name'])."', `owner_name` = '".mysqli_real_escape_string($con,$_REQUEST['owner_name'])."', `email1` = '".mysqli_real_escape_string($con,$_REQUEST['email1'])."', `email2` = '".mysqli_real_escape_string($con,$_REQUEST['email2'])."', `contact1` = '".mysqli_real_escape_string($con,$_REQUEST['contact1'])."', `contact2` = '".mysqli_real_escape_string($con,$_REQUEST['contact2'])."',   `google_map` = '".mysqli_real_escape_string($con,$_REQUEST['google_map'])."', `address` = '".mysqli_real_escape_string($con,$_REQUEST['address'])."',  `state` = '".mysqli_real_escape_string($con,$_REQUEST['state'])."',`city` = '".mysqli_real_escape_string($con,$_REQUEST['city'])."',`about_venue` = '".mysqli_real_escape_string($con,$_REQUEST['about_venue'])."',`bank_name` = '".mysqli_real_escape_string($con,$_REQUEST['bank_name'])."',`branch_name` = '".mysqli_real_escape_string($con,$_REQUEST['branch_name'])."',`ac_no` = '".mysqli_real_escape_string($con,$_REQUEST['ac_no'])."',`ifsc_code` = '".mysqli_real_escape_string($con,$_REQUEST['ifsc_code'])."',`amenities` = '$amenities',`seo_title` = '".mysqli_real_escape_string($con,$_REQUEST['seo_title'])."',`seo_keyword` = '".mysqli_real_escape_string($con,$_REQUEST['seo_keyword'])."',`seo_description` = '".mysqli_real_escape_string($con,$_REQUEST['seo_description'])."',`additional_info` = '".mysqli_real_escape_string($con,$_REQUEST['additional_info'])."' WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
  

 // exit();
	?>
    <script language="javascript">window.location.href="venue_master.php";</script>
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
                  <div class="col-md-3">
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
                      <input class="form-control" name="name"  required value="<?php echo $urow['name']; ?>" type="text">
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
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Google Map Link</label>
                      <input class="form-control" name="google_map"  value="<?php echo $urow['google_map']; ?>" type="text">
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
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""> Amenities</label>
                      <?php $amenities = explode(',',$urow['amenities']);   $ids = "'" . implode("','", $amenities) . "'";  ?>
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
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="">SEO Title</label>
                      <textarea name="seo_title" style="height:50px" class="form-control" onKeyUp="checkLen1(this.value)"><?php echo $urow['seo_title']; ?></textarea>
                      <div id="counterDisplay1" style="color:#FF0000">Limit 250 Character</div>
                      <script type="text/javascript"><!--
						function checkLen1x(val){
							document.getElementById('counterDisplay1x').innerHTML = val.length + ' of 250';
						}
					</script>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="">SEO Keyword</label>
                      <textarea name="seo_keyword" class="form-control" style="height:50px" onKeyUp="checkLen2(this.value)"><?php echo $urow['seo_keyword']; ?></textarea>
                      <div id="counterDisplay2" style="color:#FF0000">Limit 250 Character</div>
                      <script type="text/javascript"><!--
						function checkLen2x(val){
							document.getElementById('counterDisplay2x').innerHTML = val.length + ' of 250';
						}
					</script>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="">SEO Metatag/Description</label>
                      <textarea name="seo_description" class="form-control" style="height:50px"  onKeyUp="checkLen3(this.value)"><?php echo $urow['seo_description']; ?></textarea>
                      <div id="counterDisplay3" style="color:#FF0000">Limit 250 Character</div>
                      <script type="text/javascript"><!--
						function checkLen3x(val){
							document.getElementById('counterDisplay3x').innerHTML = val.length + ' of 250';
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
                      <th> Venue Name </th>
                      <th> Contact/Email </th>
                      <th> Address</th>
                      <th> Photo </th>
                      <th> Status </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								 
						$ure=mysqli_query($con,"select * from venue_master");
						while($urow=mysqli_fetch_array($ure))
						 {
						?>
                    <tr class="showtr">
                      <td><?php echo $urow['name']; ?> </td>
                      <td><?php echo $urow['contact1']; ?><br/><?php echo $urow['email1']; ?> </td>
                      <td><?php echo $urow['address']; ?></td>
                      <td><a class="btn btn-danger" href="venue_photo.php?id=<?php echo $urow[0]; ?>" style="padding:2px;">Photo</a></td>
                      <td><div class="material-switch">
                          <input id="someSwitchOptionSuccess<?php echo $urow[0]; ?>" value="<?php echo $urow[0]; ?>" name="someSwitchOption001" type="checkbox" <?php if($urow['status']=='1') { echo"checked"; }?> onClick="status_cng(this.value);"/>
                          <label for="someSwitchOptionSuccess<?php echo $urow[0]; ?>" class="label-success"></label>
                        </div></td>
                      <td class="center"><a class="btn btn-mini btn-success" href="venue_master.php?uid=<?php echo $urow[0]; ?>" title=""><i class="icon-pencil"></i></a> <a href="#" id="<?php echo $urow[0]; ?>" class="delete btn btn-mini btn-danger" title="Delete" ><i class="icon-trash"></i></a> </td>
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
        url:"venue_master.php",
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
$ure=mysqli_query($con,"select * from venue_master where id = '$pid'");
$urow=mysqli_fetch_array($ure);
$ostatus = $urow['status'];
if($ostatus == '1') { $status = '0'; } else { $status = '1'; }
$uupQry="UPDATE venue_master SET status='$status' WHERE id='$pid'";
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
   url: "venue_master.php",
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
$delete = "DELETE FROM venue_master WHERE id = '$id'";
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
