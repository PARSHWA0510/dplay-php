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
            <h2 class="content-color-primary page-title">Event Accessories</h2>
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
	$code = rand(11111,99999);
  $sql=("INSERT INTO `event_accessories` (`name`, `small_des`, `status`,  `user_id`) VALUES ('".mysqli_real_escape_string($con,$_REQUEST['name'])."','".mysqli_real_escape_string($con,$_REQUEST['small_des'])."','1','$admin_id')");	 
	$z = mysqli_query($con,$sql);
	$id = mysqli_insert_id($con);


foreach($_POST['accessories'] as $key=>$val)
						{
							if($val != '')
							{
								$qry_main = "INSERT INTO `event_accessories` (`accessories`,`ref_id`) VALUES ('$val','$id')";
								mysqli_query($con,$qry_main);
							}
						}		


?>
    <script language="javascript">window.location.href="event_accessories.php";</script>
    <?php 
} 

	$id = $_GET['uid'];

	if(isset($_REQUEST['update'])) 
  	{
	$uupQry="UPDATE event_accessories SET  `name` = '".mysqli_real_escape_string($con,$_REQUEST['name'])."', `small_des` = '".mysqli_real_escape_string($con,$_REQUEST['small_des'])."' WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
  
foreach($_POST['accessories'] as $key=>$val)
						{
							if($val != '')
							{
								$qry_main = "INSERT INTO `event_accessories` (`accessories`,`ref_id`) VALUES ('$val','$id')";
								mysqli_query($con,$qry_main);
							}
						}		

 // exit();
	?>
    <script language="javascript">window.location.href="event_accessories.php";</script>
    <?php  } ?>
    <?php 
					$ure=mysqli_query($con,"select * from event_accessories where id = '$id'");
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
                      <label for="">Title<span style="color:#FF0000">*</span></label>
                      <input class="form-control" name="name"  required value="<?php echo $urow['name']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group">
                      <label for="">Small Description</label>
                      <input class="form-control" name="small_des" value="<?php echo $urow['small_des']; ?>" type="text">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="">Dropdown Value<span class="required">*</span></label>
                      <table class="table table-striped table-bordered table-lightfont"  width="100%" border="0" id="periodTable1">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th></th>
                          </tr>
                          <?php								 
							$urezmm=mysqli_query($con,"select * from event_accessories where ref_id = '$id' order by ABS(id) asc");
							$urowmmno=mysqli_num_rows($urezmm);
							if($id != '') {
							while($urowmm=mysqli_fetch_array($urezmm))
							{ ?>
                          <tr class="">
                            <td style=""><?php echo $urowmm['accessories']; ?></td>
                            <td class="center"><a href="#" class='btn btn-mini btn-danger' onClick="performDelete('event_accessories.php?uid=<?php echo $id; ?>&otid=<?php echo $urowmm[0]; ?>'); return false;"><i class="icon-trash"></i></a> </td>
                          </tr>
                          <?php } } ?>
                        </thead>
                        <tbody>
                          <tr>
                            <td><input class="form-control" name="accessories[]" type="text"></td>
                            <td><a href="javascript:void(0)" class="btn btn-success" onClick="addBtnPeriod1()">+</a></td>
                          </tr>
                        </tbody>
                      </table>
                      <script type="text/javascript">
            function addBtnPeriod1() {
                var i = 1 + $("#periodTable1 tbody tr").length;
                $("#periodTable1 tbody").append('<tr><td><input class="form-control" name="accessories[]" type="text"></td><td><div style="width:100px"><a class="btn btn-success" style="margin-left:5px" href="javascript:void(0)" onclick="addBtnPeriod1()">+</a>&nbsp;&nbsp;<a style="margin-left:5px" href="javascript:void(0)" class="remBtnPeriod1 btn btn-danger">-</a></div></td></tr>');
                date(i);
            }
            $("#periodTable1").on('click', '.remBtnPeriod1', function () {
                $(this).closest("tr").remove();
            });
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
$dusr="delete from event_accessories where id = '$otid'";
$dre=mysqli_query($con,$dusr);
?>
              <script language="javascript">window.location.href="event_accessories.php?uid=<?php echo $uid; ?>";</script>
              <?php  }  ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-4 main-container">
    <div class="card mb-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
              <div class="table-responsive">
                <table class="table " id="dataTables-examplez">
                  <thead>
                    <tr>
                      <th> Title </th>
                      <th> Description </th>
                      <th> Dropdown Value </th>
                      <th> Status </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								 
						$ure=mysqli_query($con,"select * from event_accessories where user_id = '$admin_id'");
						while($urow=mysqli_fetch_array($ure))
						 {
						?>
                    <tr class="showtr">
                      <td><?php echo $urow['name']; ?> </td>
                      <td><?php echo $urow['small_des']; ?> </td>
                      <td><?php $ref_id = $urow[0];
					  $urex=mysqli_query($con,"select * from event_accessories where ref_id = '$ref_id'");
					  while($urowx=mysqli_fetch_array($urex)) { echo $urowx['accessories']; echo ', '; }  ?> </td>
                      <td><div class="material-switch">
                          <input id="someSwitchOptionSuccess<?php echo $urow[0]; ?>" value="<?php echo $urow[0]; ?>" name="someSwitchOption001" type="checkbox" <?php if($urow['status']=='1') { echo"checked"; }?> onClick="status_cng(this.value);"/>
                          <label for="someSwitchOptionSuccess<?php echo $urow[0]; ?>" class="label-success"></label>
                        </div></td>
                      <td class="center"><a class="btn btn-mini btn-success" href="event_accessories.php?uid=<?php echo $urow[0]; ?>" title=""><i class="icon-pencil"></i></a> <a href="#" id="<?php echo $urow[0]; ?>" class="delete btn btn-mini btn-danger" title="Delete" ><i class="icon-trash"></i></a> </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
function status_cng(value)
{
    var pid = value;
    $.ajax({
        type:"POST",
        data:"pid="+pid,
        url:"event_accessories.php",
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
$ure=mysqli_query($con,"select * from event_accessories where id = '$pid'");
$urow=mysqli_fetch_array($ure);
$ostatus = $urow['status'];
if($ostatus == '1') { $status = '0'; } else { $status = '1'; }
$uupQry="UPDATE event_accessories SET status='$status' WHERE id='$pid'";
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
   url: "event_accessories.php",
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
$delete = "DELETE FROM event_accessories WHERE id = '$id'";
mysqli_query($con, $delete);

$delete = "DELETE FROM event_accessories WHERE ref_id = '$id'";
mysqli_query($con, $delete);

}
?>
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
