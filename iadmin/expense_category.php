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
            <h2 class="content-color-primary page-title">Manage Expense Category </h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content page title ends -->
  <!-- content page -->
  <div class="container mt-4 main-container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="row">
            <div class="col-lg-12">
              <div class="element-wrapper">
                <div class="element-box">
                  <?php 
if ($_POST['insert']) 
{
	$img1 = $_FILES['img1']['name'];
	if($img1 != '')
	{
	$img1 = rand(1,1000000).str_replace(" ","_",trim($_FILES['img1']['name']));
 	$tmp_name=$_FILES["img1"]["tmp_name"];
	$pr="../images/";
	$pr1=$pr.$img1;
	move_uploaded_file($tmp_name,$pr1);
	}
	
	$name = $_REQUEST['name'];
	$ure=mysqli_query($con,"select * from expense_category where name = '$name'");
	$urowno=mysqli_num_rows($ure);
	if($urowno > 0) 
	{ ?>
    <script>alert('Name Already Exist. Please Change');</script>
	<script language="javascript">window.location.href="expense_category.php";</script>
    <?php } else { 
    $sql=mysqli_query($con,"INSERT INTO `expense_category` (`name`, `status`, `user_id`) VALUES ('".mysqli_real_escape_string($con,$_REQUEST['name'])."','1','$admin_id')");	 
 	?>
                  <script language="javascript">window.location.href="expense_category.php";</script>
                  <?php 
}  }
?>
                  <?php 
  $id = $_GET['uid'];
						
						
if(isset($_REQUEST['update'])) 
  {
  	
	
	$uupQry="UPDATE expense_category SET name='".mysqli_real_escape_string($con,$_REQUEST['name'])."' WHERE id='$id'";
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
    $uupQry="UPDATE expense_category SET image='$img1'  WHERE id='$id'";
	$uuresult=mysqli_query($con,$uupQry);
 }
  
	?>
                  <script language="javascript">window.location.href="expense_category.php";</script>
                  <?php  } ?>
                  <?php 
		$ure=mysqli_query($con,"select * from expense_category where id = '$id'");
		$urow=mysqli_fetch_array($ure); ?>
                  <form autocomplete="off" name="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label> Name <span class="required">*</span></label>
                      <input class="form-control" autofocus  required value="<?php echo $urow['name']; ?>" name="name" type="text">
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
                      <input type="submit" name="insert" value="Save" class="btn btn-primary">
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
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="row">
            <div class="col-lg-12">
              <div class="element-wrapper">
                <div class="element-box">
                  <div class="table-responsive">
                    <table class="table " id="dataTables-example">
                      <thead>
                        <tr>
                          <th> Name</th>
                          <th> Status </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php								 
						$ure=mysqli_query($con,"select * from expense_category where user_id = '$admin_id'");
						while($urow=mysqli_fetch_array($ure))
						 {
						?>
                        <tr class="showtr">
                          <td><?php echo $urow['name']; ?> </td>
                          <td class="center"><div class="material-switch">
                              <input id="someSwitchOptionSuccess<?php echo $urow[0]; ?>" value="<?php echo $urow[0]; ?>" name="someSwitchOption001" type="checkbox" <?php if($urow['status']=='1') { echo"checked"; }?> onClick="status_cng(this.value);"/>
                              <label for="someSwitchOptionSuccess<?php echo $urow[0]; ?>" class="label-success"></label>
                            </div></td>
                          <td class="center"><a class="btn btn-mini btn-success" href="expense_category.php?uid=<?php echo $urow[0]; ?>" title=""><i class="icon-pencil"></i></a> <a href="#" id="<?php echo $urow[0]; ?>" class="delete btn btn-mini btn-danger" title="Delete" ><i class="icon-trash"></i></a> </td>
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
        url:"expense_category.php",
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
$ure=mysqli_query($con,"select * from expense_category where id = '$pid'");
$urow=mysqli_fetch_array($ure);
$ostatus = $urow['status'];
if($ostatus == '1') { $status = '0'; } else { $status = '1'; }
$uupQry="UPDATE expense_category SET status='$status' WHERE id='$pid'";
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
   url: "expense_category.php",
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
$delete = "DELETE FROM expense_category WHERE id = '$id'";
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
