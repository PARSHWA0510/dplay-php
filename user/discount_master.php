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
            <h2 class="content-color-primary page-title">Flat Discount Master</h2>
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

    $sql=("INSERT INTO `discount_master` ( `court_id`, `start_date`, `end_date`, `discount_per`, `discount_rs`, `status`, `user_id`, `discount_for`) VALUES ('".mysqli_real_escape_string($con,$_REQUEST['court_id'])."', '".mysqli_real_escape_string($con,$_REQUEST['start_date'])."', '".mysqli_real_escape_string($con,$_REQUEST['end_date'])."', '".mysqli_real_escape_string($con,$_REQUEST['discount_per'])."', '".mysqli_real_escape_string($con,$_REQUEST['discount_rs'])."','1','$admin_id', '".mysqli_real_escape_string($con,$_REQUEST['discount_for'])."')");	 
 
$z = mysqli_query($con,$sql);

?>
    <script language="javascript">window.location.href="discount_master.php";</script>
    <?php 
} 
	$id = $_GET['uid'];
	if(isset($_REQUEST['update'])) 
  	{
	$uupQry="UPDATE discount_master SET `court_id` = '".mysqli_real_escape_string($con,$_REQUEST['court_id'])."', `start_date` = '".mysqli_real_escape_string($con,$_REQUEST['start_date'])."', `end_date` = '".mysqli_real_escape_string($con,$_REQUEST['end_date'])."', `discount_per` = '".mysqli_real_escape_string($con,$_REQUEST['discount_per'])."', `discount_rs` = '".mysqli_real_escape_string($con,$_REQUEST['discount_rs'])."', `discount_for` = '".mysqli_real_escape_string($con,$_REQUEST['discount_for'])."' WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);

	?>
    <script language="javascript">window.location.href="discount_master.php";</script>
    <?php  } ?>
    <?php 
	$ure=mysqli_query($con,"select * from discount_master where id = '$id'");
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
                      <label for="multicol-username">Court Name</label>
                      <select  class='form-control chosen_select' name="court_id" required>
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
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for=""> Discount Start</label>
                      <input class="form-control" name="start_date"  value="<?php echo $urow['start_date']; ?>" type="date" required> 
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for=""> Discount End</label>
                      <input class="form-control" name="end_date"  value="<?php echo $urow['end_date']; ?>" type="date" required>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for=""> Discount (%)</label>
                      <input class="form-control" name="discount_per"  value="<?php echo $urow['discount_per']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <div class="form-group">
                      <label for=""> <div class="btn btn-danger" style="margin-top:30px;">OR</div></label>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for=""> Discount (Rs)</label>
                      <input class="form-control" name="discount_rs"  value="<?php echo $urow['discount_rs']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""><strong>Discount For : </strong></label>
                      <input name="discount_for" required  type="radio"  value="courtbook"  <?php if($urow['discount_for'] == 'courtbook') echo 'checked="checked"';?> style=""/>
                      &nbsp;Court Booking
                      <input name="discount_for"  required type="radio"  value="membership"  <?php if($urow['discount_for'] == 'membership') echo 'checked="checked"';?> style=""/>
                      &nbsp;Membership Boooking
                      
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
                      <th> Court Name </th>
                      <th> Discount Start </th>
                      <th> Discount End </th>
                      <th> Discount (%) </th>
                      <th> Discount (Rs) </th>
                      <th> Discount For </th>
                      <th> Status </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								 
						$ure=mysqli_query($con,"select * from discount_master where user_id = '$admin_id'");
						while($urow=mysqli_fetch_array($ure)) {
						?>
                    <tr class="showtr">
                      <td><?php $court_id = $urow['court_id']; 
						   $urex=mysqli_query($con,"select * from court_master where id = '$court_id'");
						   $urowx=mysqli_fetch_array($urex); echo $urowx['name'];?>
                      </td>
                      <td><?php echo date("d-m-Y", strtotime($urow['start_date']));  ?> </td>
                      <td><?php echo date("d-m-Y", strtotime($urow['end_date']));  ?> </td>
                      <td><?php echo $urow['discount_per']; ?> </td>
                      <td><?php echo $urow['discount_rs']; ?> </td>
                      <td style="text-transform:capitalize"><?php echo $urow['discount_for']; ?> </td>
					<td><div class="material-switch">
                          <input id="someSwitchOptionSuccess<?php echo $urow[0]; ?>" value="<?php echo $urow[0]; ?>" name="someSwitchOption001" type="checkbox" <?php if($urow['status']=='1') { echo"checked"; }?> onClick="status_cng(this.value);"/>
                          <label for="someSwitchOptionSuccess<?php echo $urow[0]; ?>" class="label-success"></label>
                        </div></td>
                      <td class="center"><a class="btn btn-mini btn-success" href="discount_master.php?uid=<?php echo $urow[0]; ?>" title=""><i class="icon-pencil"></i></a> <a href="#" id="<?php echo $urow[0]; ?>" class="delete btn btn-mini btn-danger" title="Delete" ><i class="icon-trash"></i></a> </td>
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
        url:"discount_master.php",
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
$ure=mysqli_query($con,"select * from discount_master where id = '$pid'");
$urow=mysqli_fetch_array($ure);
$ostatus = $urow['status'];
if($ostatus == '1') { $status = '0'; } else { $status = '1'; }
$uupQry="UPDATE discount_master SET status='$status' WHERE id='$pid'";
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
   url: "discount_master.php",
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
$delete = "DELETE FROM discount_master WHERE id = '$id'";
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
   url: "discount_master.php?uid=<?php echo $_GET['uid']; ?>",
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
                    [3, "desc"]
                ]
            });
        });
    </script>
<!-- page specific script -->
</body>
</html>
