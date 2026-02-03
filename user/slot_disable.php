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
<script type="text/javascript">
function showUser0(str)
{
if (str=="")
  {
  document.getElementById("txtHint0").innerHTML="";
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
    document.getElementById("txtHint0").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","slot_disable_date.php?q="+str,true);
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
xmlhttp.open("GET","slot_disable_data.php?q="+str,true);
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
            <h2 class="content-color-primary page-title">Disable Slot&nbsp;|&nbsp;
            <a href="slot_disable_history.php" class="btn btn-mini btn-danger" title="Delete" >History</a></h2>
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
$disable_date = $_REQUEST['disable_date'];
  
$dayNumber = date('N', strtotime($disable_date)); 
// N: 1 (for Monday) through 7 (for Sunday)
if ($dayNumber >= 6) 
{
				    
foreach($_POST['weeekend_slot_status'] as $key=>$val)
{
if($val == '0')
{
$slot_id = $_POST['slot_id'][$key]; 
$urex=mysqli_query($con,"select * from court_slot where id = '$slot_id'");
$urowx=mysqli_fetch_array($urex); 
$slot_timing = $urowx['slot_timing'];
					   
$qry_main = "INSERT INTO `slot_disable` (`disable_date`,`court_id`,`slot_id`,`user_id`,`court_time`,`slot_status`) VALUES ('".mysqli_real_escape_string($con,$_REQUEST['disable_date'])."','".mysqli_real_escape_string($con,$_REQUEST['court_id'])."','".$_POST['slot_id'][$key]."','$admin_id','$slot_timing','$val')";
mysqli_query($con,$qry_main);
} 
}  

}
else
{

foreach($_POST['weeekday_slot_status'] as $key=>$val)
{
if($val == '0')
{
$slot_id = $_POST['slot_id'][$key]; 
$urex=mysqli_query($con,"select * from court_slot where id = '$slot_id'");
$urowx=mysqli_fetch_array($urex); 
$slot_timing = $urowx['slot_timing'];
					   
$qry_main = "INSERT INTO `slot_disable` (`disable_date`,`court_id`,`slot_id`,`user_id`,`court_time`,`slot_status`) VALUES ('".mysqli_real_escape_string($con,$_REQUEST['disable_date'])."','".mysqli_real_escape_string($con,$_REQUEST['court_id'])."','".$_POST['slot_id'][$key]."','$admin_id','$slot_timing','$val')";
mysqli_query($con,$qry_main);
} 
}  

}
?>
    <script language="javascript">window.location.href="slot_disable.php";</script>
    <?php 
}  ?>
    <?php 
	$ure=mysqli_query($con,"select * from slot_disable where id = '$id'");
	$urow=mysqli_fetch_array($ure); ?>
    <div class="card mb-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
              <form autocomplete="off"  name="form" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Disable Date</label>
                      <input class="form-control" name="disable_date"  value="<?php echo $urow['disable_date']; ?>" type="date" onChange="showUser0(this.value)">
                      <span id="txtHint0"></span>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-floating form-floating-outline">
                      <label for="multicol-username">Court Name</label>
                      <select  class='form-control chosen_select' name="court_id" required onChange="showUser1(this.value)">
                      	<option value="">Select Court</option>
                        <?php 
							$coun=mysqli_query($con,"select * from court_master where status = '1' and user_id = '$admin_id' order by name asc");
							while($Fcoun=mysqli_fetch_array($coun)) { 
							 ?>
                        <option value="<?php echo $Fcoun[0]; ?>" <?php if($Fcoun[0] == $urow['court_id']) echo 'selected="selected"';?>><?php echo $Fcoun['name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">&nbsp;</div>
                  <div class="col-sm-12">
                    <div class="form-group"> <span id="txtHint1"></span> </div>
                  </div>
                </div>
                <div class="form-buttons-w">
                  <input type="submit" name="insert" value="Insert" class="btn btn-primary">
                  <input value="Cancel" name="cancel" type="reset" class="btn btn-danger">
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
                      <th style="display:none">  </th>
                      <th> Disable Date </th>
                      <th> Venue Name </th>
                      <th> Court Name </th>
                      <th> Slot Timing</th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								 
						$ure=mysqli_query($con,"select * from slot_disable where user_id = '$admin_id' and disable_date >= '$today_date'");
						while($urow=mysqli_fetch_array($ure)) {
						$court_id = $urow['court_id']; 
						$urex=mysqli_query($con,"select * from court_master where id = '$court_id'");
					    $urowx=mysqli_fetch_array($urex);
						$venue_id = $urowx['venue_id'];
						?>
                    <tr class="showtr">
                      <td style="display:none"><?php echo $urow['disable_date']; ?> </td>
                      <td><?php echo date("d-m-Y", strtotime($urow['disable_date']));  ?> </td>
                      <td><?php 
					   $urexv=mysqli_query($con,"select * from venue_master where id = '$venue_id'");
					   $urowxv=mysqli_fetch_array($urexv); echo $urowxv['name'];?> </td>
                      <td><?php echo $urowx['name'];?> </td>
                      <td><?php echo $urow['court_time'];?> </td>
                      <td class="center"><a href="#" id="<?php echo $urow[0]; ?>" class="delete btn btn-mini btn-danger" title="Delete" ><i class="icon-trash"></i></a> </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
               
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
   url: "slot_disable.php",
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
$delete = "DELETE FROM slot_disable WHERE id = '$id'";
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
                    [0, "asc"]
                ]
            });
        });

    </script>
<!-- page specific script -->
</body>
</html>
