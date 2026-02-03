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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
            <h2 class="content-color-primary page-title">Company Profile</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content page title ends -->
  <!-- content page -->
  <div class="container mt-4 main-container">
    <div class="card mb-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
              <div class="">
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
                <?php 
$id = '1';
if(isset($_REQUEST['update'])) 
  {
  		 
	$img2=$_FILES["img2"]["name"];
	if($img2 != '') 
	{
	$img2=rand(1,1000000).str_replace(" ","_",trim($_FILES['img2']['name']));
	$tmp_name=$_FILES["img2"]["tmp_name"];
	$pr="../images/";
	$pr2=$img2;
	$pr22=$pr.$img2;
	move_uploaded_file($tmp_name,$pr22);
	}	
	$img3=$_FILES["img3"]["name"];
	if($img3 != '')
	{ 
	$img3=rand(1,1000000).str_replace(" ","_",trim($_FILES['img3']['name']));
	$tmp_name=$_FILES["img3"]["tmp_name"];
	$pr="../images/";
	$pr3=$img3;
	$pr33=$pr.$img3;
	move_uploaded_file($tmp_name,$pr33);
	}
	$img4=$_FILES["img4"]["name"];
	if($img4 != '')
	{ 
	$img4=rand(1,1000000).str_replace(" ","_",trim($_FILES['img4']['name']));
	$tmp_name=$_FILES["img4"]["tmp_name"];
	$pr="../images/";
	$pr4=$img4;
	$pr44=$pr.$img4;
	move_uploaded_file($tmp_name,$pr44);
	}
$company_works = implode(',',$_REQUEST['company_works']);
$bank_id = $_REQUEST['bank_id'];
$urezzvch=mysqli_query($con,"select * from bank_master where id = '$bank_id'");
$urowvch=mysqli_fetch_array($urezzvch);
$bank_name = $urowvch['bank_name'];
$ac_no = $urowvch['ac_no'];
$ifsc_code = $urowvch['ifsc_code'];
$branch_name = $urowvch['branch_name'];
$state = $_REQUEST['state'];
$urest=mysqli_query($con,"select * from state_master where statename = '$state'");
$urowst=mysqli_fetch_array($urest);
$state_code=$urowst['gst_code']; 
	   $uupQry="UPDATE company_master SET `type` = '".mysqli_real_escape_string($con,$_REQUEST['type'])."', `name` = '".mysqli_real_escape_string($con,$_REQUEST['name'])."',  `owner_name` = '".mysqli_real_escape_string($con,$_REQUEST['owner_name'])."', `owner_name_show` = '".mysqli_real_escape_string($con,$_REQUEST['owner_name_show'])."', `address1` = '".mysqli_real_escape_string($con,$_REQUEST['address1'])."',`address1_show` = '".mysqli_real_escape_string($con,$_REQUEST['address1_show'])."',`address2` = '".mysqli_real_escape_string($con,$_REQUEST['address2'])."', `state` = '$state',`state_code` = '$state_code', `city` = '".mysqli_real_escape_string($con,$_REQUEST['city'])."', `zipcode` = '".mysqli_real_escape_string($con,$_REQUEST['zipcode'])."', `mobile1` = '".mysqli_real_escape_string($con,$_REQUEST['mobile1'])."', `mobile_show1` = '".mysqli_real_escape_string($con,$_REQUEST['mobile_show1'])."', `mobile2` = '".mysqli_real_escape_string($con,$_REQUEST['mobile2'])."', `mobile_show2` = '".mysqli_real_escape_string($con,$_REQUEST['mobile_show2'])."', `email` = '".mysqli_real_escape_string($con,$_REQUEST['email'])."', `email_show` = '".mysqli_real_escape_string($con,$_REQUEST['email_show'])."', `website` = '".mysqli_real_escape_string($con,$_REQUEST['website'])."', `website_show` = '".mysqli_real_escape_string($con,$_REQUEST['website_show'])."', `acc_method` = '".mysqli_real_escape_string($con,$_REQUEST['acc_method'])."', `pan_no` = '".mysqli_real_escape_string($con,$_REQUEST['pan_no'])."', `gst_status` = '".mysqli_real_escape_string($con,$_REQUEST['gst_status'])."', `gst_no` = '".mysqli_real_escape_string($con,$_REQUEST['gst_no'])."', `gst_legalname` = '".mysqli_real_escape_string($con,$_REQUEST['gst_legalname'])."', `gst_regdate` = '".mysqli_real_escape_string($con,$_REQUEST['gst_regdate'])."', `gst_regtype` = '".mysqli_real_escape_string($con,$_REQUEST['gst_regtype'])."', `company_works` = '$company_works',`bank_id` = '$bank_id', `bank_name` = '$bank_name', `ac_no` = '$ac_no', `branch_name` = '$branch_name', `ifsc_code` = '$ifsc_code', `bank_groups` = '".mysqli_real_escape_string($con,$_REQUEST['bank_groups'])."', `bank_showbill` = '".mysqli_real_escape_string($con,$_REQUEST['bank_showbill'])."', `bank_showquot` = '".mysqli_real_escape_string($con,$_REQUEST['bank_showquot'])."',   `financial_year` = '".mysqli_real_escape_string($con,$_REQUEST['financial_year'])."',`trade_type` = '".mysqli_real_escape_string($con,$_REQUEST['trade_type'])."',`password_status` = '".mysqli_real_escape_string($con,$_REQUEST['password_status'])."',`password` = '".mysqli_real_escape_string($con,$_REQUEST['password'])."',`placeof_supply` = '".mysqli_real_escape_string($con,$_REQUEST['placeof_supply'])."',`company_startdate` = '".mysqli_real_escape_string($con,$_REQUEST['company_startdate'])."',`upi_id_status` = '".mysqli_real_escape_string($con,$_REQUEST['upi_id_status'])."',`upi_id` = '".mysqli_real_escape_string($con,$_REQUEST['upi_id'])."',`msme_no` = '".mysqli_real_escape_string($con,$_REQUEST['msme_no'])."',`tag_line` = '".mysqli_real_escape_string($con,$_REQUEST['tag_line'])."',`tag_line_show` = '".mysqli_real_escape_string($con,$_REQUEST['tag_line_show'])."'  WHERE cid='$id'";
	$uuresult=mysqli_query($con,$uupQry);
	
	
	if($img2 != '')
	{
	$uupQry="UPDATE company_master SET  `company_logo` = '$img2' WHERE cid='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 	}
	
	if($img3 != '')
	{
	$uupQry="UPDATE company_master SET  `company_sign` = '$img3' WHERE cid='$id'";
	$uuresult=mysqli_query($con,$uupQry);
	}
	
	if($img4 != '')
	{
	$uupQry="UPDATE company_master SET  `upi_qrcode` = '$img4' WHERE cid='$id'";
	$uuresult=mysqli_query($con,$uupQry);
	}
	
	
	$company_gst_status = $_REQUEST['gst_status'];

	if($company_gst_status == 0)
	{
	$uupQry="UPDATE voucher_master SET gst_status='0' WHERE company_id = '$company_id' and admin_id = '$admin_id' and year_range = '$year_range'";
	$uuresult=mysqli_query($con,$uupQry);
	}
	
	if($company_gst_status == 1)
	{
	$uupQry="UPDATE voucher_master SET gst_status='1' WHERE company_id = '$company_id' and admin_id = '$admin_id' and year_range = '$year_range'";
	$uuresult=mysqli_query($con,$uupQry);
	}
	
	?>
                <script language="javascript">window.location.href="company_master.php";</script>
                <?php 
  }
		$ure=mysqli_query($con,"select * from company_master where cid='$id'");
		$row=mysqli_fetch_array($ure); ?>
                <script type="text/javascript" language="javascript">
function validateForm()
{
			
var x=document.forms["form"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }
  
   var mobile = document.getElementById("mobile_no").value;
        var pattern = /^\d{10}$/;
        if (pattern.test(mobile)) {
            
            return true;
        } 
            alert("It is not valid mobile number.input 10 digits number!");
            return false;
			
			}
  </script>
                <form autocomplete="off" method="POST" name="form" enctype="multipart/form-data" class='form-horizontal form-column form-bordered'>
                  <div class="form-group row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="textfield" class="control-label">Company Name </label>
                        <input name="name" required   type="text"  value="<?php echo $row['name']; ?>"   class="form-control"/>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="password" class="control-label">Owner Name </label>
                        <input type="text" name="owner_name" id="owner_name" value="<?php echo $row['owner_name']; ?>" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for=""> Address<span class="required">*</span></label>
                        <textarea name="address1" id="address1" rows="5" class="form-control"><?php echo $row['address1']; ?></textarea>
                        <script type="text/javascript">
			//<![CDATA[
 
				// This call can be placed at any point after the
				// <textarea>, or inside a <head><script> in a
				// window.onload event handler.
				// Replace the <textarea id="editor"> with an CKEditor
				// instance, using default configurations.
				CKEDITOR.env.isCompatible = true;
				CKEDITOR.replace( 'address1z' );
			//]]>
			</script>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label for=""> State Name<span class="required">*</span></label>
                        <select name="state" class="form-control select2" onChange="showUser(this.value)">
                          <option value="">Select State</option>
                          <?php
		$ures=mysqli_query($con,"select * from state_master order by statename asc");
		while($urows=mysqli_fetch_array($ures)) {?>
                          <option value="<?php echo $urows['statename']; ?>" <?php if($urows['statename'] == $row['state']) echo 'selected="selected"';?>><?php echo $urows['statename']; ?>&nbsp;|&nbsp;<?php echo $urows['gst_code']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label for=""> City Name<span class="required">*</span></label>
                        <span id="txtHint">
                        <select name="city" class="form-control select2" id="select">
                          <option value="">Select City</option>
                          <?php
		$ures=mysqli_query($con,"select * from city_master order by city asc");
		while($urows=mysqli_fetch_array($ures)) {?>
                          <option value="<?php echo $urows['city']; ?>"  <?php if($urows['city'] == $row['city']) echo 'selected="selected"';?>><?php echo $urows['city']; ?></option>
                          <?php } ?>
                        </select>
                        <br>
                        <input type="hidden" name="placeof_supply" class="form-control halfwidth" value="<?php echo $row['placeof_supply']; ?>">
                        </span> </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for=""> Pin Code<span class="required">*</span></label>
                        <input type="text" name="zipcode"  value="<?php echo $row['zipcode']; ?>"  class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for=""> Contact no 1<span class="required">*</span></label>
                        <input type="text" name="mobile1"  value="<?php echo $row['mobile1']; ?>"  class="form-control" placeholder="Contact No 1">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for=""> Contact no 2<span class="required">*</span></label>
                        <input type="text" name="mobile2"  value="<?php echo $row['mobile2']; ?>"  class="form-control" placeholder="Contact No 2">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for=""> Email</label>
                        <input type="text" name="email"  value="<?php echo $row['email']; ?>"  class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for=""> Website</label>
                        <input type="text" name="website"  value="<?php echo $row['website']; ?>"  class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="textarea" class="control-label">MSME No </label>
                        <div class="controls">
                          <input type="text" name="msme_no"  value="<?php echo $row['msme_no']; ?>" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="textarea" class="control-label">PAN No </label>
                        <div class="controls">
                          <input type="text" name="pan_no"  value="<?php echo $row['pan_no']; ?>" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="textarea" class="control-label">Have You GST No ? </label>
                        <div class="controls">
                          <input name="gst_status"  onclick = "showMessage3(1)"  type="radio"  value="1"  <?php if($row['gst_status'] == '1') echo 'checked="checked"';?> style=""/>
                          &nbsp;Yes
                          <input name="gst_status"  onclick = "showMessage3(2)"  type="radio"  value="0"  <?php if($row['gst_status'] == '0') echo 'checked="checked"';?> style=""/>
                          &nbsp;No
                          <?php $gst_status = $row['gst_status'];
if($gst_status == '1') {  $x1 = 'block'; } else {  $x1 = 'none'; } 
if($gst_status == '0') {  $x2 = 'block'; } else {  $x2 = 'none'; } ?>
                          <div id="fill4" style="display:<?php echo $x2; ?>;">Un-Registered</div>
                        </div>
                      </div>
                      <div id="fine4" style="display:<?php echo $x1; ?>;">
                        <div class="row">
                          <div class="col-sm-6">
                            <label for="textarea" class="control-label">GST No<span class="required">*</span></label>
                            <input type="text" name="gst_no"  value="<?php echo $row['gst_no']; ?>" class="form-control">
                            <a href="https://services.gst.gov.in/services/searchtp" target="_blank">Verify GST No</a> </div>
                          <div class="col-sm-6">
                            <label for="">Legal Name <span class="required">*</span></label>
                            <input type="text" name="gst_legalname"  value="<?php echo $row['gst_legalname']; ?>" class="form-control">
                          </div>
                        </div>
                      </div>
                      <script type = "text/javascript">
function showMessage3(which) {
if (which == 1) {
document.getElementById("fine4").style.display = "block";
document.getElementById("fill4").style.display = "none";
}
else {
document.getElementById("fine4").style.display = "none";
document.getElementById("fill4").style.display = "block";
}
}
</script>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for=""> Company Logo</label>
                        <input type="file" name="img2"  class="form-control">
                        <?php  $company_logo = $row['company_logo']; if($company_logo != '') { ?>
                        <div class="showtr"><img src="../images/<?php echo $company_logo = $row['company_logo']; ?>" width="100"/> <a href="#" id="<?php echo $row[0]; ?>" class="delete btn btn-mini btn-danger" title="Delete" style="margin-left:5px" ><i class="icon-trash"></i></a> </div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for=""> Company Signature</label>
                        <input type="file" name="img3"  class="form-control">
                        <?php  $company_sign = $row['company_sign']; if($company_sign != '') { ?>
                        <div class="showtrs"><img src="../images/<?php echo $row['company_sign']; ?>" width="100" /> <a href="#" id="<?php echo $row[0]; ?>" class="deletes btn btn-mini btn-danger" title="Delete" style="margin-left:5px" ><i class="icon-trash"></i></a></div>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for=""> UPI ID </label>
                        <input name="upi_id_status"  onclick = "showMessage311(1)"  type="radio"  value="1"  <?php if($row['upi_id_status'] == '1') echo 'checked="checked"';?> style=""/>
                        &nbsp;Yes
                        <input name="upi_id_status"  onclick = "showMessage311(2)"  type="radio"  value="0"  <?php if($row['upi_id_status'] == '0') echo 'checked="checked"';?> style=""/>
                        &nbsp;No
                        <?php $upi_id_status = $row['upi_id_status'];
						if($upi_id_status == '1') {  $x1 = 'block'; } else {  $x1 = 'none'; } 
						if($upi_id_status == '0') {  $x2 = 'block'; } else {  $x2 = 'none'; } ?>
                        <div id="fine411" style="display:<?php echo $x1; ?>">
                          <div class="form-group row">
                            <div class="col-sm-6"> UPI ID :
                              <input type="text" name="upi_id"   value="<?php echo $row['upi_id']; ?>" class="form-control thirtywidth">
                            </div>
                            <div class="col-sm-6"> QR Code :
                              <input type="file" name="img4" class="form-control thirtywidth">
                              <?php $upi_qrcode = $row['upi_qrcode']; if($upi_qrcode != '') { ?>
                              <a href="../images/<?php echo $row['upi_qrcode']; ?>" target="_blank" />View Image</a>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                        <div id="fill411" style="display:<?php echo $x2; ?>"></div>
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
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div align="center" class="">
                          <input type="submit" name="update" value="Update Company Profile" class="btn btn-primary">
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
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
   url: "company_master.php",
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
$uupQry="UPDATE company_master SET company_logo='' WHERE cid='$id'";
$uuresult=mysqli_query($con,$uupQry);
}
?>
                <script type="text/javascript">
$(function() {
$(".deletes").click(function(){
var element = $(this);
var del_ids = element.attr("id");
var info = 'ids=' + del_ids;
if(confirm("Are you sure you want to Delete?"))
{
 $.ajax({
   type: "POST",
   url: "company_master.php",
   data: info,
   success: function(){
 }
});
  $(this).parents(".showtrs").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});
});
</script>
                <?php 
if($_POST['ids'])
{
$ids=$_POST['ids'];
$uupQry="UPDATE company_master SET company_sign='' WHERE cid='$ids'";
$uuresult=mysqli_query($con,$uupQry);
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
