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
xmlhttp.open("GET","court_master_getslot1.php?q="+str,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
function showUser2(str)
{
if (str=="")
  {
  document.getElementById("txtHint2").innerHTML="";
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
    document.getElementById("txtHint2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","court_master_getslot2.php?q="+str,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
function showUser3(str)
{
if (str=="")
  {
  document.getElementById("txtHint3").innerHTML="";
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
    document.getElementById("txtHint3").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","court_master_getslot3.php?q="+str,true);
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
            <h2 class="content-color-primary page-title">Court Master</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content page title ends -->
  <!-- content page -->
  <div class="container mt-4 main-container">
    <?php 
	$id = $_GET['uid'];
	if(isset($_REQUEST['update'])) 
  	{

  		
	 $uupQry="UPDATE court_master SET `status` = '".mysqli_real_escape_string($con,$_REQUEST['status'])."', `name` = '".mysqli_real_escape_string($con,$_REQUEST['name'])."', `sport_type` = '".mysqli_real_escape_string($con,$_REQUEST['sport_type'])."', `surface_type` = '".mysqli_real_escape_string($con,$_REQUEST['surface_type'])."', `additional_info` = '".mysqli_real_escape_string($con,$_REQUEST['additional_info'])."', `noof_player` = '".mysqli_real_escape_string($con,$_REQUEST['noof_player'])."', `start_time` = '".mysqli_real_escape_string($con,$_REQUEST['start_time'])."',`end_time` = '".mysqli_real_escape_string($con,$_REQUEST['end_time'])."', `time_slot` = '".mysqli_real_escape_string($con,$_REQUEST['time_slot'])."' WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
	
	$delete = "DELETE FROM court_slot WHERE court_id = '$id'";
	mysqli_query($con, $delete);
  
    					foreach($_POST['slot_timing'] as $key=>$val)
                        {
                        if($val != '')
                        {
                         $qry_main = "INSERT INTO `court_slot` (`court_id`,`slot_timing`,`weeekday_slot_price`,`weeekend_slot_price`,`weeekday_slot_status`,`weeekend_slot_status`,`noof_booking`,`start_time`,`end_time`,`weekday_commission`,`weekend_commission`) VALUES ('$id','$val','".$_POST['weeekday_slot_price'][$key]."','".$_POST['weeekend_slot_price'][$key]."','".$_POST['weeekday_slot_status'][$key]."','".$_POST['weeekend_slot_status'][$key]."','".$_POST['noof_booking'][$key]."','".$_POST['slot_start_time'][$key]."','".$_POST['slot_end_time'][$key]."','".$_POST['weekday_commission'][$key]."','".$_POST['weekend_commission'][$key]."')";
                        mysqli_query($con,$qry_main);
                        } 
						}  
  //exit();
	?>
    <script language="javascript">window.location.href="court_master.php";</script>
    <?php  } ?>
    <?php 
	$ure=mysqli_query($con,"select * from court_master where id = '$id'");
	$urow=mysqli_fetch_array($ure); ?>
    <?php if($id != '') { ?>
    <div class="card mb-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
              <form autocomplete="off"  name="form" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                      <label for="multicol-username">Venue Name</label>
                      <select  class='form-control chosen_select' name="venue_id">
                        <?php 
							$coun=mysqli_query($con,"select * from venue_master order by name asc");
							while($Fcoun=mysqli_fetch_array($coun)) { 
							 ?>
                        <option value="<?php echo $Fcoun[0]; ?>" <?php if($Fcoun[0] == $urow['venue_id']) echo 'selected="selected"';?>><?php echo $Fcoun['name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Court Name</label>
                      <input class="form-control" name="name"  value="<?php echo $urow['name']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
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
                  <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                      <label for="multicol-username">Surface Type</label>
                      <select  class='form-control chosen_select' name="surface_type">
                        <option value="">Please Select</option>
                        <?php 
							$coun=mysqli_query($con,"select * from surface_type where status = '1' order by name asc");
							while($Fcoun=mysqli_fetch_array($coun)) { 
							 ?>
                        <option value="<?php echo $Fcoun['name']; ?>" <?php if($Fcoun['name'] == $urow['surface_type']) echo 'selected="selected"';?>><?php echo $Fcoun['name']; ?></option>
                        <?php } ?>
                      </select>
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
                      <label for="">No of Player to Play</label>
                      <input class="form-control" name="noof_player"  value="<?php echo $urow['noof_player']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Start Time</label>
                      <input class="form-control" name="start_time"  value="<?php echo $start_time = $urow['start_time']; ?>" type="time" onBlur="showUser1(this.value)">
                      <span id="txtHint1"></span> </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">End Time</label>
                      <input class="form-control" name="end_time"  value="<?php echo $end_time = $urow['end_time']; ?>" type="time" onBlur="showUser2(this.value)">
                      <span id="txtHint1"></span> </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Slot/Minute (30,60,90,120 Etc.)</label>
                      <input class="form-control" name="time_slot"  value="<?php echo $time_slot = $urow['time_slot']; ?>" type="text" onKeyPress="return isNumberKey(event)"  onBlur="showUser3(this.value)">
                    </div>
                  </div>
                  <?php
				  $venue_id = $urow['venue_id'];
				  $urev=mysqli_query($con,"select * from venue_master where id = '$venue_id'");
				  $urowv=mysqli_fetch_array($urev);
				  $venue_model = $urowv['venue_model']; ?>
                  <div class="col-sm-12">
                    <div class="form-group"> <span id="txtHint3">
                      <?php if($id) { ?>
                      <label for="">Slot Detail</label>
                      <table border="1" width="100%">
                        <thead>
                          <tr>
                            <th>Slot Timing</th>
                            <th>Weekday Slot Pricing</th>
                            <th>Weekend Slot Pricing</th>
                            <th>No of Booking Allowed</th>
                            <th>Weekday Slot Status</th>
                            <th>Weekend Slot Status</th>
                            <?php if($venue_model == 'commission') { ?>
                            <th>Weekday Commission</th>
                            <th>Weekend Commission</th>
                            <?php } ?>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
							$urex=mysqli_query($con,"select * from court_slot where court_id = '$id' order by ABS(id) asc");
							while($urowx=mysqli_fetch_array($urex)) { ?>
                          <tr class="showtrs">
                            <td style="padding:3px;"><?php echo $slot_timing = $urowx['slot_timing']; ?>
                              <input type="hidden" name="slot_timing[]" class="form-control" style="width:100px" value="<?php echo $slot_timing; ?>">
                              <input type="hidden" name="slot_start_time[]" class="form-control" style="width:100px" value="<?php echo substr($slot_timing, 0, 5); ?>:00">
                              <input type="hidden" name="slot_end_time[]" class="form-control" style="width:100px" value="<?php echo substr($slot_timing, 8, 5); ?>:00">
                            </td>
                            <td style="padding:3px;"><input type="number" name="weeekday_slot_price[]" class="form-control" style="width:100px" value="<?php echo $urowx['weeekday_slot_price']; ?>"></td>
                            <td style="padding:3px;"><input type="number" name="weeekend_slot_price[]" class="form-control" style="width:100px" value="<?php echo $urowx['weeekend_slot_price']; ?>"></td>
                            <td style="padding:3px;"><input type="number" name="noof_booking[]" class="form-control" style="width:100px" value="<?php echo $urowx['noof_booking']; ?>"></td>
                            <td style="padding:3px;"><select name="weeekday_slot_status[]" class="form-control">
                                <option value="1" <?php if($urowx['weeekday_slot_status'] == '1') echo 'selected="selected"';?>>Yes</option>
                                <option value="0" <?php if($urowx['weeekday_slot_status'] == '0') echo 'selected="selected"';?>>No</option>
                              </select>
                            </td>
                            <td style="padding:3px;"><select name="weeekend_slot_status[]" class="form-control">
                                <option value="1" <?php if($urowx['weeekend_slot_status'] == '1') echo 'selected="selected"';?>>Yes</option>
                                <option value="0" <?php if($urowx['weeekend_slot_status'] == '0') echo 'selected="selected"';?>>No</option>
                              </select>
                            </td>
                            <?php if($venue_model == 'commission') { ?>
                            <td style="padding:3px;"><input type="number" name="weekday_commission[]" class="form-control" style="width:100px" value="<?php echo $urowx['weekday_commission']; ?>"></td>
                            <td style="padding:3px;"><input type="number" name="weekend_commission[]" class="form-control" style="width:100px" value="<?php echo $urowx['weekend_commission']; ?>"></td>
                            <?php } ?>
                            <td style="padding:3px;"><?php $urowx[0]; ?>
                              <a href="#" id="<?php echo $urowx[0]; ?>" class="deletes btn btn-mini btn-danger" title="Delete" ><i class="icon-trash"></i></a></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      <?php } ?>
                      </span> </div>
                  </div>
                  
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""><strong>Court Status : </strong></label>
                      <input name="status"  required type="radio"  value="1"  <?php if($urow['status'] == '1') echo 'checked="checked"';?>/>
                      &nbsp;Enable&nbsp;
                      <input name="status" required type="radio"  value="0"  <?php if($urow['status'] == '0') echo 'checked="checked"';?>/>
                      &nbsp;Disable
                      
					  
                    </div>
                  </div>
                </div>
                <div class="form-buttons-w">
                  <input type="submit" name="update" value="Update" class="btn btn-primary">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <div class="card mb-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
              <div class="table-responsive">
                <table class="table " id="dataTables-example">
                  <thead>
                    <tr>
                      <th style="display:none"> </th>
                      <th> Venue Name </th>
                      <th> Court Name </th>
                      <th> Sport Type </th>
                      <th> Surface Type</th>
                      <th> No of Player </th>
                      <th> Start Time </th>
                      <th> End Time </th>
                      <th> Slot/Hour </th>
                      <th> Status </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								 
					$ure=mysqli_query($con,"select * from court_master");
					while($urow=mysqli_fetch_array($ure)) {
					?>
                    <tr class="showtr">
                      <td style="display:none"><?php echo $urow[0]; ?> </td>
                      <td><?php $venue_id = $urow['venue_id']; 
						   $urex=mysqli_query($con,"select * from venue_master where id = '$venue_id'");
						   $urowx=mysqli_fetch_array($urex); echo $urowx['name'];?>
                      </td>
                      <td><?php echo $urow['name']; ?> </td>
                      <td><?php echo $urow['sport_type']; ?> </td>
                      <td><?php echo $urow['surface_type']; ?> </td>
                      <td><?php echo $urow['noof_player']; ?> </td>
                      <td><?php echo $urow['start_time']; ?> </td>
                      <td><?php echo $urow['end_time']; ?> </td>
                      <td><?php echo $urow['time_slot']; ?>/Hour</td>
                      <td><?php $status = $urow['status']; ?> <?php if($status == '0') { echo '<span class="btn btn-danger btn-mini">Pending For Approval</span>'; } else { echo '<span class="btn btn-success btn-mini">Approved</span>'; } ?>
                      </td>
                      <td><a class="btn btn-mini btn-success" href="court_master.php?uid=<?php echo $urow[0]; ?>" title=""><i class="icon-pencil"></i></a> <a href="#" id="<?php echo $urow[0]; ?>" class="delete btn btn-mini btn-danger" title="Delete" ><i class="icon-trash"></i></a> </td>
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
        url:"court_master.php",
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
$ure=mysqli_query($con,"select * from court_master where id = '$pid'");
$urow=mysqli_fetch_array($ure);
$ostatus = $urow['status'];
if($ostatus == '1') { $status = '0'; } else { $status = '1'; }
$uupQry="UPDATE court_master SET status='$status' WHERE id='$pid'";
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
   url: "court_master.php",
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
$delete = "DELETE FROM court_master WHERE id = '$id'";
mysqli_query($con, $delete);
}
?>
                <script type="text/javascript">
$(function() {
$(".deletes").click(function(){
var elements = $(this);
var del_ids = elements.attr("id");
var infos = 'ids=' + del_ids;
if(confirm("Are you sure you want to Delete?"))
{
 $.ajax({
   type: "POST",
   url: "court_master.php?uid=<?php echo $_GET['uid']; ?>",
   data: infos,
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
$delete = "DELETE FROM court_slot WHERE id = '$ids'";
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
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<!-- Application main common jquery file -->
<script src="js/main.js"></script>
<!-- page specific script -->
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
