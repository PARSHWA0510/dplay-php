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
xmlhttp.open("GET","expense_master_category.php?q="+str,true);
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
            <h2 class="content-color-primary page-title">Expense Master</h2>
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
	
  $sql=mysqli_query($con,"INSERT INTO `expense_master` (`expensetype_id`,`amount`, `manager_id`, `payment_date`,`insdatetime`, `small_des`, `status`, `venue_id`) VALUES ('".mysqli_real_escape_string($con,$_REQUEST['expensetype_id'])."','".mysqli_real_escape_string($con,$_REQUEST['amount'])."', '$admin_id','".mysqli_real_escape_string($con,$_REQUEST['payment_date'])."','$todaydatetime', '".mysqli_real_escape_string($con,$_REQUEST['small_des'])."', '0', '".mysqli_real_escape_string($con,$_REQUEST['venue_id'])."')");
  
  $ref_id = mysqli_insert_id($con);
 	?>
    <script language="javascript">window.location.href="expense_master.php";</script>
    <?php 
} 
?>
    <?php 
  $id = $_GET['uid'];
						
						
if(isset($_REQUEST['update'])) 
  {
  	
	$uupQry="UPDATE expense_master SET venue_id='".mysqli_real_escape_string($con,$_REQUEST['venue_id'])."',expensetype_id='".mysqli_real_escape_string($con,$_REQUEST['expensetype_id'])."',amount='".mysqli_real_escape_string($con,$_REQUEST['amount'])."',small_des='".mysqli_real_escape_string($con,$_REQUEST['small_des'])."',payment_date='".mysqli_real_escape_string($con,$_REQUEST['payment_date'])."',vendor_id='".mysqli_real_escape_string($con,$_REQUEST['vendor_id'])."' WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
	
?>
    <script language="javascript">window.location.href="expense_list.php";</script>
    <?php  } ?>
    <?php 
					$ure=mysqli_query($con,"select * from expense_master where id = '$id'");
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
                      <label for="">Payment Date</label>
                      <input class="form-control" name="payment_date" required  value="<?php echo $urow['payment_date']; ?>" type="date">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Select Venue</label>
                      <select  class='form-control chosen_select' name="venue_id" onChange="showUser1(this.value)">
                      <option value="">Select Venue</option>
                        <?php 
							$coun=mysqli_query($con,"select * from venue_master where status = '1' and manager_id = '$admin_id' order by name asc");
							while($Fcoun=mysqli_fetch_array($coun)) { 
							 ?>
                        <option value="<?php echo $Fcoun[0]; ?>" <?php if($Fcoun[0] == $urow['venue_id']) echo 'selected="selected"';?>><?php echo $Fcoun['name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for=""> Select Expense Category</label>
                      <span id="txtHint1">
                      <select class="form-control select2" name="expensetype_id">
                        <option value="">Please Select</option>
                        <?php 
						$venue_id = $urow['venue_id'];
						$ures=mysqli_query($con,"select * from expense_category where status = '1' and venue_id = '$venue_id' order by name asc");
						while($urows=mysqli_fetch_array($ures))
						{ ?>
                        <option value="<?php echo $urows[0]; ?>" <?php if($urows[0] == $urow['expensetype_id']) echo 'selected="selected"';?>><?php echo $urows['name']; ?></option>
                        <?php } ?>
                      </select>
                      </span> </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="">Amount</label>
                      <input class="form-control" name="amount"  value="<?php echo $urow['amount']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Remarks</label>
                      <input class="form-control" name="small_des"  value="<?php echo $urow['small_des']; ?>" type="text">
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
                    [0, "asc"]
                ]
            });
        });

    </script>
<!-- page specific script -->
</body>
</html>
